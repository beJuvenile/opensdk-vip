<?php
/**
 * 获取联盟在推商品列表
 *
 * @link: null
 *
 * @brief: 获取联盟在推商品列表，暂仅支持默认排序，
 * 注：（1）仅支持超高佣和出单爆款两个频道商品输出
 *    （2）返回授权用户的商品佣金信息
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests\Union;

use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\Util;

class ProductListWithOauthRequest implements Request
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
    public $method = 'goodsListWithOauth';

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

    private $channelType;   // 频道：0-超高佣，1-出单爆款

    private $page;          // 页码：从1开始

    private $pageSize;      // 分页大小：默认20，最大500

    private $queryReputation;// 是否查询商品评价信息

    private $queryStoreServiceCapability; // 是否查询店铺服务能力信息

    private $sourceType;    // 	请求源类型：0-频道，1-组货

    private $jxCode;        // 精选组货码：当请求源类型为组货时必传

    private $fieldName;     // 排序字段: COMMISSION-佣金，PRICE-价格,COMM_RATIO-佣金比例，DISCOUNT-折扣

    private $order;         // 排序顺序：0-正序，1-逆序，默认正序

    private $apiParams = [];


    public function setChannelType($val)
    {
        $this->channelType = (int)$val;
        $this->apiParams['channelType'] = (int)$val;
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

    public function setQueryReputation($val)
    {
        $this->queryReputation = (bool)$val;
        $this->apiParams['queryReputation'] = (bool)$val;
    }

    public function setQueryStoreServiceCapability($val)
    {
        $this->queryStoreServiceCapability = (bool)$val;
        $this->apiParams['queryStoreServiceCapability'] = (bool)$val;
    }

    public function setSourceType($val)
    {
        $this->sourceType = (int)$val;
        $this->apiParams['sourceType'] = (int)$val;
    }

    public function setJxCode($val)
    {
        $this->jxCode = (string)$val;
        $this->apiParams['jxCode'] = (string)$val;
    }

    public function setFieldName($val)
    {
        $this->fieldName = (string)$val;
        $this->apiParams['fieldName'] = (string)$val;
    }

    public function setOrder($val)
    {
        $this->order = (int)$val;
        $this->apiParams['order'] = (int)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['requestId'] = Util::requestId();

        return ['request' => $this->apiParams];
    }

}