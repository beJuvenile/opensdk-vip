# opensdk-vip

#### 介绍
本类库是对唯品会开放平台API的封装  
接口文档请参见 [唯品会开放平台](https://vop.vip.com/)

#### 使用示例
- 接口调用示例
~~~php
require 'vendor/autoload.php';  

use OpenSDK\Vip\Client;  
use OpenSDK\Vip\Requests\Union\GenPidRequest;  

$c = new Client();  
$c->appKey = 'You are appKey';  
$c->appSecret = 'You are appSecret';  
$req = new GenPidRequest();  
$req->setPidNameList(['test01','test02']);  
$c->setRequest($req);  
$result = $c->execute();  

var_dump($result);
~~~

- 授权示例
~~~php
require 'vendor/autoload.php';  

use OpenSDK\Vip\OauthClient;  

$c = new OauthClient();  
$c->appKey = 'You are appKey';  
$c->appSecret = 'You are appSecret';  
// 获取网页授权链接  
// $result = $c->buildWebAuthorizeUri();  
// 获取APP授权链接  
$result = $c->buildAppAuthorizeUri();  
// 使用code换取access token  
$result = $c->getAccessToken('6fd98f88ab5243d6b8f7b2779488c3aa');  

var_dump($result);
~~~