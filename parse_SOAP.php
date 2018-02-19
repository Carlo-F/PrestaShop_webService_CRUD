<?php
//simple solution to parse a SOAP XML Result
$soapXMLResult =
"<?xml version='1.0' encoding='utf-8'?><soap:Envelope
 xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/'
  xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
  xmlns:xsd='http://www.w3.org/2001/XMLSchema'><soap:Header><Header
  xmlns='http://www.example.com'>
   <CustomerID>87654321</CustomerID><Username>test@email.com.au</Username>
     <Password>test123</Password></Header></soap:Header><soap:Body>
       <CreateRebillCustomerResponse xmlns='http://www.example.com'><CreateRebillCustomerResult>
          <Result>Success</Result><ErrorSeverity /><ErrorDetails />
     <RebillCustomerID>90246</RebillCustomerID></CreateRebillCustomerResult>
         </CreateRebillCustomerResponse></soap:Body></soap:Envelope>";

$soap     = simplexml_load_string($soapXMLResult);
$response = $soap->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->CreateRebillCustomerResponse;
$customerId = (string) $response->CreateRebillCustomerResult->RebillCustomerID;
echo 'The customer ID is: '.$customerId;
?>
