<?php
// Here we define constants /!\ You need to replace this parameters
define('DEBUG', false);
define('PS_SHOP_PATH', 'shop_path');
define('PS_WS_AUTH_KEY', 'auth_key');
require_once('./PSWebServiceLibrary.php');
//header('Content-Type: text/xml');
try {
    // Create an instance
	  $webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
    $opt['resource'] = 'customers';            // Resource to use
    $opt['id'] = 4;                             // ID to use
    $webService->delete($opt);                 // Delete
    // If we can see this message, that means we have not left the try block
    echo 'Customer '.$opt['id'].' successfully deleted!';
}
catch (PrestaShopWebserviceException $ex) {
    $trace = $ex->getTrace();                // Retrieve all info on this error
    $errorCode = $trace[0]['args'][0];       // Retrieve error code
    if ($errorCode == 401)
        echo 'Bad auth key';
    else
        echo 'Other error: <br />'.$ex->getMessage();
    // Display error message{color}
}
?>
