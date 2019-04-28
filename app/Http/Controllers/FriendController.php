<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use App\Model\User;
class FriendController extends Controller
{
    // 添加
    public function add(){
        return view('friendlink.add');
    }
    // 执行添加
    public function adddo(Request $request){
        $post = request()->except('_token');
        if ($request->hasFile('logo')) {
            $post['logo']=$this->uploads($request,'logo');
        }
        $res = DB::table('friendlink')->insertGetId($post);
        if($res){
            return redirect('/friendlink/list')->with(['msg','添加成功']);
        }else{
            return redirect('/friendlink/add')->with(['msg','添加失败']);
        }
    }
    // 登录后执行
    public function logindo (Request $request){
        $web_name=$request->web_name;
        $web_pwd=$request->web_pwd;
        $where=[
            'web_name'=>$web_name
        ];
        $res=DB::table('friendlink')->where($where)->get();
        if($res){
            session(['web_name'=>'web_name']);
            return redirect('/friendlink/list');
        }else{
            return false;
        }
    }
    // 退出   清session
    public function quit(Request $request){
        $request->session()->flush();
        return redirect(url('islogin'));
    }
    // 图片上传
    public function uploads(Request $request ,$name){
        // echo $name;die;
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
    // 验证网站名称唯一
    public function checkname(Request $request){
        $web_name=request()->web_name;
        if(!$web_name){
            return ['code'=>00000,'msg'=>'请填写用户名'];
        }
        $count=DB::table('friendlink')->where('web_name',$web_name)->count();
        if($count){
            return ['code'=>00000,'msg'=>'网站名称已存在'];
        }else{
            return ['code'=>1,'msg'=>'网站名称可用'];
        }
    }
    // 展示页面
    public function list(Request $request){  
        $search=request()->all();
        $where=[];
        $web_name=$search['web_name']??'';
        if($web_name){
            $where[]=['web_name','like',"%$web_name%"];
        }
        $pagesize=config('app.pageSize',3);
        $data=DB::table('friendlink')->where($where)->paginate($pagesize);
        return view('friendlink/list',compact('data','search','web_name'));
    }
    // 删除
    public function delete(Request $request){
        $id = $request->input('id');
        $res=Db::table('friendlink')->where('id',$id)->delete($id);
        if($res){
            return ['code'=>00000,'msg'=>'删除成功'];
        }else{
            return ['code'=>1,'msg'=>'删除失败'];
        }
    }
    // 修改视图
    public function edit($id){
     if($id){
        $data = DB::table('friendlink')->where('id',$id)->first();
        if(!$data){
                return redirect('/friendlink/list');
            }
            return view('friendlink.edit',['data'=>$data]);
        }
    }
    // 修改执行
    public function update(Request $request, $id){
        $post=$request->except('_token');
        if(empty($request->hasFile('logo'))){
            $res=DB::table('friendlink')->where('id',$id)->update($post);
               return redirect('/friendlink/list');
        }else{
            $post['logo']=$this->uploads($request,'logo');
            $res=DB::table('friendlink')->where('id',$id)->update($post);
                return redirect('/friendlink/list');
        }
    }   
}
