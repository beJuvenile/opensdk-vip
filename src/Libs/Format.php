<?php
/**
 * 数据格式化
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/23
 * Time: 9:49
 */
namespace OpenSDK\Vip\Libs;

class Format{


    /**
     * JSON编码
     *
     * @param mixed $data
     * @return mixed
     */
    public static function enJSON($data)
    {
        if (!$data)
            return '';

        return @json_encode($data);
    }

    /**
     * JSON解码
     *
     * @param string $data
     * @return mixed
     */
    public static function deJSON($data)
    {
        if (!$data)
            return null;

        return @json_decode($data, true);
    }

    /**
     * SimpleXML解析
     *
     * @param string $data
     * @return mixed
     */
    public static function deSimpleXML($data)
    {
        if (!$data)
            return null;

        $xml = @simplexml_load_string($data);

        return self::deJSON(self::enJSON($xml));
    }


}