<!DOCTYPE html>
<html>	
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="public/css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.useso.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script src="http://ajax.useso.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/buttons.css"/>
</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});	  
});
</script>
 <!--SIGN UP-->
 <marquee scrollAmount=2 width=300><font style="font-family:华文行楷" color="red">没有注册的用户，请注册</font></marquee>  
		　　　　　　　　　　　　<a href="index.php?r=user/register" data-icon="♛"  class="button pink serif round glass">注册</a>
<div class="login-form">
	<div class="close"> </div>
		<div class="head-info">
			<label class="lbl-1"> </label>
			<label class="lbl-2"> </label>
			<label class="lbl-3"> </label>
		</div>
			<div class="clear"> </div>
	<div class="avtar">
		<img src="public/images/avtar.png" />
	</div>
			<form action="index.php?r=user/index" method="post">
					<input type="text" name="u_name" class="text" placeholder="username" required="required">
					<input type="password" name="u_pwd" class="text" placeholder="******" required="required">
<!--					<p><input type="checkbox" name="day" value="7"><font color="red">7天免登录</font></p>-->
                    <input type="submit" value="Login" >
			</form>		
</div>
</body>
</html>