<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\php56\types\Nmbr;

class DealsManager
{
    private $_client;

    public function __construct(MegaplanClient $client)
    {
        $this->_client = $client;
    }

    public function getList(QueryBuilderInterface $query)
    {
        $url = "/BumsTradeApiV01/Deal/list.api";
        return $this->_client->get($url, $query->getData());
    }

    public function get($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsTradeApiV01/Deal/card.api";
        return $this->_client->get($url, ["Id" => $id]);
    }

    public function create(QueryBuilderInterface $builder)
    {
        $url = "/BumsTradeApiV01/Deal/save.api";
        return $this->_client->post($url, $builder->getData());
    }

    public function edit($id, QueryBuilderInterface $builder)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }
        $builder->id($id);
        $url = "/BumsTradeApiV01/Deal/save.api";
        return $this->_client->post($url, $builder->getData());
    }

    public function executeScript($dealId, $scriptId)
    {
        if (!Nmbr::isInteger($dealId)) {
            throw new \InvalidArgumentException('Param $dealId is not integer.');
        }
        if (!Nmbr::isInteger($scriptId)) {
            throw new \InvalidArgumentException('Param $scriptId is not integer.');
        }

        $url = "/BumsTradeApiV01/Deal/runTrigger.api";
        return $this->_client->post($url, ["DealId"=>$dealId, "TriggerId"=>$scriptId]);
    }
}