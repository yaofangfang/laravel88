<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send(){
       //接收数据
        $email=request()->email;
        $send=rand(100000,999999);
        // dd($send);
        if($email){
            Mail::send('login/email',
                ['name'=>$email],
                function($message)use($email,$send){
                    $res=$message->subject('欢迎注册微商城有限公司');
                    //$message->to($email);
                    if($res){
                        $user=[
                            'time'=>time(),
                            'email'=>$email,
                            'send'=>$send
                        ];
                        request()->session('userInfo',$user);
                        echo json_encode(['font'=>'发送成功','code'=>1]);
                    }else{
                        echo json_encode(['font'=>'发送失败','code'=>2]);
                    }
            });
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
        $querys = "mobile=18515095219&param=code%3A".$rand."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;
        echo $url; 
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
    }
}
