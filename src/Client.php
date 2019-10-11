<?php
/**
 * 客户端
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 20:54
 */
namespace OpenSDK\Vip;

use OpenSDK\Vip\Libs\Format;
use OpenSDK\Vip\Libs\Http;
use OpenSDK\Vip\Interfaces\Request;
use OpenSDK\Vip\Libs\OpenSDKOptions;
use OpenSDK\Vip\Libs\Signer;

class Client
{

    /**
     * 接口地址
     *
     * @var string
     */
    public $gateway = 'https://gw.vipapis.com';

    /**
     * AppKey
     *
     * @var string
     */
    public $appKey;

    /**
     * AppSecret
     *
     * @var string
     */
    public $appSecret;

    /**
     * 超时时间
     *
     * @var int
     */
    public $timeout = 3;

    /**
     * 数据类型
     *
     * @var string
     */
    public $format = 'json';

    /**
     * request对象
     * 
     * @var object
     */
    public $request;

    /**
     * Access Token
     *
     * @var string
     */
    public $accessToken;

    /**
     * 语言
     *
     * @var string
     */
    public $language = 'zh';


    public function __construct($appKey='', $appSecret='')
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }
    
    /**
     * 设置请求对象
     * 
     * @param Request $request
     * @param string $accessToken
     */
    public function setRequest(Request $request, $accessToken='')
    {
        $this->request = $request;
        $this->accessToken = $accessToken;
    }

    /**
     * 执行
     *
     * @return mixed
     */
    public function execute()
    {
        $query = [
            'service'   => $this->request->service,
            'method'    => $this->request->method,
            'version'   => $this->request->version,
            'timestamp' => time(),
            'format'    => strtolower($this->format),
            'appKey'    => $this->appKey,
        ];
        if ($this->accessToken)
            $query['accessToken'] = $this->accessToken;
        if ($this->language)
            $query['language'] = $this->language;

        $params = $this->request->getParams();

        $query['sign'] = Signer::make($query, $params, $this->appSecret);

        // 设置项
        $options = [
            OpenSDKOptions::TIME_OUT => $this->timeout,
        ];

        if (strtolower($this->request->requestType)=='post') {
            $result = Http::post($this->gateway . '/?' . http_build_query($query), $params, $options);
        } else {
            $result = Http::get($this->gateway, $params, $options);
        }

        return strtolower($this->format)=='json' ? Format::deJSON($result) : Format::deSimpleXML($result);
    }




}