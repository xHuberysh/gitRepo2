<?php
    session_start();
    $id = $_GET['id'];   //获取课程表的id值
    $username = $_SESSION['manage']['name'];
    $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
    mysqli_set_charset($link,'utf8mb4');
    //在教师表该课程信息的查询
    $sql = "SELECT * FROM teacher where  id='$id'"; 
    $result2 = mysqli_query($link,$sql);
    $row2 = mysqli_fetch_assoc($result2);
    $cname = $row2['cname'];
    $cteacher = $row2['cteacher'];  
    $cno = $row2['cno'];
    $sql = "SELECT * FROM student where sno = $username ";    //查询学生基本信息
    $result1 = mysqli_query($link,$sql);
    $row1 = mysqli_fetch_assoc($result1);       
    $sname = $row1['sname'];                                  //得到学生姓名，插入到course表中 成绩置为NULL
    $sql = "INSERT into sc (sname,cno,cname,cteacher,grade)values('$sname',$cno,'$cname','$cteacher',NULL)";
    $result = mysqli_query($link,$sql);
    if($result)
    {
       echo '<script> alert("添加成功")</script>';
       $url = "./chose.php";
       echo "<script>";
       echo " window.location.href='$url' "; 
       echo "</script>";
    }
    else
    {
       exit('修改学生信息sql语句执行失败。错误信息：' . mysqli_error($link));
    }
?>