<?php
namespace devskyfly\megaplan;

class DealsManager
{
    private $_client;

    public function __constructor(MegaplanClient $client)
    {
        $this->$_client = $client;
    }
}