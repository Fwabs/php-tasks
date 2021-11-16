<?php

function refine($input){
    $value = trim($input);
    $value = htmlspecialchars($value);
    $value = stripcslashes($value);
    return $value;
}


function validation($input,$warning=null,$input2=null){
    $status = true;
    switch ($warning) {
        case 1:
            if (empty($input)) {
                $status = false;
            }
            break;
        case 2:
            if($input > $input2){
                $status = false;
            }
            break;
        case 3: 
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            }
            break;
    }
    return $status;
}
?>