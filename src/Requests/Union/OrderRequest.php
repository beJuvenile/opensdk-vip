<?php
/**
 * 获取订单信息列表
 *
 * @link: http://vop.vip.com/apicenter/method?serviceName=com.vip.adp.api.open.service.UnionOrderService-1.0.0&methodName=orderList
 *
 * @brief: 获取订单信息列表. 注：（1）订单归属人为开发者，（2）默认一分钟最多访问60次
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class OrderRequest implements Request
{

    /**
     * 服务
     *
     * @var string
     */
    public $service = 'com.vip.adp.api.open.service.UnionOrderService';

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'orderList';

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

    private $status;        // 订单状态：0-不合格，1-待定，2-已完结

    private $orderTimeStart;// 订单起始时间，时间戳，单位毫秒（订单更新时间和订单时间必传其一）

    private $orderTimeEnd;  // 订单结束时间，时间戳，单位毫秒（订单更新时间和订单时间必传其一）

    private $page;          // 页码：从1开始

    private $pageSize;      // 分页大小，默认20,最大100

    private $updateTimeStart; // 订单更新时间起始，时间戳，单位毫秒

    private $updateTimeEnd; // 订单更新时间结束，时间戳，单位毫秒

    private $apiParams = [];


    public function setStatus($val)
    {
        $this->status = (int)$val;
        $this->apiParams['status'] = (int)$val;
    }

    public function setOrderTimeStart($val)
    {
        $this->orderTimeStart = (int)$val;
        $this->apiParams['orderTimeStart'] = (int)$val;
    }

    public function setOrderTimeEnd($val)
    {
        $this->orderTimeEnd = (int)$val;
        $this->apiParams['orderTimeEnd'] = (int)$val;
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

    public function setUpdateTimeStart($val)
    {
        $this->updateTimeStart = (int)$val;
        $this->apiParams['updateTimeStart'] = (int)$val;
    }

    public function setUpdateTimeEnd($val)
    {
        $this->updateTimeEnd = (int)$val;
        $this->apiParams['updateTimeEnd'] = (int)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['requestId'] = Util::requestId();

        return ['queryModel'=>$this->apiParams];
    }

}