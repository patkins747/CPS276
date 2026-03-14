<?php
class Directories{
    public function createDir($directoryName, $content){
        if(is_dir("directories/$directoryName")){
            return "<p>A directory already exists with that name.</p>";
        }
        else{
            $success = mkdir("directories/$directoryName");
            if($success){
                chmod("directories/$directoryName", 0777);
                $success2 = file_put_contents("directories/$directoryName/readme.txt", $content);
                if($success2 === false){
                    return "<p>File could not be created.</p>";
                }
                else{
                    return "<p>File and directory were created</p><p><a target='_blank' href='directories/$directoryName/readme.txt'>Path where file is located</a></p>";
                }
            }
            else{
                return "<p>Directory could not be created.</p>";
            }
            
        }
    }
}

?>