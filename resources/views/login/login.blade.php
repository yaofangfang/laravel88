@extends('layouts.shop')
@section('title','微商城')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/shop/images/head.jpg" />
     </div><!--head-top/-->
     <script src="/js/jquery-3.1.1.min.js"></script>
     <form action="/logindo" method="post" class="reg-login">
      @csrf
      <h3>还没有三级分销账号？点此<a class="orange" href="reg.html">注册</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="email_name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="password" name="email_pwd" placeholder="输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即登录" id="btn" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     @include('public.footer')
    <script>
        $('input[name=email_name]').blur(function(){
          var email_name=$(this).val();
          if(email_name==''){
            $(this).next().remove();
            $(this).after("<b style='color:red'>手机号或邮箱不能为空</b>");
          }
        })
        $('input[name=email_pwd]').blur(function(){
          var email_pwd=$(this).val();
          if(email_pwd==''){
            $(this).next().remove();
            $(this).after("<b style='color:red'>密码不能为空</b>");
          }
        })
        $("#btn").click(function(){
          var email_name=$('input[name=email_name]').val();
          var email_pwd=$('input[name=email_pwd]').val();
         $.ajax({
           type:'post',
           url:"{:url('Login/logindo')}",
           data:{email_name:email_name,email_pwd:email_pwd},
           dataType:'json',
         }).done(function(msg){
           if(msg==1){
              alert('登录成功');location.href='/';
           }else{
              alert('登录失败');
           }
         })
      })
    </script>
     @endsection
    