<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\Vip\OauthClient;

class OauthClientTest
{

    private $appKey = '8bb6e4';

    private $appSecret = '17F5F828333566258854E4070506A0';

    public function __invoke()
    {
        $c = new OauthClient();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $c->redirectUri = 'http://www.test.com';
//        $result = $c->buildWebAuthorizeUri();
//        $result = $c->buildAppAuthorizeUri();
        $result = $c->getAccessToken('6fd98f88ab5243d6b8f7b2779488c3aa');

        var_dump($result);
    }

}

(new OauthClientTest())();