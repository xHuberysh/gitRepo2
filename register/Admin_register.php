<!DOCTYPE html>
<html lang="en">
<link href="register.css" type="text/css" rel="Stylesheet" />

<head>
    <meta charset="utf-8">
    <title>用户注册界面</title>
    <style>
        body {
            background-image: url("static/8467271.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="grey">
        <span class="right">
            <p class='p' align="center">学生信息管理系统</p>
            <form action="" method="POST" align="center">
                <table>
                    <div>
                        <label class='p'>账号</label>
                        <input type="text" name="username" id="username" style="height: 28px;">
                    </div>
                    <br>
                    <div>
                        <label class='p'">密码</label>
                    <input type="password" name="password" id="password"style="height: 28px;">
                    </div>
                    <br>
                    <input class="submit" type="submit" value="提交" style="font-size: 20px;">
                    <br>
                </table>
            </form>
        </span>
    </div>

</body>
<script>
    function confirmName()
    {
    var name=document.getElementById("username");
    name.onblur=function()
    {
    if((name.value).length!=0){
      reg=/^[0-9]{6,16}$/g;
      if(!reg.test(name.value)){
        alert("对不起，输入的用户名限6-16个数字 ");
      } 
    }
    else{
        alert("输入账号不能为空");
    }

  };
}
function confirmEmail(){
  var email=document.getElementById("user_email");
  email.onblur=function(){
    if((email.value).length!=0){
      reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ ;
      if(!reg.test(email.value)){ 
        alert("对不起，您输入的邮箱格式不正确!");
      }
    }
  };
}
function confirmPassword()
{
  var password=document.getElementById("password");
  password.onblur=function()
  {
    if((password.value).length!=0){
      reg=/^(\w){6,20}$/;
      if(!reg.test(password.value))
      { 
        alert("对不起，您输入的密码格式不正确!");
      }
    }
  };
}
window.onload=function()
{
  confirmName();
  confirmPassword();
  confirmEmail();
};
</script>
</html>
<?php
if(isset($_POST['username'])&&isset($_POST['password']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$pwd = md5($password);
if(isset($username)&&isset($password))
{
  $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
  mysqli_set_charset($link,'utf8mb4');
  //编写SQL语句
  $sql = "INSERT INTO adminindex (adminname,password) VALUES ('$username','$pwd')";
  //执行SQL语句
  if ($link->query($sql) === TRUE) 
  {
    echo "注册成功";
    $url = "../login/Adminindex.php";
    echo "<script>";
    echo " window.location.href='$url' "; 
    echo "</script>";
  } 
  else 
  {
    echo "注册失败";
    $url = "../register/Student_register.php";
    echo "<script>";
    echo " window.location.href='$url' "; 
    echo "</script>";
  }
}
}
?>
