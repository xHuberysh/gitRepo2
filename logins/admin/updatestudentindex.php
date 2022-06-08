<?php
   session_start();
   $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
   mysqli_set_charset($link, 'utf8mb4');
   if(isset($_GET['id']))
   {
   $sql = "SELECT * from studentindex where username = {$_GET['id']}";
   $result = mysqli_query($link,$sql);
   if(!$result)
   {
      exit('查询SQL语句失败。错误信息:'.mysqli_error($link));
   }
   else
      $row = mysqli_fetch_assoc($result);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update</title>
    <style>
     .content
     {
        width:500px;
        height:500px;
        border:2px solid #a5b6c8;background:#eef3f7;
        margin-left: 500px;
        margin-top: 100px;
     }
     .header
     {
        width:100%;
        height:50px;
        border:2px solid black;
        text-align: center; 
               
     }
     .h
     {
        font-size: 27px;
        font-style: normal;
        font-family: fangsong;
        color: #9f628d;
        font: blod;
        font-weight: bolder;
     }
     .body
     {
        font-size: 18px;
        font-weight: 600;
        font-family: fangsong;
     }
     .form
     {
        margin-left: 145px;
        margin-top: 30px;
     }
    .submit
    {
    position: relative;
    background: #00CCFF;
    border: none;
    color: white;
    padding: 6px 88px;
    }
    </style>
</head>
<body>
    <div class="content">
      <div class="header">
      <h class="h">修改用户密码</h>
      </div>
     <div class="body">
     <form class="form"action="" method="POST">   
         账号<input style="height:20px"type="text"name="username"value="<?php echo $row['username']; ?>"><br><br>
         密码<input style="height:20px"type="text"name="password"value="<?php echo $row['password']; ?>"><br><br>
        <input class="submit"type="submit" name="submit" id="submit"value="确认">     
        </form>
        </div>
    </div>
</body>
</html>
<?php
   if(isset($_POST["submit"]))
   {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $sql = "UPDATE studentindex SET username='$username',password='$password'where username = {$_GET['id']}";
      $result = mysqli_query($link,$sql);
   if($result)
   {
      echo '<script> alert("修改成功")</script>';
      $url = "../admin/studentindex.php";
      echo "<script>";
      echo " window.location.href='$url' "; 
      echo "</script>";
   }
   else
   {
      exit('修改学生信息sql语句执行失败。错误信息：' . mysqli_error($link));
   }
}
 ?>
