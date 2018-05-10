<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:109:"E:\wamp\bin\apache\apache2.4.9\htdocs\lingshi\public/../application/admin\view\category\product_category.html";i:1525680340;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="__ADMIN__/static/admin__ADMIN__/lib/html5.js"></script>
<script type="text/javascript" src="__ADMIN__/static/admin__ADMIN__/lib/respond.min.js"></script>
<script type="text/javascript" src="__ADMIN__/static/admin__ADMIN__/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/style.css" />
<link rel="stylesheet" href="__ADMIN__/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
<!--[if IE 6]>
<script type="text/javascript" src="__ADMIN__/static/admin/http:/__ADMIN__/lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>产品分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<span style="color:red;">*点击分类名称，可立即删除</span>
<table class="table">
	<tr>
		<td width="200" class="va-t"><ul id="treeDemo" class="ztree"></ul></td>
		<td class="va-t"><IFRAME ID="testIframe" Name="testIframe" FRAMEBORDER=0 SCROLLING=AUTO width=100%  height=390px SRC="<?php echo url('product_category_add'); ?>"></IFRAME></td>
	</tr>
</table>
<script type="text/javascript" src="__ADMIN__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="__ADMIN__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__ADMIN__/static/H-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">

// var zNodes =[
// 	{ id:1, pId:0, name:"一级分类", open:true},
// 	{ id:11, pId:1, name:"二级分类"},
// 	{ id:111, pId:11, name:"三级分类"},
// 	{ id:112, pId:11, name:"三级分类"},
// 	{ id:113, pId:11, name:"三级分类"},
// 	{ id:114, pId:11, name:"三级分类"},
// 	{ id:115, pId:11, name:"三级分类"},
// 	{ id:12, pId:1, name:"二级分类 1-2"},
// 	{ id:121, pId:12, name:"三级分类 1-2-1"},
// 	{ id:122, pId:12, name:"三级分类 1-2-2"},
// ];

var zNodes;

	$.ajax({
             //
             url:"<?php echo url('product_category_ajax'); ?>",
             type:'get',

             dataType:'json',
             async: false,
             success:function(data){
           			 zNodes=data;
           		console.log(data);
             }

            });

var setting = {
	view: {
		dblClickExpand: false,
		showLine: false,
		selectedMulti: false
	},
	data: {
		simpleData: {
			enable:true,
			idKey: "id",
			pIdKey: "parent_id",
			rootPId: ""
		}
	},
	callback: {
		beforeClick: function(treeId, treeNode) {
				//console.log(treeNode.id);
				$.ajax({
	             //
	             url:"product_category_del",
	             type:'get',
	             data:{id:treeNode.id},
	             dataType:'json',
	             async: false,
	             success:function(data){
	           		if(data==1){
	           			alert("删除成功");
	           			parent.location.href="<?php echo url('product_category'); ?>";

	           		}else{
	           			alert(data);
	           			parent.location.href="<?php echo url('product_category'); ?>";
	           		}
	             }
	            })
	            // console.log($.ajax);
		}
	}
};


var code;

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}

$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	demoIframe.bind("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
</script>
</body>
</html>