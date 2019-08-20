<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\php56\types\Nmbr;

class ClientsManager
{
    private $_client;

    public function __construct(MegaplanClient $client)
    {
        $this->_client = $client;
    }

    public function getList(QueryBuilderInterface $query)
    {
        $url = "/BumsCrmApiV01/Contractor/list.api";
        return $this->_client->get($url, $query->getData());
    }

    public function get($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCrmApiV01/Contractor/card.api";
        return $this->_client->get($url, ["id", $id]);
    }

    public function create()
    {
        $url = "/BumsCrmApiV01/Contractor/save.api";
        return $this->_client->post($url);
    }

    public function edit($id, $params)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCrmApiV01/Contractor/save.api";
        return $this->_client->post($url);
    }

    public function delete($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCrmApiV01/Contractor/delete.api";
        return $this->_client->post($url);
    }
}