<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Vrbl;

class DealScriptResponse extends Response
{
    public function getPayload()
    {
        return Vrbl::getValue($data, "deal", null);
    }
}