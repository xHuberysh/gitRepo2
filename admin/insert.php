<?php
 $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
 mysqli_set_charset($link, 'utf8mb4');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>insert</title>
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
      <h class="h">添加学生信息</h>
      </div>
     <div class="body">
        <form class="form"action="" method="POST">
        <span>序号<input style="height:20px"type="text"name="id"></span><br><br>
        <span>学号<input style="height:20px"type="text"name="sno"></span><br><br>
        <span>姓名<input style="height:20px"type="text"name="sname"></span><br><br>
        <span>年龄<input style="height:20px"type="text"name="sage"></span><br><br>
        <span>性别</span>
        <label><input type="radio" name="ssex" value="男">男生</label>
		  <label><input type="radio" name="ssex" value="女">女生</label><br><br>
        <span>专业<input style="height:20px"type="text"name="smajor"></span><br><br>
        <span>班级<input style="height:20px"type="text"name="sclass"></span><br><br>
        <span>学院<input style="height:20px"type="text"name="sdept"></span><br><br>
        <input class="submit"type="submit" name="submit" id="submit"value="确认">
        </form>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
      $id = $_POST["id"];
      $sno = $_POST["sno"];
      $sname = $_POST["sname"];
      $sage = $_POST["sage"];
      $sex = $_POST["ssex"];
      $smajor = $_POST["smajor"];
      $sclass = $_POST["sclass"]; 
      $sdept = $_POST["sdept"];
      $sql = "INSERT into student values ('$id','$sno','$sname',$sage,'$sex','$smajor','$sclass','$sdept')";
      $result1 = mysqli_query($link,$sql);
      $sql = "INSERT into studentindex values('$sno','123456','$sno@qq.com')";
      $result2 = mysqli_query($link,$sql);
if($result1&&$result2)
{
    echo '<script> alert("插入成功")</script>';
    $url = "../admin/admin.php";
    echo "<script>";
    echo " window.location.href='$url' "; 
    echo "</script>";
}
else
{
   echo "插入失败";
}
}

?>