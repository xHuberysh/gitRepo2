<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <link href="user.css" type="text/css" rel="Stylesheet"/>
    <head>
        <title>学生信息管理系统</title>
        <meta charset="utf-8">
        <style>
            body {
                background-color: #f1f5f8;
                height: 0;
                padding-top: 0;
                position: relative;
            }
            .form
            {
                margin-left: 50px;
                margin-top: 30px;
            }
        </style>
    </head>
    <?php
        $username = $_SESSION['manage']['name'];
        $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
        // $link=
        mysqli_set_charset($link,'utf8mb4');     
        $sql = "SELECT * FROM student where sno = $username ";    //查询学生基本信息
        $result1 = mysqli_query($link,$sql);
        $row1 = mysqli_fetch_assoc($result1);  
        $_SESSION['sno'] = $row1['sno'];         //利用session获取学号          
        $sname = $row1['sname'];
        $page=$_GET["page"]??1;//得到页数
        $sql = "SELECT count(*)FROM sc where sname='$sname'";
        $totalresult=mysqli_query($link,$sql);
        $total=mysqli_fetch_row($totalresult);
        $num = 4;
        $totalpage=ceil($total[0]/$num);//总页数
        if($page>$totalpage)
        {
            $page=$totalpage;
        }
        if($page<1)
        {
            $page=1;
        }
        $start = ($page-1)*4;
        $sql = "SELECT *FROM sc where sname='$sname'";    //查询学生课程信息
        $result = mysqli_query($link,$sql);
        $page=$_GET["page"]??1;//得到页数    


        $sql = "SELECT avg(grade) from sc where sname = '$sname'";
        $result2 = mysqli_query($link,$sql);
        $row2 = mysqli_fetch_array($result2);
        $avggrade=$row2[0];
        $sql = "SELECT sum(grade) from sc where sname = '$sname'";
        $result3=mysqli_query($link,$sql);
        $row3=mysqli_fetch_array($result3);
        $sumgrade=$row3[0];
    ?>
    <body>
        <div class="all">
        <div class='top' >
            <div class='logo'>
              <img src="../jpg/logo.png">
            </div>
            <p class="p_font">欢迎登录学生信息管理系统</p>
        </div>
        <div class='main'>
            <div class="left">
                    <ul>
                    <li><a href="">个人信息</a></li>
                    <li><a href="checkpassword.php">修改密码</a></li>
                    <li><a href="chose.php">选修课程</a></li>
                    </ul>
            </div>
            <div class = "right">
            <a href="../login/Studentindex.php" style="float: right;">注销登录</a>
            <h style="
                font-size: 20px;
                font-family: fangsong;
                color: crimson;
                font-weight: 900;
            ">个人基本信息</h>
            <form class="form"action="" method="POST">  
                <fieldset>
                学号<input style="height:20px"type="text"name="sno"value="<?php echo $row1['sno']; ?>"><br>
                姓名<input style="height:20px"type="text"name="sname"value="<?php echo $row1['sname']; ?>"><br>
                年龄<input style="height:20px"type="text"name="sage"value="<?php echo $row1['sage']; ?>"><br>
                性别<input style="height:20px"type="text"name="sex"value="<?php echo $row1['ssex']; ?>"><br>
                专业<input style="height:20px"type="text"name="smajor"value="<?php echo $row1['smajor']; ?>"><br>
                班级<input style="height:20px"type="text"name="sclass"value="<?php echo $row1['sclass']; ?>"><br>
                学院<input style="height:20px"type="text"name="sdept"value="<?php echo $row1['sdept']; ?>"><br> 
                </fieldset> 
            </form>
            <h style="
                font-size: 20px;
                font-family: fangsong;
                color: crimson;
                font-weight: 900;
            ">选课信息</h>
            <table class="mytable">
                        <tr>
                            <th class="th">序号</th>
                            <th class="th">姓名</th>
                            <th class="th">课程号</th>
                            <th class="th">课程名</th>
                            <th class="th">课程教师</th>
                            <th class="th">分数</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $html=<<<A
                            <tr>
                            <td class="td">{$row['id']}</td> 
                            <td class="td">{$row['sname']}</td>
                            <td class="td">{$row['cno']}</td>
                            <td class="td">{$row['cname']}</td>
                            <td class="td">{$row['cteacher']}</td>
                            <td class="td">{$row['grade']}</td>
                            </tr>
A;                     
                            echo $html;
                        }                     
                        ?>
                         <tr align = "center">
                        <td style = "height:38px"colspan="10">
                        <a href="?page=1">首页</a>
                        <a href="?page=<?php echo $page-1?>">上一页</a>
                        <?php echo $page; echo'/';echo $totalpage?>
                        <a href="?page=<?php echo $page+1?>">下一页</a>
                        <a href="?page=<?php echo $totalpage ?>">尾页</a>
                        </td>
                        </tr>
                    </table>
                    总成绩   : <input type="text"value="<?php echo $sumgrade ?>">
                    平均成绩 :<input type="text"value="<?php echo $avggrade ?>">
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
