<?php
//WRITE YOUR CODE HERE
require_once '../classes/Pdo_methods.php';
$pdo = new PdoMethods();

$sql = "SELECT * FROM assignment11 ORDER BY id";
$result = $pdo->selectNotBinded($sql);
if($result === false){
    echo json_encode(["Error" => "There was an error reading from the database"]);
}
else{
    if(count($result) > 0){
        $list = "";
        foreach($result as $item){
            $list .= "<p>".$item['name']."</p>";
        }
        echo json_encode(["names" => $list]);
    }
    else{
        echo json_encode( ["names" => ""]);
    }
}

?>