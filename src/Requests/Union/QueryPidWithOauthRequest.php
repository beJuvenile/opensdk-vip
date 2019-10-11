<?php
/**
 * 查询推广位PID
 *
 * @link: http://vop.vip.com/apicenter/method?serviceName=com.vip.adp.api.open.service.UnionPidService-1.0.0&methodName=queryPidWithOauth
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class QueryPidWithOauthRequest implements Request
{

    /**
     * 服务
     *
     * @var string
     */
    public $service = 'com.vip.adp.api.open.service.UnionPidService';

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'queryPidWithOauth';

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

    private $pidList;   // 推广为Id。 该参数不传时，会返回该userId下对应的所有的pid信息列表。

    private $page;      // 页码

    private $pageSize;  // 页面大小：默认100

    private $apiParams = [];


    public function setPidList($val)
    {
        $this->pidList = $val;
        $this->apiParams['pidList'] = $val;
    }

    public function setPage($val)
    {
        $this->page = (int)$val;
        $this->apiParams['page'] = (int)$val;
    }

    public function setPageSize($val)
    {
        $this->pageSize = (int)$val;
        $this->apiParams['pageSize'] = (int)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['requestId'] = Util::requestId();

        return ['pidQueryRequest' => $this->apiParams];
    }

}