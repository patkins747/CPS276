<?php
//WRITE YOUR CODE HERE
require_once '../classes/Pdo_methods.php';
$pdo = new PdoMethods();

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$rawName = $data['name'];
$nameArr = explode(" ", $rawName);
$finalName = $nameArr[1].", ".$nameArr[0];
$sql = "INSERT INTO assignment11 (name) values (:fName)";
$bindings = [['fName', $finalName, 'str']];
$result = $pdo->otherBinded($sql, $bindings);
if($result === 'error'){
    echo json_encode(["error" => "There was an error updating the database."]);
}
else{
    echo json_encode(["msg" => "Name has been added"]);
}



?>