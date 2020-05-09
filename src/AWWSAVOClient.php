<?php


namespace AWWSAVO\Client;


use AWWSAVO\Client\structs\awwsavo;
use AWWSAVO\Client\structs\AWWSAVOInput;
use AWWSAVO\Client\structs\AWWSAVOResult;
use Exception;
use SoapClient;

class AWWSAVOClient
{

    private $client, $awwsavo;
    public $wsdlurl = "http://webservices.accell-it-services.com:9080/WSHP_AWWSAVO/services/AWWSAVOServices/wsdl/AWWSAVOServices.wsdl";

    public function __construct($leveranciercode, $usercode, $wachtwoord)
    {
        if (strlen($leveranciercode) > 10) {
            throw new Exception("leveranciercode cannot have more than 10 digits");
        }
        if (strlen($usercode) > 10) {
            throw new Exception("usercode cannot have more than 10 digits");
        }
        if (strlen($wachtwoord) > 10) {
            throw new Exception("wachtwoord cannot have more than 10 digits");
        }
        $this->leveranciercode = $leveranciercode;
        $this->usercode = $usercode;
        $this->wachtwoord = $wachtwoord;

        $this->client = new SoapClient($this->wsdlurl, array(
            'classmap' => array(
                'awwsavoResponse' => "AWWSAVO\Client\structs\awwsavoResponse",
                'AWWSAVOResult' => "AWWSAVO\Client\structs\AWWSAVOResult",
                'Voorraadinfo' => "AWWSAVO\Client\structs\Voorraadinfo"
            )
        ));
        $this->awwsavo = new awwsavo(new AWWSAVOInput($this->leveranciercode, $this->usercode, $this->wachtwoord));
    }

    /**
     * @param $artikelnummer
     * @return AWWSAVOResult
     * @throws Exception
     */
    public function getVoorraad(string $artikelnummer): AWWSAVOResult
    {
        if (strlen($artikelnummer) > 15) {
            throw new Exception("artikelnummer cannot have more than 15 digits");
        }
        # Don't initiate the class every time here (saves some memory/cpu cycles), so we just update the artikelnummer.
        $this->awwsavo->inputData->artikelnummer = $artikelnummer;
        $parameters = array($this->awwsavo);
        return $this->client->__soapCall("awwsavo", $parameters)->awwsavoReturn;
    }
}