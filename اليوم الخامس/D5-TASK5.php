<?php
/*
# http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz

    * Fetch the following data for all products from the previous API. 

    products_id,
    products_name,
    products_description,
    products_quantity,
    products_model,
    products_image,
    products_date_added,
    products_liked

   * Insert each raw in Text File,
   * then Create A page to Diplay the Inserted data from  Text File .
*/

$data = file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');
$dataArray = json_decode($data,true);

foreach ($dataArray['data'] as $k => $v) {
    $arrtostr = implode(" , ",$v);
    echo $arrtostr."\n";

    $file = fopen("test1.txt","a");

    fwrite($file,$arrtostr);
    fclose($file);
}





?>