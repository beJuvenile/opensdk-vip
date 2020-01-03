<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\Vip\Client;
use OpenSDK\Vip\Requests\Union\VipLinkCheckRequest;

class UnionVipLinkCheckTest
{

    private $appKey = 'd3a8f5';

    private $appSecret = '9F830DEDC41319621C63D8D72FD85C';

    public function __invoke()
    {
        $content = 'https://m.vip.com/product-3728072-2151761110.html?app_name=wxk_android&client=android';

        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new VipLinkCheckRequest();
        $req->setSource('xxx');
        $req->setContent($content);
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new UnionVipLinkCheckTest())();