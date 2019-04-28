<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;
use Mail;

class IndexController extends Controller
{
    public function index(){
        $data = DB::table('shop_goods')->get();
        $where=[
            'brand_show'=>1
        ];
        $brandInfo = DB::table('shop_brand')->where($where)->get(['brand_name']);
        return view('index/index',compact('data','brandInfo'));
    }
    public function show($id){
       $data = cache('data_'.$id);
       if(!$data){
           $data = DB::table('shop_goods')->where(['goods_id'=>$id])->first();
           cache(['data_'.$id=>$data],60*24);
       }
       dd($data);
    }
    public function shows(){
    //    $data=['1,2,3,4'];
        $data=redis::set('name','yaofangfang');
        $res=redis::getrange('name',3,6);
        // $res=redis::get('name');
        // dd($res);
    }
}
?>
