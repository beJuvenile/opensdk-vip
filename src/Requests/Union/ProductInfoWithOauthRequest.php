<?php
/**
 * 商品信息
 *
 * @link: null
 *
 * @brief: 获取指定商品id集合的商品信息，注：返回授权用户的商品佣金信息
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class ProductInfoWithOauthRequest implements Request
{

    /**
     * 服务
     *
     * @var string
     */
    public $service = 'com.vip.adp.api.open.service.UnionGoodsService';

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'getByGoodsIdsWithOauth';

    /**
     * 版本号
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'post';

    private $goodsIdList;   // 商品id集合

    private $apiParams = [];


    public function setGoodsIdList($val)
    {
        $this->goodsIdList = $val;
        $this->apiParams['goodsIdList'] = $val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['requestId'] = Util::requestId();

        return $this->apiParams;
    }

}