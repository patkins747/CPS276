<?php
function addClearNames(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['clearNames'])) {
            return "";
        } elseif (isset($_POST['addName'])) {
            if (isset($_POST['enterName'])){
                $nameField = explode(' ',$_POST['enterName']);
                $newName = $nameField[1].", ".$nameField[0];
                $newName = ucwords($newName);
                if(isset($_POST['nameList'])){
                    $nameList = $_POST['nameList'];
                    $nameArray = explode("\n", $nameList);
                    array_push($nameArray, $newName);
                    sort($nameArray,SORT_NATURAL);
                    $nameList = implode("\n",$nameArray);
                    
                }
                else{
                    $nameList = $newName;
                }

        
                return $nameList;
            }        
        }
    }
    return "";
}
?>