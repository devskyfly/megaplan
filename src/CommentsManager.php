<?php
namespace devskyfly\megaplan;

use devskyfly\megaplan\builders\QueryBuilderInterface;
use devskyfly\megaplan\response\CommentResponse;
use devskyfly\megaplan\response\DeleteResponse;

class CommentsManager
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
     * @return ClientsResponse
     */
    /*public function getList(QueryBuilderInterface $query)
    {
        $url = "/BumsCommonApiV01/Comment/all.api";
        $result = $this->_client->get($url, $query->getData());
        return new ClientsResponse($result);
    }*/

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return ClientResponse
     */
    /*public function get($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCrmApiV01/Contractor/card.api";
        $result = $this->_client->get($url, ["Id"=>$id]);
        return new ClientResponse($result);
    }*/

    /**
     * Undocumented function
     *
     * @param QueryBuilderInterface $builder
     * @return CommentResponse
     */
    public function create(QueryBuilderInterface $builder)
    {
        $url = "/BumsCommonApiV01/Comment/create.api";
        $result =  $this->_client->post($url, $builder->getData());
        return new CommentResponse($result);
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param QueryBuilderInterface $builder
     * @return ClientResponse
     */
    /*public function edit($id, QueryBuilderInterface $builder)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }
        $builder->id($id);
        $url = "/BumsCrmApiV01/Contractor/save.api";
        $result = $this->_client->post($url, $builder->getData());
        return new ClientResponse($result);
    }*/

    /**
     * Undocumented function
     *
     * @return FieldsReponse
     */
    /*public function getFieldsDesc()
    {
        $url = "/BumsCrmApiV01/Contractor/listFields.api";
        $result = $this->_client->get($url);
        return new FieldsResponse($result);
    }*/

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return DeleteResponse
     */
    /*public function delete($id)
    {
        if (!Nmbr::isInteger($id)) {
            throw new \InvalidArgumentException('Param $id is not integer');
        }

        $url = "/BumsCrmApiV01/Contractor/delete.api";
        
        $result = $this->_client->post($url, ['Id'=>$id]);
        return new DeleteResponse($result);  
    }*/
}