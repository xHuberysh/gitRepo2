<?php
   session_start();
   $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
   mysqli_set_charset($link, 'utf8mb4');
   $sql = "SELECT *from student where id = {$_GET['id']}";
   $result = mysqli_query($link,$sql);
   if(!$result)
   {
      exit('查询SQL语句失败。错误信息:'.mysqli_error($link));
   }
   else
      $row = mysqli_fetch_assoc($result);
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
      <h class="h">修改学生信息</h>
      </div>
     <div class="body">
     <form class="form"action="" method="POST">   
         学号<input style="height:20px"type="text"name="sno"value="<?php echo $row['sno']; ?>"><br><br>
         姓名<input style="height:20px"type="text"name="sname"value="<?php echo $row['sname']; ?>"><br><br>
         年龄<input style="height:20px"type="text"name="sage"value="<?php echo $row['sage']; ?>"><br><br>
         性别<input style="height:20px"type="text"name="sex"value="<?php echo $row['ssex']; ?>"><br><br>
         专业<input style="height:20px"type="text"name="smajor"value="<?php echo $row['smajor']; ?>"><br><br>
         班级<input style="height:20px"type="text"name="sclass"value="<?php echo $row['sclass']; ?>"><br><br>
         学院<input style="height:20px"type="text"name="sdept"value="<?php echo $row['sdept']; ?>"><br><br> 
        <input class="submit"type="submit" name="submit" id="submit"value="确认">     
        </form>
        </div>
    </div>
</body>
</html>
<?php
   if(isset($_POST["submit"]))
   {
      $sno = $_POST["sno"];
      $sname = $_POST["sname"];
      $sage = $_POST["sage"];
      $sex = $_POST["sex"];
      $smajor = $_POST["smajor"];
      $sclass = $_POST["sclass"]; 
      $sdept = $_POST["sdept"];
      $sql = "UPDATE student SET sno='$sno',sname='$sname',sage='$sage',ssex='$sex',smajor='$smajor',sclass='$sclass',sdept='$sdept'where id = {$_GET['id']}";
      $result = mysqli_query($link,$sql);
   if($result)
   {
      echo '<script> alert("修改成功")</script>';
      $url = "../admin/admin.php";
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
