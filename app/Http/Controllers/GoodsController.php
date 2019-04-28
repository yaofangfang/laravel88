<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GoodsController extends Controller
{
   public function prolist(){
    $data=DB::table('shop_goods')->get();
    return view('/goods.prolist',compact('data'));
   }
   public function getGoodsinfo(Request $request){
       $order_field=$request->order_field;
       $order_type=$request->order_type;
       $is_type=$request->is_type;
    //    dd($is_type);
       if(!empty($order_field)){
           if($order_field=='is_new'){
               $where=[
                   'is_new'=>1
               ];
               $res=DB::table('shop_goods')->where($where)->get();
            //    dd($res);
           }else if($order_field=='is_hot'){
               $where=[
                   'is_hot'=>1
               ];
            //    dd($where);
               $res=DB::table('shop_goods')->where($where)->get();
            }else{
               $res=DB::table('shop_goods')->orderBy($order_field,$order_type)->get();
            //    dd($res);
            }
        }else{
           $res=DB::table('shop_goods')->get();
        //    dd($res);
        }
        return view('goods/getgoodsinfo',compact('res'));
    }
   public function proinfo(Request $request){
    $where=[
        'is_up'=>1,
    ];
    $data = DB::table('shop_goods')->where($where)->get();
    return view('/goods.proinfo',compact('data'));
   }
   /*public function goodslist(){
    // $data=DB::table('shop_goods')->paginate(3);
    // return view('/goods/goodslist',['data'=>$data]);
    $search=request()->all();
    $where=[];
    $goods_name=$search['goods_name']??'';
    if($goods_name){
        $where[]=['goods_name','like',"%$goods_name%"];
    }
    $pagesize=config('app.pageSize',3);
    $data=DB::table('shop_goods')->where($where)->paginate($pagesize);
    return view('/goods/goodslist',compact('data','search','goods_name'));
   }
   public function delete($goods_id){
        $data = cache('data_'.$goods_id);
        if(!$data){
            // echo 'mysql';
            $data = DB::table('shop_goods')->where(['goods_id'=>$goods_id])->delete();
            if($data){
                echo '删除成功';
            }else{
                echo '删除失败';
            }
            cache(['data_'.$goods_id=>$data],60*24);
        }
        dd($data);
   }
   public function edit($goods_id){
    if($goods_id){
        $data = DB::table('shop_goods')->where('goods_id',$goods_id)->first();
        if(!$data){
                return redirect('/goods/goodslist');
            }
            return view('goods.edit',['data'=>$data]);
        }
   }
    public function uploads(Request $request ,$name){
        if ($request->file($name)->isValid()) {
            // 获取上传的文件
            $photo = $request->file($name);
            //dd($photo);
            // 获取文件的后缀名
            $extension=$request->$name->extension();
            //dd($extension);
            // 根据日期生成随机码 拼接上扩展名
            $store_result=$photo->storeAs(date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension);
            // dd($store_result);
            // echo $store_result;die;
            return $store_result;
            }
            exit('文件上传过程出错');
    }
    public function update(Request $request,$goods_id){
        $post=$request->except('_token');
        if(empty($request->hasFile('goods_img'))){
            $res=DB::table('shop_goods')->where('goods_id',$goods_id)->update($post);
            // dd($res);die;
            return redirect('/goods/goodslist');
        }else{
            $post['goods_img']=$this->uploads($request,'goods_img');
            $res=DB::table('shop_goods')->where('goods_id',$goods_id)->update($post);
            return redirect('/goods/goodslist');
        }
    }
    public function goodsdetail(){
        $data=DB::table('shop_goods')->paginate();
        return view('/goods/goodsdetail',compact('data'));
    }*/
}
  