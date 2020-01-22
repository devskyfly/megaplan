<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Vrbl;

class Response
{
    const STATUS_OK = "ok";
    const STATUS_ERROR = "error";
    
    protected $answer;
    /**
     *
     * @param [] $answer
     * @throws ResponseException
     */
    public function __construct($answer)
    {
        if (!Arr::isArray($answer)) {
            throw new \InvalidArgumentException('Param $answer is not array type.');
        }

        $this->answer = $answer;

        if ($this->answer['status']['code']==self::STATUS_ERROR) {
            //throw new ResponseException('Response error: '.$this->getStatusMsg().'.');
            throw new ResponseException('Response error: '.print_r($this->answer, true).'.');
        }
    }

    public function getStatusCode()
    {
        return $this->answer['status']['code'];
    }

    public function getStatusMsg()
    {
        return $this->answer['status']['message'];
    }

    /**
     * 
     * @return [] | null
     */
    public function getData()
    {
        return Vrbl::getValue($this->answer, 'data', null);
    }
    
    /**
     *
     * @throws ResponseException 
     * @return [] | null
     */
    public function getPayload()
    {
        $data = $this->getData();
        if (!Arr::isArray($data)) {
            throw new ResponseException('Param $data is not array type.');
        }
        return $data;
    }
}