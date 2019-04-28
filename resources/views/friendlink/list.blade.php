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
@if (session('img')) <div class="alert alert-success"> {{ session('img') }} </div>@endif
<form action="">
    <input name="web_name" value="" placeholder="请输入姓名关键字">
    <button>搜索</button>
</form>
    <table border="1">
        <tr>
            <td>网站id</td>
            <td>网站名称</td>
            <td>网站网址</td>
            <td>链接类型</td>
            <td>图片logo</td>
            <td>网址联系人</td>
            <td>网址介绍</td>
            <td>是否展示</td>
            <td>操作</td>
        </tr>
        @foreach($data as $key=>$val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->web_name}}</td>
            <td>{{$val->web_url}}</td>
            <td>{{$val->link_type}}</td>
            <td><img src="http://upload.shop.com/{{$val->logo}}" alt="暂无图片" width="50px" height="50px"></td>
            <td>{{$val->web_author}}</td>
            <td>{{$val->web_desc}}</td>
            <td>{{$val->is_show}}</td>
            <td>
                <!-- <a href="{{route('deletefriend',['id'=>$val->id])}}">删除</a> -->
                <a href="{{route('editfriend',['id'=>$val->id])}}">修改</a>
                <input name="del" del="{{$val->id}}" type="button" value="删除">
            </td>
        </tr>
        @endforeach
    </table>
    <a href="add">返回继续添加</a>
    <a href="/friendlink/quit">退出</a>
</body>
</html>
<div>
{{$data->appends($search)->render()}}
</div>
<script>
    //ajax删除
   $('input[name=del]').click(function(){
       var _this=$(this);
       var del=_this.attr('del');
       $.ajax({
            method: "get", 
            url: "delete",
            data: {id:del}
        }).done(function( msg ) {
            if(msg.code=='00000'){
            //   alert('成功');
                alert('删除成功');location.href='/friendlink/list';
            }else{
                alert('删除失败');location.href='/friendlink/list';
            }
        })
   })
</script>
