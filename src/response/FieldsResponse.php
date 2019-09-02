<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Vrbl;

class FieldsResponse extends Response
{
    public function getPayload()
    {
        $data = parent::getPayload();
        return Vrbl::getValue($data, "Fields", null);
    }
}