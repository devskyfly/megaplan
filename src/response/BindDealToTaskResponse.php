<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Vrbl;

class BindDealToTaskResponse extends Response
{
    public function getPayload()
    {
        return $data = parent::getPayload();
        //return Vrbl::getValue($data, "deal", null);
    }
}