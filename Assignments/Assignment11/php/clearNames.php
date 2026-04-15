<?php
//WRITE YOUR CODE HERE
require_once '../classes/Pdo_methods.php';
$pdo = new PdoMethods();

$sql = "TRUNCATE TABLE assignment11";
$result = $pdo->otherNotBinded($sql);
if($result === 'error'){
    echo json_encode(["error" => "There was an error updating the database."]);
}
else{
    echo json_encode(["msg" => "Table has been truncated"]);
}

?>