<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/page.css">
    <script src="{{asset('js\jquery-3.1.1.min.js')}}"></script>
</head>
<body>
<form action="">
    <input name="goods_name" value="" placeholder="请输入姓名关键字">
    <button>搜索</button>
</form>
    <table border=1>
        <tr>
            <td>商品id</td>
            <td>商品名字</td>
            <td>商品图片</td>
            <td>商品数量</td>
            <td>商品描述</td>
            <td>操作</td>
        </tr>
        @foreach($data as $key=>$val)
        <tr>
            <td>{{$val->goods_id}}</td>
            <td>{{$val->goods_name}}</td>
            <td>
                <img src="http://upload.shows.com/{{$val->goods_img}}" width="100" height="100" id="btn"/>
            </td>
            <td>{{$val->goods_num}}</td>
            <td width="80px">{{$val->goods_desc}}</td>
            <td>
            <a href="{{route('deletegoods',['goods_id'=>$val->goods_id])}}">删除</a>
            <a href="{{route('editgoods',['goods_id'=>$val->goods_id])}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<div>
    {{ $data->links() }}    
</div>
<script>
   $("#btn").click(function(){
        alert('正在跳到详情页面');location.href='/goods/goodsdetail';
   });
</script>