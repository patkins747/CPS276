<?php
function sess(){
session_start();
//print_r($_SESSION);

if(isset($_SESSION['access'])){
    if($_SESSION['access'] !== "accessGranted"){
    $nav=<<<HTML
  
HTML;
    return $nav;
    }
    else{
        require_once 'includes/navigation.php';
        return $nav;
    }
}
else{
	$nav=<<<HTML
   
HTML;
}

}