<?php
namespace devskyfly\megaplan\response;

use devskyfly\php56\types\Vrbl;

class TaskResponse extends Response
{
    public function getPayload()
    {
        $data = parent::getPayload();
        return Vrbl::getValue($data, "task", null);
    }
}