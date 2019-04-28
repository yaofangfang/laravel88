<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品详情页面</title>
    <link rel="stylesheet" href="/css/page.css">
</head>
<body>
    <table border=1>
        <tr>
            <td>名称</td>
            <td>商品图片</td>
            <td>商品数量</td>
            <td>商品描述</td>
        </tr>
        @foreach($data as $key=>$val)
        <tr>
            <td>{{$val->goods_name}}</td>
            <td>
                <img src="http://upload.shows.com/{{$val->goods_img}}" width="100" height="100" />
            </td>
            <td>{{$val->goods_num}}</td>
            <td width="80px">{{$val->goods_desc}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<div>
    {{ $data->links() }}    
</div>