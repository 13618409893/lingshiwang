<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:113:"E:\wamp\bin\apache\apache2.4.9\htdocs\lingshi\public/../application/admin\view\category\product_category_add.html";i:1525680084;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="__ADMIN__/static/adminlib/html5.js"></script>
<script type="text/javascript" src="__ADMIN__/static/adminlib/respond.min.js"></script>
<script type="text/javascript" src="__ADMIN__/static/adminlib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="__ADMIN__/static/adminhttp:/__ADMIN__/lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加产品分类</title>
</head>
<body>
<div class="page-container">
  <form action="<?php echo url('goods_type_add'); ?>" method="post" class="form form-horizontal" id="form-user-add">
    <div class="row cl">
      <label class="form-label col-2"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="name">
      </div>
      <div class="col-5"> </div>
    </div>
    <div class="row cl">
      <label class="form-label col-2">备注：</label>
      <div class="formControls col-5">
        <span class="select-box">
          <select class="select" size="1" name="parent_id">
            <option value="0" selected>顶级分类</option>
            <?php foreach($data  as $v): ?>
            <option value="<?php echo $v['id']; ?>" ><?php echo $v['level']; ?>级分类&nbsp;<?php echo $v['name']; ?></option>


            <?php endforeach; ?>


          </select>
        </span>
      </div>
      <div class="col-5"> </div>
    </div>
    <div class="row cl">
      <div class="col-9 col-offset-2">
        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="__ADMIN__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__ADMIN__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__ADMIN__/static/H-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-user-add").Validform({
		tiptype:2,
		callback:function(form){
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script>
</body>
</html>