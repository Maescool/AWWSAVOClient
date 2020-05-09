<?php


namespace AWWSAVO\Client\structs;


class AWWSAVOResult
{
    /**
     * @var string
     */
    public $returncode;
    /**
     * @var string
     */
    public $melding;
    /**
     * @var Voorraadinfo
     */
    public $voorraadinfo;

    public function __construct()
    {
        return $this;
    }
}