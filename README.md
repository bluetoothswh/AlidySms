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
	//短信模板中变量字段
	'field'=>'number',
	//要发送的短信内容
	'content'=>rand(1000,9999),
````

# 使用

<img src="http://ox5dwi7xi.bkt.clouddn.com/github/sms-tp.png">

````
use Sms;

//短信发送成功 下面函数返回 true 反之 false
Sms::put('phone','13800000000')->send();

````


# 所有参数完全自定义发送短信模式

````
Sms::put('phone',$phone) //接受短信的手机号
   ->put('signName',$signName) //短信签名
   ->put('templateCode',$templateCode) //短信模板编号
   ->put('filed',$field) //短信模板中的变量字段
   ->put('content',$content) //短信中的变量的值 也就是验证码的内容
   ->send(); //发送短信

````

<p>如果在配置文件config/sms.php中已经设置了</p>
<p>短信签名 + 短息模板编号 + 短信模板中字段变量 + 短信发送内容</p>

可以使用简约模式发送短信
````
use Sms;
Sms::put('phone',$phone)->send();
````

<p>验证短信已写入表单验证规则</p>
<p>假设表单中短信验证码的字段为 code</p>

````
$rules = ['code'=>'required|sms'];

````



