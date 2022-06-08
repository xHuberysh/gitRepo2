<?php
    session_start();
    $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
    mysqli_set_charset($link, 'utf8mb4');
    if(!isset($_post['check']))
    {
        echo '<script>alert("删除失败")</script>';
        $url = "./teacher.php";
        echo "<script>";
        echo " window.location.href='$url' "; 
        echo "</script>";
        exit(1);
    }
    $ids =$_POST['check'];
    $ids=implode(",",$ids);
    $sql = "DELETE from teacher where id in($ids)";
    $result = mysqli_query($link,$sql);
    if($result&&mysqli_affected_rows($link)>0)
    {
        echo '<script>alert("删除成功")</script>';
        $url = "./teacher.php";
        echo "<script>";
        echo " window.location.href='$url' "; 
        echo "</script>";
    }
    else
    {
        echo '<script>alert("删除失败")</script>';
        $url = "./teacher.php";
        echo "<script>";
        echo " window.location.href='$url' "; 
        echo "</script>";
    }
?>