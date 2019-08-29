<?php
namespace devskyfly\megaplan\builders;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;

class TasksListQueryBuilder implements QueryBuilderInterface
{
    private $_data=[];


    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        
        return $this;
    }

    /*public function filterId($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['FilterId']=$val;
        return $this;
    }*/

    public function getData()
    {
        return $this->_data;
    }
}