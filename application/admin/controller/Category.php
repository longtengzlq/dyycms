<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;
use think\Request;
use app\admin\model\Category as CategoryModel;

class Category extends Base {

    function _initialize() {
        parent::_initialize();
        $language_id = get_language_id();

        //获取模型数据
        $models = db('model_type')->select();
        $this->assign('models', $models);

        //添加栏目时，用于显示栏目所属语种
        $lang = db('language')->select();
        $lang_arr = '';
        if ($lang) {
            foreach ($lang as $key => $value) {
                $lang_arr[$value['id']] = $value;
            }
        }
        unset($lang);

        $this->assign('lang', $lang_arr);
        $cates = CategoryModel::name('category')->where(array('language_id' => $language_id))->order('sort asc, id asc')->select();
        //方便list.html中显示上级栏目名称
        $cat_arr = '';
        if ($cates) {
            foreach ($cates as $key => $value) {
                $cat_arr[$value['id']] = $value;
            }
        }
        $this->assign('cates', $cat_arr);
        //对娶到栏目进行分层列表
        $sort_cates = sort_tree($cates, 0, 0, '');
        //unset($cates);
        $this->assign('sort_cates', $sort_cates);
    }

    public function index() {
        return $this->fetch();
    }

    public function add() {

        if (request()->isPost()) {
            $data = input();
            dump($data);

            $data['status'] = 0;
            $data['is_recommond'] = 0;
            if (input('status')) {
                $data['status'] = 1;
            }
            $data['is_recommond'] = 0;
            if (input('is_recommond')) {
                $data['is_recommond'] = 1;
            }

            if (db('category')->insert($data)) {
                $this->success(\think\Lang::get('operate_success'), url('category/lst', array('language_id' => intval($data['language_id']))));
            } else {
                $this->success(\think\Lang::get('operate_failure'), url('category/lst', array('language_id' => input('language_id'))));
            }
        } else {
            $language_id = get_language_id();
            $this->assign('language_id', $language_id);
            return $this->fetch('add');
        }
    }

    public function lst() {
        $lang_type = \think\Cookie::get('lang', 'mlcms_');
        $this->assign('lang_type', $lang_type);
        set_language_id(input('language_id'));
        $language_id = get_language_id();
        //$result=db('category')->alias('c')->join('language l','l.id=c.language_id')->field('c.id,c.cate_name,c.pid,l.brief_name')->paginate(3);
        $result = CategoryModel::where(array('language_id' => intval($language_id)))->order('sort asc')->select();
        $this->assign('results', $result);
        $this->assign('language_id', $language_id);


        return $this->fetch('list');
    }

    public function edit() {

        $id = input('id');
        $language_id = get_language_id();
        if (request()->isPost()) {
            $data = input();
            if ($data['id'] == $data['pid']) {
                $this->error(\think\Lang::get('pid_neq_id'), url('category/lst', array('language_id' => input('language_id'))));
            }
            if (db('category')->update($data) !== false) {
                $this->success(\think\Lang::get('operate_success'), url('category/lst', array('language_id' => input('language_id'))));
            } else {
                $this->error(\think\Lang::get('operate_failure'), url('category/lst', array('language_id' => input('language_id'))));
            }
        } else {
            $this->assign("language_id", $language_id);
            $this->assign("id", $id);
            $result = CategoryModel::where(array('id' => $id))->find();
            $this->assign('results', $result);
            return $this->fetch();
        }
    }

    public function del() {
        $id = input('id');
        $language_id = get_language_id();
        $cates = db('category')->where(array('language_id' => $language_id))->select();
        $child_arr = $this->getChilds($cates, $id);
        $delete = TRUE;
        if ($child_arr) {
            foreach ($child_arr as $key => $value) {
                if (db('category')->delete($value)) {
                    
                } else {
                    $delete = FALSE;
                    break;
                };
            }
        }

        if (db('category')->delete(array('id' => $id)) && $delete) {
            $this->success(\think\Lang::get('operate_success'), url('category/lst', array('language_id' => input('language_id'))));
        } else {
            $this->success(\think\Lang::get('operate_failure'), url('category/lst', array('language_id' => input('language_id'))));
        }
    }

    public function delMuti() {
        $id_arr = input();
        $language_id = get_language_id();
        if (array_key_exists('checkbox', $id_arr)) {
            $datas = db('category')->where(array('language_id' => $language_id))->select();
            foreach ($id_arr['checkbox'] as $key => $value) {
                $childs = $this->getChilds($datas, $value);
                if ($childs) {
                    Db::name('category')->delete($childs);
                }
            }
            if (Db::name('category')->delete($id_arr['checkbox'])) {
                $this->success(\think\Lang::get('operate_success'), 'lst');
            } else {
                $this->error(\think\Lang::get('operate_failure'), 'lst');
            };
        } else {
            $this->error(\think\Lang::get('no_selected_checkbox'), 'lst');
        }
    }

    public function resort() {
        $sort_arr = input();
        $language_id = get_language_id();
        if (array_key_exists('sort', $sort_arr)) {
            $datas = '';
            foreach ($sort_arr['sort'] as $key => $value) {
                static $k = 0;
                $datas[$k]['sort'] = $value;
                $datas[$k]['id'] = $key;
                $k++;
            }
            $is_success = true;
            foreach ($datas as $key => $value) {
                if (db('category')->update($value) !== false) {
                    $is_success = true;
                    ;
                } else {
                    $is_success = FALSE;
                    break;
                }
            }
            if ($is_success) {
                $this->success(\think\Lang::get('operate_success'), 'lst');
            } else {
                $this->error(\think\Lang::get('operate_failure'), 'lst');
            }
        }
    }

    public function test() {
        $language_id = get_language_id();

        $data = db('category')->where(array('language_id' => $language_id))->select();
        $this->assign("cate", $data);
        return $this->fetch();
    }

    public function test_sort() {
        $language_id = get_language_id();

        $data = db('category')->where(array('language_id' => $language_id))->select();

        $sort_data = $this->sort($data, 0, 0);

        $this->assign("cate", $data);
        $this->assign('sort_data', $sort_data);
        return $this->fetch();
    }

    protected function sort(&$datas, $pid, $level) {
        static $arr = '';
        static $k = 0;
        foreach ($datas as $key => $value) {
            if ($value['pid'] == $pid) {
                $arr[$k] = $value;
                $arr[$k]['level'] = $level;
                $k++;
                $this->sort($datas, $value['id'], $level + 1);
            }
        }
        return $arr;
    }

    protected function getChilds($datas, $pid) {
        static $arr = '';
        static $k = 0;
        foreach ($datas as $key => $value) {
            if ($value['pid'] == $pid) {
                $arr[$k] = $value['id'];
                $k++;
                $this->getChilds($datas, $value['id']);
            }
        }
        return $arr;
    }

    public function updateStatus() {
        $data['id'] = input('id');
        if (input('field_name') && (input('field_value') !== false)) {
            $field_name = input('field_name');
            $field_value = input('field_value');
            $data[$field_name] = $field_value;
        } else {
            
        }
        if (db('category')->update($data) !== false) {
            echo 'name' . input('field_name') . 'value' . input('field_value');
        } else {
            echo 'error';
        }
    }

}
