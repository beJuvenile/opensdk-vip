<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\Vip\Client;
use OpenSDK\Vip\Requests\Union\GenUrlByVIPUrlRequest;

class UnionGenUrlByVIPUrlTest
{

    private $appKey = 'd3a8f5c';

    private $appSecret = '9F830DEDC41319621C63D8D72FD85C1';

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new GenUrlByVIPUrlRequest();
        $req->setUrlList(['https://m.vip.com/product-1710696933-6918347193125144197.html','https://m.vip.com/product-1710613243-6917923666763297947.html']);
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new UnionGenUrlByVIPUrlTest())();