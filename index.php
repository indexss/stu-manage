<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生信息首页-myschool.php</title>
</head>
<body>
<h1 align='center'>学生信息</h1>
<form action='' method='post' name='idnexf'>
    <p align='center'>
        <input type='button' value='新增' name='inbut' onClick="location.href='insert.php'"/>
    </p>
    <p align='center'>
        <input type="text" name='sel'><input type='submit' value="搜索" name='selsub'>
    </p>
    <table align='center' border='1px' cellspacing='0px' width='800px'>
        <tr>
            <th>学号</th>
            <th>学生名字</th>
            <th>学生性别</th>
            <th>学生年龄</th>
            <th>操作</th>
        </tr>
        <?php
        session_start();
        if(isset($_SESSION['yes']))
        {
            echo '<p align="center">'.$_SESSION['yes'].'</p>';
            unset($_SESSION['yes']);
        }
        $link = mysqli_connect("127.0.0.1","root","1941-06-06","myschool");

        if(!$link)
        {
            echo("cheng123gongle");
            exit ("数据库连接失败");
        }

        if(empty($_POST["selsub"]))
        {
            $res = mysqli_query($link,"SELECT * FROM students ORDER BY stuid");
        }

        else
        {
            $sel = $_POST["sel"];
            $res = mysqli_query($link,"select * from students where stuid like 
        '%$sel%' or stuname like '%$sel%' or stusex like '%$sel%' 
        or age like '%$sel%'");
        }

        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr align='center'>";
            echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
            <td>
                <input type = 'submit' name='upsub$row[0]' value='修改'/>
                <input type = 'submit' name='delsub$row[0]' value='删除'/>
            </td>";
            echo '</tr>';
            if(!empty($_POST["upsub$row[0]"]))
            {
                echo"<tr align='center'>";
                echo "<td>$row[0]</td>
            <td align='center'><input type='text' name='upsn'/ value='$row[1]'></td>
            <td align='center'><input type='text' name='upss'/ value='$row[2]'></td>
            <td align='center'><input type='text' name='upsa'/ value='$row[3]'></td>
            <td align='center'><input type='submit' value='确认修改' name='upsubs$row[0]'></td>";
                echo'</tr>';
            }

            if(!empty($_POST["upsubs$row[0]"]))
            {
                $upsn = $_POST['upsn'];
                $upss = $_POST['upss'];
                $upsa = $_POST['upsa'];
                mysqli_query($link,"update students set stuname='$upsn', stusex='$upss', age =$upsa where stuid=$row[0]");
                header('location:#');
            }

            if(!empty($_POST["delsub$row[0]"]))
            {
//                mysqli_query($link,"delete from students where stuid=$row[0]");
//                header('location:#');
                $_SESSION['del'] = $row[0];
                echo '<script>
                        if(confirm("是否删除？")== true)
                            {
                                location.href="del.php";
                            }
                            
                      </script>';
            }
        }
        ?>
    </table>
</form>
</body>
</html>