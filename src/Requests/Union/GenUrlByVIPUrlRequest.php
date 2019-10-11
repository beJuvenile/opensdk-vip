<?php
/**
 * 根据唯品会链接生成联盟链接
 *
 * @link: null
 *
 * @brief: 根据唯品会链接生成联盟链接. 注：链接归属人为开发者
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class GenUrlByVIPUrlRequest implements Request
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
    public $method = 'genByVIPUrl';

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

    private $urlList;   // 商品id集合

    private $chanTag;   // 渠道标识

    private $apiParams = [];


    public function setUrlList($val)
    {
        $this->urlList = $val;
        $this->apiParams['urlList'] = $val;
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