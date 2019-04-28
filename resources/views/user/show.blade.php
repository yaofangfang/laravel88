<link rel="stylesheet" href="/css/page.css">
@if (session('img')) <div class="alert alert-success"> {{ session('img') }} </div>@endif

     <table border="">
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>性别</td>
            <td>头像</td>
            <td>操作</td>
        </tr>
        @foreach($data as $key=>$val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->username}}</td>
            <td>{{$val->sex}}</td>
            <td><img src="http://upload.shop.com/{{$val->img}}" width="50px" height="50px"></td>
            <td>
                <a href="delete?id={{$val->id}}">删除</a>
                <a href="{{route('edituser',['id'=>$val->id])}}">修改</a>
            </td>

        </tr>
        @endforeach
    </table>
    <a href="/user/quit">退出</a>

    <div>
    {{ $data->links() }}    
    </div>