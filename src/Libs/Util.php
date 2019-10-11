<?php
/**
 * 帮助函数
 * 
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/27
 * Time: 14:43
 */
namespace OpenSDK\Vip\Libs;


class Util
{
    
    /**
     * 获取本机IP
     */
    public static function ip()
    {
        $ip1 = getenv ('HTTP_X_FORWARDED_FOR');
        $ip2 = getenv ('HTTP_CLIENT_IP');
        $ip3 = getenv ('REMOTE_ADDR');
        if ($ip1 && $ip1 != 'unknow')
            $ip = $ip1;
        else if ($ip2 && $ip2 != 'unknow')
            $ip = $ip2;
        else if ($ip3 && $ip3 != 'unknow')
            $ip = $ip3;
        else
            $ip = '127.0.0.1';

        return $ip;
    }

    /**
     * IPV4转成i32编码
     *
     * @param string $ip
     * @return int
     */
    public static function IPV42Int32($ip)
    {
        $val = preg_split ( "/\\./", $ip);

        return (($val[0] & 0xff) << 24) | (($val[1] & 0xff) << 16) | (($val[2] & 0xff) << 8) | (($val[3] & 0xff));
    }

    /**
     * i32转IPV4
     *
     * @param int $ip
     * @return string
     */
    public static function int322IPV4($ip)
    {
        $i32out0 = (0xff & ($ip >> 24));
        $i32out1 = (0xff & ($ip >> 16));
        $i32out2 = (0xff & ($ip >> 8));
        $i32out3 = (0xff & ($ip));

        return $i32out0 . '.' . $i32out1 . '.' . $i32out2 . '.' . $i32out3;
    }

    /**
     * Request id
     *
     * @return string
     */
    public static function requestId()
    {
        return (string)(time() . mt_rand(10000, 99999));
    }
    
}