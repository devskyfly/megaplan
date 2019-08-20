<?
namespace devskyfly\megaplan\builders;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;

class ClientsListQueryBuilder implements QueryBuilderInterface
{
    private $_data=[];


    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->offset(0);
    }

    public function filterId($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer.');
        }
        $this->_data['FilterId']=$val;
    }

    public function limit($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer.');
        }
        $this->_data['Limit']=$val;
    }

    public function offset($val)
    {
        if (!Nmbr::isInteger($val)) {
            throw new \InvalidArgumentException('Param $val is not integer.');
        }
        $this->_data['Offset']=$val;
    }

    public function queryString($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string.');
        }
        $this->_data['qs']=$val;
    }

    public function phone($val)
    {
        if (!Str::isString($val)) {
            throw new \InvalidArgumentException('Param $val is not string.');
        }
        $this->_data['Phone']=$val;
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
            throw new \InvalidArgumentException('Param $val is not string.');
        }
        $this->_data['Model']=$val;
    }

    public function droppedOnly()
    {
        $this->_data['DroppedOnly'] = true;
    }

    

    public function getData()
    {
        return $this->_data;
    }
}