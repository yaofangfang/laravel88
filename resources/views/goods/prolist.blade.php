@extends('layouts.shop')
@section('title','微商城')
@section('content')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
      <script src="/js/jquery-3.1.1.min.js"></script>
       <form action="#" method="post" class="prosearch"><input type="text" />
        @csrf
       </form>
      </div>
     </header>
     <ul class="pro-select">
        <!-- class="pro-selCur"  -->
        <li id="is_new" class="is_goods" is_type="1">
          <a href="javascript:;" field="is_new">
            <p>新品</p>
          </a>
        </li>
        <li id="is_hot" class="is_goods" is_type="2">
          <a href="javascript:;" field="is_hot">
            <p>热卖</p>
          </a>
        </li>
        <li id="goods_price" class="is_goods" is_type="3">
            <a href="javascript:;" field="goods_price">
            <span>价格</span>
            <span>↓</span>
            </a>
        </li>
     </ul><!--pro-select/-->
     <div class="prolist" id="show">
        @foreach($data as $key=>$val)
      <dl>
       <dt><a href="/proinfo/{{$val->goods_id}}"><img src="http://upload.shows.com/{{$val->goods_img}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="/proinfo/{{$val->goods_id}}">{{$val->goods_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$val->goods_price}}</strong> <span>¥{{$val->market_price}}</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$val->goods_num}}</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl> 
    @endforeach
     </div><!--prolist/-->
     <div class="height1"></div>  
    @include('public.footer')
    <script>
        //点击新品
        $(document).on("click",".is_goods",function(){
           var _this=$(this);
           _this.addClass('pro-selCur');
           _this.siblings('li').removeClass('pro-selCur');
           var is_type=_this.attr('is_type');
        //    console.log(is_type);
            getGoodsInfo();
        }) 
        function getGoodsInfo(){
            var _default=$('.pro-selCur.is_goods');
            // console.log(_default);
            var is_type=_default.attr('is_type');
            // console.log(is_type);
            var order_field=_default.children().attr('field');
            // console.log(order_field);
            var flag=_default.children().children('span').last().text();
            if(is_type==1){
                var field='is_new'
            }else if(is_type==2){
                var field='is_hot'
            }else{
                if(flag=='↓'){
                    _default.children().children('span').last().text('↑');
                    var order_type='asc';
                }else{
                    _default.children().children('span').last().text('↓');
                    var order_type='desc';  
                }   
                var field='goods_price';
            }
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'post',
                url:"/goods/getGoodsInfo",
                data:{is_type:is_type,order_field:order_field,order_type:order_type},
                dataType:'html',
            }).done(function(res){
                $("#show").html(res);
            })
         
        }  
    </script>
    @endsection 