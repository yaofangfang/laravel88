<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加友链</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js\jquery-3.1.1.min.js')}}"></script>
</head>
<body>
    <form action="adddo" method="post" enctype="multipart/form-data">
    @csrf
    <table border="">
        <tr>
            <td>网站名称</td>
            <td><input type="text" name="web_name"></td>
        </tr>
        <tr>
            <td>网站网址</td>
            <td><input type="text" name="web_url"></td>
        </tr>
        <tr>
            <td>链接类型</td>
            <td><input type="radio" name="link_type" value="logo链接">logo链接
                <input type="radio" name="link_type" value="文字链接">文字链接
            </td>
        </tr>
        <tr>
            <td>图片logo</td>
            <td><input type="file" name="logo">
            </td>
        </tr>
        <tr>
            <td>网站联系人</td>
            <td><input type="text" name="web_author"></td>
        </tr>
        <tr>
            <td>网站介绍</td>
            <td><textarea name="web_desc" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>是否展示</td>
            <td><input type="radio" name="is_show" value="是">是
                <input type="radio" name="is_show" value="否">否
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="确定" id="btn">
                <input type="button" value="取消">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
<script>
    //验证网站名称
   $('input[name=web_name]').blur(function(){
    var web_name = $(this).val();
      if(web_name==''){
        $(this).next().remove();
        $(this).after("<b style='color:red'>网站名称不能为空</b>");
        return false;
        }
        var reg=/^[\u4e00-\u9fa5]{2,}$/;
        if(!reg.test(web_name)){
            $(this).next().remove();
            $(this).after("<b style='color:red'>网站名称由中文字母数字下划线组成</b>");
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
            url: "/friendlink/checkname",
            data: {web_name:web_name}
        }).done(function( msg ) {
            if(msg.code=='00000'){
                $('input[name=web_name]').next().remove();
                $('input[name=web_name]').after("<b style='color:red'>"+msg.msg+"</b>");
            }else{
                $('input[name=web_name]').next().remove();
                $('input[name=web_name]').after("<b style='color:green'>√</b>");
            }
        });
    });
    // 验证网址网址
    $('input[name=web_url]').blur(function(){
        var web_url = $(this).val();
        if(web_url==''){
            $(this).next().remove();
            $(this).after("<b style='color:red'>网址不能为空</b>");
            return false;
        }else{
            var reg=/^http:\/\/\w+\.\w+$/;
            if(!reg.test(web_url)){
                $(this).next().remove();
                $(this).after("<b style='color:red'>网址必须以http开头</b>");
                return false;
            }else{
                $(this).next().remove();
                $(this).after("<b style='color:green'>√</b>");
            } 
        }
    });
    // 验证网站联系人
    $('input[name=web_author]').blur(function(){
     var web_author = $(this).val();
      if(web_author==''){
        $(this).next().remove();
        $(this).after("<b style='color:red'>网站联系人不能为空</b>");
        return false;
    }else{
        $(this).next().remove();
        $(this).after("<b style='color:green'>√</b>");
        }
    });
    // 阻止表单提交
      $("#btn").click(function(){
          var web_name=$("input[name=web_name]").val();
          var web_url=$("input[name=web_url]").val();
          var link_type=$("input[name=link_type]").val();
        //   var logo = Storage::disk('upload')->get($filename);
          var logo=$("input[name=logo]").val();
          console.log(logo);
          var web_author=$("input[name=web_author]").val();
          var web_desc=$("textarea[name=web_desc]").val();
          var is_show=$("input[name=is_show]").val();
        $.ajax({
            type:'post',
            url:'adddo',
            data:{web_name:web_name,web_url:web_url,link_type:link_type,logo:logo,web_author:web_author,web_desc:web_desc,is_show:is_show},
            }).done(function(msg){
                alert('添加成功');location.href='/friendlink/list';
        })
        return false;
    })
</script>