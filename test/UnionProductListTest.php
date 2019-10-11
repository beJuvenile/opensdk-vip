<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\Vip\Client;
use OpenSDK\Vip\Requests\Union\ProductListRequest;

class UnionProductListTest
{

    private $appKey = 'd3a8f5c';

    private $appSecret = '9F830DEDC41319621C63D8D72FD85C1';

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new ProductListRequest();
        $req->setPage(1);
        $req->setPageSize(2);
        $req->setChannelType(0);
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new UnionProductListTest())();