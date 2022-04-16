<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>删除记录</title>
</head>
<body>
    <?php
        $link = mysqli_connect("127.0.0.1","root","1941-06-06","myschool");

        if(!$link)
        {
            exit ("数据库连接失败");
        }
        session_start();
        $del = $_SESSION['del'];
        mysqli_query($link,"delete from students where stuid=$del[0]");
        unset($_SESSION['del']);
        header('location:index.php');
    ?>
</body>
</html>
