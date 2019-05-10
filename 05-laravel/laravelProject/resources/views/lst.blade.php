<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post请求</title>
</head>
<body>
    <form action="/public/user/add" method="post">
        {{ csrf_field() }}
        用户名：<input type="text" name="name">
        <input type="submit" name="btn" value="提交">
    </form>
</body>
</html>