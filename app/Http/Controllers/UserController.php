<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUserPost;
use Illuminate\Validation\Rule;
use App\Model\User;
class UserController extends Controller{
    public function index( $id ){
        echo $id;
    }
    public function add(){
        return view('user.add');   
    }
    public function logindo(Request $request){
        $username=$request->username;
        $pwd=$request->pwd;
        $where=[
            'username'=>$username
        ];
        $res=DB::table('user')->where($where)->get();
        // dd($res);
        if($res){
            session(['username'=>'username']);
            return redirect('/user/show');
        }else{
            return false;
        }
    }
    // public function quit(Request $request){
    //     $request->session()->flush();
    //     return redirect(url('islogin'));
    // }
    public function store(Request $request){
        $post = request()->except('_token');
        // 表单验证  第一种
        // $request->validate(
        //     ['username' => 'required|unique:user|max:30|min:3'],
        //     [
        //         'username.required'=>'用户名不能为空',
        //         'username.unique'=>'用户名已存在',
        //         'username.max'=>'用户名最大长度为30位',
        //         'username.min'=>'用户名最少3位',
        //     ]
        // );
        // 表单验证  第三种
        $validator= \Validator::make($request->all(),[
            'username' => 'required|unique:user|max:30|min:3',
            'age'=>'required|integer',
            ],    
            [
                    'username.required'=>'用户名不能为空',
                    'username.unique'=>'用户名已存在',
                    'username.max'=>'用户名最大长度为30位',
                    'username.min'=>'用户名最少3位',
                ]

            );
            if ($validator->fails()) {
                return redirect('user/add')
                ->withErrors($validator)
                ->withInput();
            }
            // 判断是否有上传的文件
            if ($request->hasFile('img')) {
                // echo 111;die;
                //进行文件上传
            $post['img']=$this->uploads($request,'img');
            //dd($post);
                // var_dump($res);die;
            }
            $res1=DB::table('user')->insertGetId($post);
            // var_dump($res1);die;
            if($res1){
                return redirect('/user/show')->with(['msg','添加成功']);
            }

    }
    // 展示
    public function show(){
        $data=DB::table('user')->paginate(3);
        return view('user.show',['data'=>$data]);
    }
    // 删除
    public function delete(Request $request){
        $id = $request->input('id');
        // dd($id);
        $res=Db::table('user')->delete($id);
        // dd($res);
    }
    // 修改
    public function edit($id){
       if($id){
        // 原生
        // $data=DB::select('select * from user where id=:id',[$id]);
        // 查询构造器
        $data = DB::table('user')->where('id',$id)->first();
        // orm
        // $data = Users::find($id);
        // dd($data);die;

        // $users->username = $post['username'];
        // $users->age = $post['age'];
        // $users->img = $post['img'];
        // $res = $users->save();
        // dd($res);

        if(!$data){
              return redirect('/user/show');
          }
          return view('user.edit',['data'=>$data]);
        }
    }
    // 修改执行
    public function update(Request $request, $id){
       $post=$request->except('_token');
        //dd($post);
        // 判断图片是否修改
        if (empty($request->hasFile('img'))){
            // dd($post);
            // 进行修改
            $res=DB::table('user')->where('id',$id)->update($post);
        }else{
            //如果图片修改  给它追加一个一维数组
            // dd($post);
            $post['img']=$this->uploads($request,'img');
            $res=DB::table('user')->where('id',$id)->update($post);
        }
        // dd($post);
        // 原生更新
        //$res=DB::update('update user set username=:username,age=:age,img=:img where id="$id"',['username'=>$post['username'],'age'=>$post['age'],'img'=>$post['img']]);
        // dd($res);
        // $res=DB::table('user')->where('id',$id)->update($post);
    }
    public function destroy($id) {
        // 
    }  
    // 文件上传
    public function uploads(Request $request,$name){
        // 判断文件上传过程中是否出错
        if ($request->file($name)->isValid()) {
            // 获取上传的文件
            $photo = $request->file($name);
            //dd($photo);
            // 获取文件的后缀名
            $extension=$request->$name->extension();
            //dd($extension);
            // 根据日期生成随机码 拼接上扩展名
            $store_result=$photo->storeAs(date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension);
            // echo $store_result;die;
            return $store_result;
            }
            exit('文件上传过程出错');
    }
    // 验证
    public function checkname(){
       $username=request()->username;
        if(!$username){
            return ['code'=>00000,'msg'=>'请填写用户名'];
        }
        $count=DB::table('user')->where('username',$username)->count();
        if($count){
            return ['code'=>00000,'msg'=>'用户名不可用'];
        }else{
            return ['code'=>1,'msg'=>'用户名可用'];
        }
    }
    public function user(){
        return view('/user.user');
    }
    public function quan(){
        return view('user/quan');
    }
    public function shou(){
        return view('user/shou');
    }
    public function tixian(){
        return view('user/tixian');
    }
    public function quit(Request $request){
        $request->session()->flush();
        return redirect(url('/'));
    }
   
}
