# AlidySms
<p>新版阿里大于短信接口的Laravel组件 （支持laravel5.5）</p>

网址：<a href="https://larashuo.com">larashuo.com</a>

<img src="https://laravip.com/images/alidysms.png">

# 安装
````
composer require laramall/aliyun-dysms
````
# 设置配置文件
````
php artisan vendor:publish

修改 config/sms.php 中的阿里大于短信相关参数
````

# 使用
````
use LaraMall\AlidySms\Sms;

//发送短信
$sms  = (new Sms)->put('phone','13800000000')->send();

//验证短信已写入表单验证规则
//假设表单中短信验证码的字段为 code

$rules = ['code'=>'required|sms'];

````



