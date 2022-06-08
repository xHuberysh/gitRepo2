<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <link href="admin.css" type="text/css" rel="Stylesheet" />
<head>
    <meta charset="utf-8">
    <title>管理员界面</title>
</head>
<?php
        $link=@mysqli_connect('localhost','root','123456','userinformation') or die('连接或者选择数据库失败');
        mysqli_set_charset($link, 'utf8mb4');
        $page=$_GET["page"]??1;//得到页数
        $sql = "SELECT count(*) from studentindex";
        $totalresult=mysqli_query($link,$sql);
        $total=mysqli_fetch_row($totalresult);
        $num = 7;
        $totalpage=ceil($total[0]/$num);//总页数
        if($page>$totalpage)
        {
            $page=$totalpage;
        }
        if($page<1)
        {
            $page=1;
        }
        $start = ($page-1)*7;
        $sql = "SELECT * FROM studentindex limit $start,7" ;
        $result = mysqli_query($link, $sql);
    ?>
<body>
    <div id="container">
        <div id="header">
            <p class="p_font">学生信息管理系统</p>
            <a href="../login/Adminindex.php"style="float: right;margin-top: 47px;"<?php session_destroy();?>>>注销</a>
        </div>
        <div id="content" >
        <div id="left">
            <ul>
                <li><a href="./admin.php">个人信息管理</a></li>
                <li><a href="../course/course.php">选课信息管理</a></li>
                <li><a href="../course/teacher.php">教师信息管理</a></li>
                <li><a href="updatestudentindex.php">用户登录管理</a></li>
            </ul>
        </div>
        <div id="right">     
                <div>
                    <form action=""method="POST"style="margin-left: 180px;margin-top: 40px;">
                    <table class="mytable">
                        <tr>
                            <th class="th">账号</th>
                            <th class="th">密码</th>
                            <th class="th">操作</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $html=<<<A
                            <tr>
                                    <td class="td">{$row['username']}</td> 
                                    <td class="td">{$row['password']}</td>
                                    <td class="td"><a href="./updatestudentindex.php ? id={$row['username']} ">修改</a></td>
                                            
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
                    </form>
                </div>
        </div>
            
    </div>

        <div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
        <?php
         echo '@';
         echo "admin用户";
        ?>
           </div>

    </div>
    <script>
       function ckAll()
        {
            var cks=document.getElementsByName("check[]");//获取全选按钮的对象
            var flag=document.getElementById("allChecks").checked; //获取全选按钮当前的状态
            for(var i=0;i<cks.length;i++)
            {
                cks[i].checked = flag;
            }
        }
    </script>   
</body>
</html>