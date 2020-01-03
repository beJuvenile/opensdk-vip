<?php
/**
 * 检测一段文本中是否有唯品会链接
 *
 * @link: http://vop.vip.com/apicenter/method?serviceName=com.vip.adp.api.open.service.UnionUrlService-1.0.0&methodName=vipLinkCheckWithOuth
 *
 * @brief: 结果返回文本中是否含有唯品会链接以及其中的商品ID
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/01/03
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class VipLinkCheckWithOauthRequest implements Request
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
    public $method = 'vipLinkCheckWithOuth';

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

    private $source;    // 请求源

    private $content;   // 检查的内容(长度不超过10000)

    private $apiParams = [];


    public function setSource($val)
    {
        $this->source = (string)$val;
        $this->apiParams['source'] = (string)$val;
    }

    public function setContent($val)
    {
        $this->content = (string)$val;
        $this->apiParams['content'] = (string)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['requestId'] = Util::requestId();

        return ['vipLinkCheckReq' => $this->apiParams];
    }

}