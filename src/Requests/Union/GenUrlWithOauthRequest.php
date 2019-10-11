<?php
/**
 * 根据商品id生成联盟链接
 *
 * @link: null
 *
 * @brief: 根据商品id生成联盟链接. 注:链接归属人为授权用户
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class GenUrlWithOauthRequest implements Request
{

    /**
     * 服务
     *
     * @var string
     */
    public $service = 'com.vip.adp.api.open.service.UnionUrlService';

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'genByGoodsIdWithOauth';

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

    private $chanTag;       // 渠道标识

    private $apiParams = [];


    public function setGoodsIdList($val)
    {
        $this->goodsIdList = $val;
        $this->apiParams['goodsIdList'] = $val;
    }

    public function setChanTag($val)
    {
        $this->chanTag = (string)$val;
        $this->apiParams['chanTag'] = (string)$val;
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