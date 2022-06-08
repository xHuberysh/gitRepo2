<?php
    session_start();
    $tno = $_SESSION['tno'];
    $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
    mysqli_set_charset($link,'utf8mb4');  
    $sql = "SELECT *from teacherindex where username=$tno";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""method="post">
        账号：<input type="text"name="username"value="<?php echo $row['username'] ?>">
        密码：<input type="text"name="password"value="<?php echo $row['password']?>">
        <input type="submit"name="submit">
    </form>
</body>
<?php
if(isset($_POST['submit']))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "UPDATE teacherindex set username=$username,password=$password";
    $result=mysqli_query($link,$sql);
    if($result)
   {
      echo '<script> alert("修改成功")</script>';
      $url = "./teacher.php";
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
</html>