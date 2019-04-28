@extends('layouts.shop')
@section('title','微商城')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
      <script src="js/jquery-3.1.1.min.js"></script>
     </header>
     <div class="head-top">
      <img src="/shop/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">2</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/shop/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="100%" colspan="4">
          <a href="javascript:;">
            <input type="checkbox" name="1" id="allbox"/>全选
          </a>
          </td>
       </tr>
       <tr>
        <td width="4%"><input type="checkbox" name="1" class="box"/></td>
        <td class="dingimg" width="15%"><img src="/shop/images/pro1.jpg" /></td>
        <td width="50%">
         <h3>三级分销农庄有机瓢瓜400g</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right">
          <div class="center">
              <input type="button" value="+" class="add">
              <input type="text" value="1" class="buy_number">
              <input type="button" value="-" class="less">
          </div>
        </td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥36.60</strong></th>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="4%"><input type="checkbox" name="1"  class="box"/></td>
        <td class="dingimg" width="15%"><img src="/shop/images/pro1.jpg" /></td>
        <td width="50%">
         <h3>三级分销农庄有机瓢瓜400g</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right">
          <div>
              <input type="button" value="+" class="add"> 
              <input type="text" value="1" class="buy_number">
              <input type="button" value="-" class="less">
          </div>
        </td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥36.60</strong></th>
       </tr>
       <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 删除</a></td>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥69.88</strong></td>
       <td width="40%"><a href="/pay" class="jiesuan">去结算</a></td></tr>
     </table>
    </div><!--gwcpiao/-->
  <script>
    $(function(){
       // 点击全选
        $("#allbox").click(function(){
          var allbox=$(this).prop('checked');
          $(".box").prop('checked',allbox);
        });
        // 点击购买数量+
        $(document).on("click",".add",function(){
          var _this=$(this);
          var buy_number=parseInt(_this.prev('input').val());
          var goods_num=_this.parents("tr").attr("goods_num");
          if(buy_number>=goods_num){
            _this.prop('disabled',true);    
          }else{
            buy_number+=1;
            _this.prev('input').val(buy_number);
            _this.parent().children('input').first().prop('disabled',false);
          }
          // 控制器改变购买数量
          var goods_id=_this.parents('tr').attr('goods_id');
          changeBuyNumber(goods_id,buy_number);
          //获取小计
          getSubTotal(goods_id,_this);
          //  给当前复选框选中
          boxChecked(_this);
        })
        // 获取文本框中的值
        $(document).on("blur",".buy_number",function(){
          var _this=$(this).val();
        })
        // 点击减号
        $(document).on("click",".less",function(){
          var _this=$(this).val();
        })
    })
  </script>
    @endsection 