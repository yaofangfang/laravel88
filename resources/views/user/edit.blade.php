<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{asset('js\jquery-3.1.1.min.js')}}"></script>
</head>
<body>
      @if ($errors->any())
      <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </ul>
      </div>
      @endif
  <form action="{{url('/user/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    用户名：<input type="text" name="username" value="{{$data->username}}"><br>
    年龄：<input type="text" name="age" value="{{$data->age}}"><br>
    性别：<input type="text" name="sex" value="{{$data->sex}}"><br>
    头像：<p><img src="http://upload.shop.com/{{$data->img}}" width="50px"  height="50px"><input type="file" name="img"></p><br>
    <!-- <input type="submit" value="上传"> -->
    <!-- <input type="hidden" name="img" value="{{$data->img}}"> -->
    <p><input type="submit" value="修改"></p>
</form>
</body>
</html>
<!-- <script>
  $('input[name=username]').blur(function(){  
      var username = $(this).val();
      if(username==''){
        $(this).next().remove();
       $(this).after("<b style='color:red'>用户名不能为空</b>");
        return false;
      }
      var reg=/^\w{3,30}$/;
      if(!reg.test(username)){
        $(this).next().remove();
        $(this).after("<b style='color:red'>用户名必须有数字字母下划线，长度必须是3-30位</b>");
        return false;
      }
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      // 判断用户是否存在
     
      $.ajax({
        method: "POST", 
        url: "/user/checkname",
        data: {username:username}
      }).done(function( msg ) {
        if(msg.code=='00000'){
          $('input[name=username]').next().remove();
          $('input[name=username]').after("<b style='color:red'>"+msg.msg+"</b>");
        }
      });

  });
  $('input[name=age]').blur(function(){
    var age=$(this).val();
    $(this).next().remove();
    if(age==''){
        $(this).next().remove();
        $(this).after("<b style='color:red'>年龄不能为空</b>");
        return false;
    }
    var reg=/^\d{1,3}$/;
    if(!reg.test(age)){
        $(this).next().remove();
        $(this).after("<b style='color:red'>年龄必须为数字</b>");
        return false;
      }
  });
  $('input[type=button]').click(function(){
    
  })
</script> -->
