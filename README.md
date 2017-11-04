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

//短信发送成功 下面函数返回 true 反之 false
Sms::put('phone','13800000000')->send();


$field 为短信模板中的变量（如上图中为 number）
$content 为短信验证码内容

Sms::put('phone',$phone)
   ->put('field',$field)
   ->put('content',$content)
   ->send();

````

# 默认短信验证码

````
rand(1000,9999) 一个随机数字

相当于做了设置
Sms::put('content',rand(1000,9999);

````

# 默认模板中的变量

````
 默认为 number
 
 相当于
 Sms::put('field','number');

````

# 默认短信签名和短信模板编号
````
默认短信签名写在 config/sms.php 中的

'signName'=>'您的短信签名',

默认短信模板编号 config/sms.php 
'templateCode'=>'您的短信模板编号'

````

# 自定义短信签名 和短信模板编号

````
  Sms::put('signName',$signName)
     ->put('templateCoade',$templateCoade);

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

//验证短信已写入表单验证规则
//假设表单中短信验证码的字段为 code

````
$rules = ['code'=>'required|sms'];

````



