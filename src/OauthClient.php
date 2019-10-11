<?php
/**
 * Web应用授权
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/26
 * Time: 20:54
 */
namespace OpenSDK\Vip;

use OpenSDK\Vip\Libs\Format;
use OpenSDK\Vip\Libs\Http;

class OauthClient
{

    /**
     * 接口地址
     *
     * @var string
     */
    public $gateway = 'https://auth.vip.com/oauth2';

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
     * 回调地址
     *
     * @var string
     */
    public $redirectUri;


    public function __construct($appKey='', $appSecret='', $redirectUri='')
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->redirectUri = $redirectUri;
    }


    /**
     * Web授权链接
     *
     * @return string
     */
    public function buildWebAuthorizeUri()
    {
        return "{$this->gateway}/authorize?client_id={$this->appKey}&response_type=code&redirect_uri={$this->redirectUri}";
    }

    /**
     * App授权链接
     */
    public function buildAppAuthorizeUri()
    {
        return "{$this->gateway}/authorize?client_id={$this->appKey}&response_type=code&redirect_uri={$this->redirectUri}&state=1111&display=mobile";
    }

    /**
     * 换取Access Token
     *
     * @param string $code // 授权码
     * @return array
     */
    public function getAccessToken($code)
    {
        try{
            $params = [
                'client_id'         => $this->appKey,
                'client_secret'     => $this->appSecret,
                'grant_type'        => 'authorization_code',
                'redirect_uri'      => $this->redirectUri,
                'request_client_ip' => isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '127.0.0.1',
                'code'              => $code,
            ];

            $response = Http::post($this->gateway . '/token', $params);

            return Format::deJSON($response);
        }catch (\Exception $e) {
            return [];
        }
    }




}