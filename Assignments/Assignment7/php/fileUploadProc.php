<?php
require_once 'classes/Pdo_methods.php';
class fileUploadProc{
    public function fileUpload(){
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fileName =  $_POST['fileName'];
        if(str_ends_with($fileName, '.pdf') == false){
            $fileName .= '.pdf';
        }
        $file = $_FILES['file'];
        $handle = $file["tmp_name"];
        if(mime_content_type($handle) != "application/pdf" or $file["size"] > 100000){
            return "<p>Incorrect file type or size submitted.</p>";
        }
        else{
            if(move_uploaded_file($handle, "files/$fileName")){
                $filePath = "files/".$fileName;
                $pdo = new PdoMethods();
                $sql = "REPLACE INTO assignment7 (fileName, filePath) values (:fName, :fPath)";
                $bindings = [['fName', $fileName, 'str'],['fPath', $filePath, 'str']];
                $result = $pdo->otherBinded($sql, $bindings);
                if($result === 'error'){
                   return "<p>There was an error updating the database.</p>";
                }
                else{
                   return "<p>File has been added.</p>";
                }
            }
            else{
                return "<p>There was an error uploading the file</p>";
            }
        }
       }
       else{
           return "";
       }
    }
}