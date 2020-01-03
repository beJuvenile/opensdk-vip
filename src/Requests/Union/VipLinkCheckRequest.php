<?php
/**
 * 进行cps链接的解析
 *
 * @link: http://vop.vip.com/apicenter/method?serviceName=com.vip.adp.api.open.service.UnionUrlService-1.0.0&methodName=vipLinkCheck
 *
 * @brief: 进行cps链接的解析
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/01/03
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class VipLinkCheckRequest implements Request
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
    public $method = 'vipLinkCheck';

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

        return ['vipLinkCheckReq'=>$this->apiParams];
    }

}