<?php
$output = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 require_once 'processNames.php'>
 $output = addClearNames();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Name List</title>
</head>
<body class="container">
    <form class="row g-3" action="#" method="POST">
    <div class="row g-3">
        <h1>Add Names</h1>
        <button type="submit" class="btn btn-primary" name="addName">Add Name</button>
        <button type="submit" class="btn btn-primary" name="clearNames">Clear Names</button>
        <label for="enterName" class="form-label">Enter Name</label>
        <input type="text" class="form-control" name="enterName" id="enterName">
    </div>
    <textarea style="height: 500px;" class="form-control" id="namelist" name="namelist"><?php echo $output ?></textarea>
   </form>
</body>