<?php
if(isset($_GET['input']) && isset($_GET['type'])){
    $namePattern = '/^([a-zA-Z\s]){3,30}$/';
    $fnamePattern = '/^([a-zA-Z]){3,10}$/';
    $lnamePattern = '/^([a-zA-Z\s]){3,20}$/';
    $aboutPattern = '/^([a-zA-Z\s\'\.\!]){5,50}$/';
    $profilePattern = '/^([a-zA-Z\s\'\-\,\.\!]){100,350}$/';
    $objectivePattern = '/^([a-zA-Z\s\'\-\,\.\!]){75,250}$/';
    $titleInstitutePattern = '/^([a-zA-Z\s\'\&\.\,\-\(\)]){5,100}$/';
    $completionPattern = '/^([a-zA-Z0-9\-\,]){5,10}$/';
    $resultPattern = '/^([0-9\/\(\)\%]){5,10}$/';
    $linkPattern = '/^(https\:\/\/|http\:\/\/)([^\.@\s]+)(\.[^\.@\s]+)+$/';
    $skillPattern = '/^([0-9a-zA-Z\+\s]){3,50}$/';
    $passPattern = '/^([a-zA-Z0-9\!\@\#\$\%\^\&\*\<\>]){8,15}$/';
    $emailPattern = '/^[^@\s]+@([^\.@\s]+)(\.[^\.@\s]+)+$/';
    $phonePattern = '/^(\+923|00923|03)[0-4][0-9]\-?\d{7}$/';
    if($_GET['type'] == "name"){
        if(preg_match($namePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "fname"){
        if(preg_match($fnamePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "lname"){
        if(preg_match($lnamePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "about"){
        if(preg_match($aboutPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "profile"){
        if(preg_match($profilePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "objective"){
        if(preg_match($objectivePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "title" || $_GET['type'] == "institute"){
        if(preg_match($titleInstitutePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "completion"){
        if(preg_match($completionPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "result"){
        if(preg_match($resultPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "link"){
        if(preg_match($linkPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "skill"){
        if(preg_match($skillPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "password"){
        if(preg_match($passPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "email"){
        if(preg_match($emailPattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else if($_GET['type'] == "mobile"){
        if(preg_match($phonePattern, $_GET['input'])){
            echo "Valid!";
        }
        else{
            echo "InValid!";
        }
    }
    else{
        echo "InValid! type";
    }
}
?>