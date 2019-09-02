<?php
namespace devskyfly\megaplan;

use function GuzzleHttp\Psr7\build_query;

class MegaplanClient
{
    private $_origin;
    private $_login;
    private $_password;
    private $_proxy; 
    private $_client;
    private $_accessId;
    private $_secretKey;

    public function __construct($origin, $login, $password, $proxy = null)
    {
        $this->_origin = $origin;
        $this->_login = $login;
        $this->_password = $password;
        $this->_proxy = $proxy;
        $this->_client = new \GuzzleHttp\Client();

        $this->auth();
    }

    /**
     *
     * @throws JsonException
     * @return $this
     */
    public function auth()
    {
        $url=$this->_origin."/BumsCommonApiV01/User/authorize.api";
        $params = [
            'form_params'=>[
                'Login'=> $this->_login,
                'Password'=>hash("md5", $this->_password)
            ],
            'verify' => false,
            
        ];
        if (!is_null($this->_proxy)) {
            $params['proxy'] = $this->_proxy;
        }
        $response = $this->_client->request('POST', $url, $params);

        $msg = json_decode($response->getBody(), true);
        $this->_accessId = $msg['data']['AccessId'];
        $this->_secretKey = $msg['data']['SecretKey'];
        return $this;
    }

    public function getAuth()
    {
        return ["accessId" => $this->_accessId, "secretKey" => $this->_secretKey];
    }

    protected function calcSignature($method, $url, $date, $query =[])
    {
        $str_query = http_build_query($query, '', '&',  PHP_QUERY_RFC3986);
        if (!empty($str_query)) {
            $url = $url."?".$str_query;
        }
        
        $contentType = "";
        if ($method=="POST") {
            $contentType = "application/x-www-form-urlencoded";
        }
        
        $url = mb_ereg_replace("(https:\/\/)|(http:\/\/)", "", $url);
        $stringToSign = $method."\n"
        .""."\n"
        .$contentType."\n"
        .$date."\n"
        .$url;

        $encrypted = hash_hmac('sha1', $stringToSign, $this->_secretKey, false);
        $signature = base64_encode($encrypted);
        return $signature;
    }

    public function get($path, $query = [])
    {
        $date = (new \DateTime())->format('D, d M Y H:i:s O');
        $method = 'GET';
        $url=$this->_origin.$path;
        $signature = $this->calcSignature($method, $url, $date, $query);
        
        $settings =
        [
            'headers' => [
                'X-Sdf-Date' => $date,
                'Accept'     => 'application/json',
                'X-Authorization' => $this->_accessId.":".$signature
            ],
            'verify' => false,
            'query' => $query,
            'http_errors' => false
        ];

        if (!is_null($this->_proxy)) {
            $settings['proxy'] = $this->_proxy;
        }

        $response = $this->_client->request($method, $url, $settings);
        return json_decode($response->getBody(), true);
    }

    public function post($path, $params)
    {
        $date = (new \DateTime())->format('D, d M Y H:i:s O');
        $method = 'POST';
        $url=$this->_origin.$path;
        $signature = $this->calcSignature($method, $url, $date);
        
        $settings =
        [
            'headers' => [
                'X-Sdf-Date' => $date,
                'Accept'     => 'application/json',
                'X-Authorization' => $this->_accessId.":".$signature
            ],
            'verify' => false,
            'form_params' => $params,
            'http_errors' => false
        ];

        
        if (!is_null($this->_proxy)) {
            $settings['proxy'] = $this->_proxy;
        }
        $response = $this->_client->request($method, $url, $settings);
        return json_decode($response->getBody(), true);
    }
}