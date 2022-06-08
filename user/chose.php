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
        mysqli_set_charset($link,'utf8mb4');     
        $sql = "SELECT * FROM student where sno = $username ";    //查询学生基本信息
        $result1 = mysqli_query($link,$sql);
        $row1 = mysqli_fetch_assoc($result1); 
        $_SESSION['sno'] = $row1['sno'];         //利用session获取学号          
        $sname = $row1['sname'];
        $sql = "SELECT *FROM sc where sname='$sname'";    //获取已选修课程信息
        $result = mysqli_query($link,$sql);
        if($result)  //如果该同学已有选课信息
        {
                $sql = "SELECT * FROM teacher where cname not in(SELECT cname FROM sc where sname='$sname')";      //获取没有选修过的所有信息
                $result2 = mysqli_query($link,$sql); 
        }
        else    //如果该同学没有选课信息
        {
                $sql = "SELECT *FROM teacher";
                $result2 = mysqli_query($link,$sql); 
        }
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
                    <li><a href="user.php">个人信息</a></li>
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
            ">已选修课程</h>
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
                    </table>
           <h style="
                font-size: 20px;
                font-family: fangsong;
                color: crimson;
                font-weight: 900;
            ">未选修课程</h>
            <table class="mytable">
                        <tr>
                            <th class="th">序号</th>
                            <th class="th">课程名</th>
                            <th class="th">课程教师</th>
                            <th class="th">操作</th>
                        </tr>
                        <?php
                        while($row2 = mysqli_fetch_assoc($result2))
                        {
                            $html=<<<A
                            <tr>
                            <td class="td">{$row2['id']}</td>
                            <td class="td">{$row2['cname']}</td>
                            <td class="td">{$row2['cteacher']}</td>
                            <td class="td"><a href="./choosecourse.php ? id={$row2['id']} ">选择</a></td>
                            </tr>
A;                     
                            echo $html;
                        }                     
                        ?>
                    </table>

                   
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
