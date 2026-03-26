<?php
require_once 'classes/Pdo_methods.php';
class listFilesProc{
    public function listFiles(){
        $pdo = new PdoMethods();
        $sql = "SELECT * FROM assignment7 ORDER BY id";
        $result = $pdo->selectNotBinded($sql);
        if($result === false){
            return "<p>There was an error reading from the database</p>";
        }
        else{
            $list = "<ul>";
            foreach($result as $item){
                $list .= "<li><a target='_blank' href='".$item['filePath']."'>".$item['fileName']."</a></li>";
            }
            $list .= "</ul>";
            return $list;
        }
        
    }
}