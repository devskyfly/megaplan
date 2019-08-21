<?
namespace devskyfly\megaplan\builders;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;

class DealsListQueryBuilder implements QueryBuilderInterface
{
    private $_data=[];

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->offset(0);
        return $this;
    }

    public function filterId($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['FilterId']=$val;
        return $this;
    }

    /**
     * Set array of hash tables values where key is field name and value is model value. 
     *
     * @param [] $val - "field" => val
     * @return void
     */
    public function filter($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type.');
        }
        $this->_data['FilterFields']=$val;
        return $this;
    }

    public function limit($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Limit']=$val;
        return $this;
    }

    public function offset($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer type.');
        }
        $this->_data['Offset']=$val;
        return $this;
    }

    public function fields($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type.');
        }
        $this->_data['RequestedFields']=$val;
        return $this;
    }

    public function extraFields($val)
    {
        if (!Arr::isArray($val)) {
            throw new \InvalidArgumentException('Param $val is not array type.');
        }
        $this->_data['ExtraFields']=$val;
        return $this;
    }

    public function getData()
    {
        return $this->_data;
    }
}