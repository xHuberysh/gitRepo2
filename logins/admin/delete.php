<?php
 $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
 mysqli_set_charset($link, 'utf8mb4');
 $Sql="SELECT * from student where id={$_GET['id']}";
 $Result = mysqli_query($link,$Sql);
 $row = mysqli_fetch_assoc($Result);
 $sno = $row['sno'];
 $sql2 = "DELETE from studentindex where username = $sno";     //在学生登录表中删除
 $result2 = mysqli_query($link,$sql2);
 $sql3 = "DELETE from sc where sno = $sno";       //在课程表中删除
 $result3 = mysqli_query($link,$sql3);
  $sql = "DELETE from student where id = {$_GET['id']}";  //在学生信息表中删除
  $result1 = mysqli_query($link,$sql);
 if($result3&&$result2&&mysqli_affected_rows($link)>=0)
 {
    echo '<script>alert("删除成功")</script>';
    $url = "./admin.php";
    echo "<script>";
    echo " window.location.href='$url' "; 
    echo "</script>";
 }

?>