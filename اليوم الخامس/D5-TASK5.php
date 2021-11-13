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
    // echo $v['products_model'];
    foreach ($v as $key => $value) {
        // echo $key."<br>".$value."<br>";
        $x = "$key : $value \n";
        // if ($key == 'products_id' or $key == 'products_name' or ) {
            
        // }
        $file = fopen("test1.txt","a");
        fwrite($file,$x);
        fclose($file);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="container">

    </main>
</body>
</html>