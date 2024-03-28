<?php

// require /// string // 3
// email // requi // email
//pass // string // max 29 // min 8
$Errors="";
$succes="";
function required_input($str){
    $value=trim($str);

    if(strlen($value) > 0){
        return true;
    }
    return false;
}

function sanitize_input($str){
    
    $value=trim($str);
    // echo $value;
    $value=filter_var($value,FILTER_SANITIZE_STRING);
    
    return $value;
}

function sanitize_email($email){
    $value=trim($email);
    // echo $value;
    $value=filter_var($value,FILTER_SANITIZE_EMAIL);

    return $value;
}

////////////////////////////// validate ///////////////////////////
function minmum_input($str, $min){
    if(strlen($str) < $min){
        return false;
    }
    return true;
}

function maxmum_input($str, $max){
    if(strlen($str) > $max){
        return false;
    }
    return true;
}

///////////////// avlidate email ///////////////

function valid_EMail($email){
   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      return false;
    }   
    return true;
}
