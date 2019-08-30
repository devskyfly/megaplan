<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Arr;

use function GuzzleHttp\Psr7\build_query;

class Response
{
    const STATUS_OK = "ok";
    const STATUS_ERROR = "error";
    
    protected $data;

    public function __construct($data)
    {
        if (!Arr::isArray($data)) {
            throw new \InvalidArgumentException('Param $data is not array type.');
        }
        $this->data = $data;

        if ($this->data['status']['code']==self::STATUS_ERROR) {
            throw new ResponseException('Response status is '.self::STATUS_ERROR.'.');
        }
    }

    public function getData()
    {
        return $this->data['data'];
    }
}