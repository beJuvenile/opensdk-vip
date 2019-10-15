<?php
/**
 * 获取维权订单列表，归属人为开发者
 *
 * @link: http://vop.vip.com/apicenter/method?serviceName=com.vip.adp.api.open.service.UnionOrderService-1.0.0&methodName=refundOrderList
 *
 * @brief: 获取维权订单列表, 注：（1）订单归属人为开发者 （2）最大查询时间区间默认不超过60天
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/10/15
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class RefundOrderRequest implements Request
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
    public $method = 'refundOrderList';

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

    private $searchType;        // 查询类型:0-维权发起时间，1-维权完成时间（佣金扣除入账时间），2-佣金扣除结算时间

    private $searchTimeStart;   // 目标时间起始：时间戳，单位毫秒;
                                // 当searchType=0时，为维权发起时间，
                                // 当searchType=1时，为维权完成时间（佣金扣除结算时间），
                                // 当searchType=2时，为佣金扣除结算时间

    private $searchTimeEnd;     // 目标时间结束：时间戳，单位毫秒;
                                // 当searchType=0时，为维权发起时间，
                                // 当searchType=1时，为维权完成时间（佣金扣除结算时间），
                                // 当searchType=2时，为佣金扣除结算时间

    private $orderSns;          // 目标订单号集合:当指定订单号集合时，目标时间区间可以不传,否则必须指定目标时间区间

    private $page;              // 页码：从1开始

    private $pageSize;          // 分页大小，默认20,最大100

    private $apiParams = [];


    public function setSearchType($val)
    {
        $this->searchType = (int)$val;
        $this->apiParams['searchType'] = (int)$val;
    }

    public function setSearchTimeStart($val)
    {
        $this->searchTimeStart = (int)$val;
        $this->apiParams['searchTimeStart'] = (int)$val;
    }

    public function setSearchTimeEnd($val)
    {
        $this->searchTimeEnd = (int)$val;
        $this->apiParams['searchTimeEnd'] = (int)$val;
    }

    public function setOrderSns($val)
    {
        $this->orderSns = json_encode($val);
        $this->apiParams['orderSns'] = json_encode($val);
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

        return ['request'=>$this->apiParams];
    }

}