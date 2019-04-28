<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录平台</title>
    <script src="\js\jquery-3.1.1.min.js"></script>
</head>
<body>
    <form action="logindo" method="post">
    {{csrf_field()}}
       <table>
           <tr>
               <td>账号</td>
               <td><input type="text" name="web_name"></td>
           </tr>
           <tr>
               <td>密码</td>
               <td><input type="password" name="web_pwd"></td>
           </tr>
           <tr>
                <td><input type="submit" value="登录"></td>
           </tr>

       </table>
       
    </form>
</body>
</html>
