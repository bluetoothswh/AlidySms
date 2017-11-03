# AlidySms
<p>新版阿里大于短信接口的Laravel组件 for Laravel 5.5+ </p>

网址：<a href="https://larashuo.com">larashuo.com</a>

<img src="https://laravip.com/images/alidysms.png">

# 系统要求
````
php >= 7.0+

laravel >= 5.5+

````

# 安装
````
composer require laramall/aliyun-dysms
````
# 设置配置文件
````
php artisan vendor:publish --provider="LaraMall\AlidySms\AlidySmsServiceProvider"

修改 config/sms.php 中的阿里大于短信相关参数

  	//id
	'ACCESS_KEY_ID'=>'',
	//秘钥
	'ACCESS_KEY_SECRET'=>'',
	//短信签名
	'signName'=>'',
	//短信模板编号
	'templateCode'=>'',
````

# 使用

<img src="http://ox5dwi7xi.bkt.clouddn.com/github/sms-tp.png">

````
use Sms;

//发送短信
//使用Laravel的Facade
//短信发送成功 下面函数返回 true 反之 false
Sms::put('phone','13800000000')->send();

//默认 短信模板中的字段为 number 
//默认 短信的内容为 rand(1000,9999)

如果您的短信模板中字段不为 number 可以这样设置

Sms::put('phone',$phone)
   ->put('field',$field)
   ->put('content',$content)
   ->send();

````

# 默认短信验证码

````
rand(1000,9999) 一个随机数字

````

//验证短信已写入表单验证规则
//假设表单中短信验证码的字段为 code

````
$rules = ['code'=>'required|sms'];

````



