<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品列表</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form action="{{url('/goods/update/'.$data->goods_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="">
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="goods_name" value="{{$data->goods_name}}"></td>
        </tr>
        <tr>
            <td>商品数量</td>
            <td><input type="text" name="goods_num"  value="{{$data->goods_num}}"></td>
        </tr>
        <tr>
            <td>商品图片</td>
            <td><img src="http://upload.shows.com/{{$data->goods_img}}" width="50px"  height="50px"><input type="file" name="goods_img"></td><br>
        </tr>
        <tr>
            <td>商品介绍</td>
            <td><textarea name="goods_desc" id="" cols="30" rows="10">{{$data->goods_desc}}</textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="修改">
                <input type="button" value="取消">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
