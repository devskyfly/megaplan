<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\megaplan\response\FieldsResponse;
use devskyfly\megaplan\response\TaskResponse;
use devskyfly\megaplan\response\TasksResponse;
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
        $result = $this->_client->get($url, $query->getData());
        return new TasksResponse($result);
    }

    public function get($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsTaskApiV01/Task/card.api";
        $result = $this->_client->get($url, ["Id"=>$id]);
        return new TaskResponse($result);
    }

    public function create(QueryBuilderInterface $builder)
    {
        $url = "/BumsTaskApiV01/Task/create.api";
        $result = $this->_client->post($url, $builder->getData());
        return new TaskResponse($result);
    }

    public function edit($id, QueryBuilderInterface $builder)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }
        $builder->id($id);
        $url = "/BumsTaskApiV01/Task/edit.api";
        $result = $this->_client->post($url, $builder->getData());
        return new TaskResponse($result);
    }

    public function getFieldsDesc()
    {
        $url = "/BumsTaskApiV01/Task/listFields.api";
        $result = $this->_client->get($url);
        return new FieldsResponse($result);
    }

    public function delete($id)
    {
        
    }
}