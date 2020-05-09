# PHP AWWSAVOClient

## About
 _AWWSAVOClient_ is a PHP library 
 to get the current stock status of suppliers using Accel-it-services.  
 
 The methods and variables are in dutch, since the soap wsdl is also defined in this language.
 I have documented this however in english.
 
## Installation

```bash
composer require maescool/awwsavoclient
```
 
## Usage

### getVoorraad
the _getVoorraad_ method returns an object with the data or throws an exception at failure.
```php
/* Call the Composer autoloader */
require '../vendor/autoload.php';
use AWWSAVO\Client\AWWSAVOClient;

## these values are max 10 digits in length.
$leveranciercode = "yoursuppliercode";
$usercode = "yourusercode";
$wachtwoord = "yourpassword";

try {
    $client = new AWWSAVOClient($leveranciercode, $usercode, $wachtwoord);
    # Get the supply status from a certain article, based on article code
    # the article code must be a string, no longer than 15 digits.
    $data = $client->getVoorraad("8715019301322");
    var_dump($data);
} catch (Exception $e) {
    echo $e->getMessage();
}
```

