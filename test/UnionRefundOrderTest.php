<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\Vip\Client;
use OpenSDK\Vip\Requests\Union\RefundOrderRequest;

class UnionRefundOrderTest
{

    private $appKey = 'd3a8f5cb';

    private $appSecret = '9F830DEDC41319621C63D8D72FD85C1F';

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new RefundOrderRequest();
        $req->setSearchType(1);
        $req->setSearchTimeStart((time()-3600)*1000);
        $req->setSearchTimeEnd(time()*1000);
        $req->setPage(1);
        $req->setPageSize(2);
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new UnionRefundOrderTest())();