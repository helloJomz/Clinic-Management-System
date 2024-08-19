<?php

// FOR ALLERGY      
if(isset($_POST['foodallergy'])){
    $allergy1  = implode(", ", $_POST['foodallergy']);
}else{
    $allergy1 = null;
}

if(isset($_POST['drugallergy'])){
    $allergy2  = implode(", ", $_POST['drugallergy']);
}else{
    $allergy2 = null;
}

if(isset($_POST['substanceallergy'])){
    $allergy3  = implode(", ", $_POST['substanceallergy']);
}else{
    $allergy3 = null;
}

// FOR MEDICAL HISTORY
if(!empty($_POST['reason']) || !empty($_POST['reasondate'])){
    $reason         = $_POST['reason'];
    $reasondate     = $_POST['reasondate'];
}else{
    $reason         = null;
    $reasondate     = null;
}

if(isset($_POST['existingcondition'])){
    $existingcondition  = implode(", ", $_POST['existingcondition']);
}else{
    $existingcondition  = null;
}

$medication = $_POST['medication'];
$EmptyTestArray1 = array_filter($medication);
$medication1 = $_POST['medication'];

if(!empty($EmptyTestArray1)){
    $tmpMed = implode(", ", $medication1);
    $realMedications = $tmpMed;
}else{
    $realMedications = null;
}

// FOR PHYSICAL EXAMINATION
if(isset($_POST['bp'])){
    $bp = $_POST['bp'];
}else{
    $bp = 'normal';
}

if(isset($_POST['tb'])){
    $tb = $_POST['tb'];
}else{
    $tb = 'normal';
}

if(isset($_POST['hcthgb'])){
    $hcthgb = $_POST['hcthgb'];
}else{
    $hcthgb = 'normal';
}

if(isset($_POST['temp'])){
    $temp = $_POST['temp'];
}else{
    $temp = 'normal';
}

if(isset($_POST['fbg'])){
    $fbg = $_POST['fbg'];
}else{
    $fbg = 'normal';
}

if(isset($_POST['pulse'])){
    $pulse = $_POST['pulse'];
}else{
    $pulse = 'normal';
}

if(isset($_POST['uri'])){
    $uri = $_POST['uri'];
}else{
    $uri = 'normal';
}

if(isset($_POST['chickenpox'])){
    $chickenpox = $_POST['chickenpox'];
}else{
    $chickenpox = 'normal';
}

if(isset($_POST['tetanus'])){
    $tetanus = $_POST['tetanus'];
}else{
    $tetanus = 'normal';
}

if(isset($_POST['mmr'])){
    $mmr = $_POST['mmr'];
}else{
    $mmr = 'normal';
}






?>