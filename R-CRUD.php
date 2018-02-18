<?php
// Here we define constants /!\ You need to replace this parameters
define('DEBUG', false);
define('PS_SHOP_PATH', 'shop_path');
define('PS_WS_AUTH_KEY', 'auth_key');
require_once('./PSWebServiceLibrary.php');
//header('Content-Type: text/xml');
try {
  // creating web service access
  $webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);

  // The key-value array
  $opt['resource'] = 'customers';
  $opt['id'] = $_GET['id'];

  // Retrieving the XML data
  $xml = $webService->get($opt);

  $resources = $xml->customer->children();

  foreach ($resources as $key => $resource) {
    echo '- '.$key.': '.$resource.'<br />';
  }
}
catch (PrestaShopWebserviceException $ex) {
  //Show a message related to the error
  echo 'Other error: <br />'.$ex->getMessage();
}
?>
