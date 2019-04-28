<div class="prolist" id="show">
        @foreach($res as $key=>$val)
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