<?php

namespace app\en\controller;

use app\en\controller\Base;
use app\admin\model\Article;
use think\Request;
use think\Db;

class Index extends Base {

    public function index() {
        $rec_cate = db('category')->where(array('language_id' => '2', 'is_recommond' => 1))->limit(8)->select();
        $foot_cate = db('category')->where(array('language_id' => '2', 'is_footer' => 1, 'pid' => 0))->select();
        $this->sort_cate($foot_cate);
        $this->assign('rec_cate', $rec_cate);
        $this->assign('foot_cate', $foot_cate);
        $rec_arts = Article::name('article')->where(array('language_id' => '2', 'status' => 1, 'is_recommend' => 1))->where('thumb', 'neq', '')->paginate(10);
        $latest_arts = Article::name('article')->where(array('language_id' => '2', 'status' => 1))->where('thumb', 'neq', '')->limit(10)->select();

        $links = db('links')->where('language_id', 2)->limit(6)->select();

        $this->assign('latest_arts', $latest_arts);
        $this->assign('links', $links);
        $this->assign('rec_arts', $rec_arts);

        return $this->fetch();
    }

    public function artlst() {

        $cate_id = input('id');
        $cate = db('category')->select();
        $cate_ids = get_childs_id($cate_id, $cate);
        $articles = db('article')->where('category_id', 'in', $cate_ids)->paginate(10);
        $this->assign('articles', $articles);
        $position = get_position(input('id'), intval(input('type')));
        $this->assign('position', $position);
        return $this->fetch('artlist');
    }

    public function article() {
        $id = input('id');
        $article = db('article')->where('id', $id)->find($id);

        db('article')->where('id', $id)->setInc('clicks');
        $position = get_position($article['category_id'], 2);
        if ($position != FALSE) {
            $this->assign('position', $position);
        }
        $relates = $this->relates($article['key_words'], $id);
        $this->assign('article', $article);
        $this->assign('relates', $relates);
        return $this->fetch();
    }

    public function page() {
        $cate_id = input('id');
        $cate = db('category')->where('id', $cate_id)->find();
        $model=db('model_type')->where('id',$cate['model_type_id'])->find();
        $this->assign('cate', $cate);
        $tmp_path = '../../../public/template/';
        $view_suffix= \think\Config::get('template.view_suffix');
        return $this->fetch($tmp_path . str_ireplace('.'.$view_suffix,'', $model['model_detail_page']));
    }

    public function imglst() {
        $position = get_position(input('id'), intval(input('type')));
        $this->assign('position', $position);
        $cate_id = input('id');
        $cate = db('category')->select();
        $cate_ids = get_childs_id($cate_id, $cate);
        $articles = db('article')->where('category_id', 'in', $cate_ids)->paginate(10);
        $this->assign('articles', $articles);
        return $this->fetch('');
    }

    protected function sort_cate(&$cates) {
        //同样存在多次读取数据库的弊端，
        foreach ($cates as $key => $value) {
            $childs = db('category')->where(array('language_id' => 2, 'pid' => $value['id'], 'is_footer' => 1))->select();
            if (count($childs) != 0) {
                $cates[$key]['child'] = $childs;
            } else {
                $cates[$key]['child'] = 0;
            }
        }
    }

    public function addZan() {
        $art = db('article')->find(input('id'));
        if ($art !== false) {
            $art['zan'] += 1;
        }
        if (db('article')->update($art)) {
            echo $art['zan'];
        }
    }

    public function search() {
        $keyword = input('keyword');
        $resuts = db('article')->where('title', 'like', '%' . $keyword . '%')->paginate(10);
        if ($resuts) {
            
        } else {
            $resuts = 0;
        }
        $this->assign('articles', $resuts);
        $this->assign('keyword', $keyword);
        return $this->fetch();
    }

    public function relates($key_words, $id) {
        $results = array();
        $key_words = str_ireplace('，', ',', $key_words);
        $key_arr = explode(',', $key_words);
        foreach ($key_arr as $key => $val) {
            $where = array(
                'key_words' => ['like', '%' . $val . '%'],
                'id' => ['neq', $id]
            );
            $articles = db('article')->where($where)->order('release_date DESC')->limit(3)->select();
            $results = array_merge($results, $articles);
        }
        $ar = array();
        foreach ($results as $key => $value) {
            $temp = '';
            foreach ($value as $k => $v) {
                $temp .= $v . '@#';
            }
            array_push($ar, $temp);
        }
        $results = null;
        $result = array_unique($ar);
        $ar = null;
        $articles = array();
        foreach ($result as $key => $value) {
            $ar_tmp = explode('@#', $value);
            array_push($articles, $ar_tmp);
        }
        return $articles;
    }

//根据栏目模型不同重定向不同的页面
    public function switchcate() {

        $this->redirect('test', input());
    }

    public function test() {
        // $this->fetch('article');
    }

}
