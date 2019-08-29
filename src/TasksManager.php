<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\php56\types\Nmbr;

class TasksManager
{
    private $_client;

    public function __construct(MegaplanClient $client)
    {
        $this->_client = $client;
    }

    public function getList(QueryBuilderInterface $query)
    {
        $url = "/BumsTaskApiV01/Task/list.api";
        return $this->_client->get($url, $query->getData());
    }

    public function get($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsTaskApiV01/Task/card.api";
        return $this->_client->get($url, ["Id"=>$id]);
    }

    public function create(QueryBuilderInterface $builder)
    {
        $url = "/BumsTaskApiV01/Task/create.api";
        return $this->_client->post($url, $builder->getData());
    }

    public function edit($id, QueryBuilderInterface $builder)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }
        $builder->id($id);
        $url = "/BumsTaskApiV01/Task/edit.api";
        return $this->_client->post($url, $builder->getData());
    }

    public function getFieldsDesc()
    {
        $url = "/BumsTaskApiV01/Task/listFields.api";
        return $this->_client->get($url);
    }

    public function delete($id)
    {
        
    }
}