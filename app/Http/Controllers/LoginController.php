<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Email;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function reg(){
        return view('/login.reg');
    }
    public function send(){
        $rand=rand(111111,999999);
        $email= request()->email_name;
        if($email){
            Mail::send('login/email',['name'=>$rand],function($message)use($email){
                $message->subject('你的注册信息');
                $message->to($email);
            });
        }
        request()->session()->put('rand',$rand);
    }
    // 登录
    public function logindo(Request $request){
        $email_name=$request->email_name;
        $email_pwd=$request->email_pwd;
        // dd($password);
        $where=[
            'email_name'=>$email_name,
        ];
        // 模型
        $data = Email::where($where)->first();
        // dd($data);
        if($data){
            if($email_pwd==$data['email_pwd']){
                // 登录成功
                return redirect('/');
                $request->session()->put('data',$data);
            }else{
                // 密码错误
                return '密码错误';
            }
        }else{
            // 账号不存在
            return '账号不存在';
        }
    }
    // 注册
    public function regdo(Request $request){
        $rand = $request->session()->get('rand');
        $post = request()->all();
        // dd($post);
        // 唯一性
        $email_name=$request->email_name;
        $where=[
            'email_name'=>$email_name,
        ];
        // 模型
        $data=Email::where($where)->first();
        // dd($data);
        if($data['email_name']==$email_name){
            return 3;
        }
        if($rand!==$post['email_code']){
            $res=DB::table('email')->insertGetId($post);
            if($res){
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
    }
    //发送短信 
    public function sendSms(){
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "4eaa2ff07094464a8d351db3949bc037";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $rand = rand(100000,999999);
        $querys = "mobile=15934461522&param=code%3A".$rand."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;
        // echo $url; 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        var_dump(curl_exec($curl));

        request()->session()->put('rand',$rand);
    }
  
    public function login(){
        return view('login.login');  
    }
   
}
