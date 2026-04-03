<?php
require_once 'Pdo_methods.php';
date_default_timezone_set('America/Detroit');
class Date_time{
    public function checkSubmit(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $date = $_POST['dateTime'];
            $note = $_POST['note'];
            $timeStamp = strtotime($date);
            $pdo = new PdoMethods();
            $sql = "REPLACE INTO assignment8 (timeStamp, notes) values (:tStamp, :note)";
            $bindings = [['tStamp', $timeStamp, 'int'],['note', $note, 'str']];
            $result = $pdo->otherBinded($sql, $bindings);
            if($result === 'error'){
                return "<p>There was an error updating the database.</p>";
            }
            else{
                return "<p>Note has been added.</p>";
            }
        }
        
    }
    public function displayNotes(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $begDate = $_POST['begDate'];
            $endDate = $_POST['endDate'];
            $begTime = strtotime($begDate);
            $endTime = strtotime($endDate);
            $pdo = new PdoMethods();
            $sql = "SELECT timeStamp, notes FROM assignment8 WHERE timeStamp BETWEEN :begTime AND :endTime ORDER BY timeStamp DESC";
            $bindings = [['begTime', $begTime, 'int'],['endTime', $endTime, 'int']];
            $result = $pdo->selectBinded($sql, $bindings);
            if($result === false){
                return "<p>There was an error reading from the database</p>";
            }
            else{
                if(count($result) > 0){
                    $table = '<table class="table table-bordered table-hover"><tr><th>Date and Time</th><th>Note</th></tr>';
                    foreach($result as $item){
                        $thisTime = date('n/d/Y h:i a', $item['timeStamp']);
                        $table .= "<tr><td>".$thisTime."</td><td>".$item['notes']."</td></tr>";
                    }
                    $table .= "</table>";
                    return $table;
                }
                else{
                    return "<p>There are no matching records in the database</p>";
                }
            }
        }
    }
}