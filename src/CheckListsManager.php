<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\megaplan\types\subject\AbstractSubjectType;
use devskyfly\php56\types\Lgc;
use devskyfly\php56\types\Nmbr;

class CheckListsManager
{
    private $_client;

    public function __construct(MegaplanClient $client)
    {
        $this->_client = $client;
    }

    public function getList($actual)
    {
        if (!Lgc::isBoolean($actual)) {
            throw new \InvalidArgumentException('Param $actual is not boolean');
        }

        $url = "/BumsCommonApiV01/Checklist/all.api";
        return $this->_client->get($url, ["OnlyActual" => $actual]);
    }

    public function getListBySubject($subjectId, AbstractSubjectType $subjectType)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCommonApiV01/Checklist/list.api";
        return $this->_client->get($url, ["SubjectId" => $subjectId, "SubjectType" => $subjectType]);
    }

    public function create(QueryBuilderInterface $builder)
    {
        $url = "/BumsCommonApiV01/Checklist/create.api";
        return $this->_client->post($url, $builder->getData());
    }

    public function edit($id, QueryBuilderInterface $builder)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }
        $builder->id($id);
        $url = "/BumsCommonApiV01/Checklist/update.api";
        return $this->_client->post($url, $builder->getData());
    }

    /*public function delete($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCommonApiV01/Checklist/delete.api";
        return $this->_client->post($url, []);
    }*/
}