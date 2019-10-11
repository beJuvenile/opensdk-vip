<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\Vip\Client;
use OpenSDK\Vip\Requests\OauthRefreshTokenRequest;
use OpenSDK\Vip\Libs\Util;

class OauthRefreshTokenTest
{

    private $appKey = '8bb6e460';

    private $appSecret = '17F5F828333566258854E4070506A099';

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new OauthRefreshTokenRequest();
        $req->setRefreshToken('18D5E01F7B1C1CAF9912058211A7CF4A09E3F1BC');
        $req->setClientId($this->appKey);
        $req->setClientSecret($this->appSecret);
        $req->setRequestClientId(Util::ip());
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new OauthRefreshTokenTest())();