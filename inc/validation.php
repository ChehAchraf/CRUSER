<?php

function req($value){
    $str = trim(htmlspecialchars((htmlentities($value))));
    if (strlen($str) < 3 ){
        return true;
    }
    return false;
}

function sanitize_email($email){
    $email = trim($email);
    $email = filter_var($email , FILTER_SANITIZE_EMAIL);
    return $email;
}