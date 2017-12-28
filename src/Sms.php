<?php

namespace LaraMall\AlidySms;

use LaraMall\AlidySms\Alidayu;

class Sms
{
    //手机号码
    protected $phone;
    //session key
    protected $key;
    //短信模板中的字段
    protected $field;
    //短信内容
    protected $content;
    //模板签名
    protected $signName;
    //短信模板编号
    protected $templateCode;
    //短信模板中可选参数
    protected $product;
    /*
    |-------------------------------------------------------------------------------
    |
    | 构造函数
    |
    |-------------------------------------------------------------------------------
    */
    public function __construct()
    {
        //设置短信模板中的字段默认为 number
        $this->field             = config('sms.field');
        //设置短信验证码的内容
        $this->content           = config('sms.content');
        //初始化短信签名
        $this->signName          = config('sms.signName');
        //初始化短信模板编号
        $this->templateCode      = config('sms.templateCode');
        //初始化短信模板中可选参数
        $this->product           = config('sms.product');
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 设置属性 链似操作
    |
    |-------------------------------------------------------------------------------
    */
    public function put($key, $value)
    {
        $this->$key 		= $value;
        return $this;
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取key
    |
    |-------------------------------------------------------------------------------
    */
    public function sessionKey()
    {
        return $this->phone.'_auth_code_'.date('Y-m-d');
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 发送短信函数
    |
    |-------------------------------------------------------------------------------
    */
    public function send()
    {
        $demo       = new Alidayu(config('sms.ACCESS_KEY_ID'), config('sms.ACCESS_KEY_SECRET'));
        $response   = $demo->sendSms(
                                $this->signName,           // 短信签名
                                $this->templateCode,       // 短信模板编号
                                $this->phone,              // 短信接收者
                                [                         // 短信模板中字段的值
                                    $this->field => $this->content,
                                    "product"=> $this->product,
                                ],
                                "123"
        );
        //短信发送成功
        if ($response->Code =='OK') {
            //把验证码加入到会话中
            session()->put($this->sessionKey(), $this->content);
            return true;
        }
        //发送失败
        return false;
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 注册成功后  销毁会话中的验证码
    |
    |-------------------------------------------------------------------------------
    */
    public function destroy()
    {
        session()->forget($this->sessionKey());
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取验证码
    |
    |-------------------------------------------------------------------------------
    */
    public function getCode()
    {
        if (session()->has($this->sessionKey())) {
            return session()->get($this->sessionKey());
        }
        return false;
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 检测验证码是否正确
    |
    |-------------------------------------------------------------------------------
    */
    public function check($code)
    {
        if ($this->getCode() == $code) {
            $this->destroy();
            return true;
        }
        return false;
    }
}
