<?php
namespace devskyfly\megaplan\builders;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Lgc;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;

class DealModelBuilder implements QueryBuilderInterface
{
    private $_data=[];

    public function __construct()
    {
        
    }

    public function id($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Id']=$val;
        return $this;
    }

    public function programId($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['ProgramId']=$val;
        return $this;
    }

    public function statusId($val)
    {
        if (!($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['StatusId']=$val;
        return $this;
    }

    public function strictLogic($val)
    {
        if (!Lgc::isBoolean($val)) {
            throw new \InvalidArgumentException('Param $val is not boolean type.');
        }
        $this->_data['StrictLogic']=$val;
        return $this;
    }

    public function manager($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Model[Manager]']=$val;
        return $this;
    }

    public function client($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Model[Contractor]']=$val;
        return $this;
    }

    public function contactPerson($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Model[Contact]']=$val;
        return $this;
    }

    public function auditors($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type.');
        }
        $this->_data['Model[Auditors]']=$val;
        return $this;
    }

    public function name($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type.');
        }
        $this->_data['Model[CustomName]']=$val;
        return $this;
    }

    public function description($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type.');
        }
        $this->_data['Model[Description]']=$val;
        return $this;
    }

    public function cost($val)
    {
        if (!Nmbr::isNumeric($val)) {
            throw new \InvalidArgumentException('Param $val is not numeric type.');
        }
        $this->_data['Model[Cost][Value]']=$val;
        return $this;
    }

    public function rate($val)
    {
        if (!Nmbr::isNumeric($val)) {
            throw new \InvalidArgumentException('Param $val is not numeric type.');
        }
        $this->_data['Model[Cost][Rate]']=$val;
        return $this;
    }

    public function currency($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Model[Cost][Currency]']=$val;
        return $this;
    }

    public function positions($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type.');
        }
        $this->_data['Positions']=$val;
        return $this;
    }



    public function getData()
    {
        return $this->_data;
    }
}