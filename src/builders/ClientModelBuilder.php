<?php
namespace devskyfly\megaplan\builders;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;


class ClientModelBuilder implements QueryBuilderInterface
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

    public function typePersonHuman()
    {
        $this->_data['Model[TypePerson]'] = 'human';
        return $this;
    }

    public function typePersonCompany()
    {
        $this->_data['Model[TypePerson]'] = 'company';
        return $this;
    }

    public function type($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[Type]'] = $val;
        return $this;
    }

    public function firstName($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[FirstName]'] = $val;
        return $this;
    }

    public function lastName($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[LastName]'] = $val;
        return $this;
    }

    public function middleName($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[MiddleName]'] = $val;
        return $this;
    }

    public function companyName($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[CompanyName]'] = $val;
        return $this;
    }

    public function parentCompany($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[ParentCompany]'] = $val;
        return $this;
    }

    public function email($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[Email]'] = $val;
        return $this;
    }

    public function phones($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type');
        }
        $this->_data['Model[Phones]'] = $val;
        return $this;
    }

    public function birthday($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type');
        }
        $this->_data['Model[Birthday]'] = $val;
        return $this;
    }
    
    public function responsibles($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[Responsibles]'] = $val;
        return $this;
    }

    public function responsibleContractors($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string type');
        }
        $this->_data['Model[ResponsibleContractors]'] = $val;
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param [] $val - 
     * [
     *  "n1"=>["Address"=>"Саратов"]
     * ]
     * @return void
     */
    public function locations($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type');
        }
        $this->_data['Model[Locations][location]'] = $val;
        return $this;
    }

    public function adversingWay($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type');
        }
        $this->_data['Model[AdvertisingWay]'] = $val;
        return $this;
    }

    public function customProperty($name, $value)
    {
        if (!Str::isString($name)) {
            throw new \InvalidArgumentException('Param $name is not string type');
        }

        if (!Str::isString($value)) {
            throw new \InvalidArgumentException('Param $value is not string type');
        }
        $this->_data["Model[{$name}]"] = $value;
        return $this;
    }
    
    public function getData()
    {
        return $this->_data;
    }
}