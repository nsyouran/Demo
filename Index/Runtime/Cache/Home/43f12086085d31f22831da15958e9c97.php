<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>医化管理系统</title>

	<link rel="stylesheet" href="/MCMS/Public/bs/css/bootstrap.css">
	<link rel="stylesheet" href="/MCMS/Public/css/index.css">

	<script src="/MCMS/Public/js/jquery.min.js"></script>
	<script src="/MCMS/Public/js/jquery.auto_tip.js"></script>
	<script src="/MCMS/Public/bs/js/bootstrap.min.js"></script>
</head>
<body>
	<?php if($login == 'true'): ?><div class="header">
		<nav class="navbar navbar-default navbar-static" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">医化管理系统</a>
				</div>
				
				<div class="collapse navbar-collapse navbar-right"> 
					 
					<ul class="nav navbar-nav">
						<li id="fat-menu" class="dropdown">
							<a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<?php echo ($login_user); ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="drop3">
								<li><a href="#">我的账户</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="/MCMS/index.php/Home/Login/logout">安全退出</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li><img src="/MCMS/Public/img/user_default.jpg" alt="头像" class="img-circle" style="margin: 10px 5px 0 5px;"></li>
					</ul> 					
				</div>
			</div>
    	</nav>
	</div>

	<div class="nav">
		<ul class="nav nav-tabs">
			<li role="presentation" <?php if($pg == 'index'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/Index/index">工作台</a></li>
			<li role="presentation" <?php if($pg == 'task'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/Task/index">任务大厅</a></li>
			<li role="presentation" <?php if($pg == 'mytask'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/Task/mytask">我的任务</a></li>
			<li role="presentation" <?php if($pg == 'client'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/Client/index">客户</a></li>
			<li role="presentation" <?php if($pg == 'tool'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/Tool/index">工具</a></li>
			<li role="presentation" <?php if($pg == 'user'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/User/index">用户</a></li>
			<li role="presentation" <?php if($pg == 'help'): ?>class="active"<?php endif; ?>><a href="/MCMS/index.php/Home/Help/index">HELP</a></li>
			<li role="presentation"><a href="#" class=''>日志</a></li>
		</ul>
	</div><?php endif; ?>

	<div class="content">
	<div class="control">
		<div class="btn-group" >
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addClient" data-backdrop="static">新增</button>
			<button type="button" class="btn btn-default delete">删除</button>			
		</div>
		<div class="input-group" style="width:400px;margin:0 200px 0 0;float: right">
				<input type="text" class="form-control">
				<span class="input-group-btn">
					<a href="#" class="btn btn-default">搜索</a>
				</span>
		</div>
	</div>
	<div class="detail">		
		<div style="position: absolute;top: 42px; bottom:0;left: 10px;right: 10px; overflow: auto">
			<table class="table table-striped table-hover" style="background: #eee">
				<tt>
					<td style="width: 20px;"><input type="checkbox"></td>
					<td>客户名称<a href=""><span style="display:none;">0</span></a></td>
					<td>地址</td>					
					<td>联系电话</td>
					<td>联系人</td>
					<td>上次检测日期</td>
				</tt>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox"></td>
						<td><a href="#" class="clientname"><?php echo ($c["clientname"]); ?><span style="display:none;"><?php echo ($c["id"]); ?></span></a></td>
						<td><?php echo ($c["addr"]); ?></td>
						<td><?php echo ($c["tel"]); ?></td>
						<td><?php echo ($c["contact"]); ?></td>
						<td><?php echo ($c["last_time"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>				
			</table>
		</div>
	</div>
</div>

<!-- addClient -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">新增客户</h4>
			</div>

			<div class="modal-body">
			<form class="form">
				<div class="form-group">
					<label for="clientname">客户名称</label>
					<input type="text" class="form-control" id="clientname" placeholder="客户名称">
				</div>
				<div class="form-group">
					<label for="">地址</label>
					<input type="text" class="form-control" id="addr" placeholder="地址">
				</div>
				<div class="form-group">
					<label for="">联系人</label>
					<input type="text" class="form-control" id="contact" placeholder="联系人">
				</div>
				<div class="form-group">
					<label for="">联系电话</label>
					<input type="text" class="form-control" id="tel" placeholder="联系电话">
				</div>
			</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" id="btn_saveclient">保存</button>
			</div>
		</div>
	</div>
</div>

<!-- clientDetail -->
<div class="modal fade" id="clientDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='myModalLabel'>客户详情</h4>
			</div>

			<div class='modal-body'>
			<form class='form'>
				<div class='form-group' style="display:none;">
					<input type='text' class='form-control' id='vid' placeholder=''>
				</div>

				<div class='form-group'>
					<input type='text' class='form-control' id='vclientname' placeholder='客户名称' >
				</div>
				<div class='form-group'>
					<input type='text' class='form-control' id='vaddr' placeholder='地址' >
				</div>
				<div class='form-group'>
					<input type='text' class='form-control' id='vcontact' placeholder='联系人' >
				</div>
				<div class='form-group'>
					<input type='text' class='form-control' id='vtel' placeholder='联系电话' >
				</div>
			</form>
			</div>

			<div class='modal-footer'>
				<button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
				<button type='button' class='btn btn-primary' id="btn_modifyclient">修改</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('.delete').click(function(){
		var has=0
		$(':checkbox').each(function(){
			if($(this).parent().parent().children().eq(1).children().children().html()!=0){
				if($(this).is(':checked')){
					has = has+1;
					var cid_ = $(this).parent().parent().children().eq(1).children().children().html();
					var clientname_ = $(this).parent().parent().children().eq(1).children().html();
					clientname_ = clientname_.split("<span")[0];
					if(confirm('确认删除 ' + clientname_ + " ?")){
						$.ajax({
							url: "/MCMS/index.php/Home/Client/delete",
							async: false,
							type: "POST",
							dataType: "html",
							data : {
								cid: cid_,
							},
							success: function(rtn){
								if(rtn == "success"){
									alert(clientname_ + '删除成功');
								}else{
									alert(clientname_ + '删除失败');
								}
							},
						});
					};
				}
			}
		});
		if(has==0){
			alert("请先选择需要删除的客户");
		}else{
			window.location.reload(true);
		}	
	});

	$('.clientname').click(function(){
		var cid_ = $(this).children('span').html();
		$.ajax({
			url: "/MCMS/index.php/Home/Client/view",
			async: false,
			type: "POST",
			dataType: "json",
			data : {
				cid: cid_,
			},
			success: function(rtn){
				$("#vid").val(rtn["id"]);
				$("#vclientname").val(rtn["clientname"]);
				$("#vaddr").val(rtn["addr"]);
				$("#vcontact").val(rtn["contact"]);
				$("#vtel").val(rtn["tel"]);
			},
		});

		$('#clientDetail').modal({
			backdrop: 'static',
		});
	});

	$("#btn_modifyclient").click(function(){
		var cid_ = $("#vid").val();
		var clientname_ = $("#vclientname").val();
		var addr_ = $("#vaddr").val();
		var contact_ = $("#vcontact").val();
		var tel_ = $("#vtel").val();
		$.ajax({
			url: "/MCMS/index.php/Home/Client/modify",
			async: false,
			type: "POST",
			dataType: "html",
			data : {
				cid: cid_,
				clientname: clientname_,
				addr: addr_,
				contact: contact_,
				tel: tel_,
			},
			success: function(rtn){
				if(rtn == "success"){
					alert("修改成功");
					window.location.reload();
				}else{
					alert("修改失败");
				}
			},
		});
	});

	$('#btn_saveclient').click(function(){
		var clientname_ = $("#clientname").val();
		var addr_ = $("#addr").val();
		var tel_ = $("#tel").val();
		var contact_ = $("#contact").val();
		$.ajax({
			url: "/MCMS/index.php/Home/Client/add",
			async: false,
			type: "POST",
			dataType: "html",
			data : {
				clientname: clientname_,
				addr: addr_,
				tel: tel_,
				contact: contact_,
			},
			success: function(rtn){
				if(rtn == "success"){
					window.location.reload(true);
				}else{
					alert('新增失败');
				}
			},
		});
	});
</script>

</body>
</html>