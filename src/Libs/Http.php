<?php
/**
 * 网络请求
 * 
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 22:24
 */
namespace OpenSDK\Vip\Libs;

class Http
{

    /**
     * Post 请求
     *
     * @param string $url // 请求地址
     * @param array $body // 请求体
     * @param array $options // 设置项
     * @return mixed
     */
    public static function post($url, $body, $options=[])
    {
        try{
            $body = json_encode($body);
            $headers = [
                'Content-type: application/json;charset=utf-8',
                'Content-Length: ' . strlen($body),
            ];
            if (isset($options['header'])) {
                array_merge($headers, $options['header']);
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if (isset($options['timeout'])) {
                curl_setopt($ch, CURLOPT_TIMEOUT, (int)$options['timeout']);
            }
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

            $resp = curl_exec($ch);

            if (curl_errno($ch))
                throw new \Exception(curl_error($ch),0);

            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode)
                throw new \Exception($resp, $httpStatusCode);
            curl_close($ch);

            return $resp;
        }catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get请求
     *
     * @param string $url // 请求地址
     * @param array $query // 参数
     * @param array $options // 设置项
     * @return mixed
     */
    public static function get($url, $query, $options=[])
    {
        try{
            if ($query)
                $url = $url . '?' . http_build_query($query);

            $ch = curl_init();
            //设置选项，包括URL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if (isset($options['timeout'])) {
                curl_setopt($ch, CURLOPT_TIMEOUT, (int)$options['timeout']);
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//绕过ssl验证
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            if (isset($options['header'])) {
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $options['header']);
            }

            //执行并获取HTML文档内容
            $resp = curl_exec($ch);

            if (curl_errno($ch))
                throw new \Exception(curl_error($ch),0);

            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode)
                throw new \Exception($resp, $httpStatusCode);

            //释放curl句柄
            curl_close($ch);

            return $resp;
        }catch (\Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
    
}