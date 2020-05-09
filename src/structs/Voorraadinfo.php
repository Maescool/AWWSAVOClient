<?php


namespace AWWSAVO\Client\structs;


class Voorraadinfo
{
    /**
     * @var string
     */
    public $voorraadstatus;
    /**
     * @var string
     */
    public $voorraadaantal;
    /**
     * @var string
     */
    public $leverbaarVanaf;

    public static $voorraadstatustypes = [
        "1" => "sufficient",
        "2" => "limited",
        "3" => "available on certain date",
        "4" => "available date unknown",
        "5" => "not available"
    ];

    public static function getVoorraadstatusString($status){
        return (key_exists($status, self::$voorraadstatustypes))? self::$voorraadstatustypes[$status] : "Unknown";
    }

}