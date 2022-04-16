<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增学生记录</title>
</head>
<body>
<h1 align="center">新增学生记录</h1>
<form action="" method="post" name="inf">
    <p align='center'>学生姓名：<input type="text" name="sn"></p>
    <p align='center'>学生性别：<input type="text" name="ss"></p>
    <p align='center'>学生年龄：<input type="text" name="sa"></p>
    <p align='center'><input type="submit" name="insub" value="提交"></p>
</form>
<?php
session_start();
$link = mysqli_connect("localhost","root","1941-06-06","myschool");
if(!$link)
{
    exit ("数据库连接失败");
}
if(!empty($_POST["insub"]))
{
    $sn = $_POST['sn'];
    $ss = $_POST['ss'];
    $sa = $_POST['sa'];
    mysqli_query($link,"insert students (stuname,stusex,age) values ('$sn','$ss',$sa)");
    $_SESSION['yes'] = "添加成功";
    header('location:index.php');
}
?>
</body>
</html>