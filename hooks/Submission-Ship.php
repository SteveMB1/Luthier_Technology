<?php

/*
  Including the following files allows us to use many shortcut
  functions provided by AppGini. Here, we'll be using the
  following functions:
makeSafe()
            protect against malicious SQL injection attacks
      sql()
            connect to the database and execute a SQL query
      db_fetch_assoc()
            same as PHP built-in mysqli_fetch_assoc() function
*/
include("../defaultLang.php");
include("../language.php");
include("../lib.php");

/* receive calling parameters */
      $table = $_REQUEST['table'];
      $ids = $_REQUEST['ids']; /* this is an array of IDs */

$cs_ids = '';
foreach($ids as $id){
  $cs_ids .= "'" . makeSafe($id) . "',";
}
$cs_ids = substr($cs_ids, 0, -1);
          /* retrieve the records and display mail labels */
$res = sql( "select * from `luthier_tech`.`shipping` where `shipping`.`id` in ({$cs_ids})", $eo);

#-------------------------------------------------------------------------------

while($row = db_fetch_assoc($res)){

/*
This example demonstrates how to purchase a label for a domestic US shipment.
*/
require_once('shippo-php-client/lib/Shippo.php');

// Replace <API-KEY> with your credentials
Shippo::setApiKey(“REPLACE”);

// example fromAddress
$fromAddress = array(
    'object_purpose' => 'PURCHASE',
    'name' => ‘Test”’,
    'company' => ‘String Shop’,
    'street1' => ‘PO Box 100’,
    'city' => 'Hopewell',
    'state' => 'NJ',
    'zip' => '08525',
    'country' => 'US',
    'phone' => '+0000000000’,
    'email' => ‘support@strings.com’);

// example fromAddress
$toAddress = array(
    'object_purpose' => 'PURCHASE',
    'name' => $row['client_name'],
    'company' => $row['company'],
    'street1' => $row['street_address'],
    'city' => $row['city'],
    'state' => $row['state'],
    'zip' => $row['zip'],
    'country' => $row['country'],
    'phone' => $row['phone'],
    'email' => 'steven@stevenbain.com');

// example parcel
$parcel = array(
    'length'=> $row['ship_length'],
    'width'=> $row['ship_width'],
    'height'=> $row['ship_height'],
    'distance_unit'=> $row['distance_unit'],
    'weight'=> $row['ship_weight'],
    'mass_unit'=> $row['ship_mass_unit'],
);
}
// example Shipment object
$shipment = Shippo_Shipment::create(
array(
    'object_purpose'=> 'PURCHASE',
    'address_from'=> $fromAddress,
    'address_to'=> $toAddress,
    'parcel'=> $parcel,
    'async'=> false
));

// Select the rate you want to purchase.
// We simply select the first rate in this example.
$rate = $shipment["rates_list"][0];

// Purchase the desired rate
$transaction = Shippo_Transaction::create(array(
    'rate'=> $rate["object_id"],
    'async'=> false
));

// label_url and tracking_number
if ($transaction["object_status"] == "SUCCESS"){
    echo($transaction["label_url"]);
    echo("\n");
    echo($transaction["tracking_number"]);
}else {
    foreach ($transaction["messages"] as $message) {
        echo($message);
    }
}
?>
