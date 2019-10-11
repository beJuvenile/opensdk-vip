<?php
/**
 * 刷新令牌服务
 *
 * @link: http://vop.vip.com/apicenter/method?serviceName=vipapis.oauth.OauthService-1.0.0&methodName=refreshToken
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 21:01
 */
namespace OpenSDK\Vip\Requests;

use OpenSDK\Vip\Interfaces\Request;

class OauthRefreshTokenRequest implements Request
{

    /**
     * 服务
     *
     * @var string
     */
    public $service = 'vipapis.oauth.OauthService';

    /**
     * 接口
     *
     * @var string
     */
    public $method = '	refreshToken';

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

    private $refresh_token;     // 刷新令牌值

    private $client_id;         // 申请应用时分配的appKey

    private $client_secret;     // 申请应用时分配的appSecret

    private $request_client_ip; // 应用IP地址

    private $apiParams = [];


    public function setRefreshToken($val)
    {
        $this->refresh_token = (string)$val;
        $this->apiParams['refresh_token'] = (string)$val;
    }

    public function setClientId($val)
    {
        $this->client_id = (string)$val;
        $this->apiParams['client_id'] = (string)$val;
    }

    public function setClientSecret($val)
    {
        $this->client_secret = (string)$val;
        $this->apiParams['client_secret'] = (string)$val;
    }

    public function setRequestClientId($val)
    {
        $this->request_client_ip = (string)$val;
        $this->apiParams['request_client_ip'] = (string)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        return $this->apiParams;
    }

}