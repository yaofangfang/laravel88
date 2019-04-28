@extends('layouts.shop')
@section('title','微商城')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>我的收藏</h1>
      </div>
      <script src="/js/jquery-3.1.1.min.js"></script>
     </header>

     <div class="head-top">
      <img src="/shop/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">收藏栏共有：<strong class="orange">1</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/shop/images/xian.jpg) left center no-repeat;">
       <a href="javascript:;" class="orange" id="alldel">全部删除</a> </td>
      </tr>
     </table>
     
     <!-- <div class="dingdanlist"> -->
      <table>
       <tr>
        <td colspan="2" width="65%"></td>
        <td width="35%" align="right">
            <div class="qingqu">
                <a href="javascript:;" class="orange" id="del">取消收藏</a>
            </div>
        </td>
       </tr>
       <tr class="shou">
        <td class="dingimg" width="15%"><img src="/shop/images/pro1.jpg" /></td>
        <td width="50%">
         <h3>三级分销农庄有机瓢瓜400g</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right"><img src="/shop/images/jian-new.png" /></td>
       </tr>
       <tr>
        <th colspan="3"><strong class="orange">¥36.60</strong></th>
       </tr>
      </table>
     <!-- </div> -->
     <!--dingdanlist/-->
     
     <!-- <div class="dingdanlist"> -->
      <table>
       <tr>
        <td colspan="2" width="65%"></td>
        <td width="35%" align="right">
            <div class="qingqu">
                <a href="javascript:;" class="orange" id="del2">取消收藏</a>
            </div>
        </td>
       </tr>
       <tr class="shou">
        <td class="dingimg" width="15%"><img src="/shop/images/pro1.jpg" /></td>
        <td width="50%">
         <h3>三级分销农庄有机瓢瓜400g</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right"><img src="/shop/images/jian-new.png" /></td>
       </tr>
       <tr>
        <th colspan="3"><strong class="orange">¥36.60</strong></th>
       </tr>
      </table>
     <!-- </div> -->
     <!--dingdanlist/--> 
     <div class="height1"></div>
    @include('public.footer')
    <script>
      //点击取消收藏 
      $("#del").click(function(){
          var _this=$(this);
          _this.parents('tr').next('tr').remove();
      })
      $("#del2").click(function(){
          var _this=$(this);
          _this.parents('tr').next('tr').remove();
      })
      // 点击全部删除  
      $("#alldel").click(function(){
          var _this=$(this);
          _this.parents('table').siblings('table').remove();
      })
    </script>
    @endsection 