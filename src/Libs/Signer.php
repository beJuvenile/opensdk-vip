<?php
/**
 * 签名
 * 
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 22:13
 */
namespace OpenSDK\Vip\Libs;

class Signer
{

    /**
     * 生成签名
     *
     * @param array $sys // 系统级参数
     * @param string $request // 业务参数
     * @param string $secret // 密钥
     * @return string
     */
    public static function make($sys, $request, $secret)
    {
        ksort($sys);
        $stringToBeSigned = '';
        foreach ($sys as $k => $v)
        {
            $stringToBeSigned .= "$k$v";
        }
        unset($k, $v);
        $stringToBeSigned .= @json_encode($request);

        return self::hmac($stringToBeSigned, $secret);
    }

    /**
     * hmac加密
     *
     * @param string $data
     * @param string $secret
     * @return string
     */
    public static function hmac($data, $secret)
    {
        if (function_exists('hash_hmac')) {
            return strtoupper(hash_hmac('md5', $data, $secret));
        }

        $key = (strlen($secret) > 64) ? pack('H32', 'md5') : str_pad($secret, 64, chr(0));
        $ipad = substr($key,0, 64) ^ str_repeat(chr(0x36), 64);
        $opad = substr($key,0, 64) ^ str_repeat(chr(0x5C), 64);

        return strtoupper(md5($opad.pack('H32', md5($ipad.$data))));
    }
    
}