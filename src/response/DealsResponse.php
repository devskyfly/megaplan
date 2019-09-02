<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Vrbl;

class DealsResponse extends Response
{
    public function getPayload()
    {
        $data = parent::getPayload();
        return Vrbl::getValue($data, "deal", null);
    }
}