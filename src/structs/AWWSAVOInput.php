<?php


namespace AWWSAVO\Client\structs;


class AWWSAVOInput
{
    public $leveranciercode, $usercode, $wachtwoord, $artikelnummer;
    public function __construct($leveranciercode, $usercode, $wachtwoord)
    {
        $this->leveranciercode = $leveranciercode;
        $this->usercode = $usercode;
        $this->wachtwoord = $wachtwoord;
    }
}