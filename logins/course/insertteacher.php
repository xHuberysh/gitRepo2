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
      <h class="h">添加选课信息</h>
      </div>
     <div class="body">
        <form class="form"action="" method="POST">
        <span>序     号    <input style="height:20px"type="text"name="id"></span><br><br>
        <span>课  程  号<input style="height:20px"type="text"name="cno"></span><br><br>
        <span>课  程  名<input style="height:20px"type="text"name="cname"></span><br><br>
        <span>课程教师<input style="height:20px"type="text"name="cteacher"></span><br><br>
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
      $cno = $_POST["cno"];
      $cname = $_POST["cname"];
      $cteacher = $_POST["cteacher"];
      $sql = "INSERT into teacher values ('$id','$cno','$cname','$cteacher')";
      $result = mysqli_query($link,$sql);
if($result)
{
    echo '<script> alert("插入成功")</script>';
    $url = "./teacher.php";
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