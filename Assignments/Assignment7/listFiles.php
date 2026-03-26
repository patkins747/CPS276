<?php
require_once 'php/listFilesProc.php';
$fileList = new listFilesProc();
$result = $fileList->listFiles();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>File upload</title>
</head>
<body>
<div class="container">

<h1>File upload</h1>
 <p><a href="index.php">Add File</a></p>      

    <?php echo $result ?>
     
    </div>
 </body>
 </html>