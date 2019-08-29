<?php
namespace devskyfly\megaplan\builders;

use devskyfly\megaplan\types\subject\AbstractSubjectType;
use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Lgc;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;


class CheckListModelBuilder implements QueryBuilderInterface
{
    private $_data = [];

    public function __construct()
    {
        
    }

    public function id($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Id'] = $val;
        return $this;
    }

    public function subjectType(AbstractSubjectType $subjectType)
    {
        $this->_data['SubjectType'] = $subjectType->getVal();
        return $this;
    }

    public function subjectId($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['SubjectId'] = $val;
        return $this;
    }

    public function title($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[Title]'] = $val;
        return $this;
    }

    public function done($val)
    {
        if (!Lgc::isBoolean($val)) {
            throw new \InvalidArgumentException('Param $val is not boolean type');
        }
        $this->_data['Model[Done]'] = $val;
        return $this;
    }

    public function order($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[OrderPos]'] = $val;
        return $this;
    }
    
    public function getData()
    {
        return $this->_data;
    }
}