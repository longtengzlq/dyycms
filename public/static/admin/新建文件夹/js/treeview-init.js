
var UITree = function () {

    return {
        //main function to initiate the module
        init: function (sdata) {
		//	alert(sdata);
            var DataSourceTree = function (options) {
                this._data = options.data;
                this._delay = options.delay;
            };

            DataSourceTree.prototype = {

                data: function (options, callback) {
                    var self = this;

                    setTimeout(function () {
                        var data = $.extend(true, [], self._data);

                        callback({ data: data });

                    }, this._delay)
                }
            };

            // INITIALIZING TREE
			temp=sdata.substring(0,sdata.length);

			var treeDataSource2 = new DataSourceTree({
				
                data: JSON.parse(temp),
				delay: 400
            });



            $('#MyTree2').tree({
                dataSource: treeDataSource2,
                multiSelect: true,
		'open-icon': 'ace-icon tree-minus',
                'close-icon': 'ace-icon tree-plus',
                'selectable': false,
                loadingHTML: '<div class="tree-loading"><i class="fa fa-rotate-right fa-spin"></i></div>'
            });

          
        }

    };

}();