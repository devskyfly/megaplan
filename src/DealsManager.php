<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\megaplan\response\BindDealToTaskResponse;
use devskyfly\megaplan\response\DealResponse;
use devskyfly\megaplan\response\DealScriptResponse;
use devskyfly\megaplan\response\DealsResponse;
use devskyfly\megaplan\response\FieldsResponse;
use devskyfly\megaplan\types\TypeInterface;
use devskyfly\php56\types\Nmbr;

class DealsManager
{
    private $_client;

    public function __construct(MegaplanClient $client)
    {
        $this->_client = $client;
    }

    /**
     * Undocumented function
     *
     * @param QueryBuilderInterface $query
     * @return DealsResponse
     */
    public function getList(QueryBuilderInterface $query)
    {
        $url = "/BumsTradeApiV01/Deal/list.api";
        $result = $this->_client->get($url, $query->getData());
        return new DealsResponse($result);
    }

    public function get($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsTradeApiV01/Deal/card.api";
        $result =  $this->_client->get($url, ["Id" => $id]);
        return new DealResponse($result);
    }

    public function create(QueryBuilderInterface $builder)
    {
        $url = "/BumsTradeApiV01/Deal/save.api";
        $result = $this->_client->post($url, $builder->getData());
        return new DealResponse($result);
    }

    public function edit($id, QueryBuilderInterface $builder)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }
        $builder->id($id);
        $url = "/BumsTradeApiV01/Deal/save.api";
        $result = $this->_client->post($url, $builder->getData());
        return new DealResponse($result);
    }

    /**
     * Undocumented function
     *
     * @return FieldsReponse
     */
    public function getFieldsDesc()
    {
        $url = "/BumsTradeApiV01/Deal/listFields.api";
        $result = $this->_client->get($url);
        return new FieldsResponse($result);
    }

    public function bind($id, $bindId, TypeInterface $bindType)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer.');
        }
        if (!Nmbr::isInteger($bindId)) {
            throw new \InvalidArgumentException('Param $bindId is not integer.');
        }
        $url = "/BumsTradeApiV01/Deal/saveRelation.api";
        $result = $this->_client->post($url, ["Id"=>$id, "RelatedObjectId"=>$bindId, "RelatedObjectType"=>$bindType->getVal()]);
        return new BindDealToTaskResponse($result);
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
        $result =  $this->_client->post($url, ["DealId"=>$dealId, "TriggerId"=>$scriptId]);
        return new DealScriptResponse($result);
    }
}