<?php
require_once 'classes/Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Add Note</title>
</head>
<body>
<div class="container">

<h1>Add Note</h1>
 <p><a href="display_notes.php">Display notes</a></p>      

    <?php echo $notes ?>
      <form method="post" action="index.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="dateTime">Date and Time</label>
          <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
        </div>
        <div class="form-group">
          <label for="note">Note</label>
          <textarea name="note" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" name="addNote"  class="btn btn-primary" value="Add Note">
        </div>
      </form>
 </body>
 </html>