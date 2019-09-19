<?php
namespace devskyfly\megaplan\builders;

use devskyfly\megaplan\types\subject\AbstractSubjectType;
use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Lgc;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;

class CommentModelBuilder implements QueryBuilderInterface
{
    private $_data=[];

    public function __construct()
    {
        
    }

    public function subjectType(AbstractSubjectType $type)
    {
        $this->_data['SubjectType']=$type->getVal();
        return $this;
    }

    public function subjectId($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['SubjectId']=$val;
        return $this;
    }

    public function text($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type.');
        }
        $this->_data['Model[Text]']=$val;
        return $this;
    }

    public function work($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Model[Work]']=$val;
        return $this;
    }

    public function getData()
    {
        return $this->_data;
    }
}