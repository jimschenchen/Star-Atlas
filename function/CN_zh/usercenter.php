<?php

require('function.php');

ini_set('display_errors', '1');
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');


//echo $_SERVER['QUERY_STRING'];

if(!empty($_REQUEST['f'])){
	if($_REQUEST['f'] == "exit"){
		setcookie("token", "0", 0, '/');//退出登录删除token
		Header("Location: ?t=index");//跳转回index
		exit();
	}else{
		$f = $_REQUEST['f'];
	}
}else{
	$f = '';
}


if($f == 'reg'){

//注册

Head("注册 | Star Atlas","<style>
.input-field input:focus {
border-bottom: 1px solid #fff !important;
box-shadow: 0 1px 0 0 #fff !important;
}
.input-field input:focus + label {
color: #fff !important;
}
.input-field .prefix.active {
color: #fff !important;
}
</style>");


Body_Pre();

?>

<div class="banner-reg">
<div style="padding-top: 95px; font-size: 40px; line-height: 80px;">注册新账号</div>

<form action="form_action.asp" method="get">
<div class="row">
<div class="col s4">
</div>
<div class="input-field col s4 center-align">
<i class="material-icons prefix">account_circle</i>
    <input id="username" type="text" name="username">
    <label for="username">用户名</label>
</div>
</div>
<div class="row">
<div class="col s4">
</div>
<div class="input-field col s4">
<i class="material-icons prefix">lock</i>
    <input id="password" type="password" name="password">
    <label for="password">密码</label>
</div>
</div>

<div class="row">
<div class="col s4">
</div>
<div class="input-field col s4">
<i class="material-icons prefix">lock</i>
    <input id="password2" type="password" name="password2">
    <label for="password2">重复密码</label>
</div>
</div>

<div class="row">
<div class="col s4">
</div>
<div class="input-field col s4">
<i class="material-icons prefix">email</i>
    <input id="email" type="email" name="email">
    <label for="email">电子邮箱</label>
</div>
</div>

<div class="row">
<div class="col s4">
</div>
<div class="input-field col s4">
<i class="material-icons prefix">code</i>
    <input id="code" type="text" name="code">
    <label for="code">邀请码（可选）</label>
</div>
</div>


<a class="btn-floating waves-effect waves-dark hower btn-large purple-text text-darken-3 white flow-text z-depth-5" href="javascript: user.reg(document.getElementById('username').value, document.getElementById('password').value, document.getElementById('password2').value, document.getElementById('email').value, document.getElementById('code').value);"><i class="material-icons purple-text" type="submit" >done</i></a>

<div style="padding-top: 60px;">
<a href="?t=user" class="white-text ">登陆账户 | 忘记密码</a>
</div>

</div>

<?

Body_Post();
	
}else if($f == "welcome"){
	
	Head("欢迎开启星途之旅！ | Star Atlas","<style>
.input-field input:focus {
border-bottom: 1px solid #fff !important;
box-shadow: 0 1px 0 0 #fff !important;
}
.input-field input:focus + label {
color: #fff !important;
}
.input-field .prefix.active {
color: #fff !important;
}
</style>");


Body_Pre();

?>

<div class="banner-reg" id="banner" style="height: 500px;">
<div class="container">
<div class="row">
<div id="bgt" class="col m12 s10" style="padding-top: 0px;">
<div>
<div id="title" style="font-size: 60px; line-height: 100px;" class="flow-text">欢迎开启星图之旅！</div>
<div id="info" style="font-size: 16px; line-height: 100px;" class="flow-text">
<p>愿你在此收获良多！——Star Atlas团队</p>
<a class="waves-effect waves-dark hower btn-large purple darken-3 white-text flow-text z-depth-5" href="?t=index">回到主页</a>
&nbsp &nbsp
<a class="waves-effect waves-dark hower btn-large purple darken-3 white-text flow-text z-depth-5" href="?t=user">立刻登录</a></div>

</div>
</div>

</div>
</div>
</div>

<script>

var clientHeight = 560;

bannerSize();

function bannerSize(){
document.getElementById("banner").style.height = clientHeight + "px";
var leaveHeight = (clientHeight - document.getElementById("title").offsetHeight) / 2 - 65 ;
document.getElementById("bgt").style.paddingTop = leaveHeight + "px";
}

window.onresize = function(){
bannerSize();
}

//alert(leaveHeight);

</script>

<?php

Body_Post();
	
}else if(isLogin == false){

	//需要login
		

Head("登陆 | Star Atlas",'<style>
.input-field input:focus {
border-bottom: 1px solid #fff !important;
box-shadow: 0 1px 0 0 #fff !important;
}
.input-field input:focus + label {
color: #fff !important;
}
.input-field .prefix.active {
color: #fff !important;
}
</style>');

Body_Pre();

?>

<div class="banner-login">
<div style="padding-top: 95px; font-size: 40px; line-height: 80px;">用户中心</div>

<div class="container">
<div class="row">
<div class="col m3">
</div>
<div class="input-field col m6 s12">
<i class="material-icons prefix">account_circle</i>
          <input id="username" type="text" name="username">
          <label for="username">用户名/UID/电子邮箱</label>
        </div>
</div>
<div class="row">
<div class="col m3">
</div>
<div class="input-field col m6 s12">
<i class="material-icons prefix">lock</i>
          <input id="password" type="password" name="password">
          <label for="password">密码</label>
        </div>
</div>


<a class="btn-floating waves-effect waves-dark hower btn-large purple-text text-darken-3 white flow-text z-depth-5" type="submit" value="submit" href="javascript: user.login(document.getElementById('username').value,document.getElementById('password').value);"><i class="material-icons purple-text">arrow_forward</i></a>

</div>

<div style="padding-top: 60px;">
<a href="?t=user&f=reg" class="white-text ">注册账户 | 忘记密码</a>
</div>

</div>


<?

Body_Post();

die();

}else{
	
	//echo SA_USER()['username'];
	
	

Head("用户中心 | Star Atlas");

Body_Pre();

?>


<div class="banner-userpage">
<div style="padding-top: 20px; font-size: 40px; line-height: 80px;">用户中心</div>
<div>
  <div class="row">
  <div class="col s0 m2">
  </div>
    <div class="col s12 m8">
      <div class="card hower z-depth-3">
        <div class="card-image">
          <img src="<?php echo SAurl ?>img/banner_user.png">
          <span class="card-title"><?php echo SA_USER()['username'] ?> 的资料卡</span>
          <a class="btn-floating halfway-fab waves-effect waves-light purple btn-large"><i class="material-icons">create</i></a>
        </div>
        <div class="card-content">
		<div class="row">
		<div class="col s4 m12">
		</div>
		<div class="col m3 s4">
		<img src="<?php echo SAurl ?>img/head.png" alt="" class="circle responsive-img">
		</div>
		<div class="col m9 s12 left-align black-text">
			<table class="striped highlight">
        <thead>
        </thead>
        <tbody>
          <tr>
            <td>用户名</td>
            <td><?php echo SA_USER()['username'] ?></td>
          </tr>
          <tr>
            <td>UID</td>
            <td><?php echo SA_USER()['uid'] ?></td>
          </tr>
          <tr>
            <td>电子邮箱</td>
            <td><?php echo SA_USER()['email'] ?></td>
          </tr>
		  <tr>
            <td>用户组</td>
            <td><?php echo ugroup2String(SA_USER()['ugroup']) ?><br><?php echo agroup2String(SA_USER()['agroup']) ?></td>
          </tr>
        </tbody>
      </table>
		  </div>
		  </div>
        </div>
		<!--<div class="card-action">
              <a href="#" class="purple-text">修改密码</a>
			  <a href="#" class="purple-text">修改资料</a>
            </div>-->
      </div>
    </div>
  </div>
           
</div>


</div>

<?php

Body_Post();
	
}



?>