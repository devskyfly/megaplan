<?php
namespace devskyfly\megaplan\builders;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;


class TaskModelBuilder implements QueryBuilderInterface
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

    public function name($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[Name]'] = $val;
        return $this;
    }

    public function deadline(\DateTime $val)
    {
        $this->_data['Model[Deadline]'] = $val->format(\DateTime::ATOM);
        return $this;
    }

    public function deadlineDate(\DateTime $val)
    {
        $this->_data['Model[DeadlineDate]'] = $val->format("Y-m-d");
        return $this;
    }

    public function deadlineType()
    {
        $this->_data['Model[DeadlineType]'] = "";
        return $this;
    }

    public function responsible($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[Responsible]'] = $val;
        return $this;
    }

    public function executors($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type');
        }
        $this->_data['Model[Executors]'] = $val;
        return $this;
    }

    public function auditors($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type');
        }
        $this->_data['Model[Auditors]'] = $val;
        return $this;
    }

    public function severity($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[Severity]'] = $val;
        return $this;
    }

    public function parentTask($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[SuperTask]'] = $val;
        return $this;
    }

    public function customer($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[Customer]'] = $val;
        return $this;
    }

    public function isGroup($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[IsGroup]'] = $val;
        return $this;
    }

    public function statement($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[Statement]'] = $val;
        return $this;
    }

    public function start(\DateTime $val)
    {
        
        $this->_data['Model[Start]'] = $val->format(\DateTime::ATOM);
        return $this;
    }

    public function plannedFinish(\DateTime $val)
    {
        
        $this->_data['Model[PlannedFinish]'] = $val->format("Y-m-d");
        return $this;
    }

    public function plannedDays($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[PlannedTime]'] = $val->format("Y-m-d");
        return $this;
    }

    public function plannedMinutes($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[PlannedWork]'] = $val->format("Y-m-d");
        return $this;
    }

    public function getData()
    {
        return $this->_data;
    }
}