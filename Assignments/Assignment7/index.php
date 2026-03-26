<?php
require_once 'php/fileUploadProc.php';
$upload = new fileUploadProc();
$result = $upload->fileUpload();

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
 <p><a href="listFiles.php">Show File List</a></p>      

    <?php echo $result ?>
      <form method="post" action="index.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fileName">File Name</label>
          <input type="text" class="form-control" id="fileName" name="fileName" >
        </div>
        <div class="form-group">
          <input type="file" name="file">
        </div>
        <button type="submit" name="fileUpload" class="btn btn-primary">Upload File</button>
      </form>
 </body>
 </html>