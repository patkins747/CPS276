<?php
$output = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 require_once 'processNames.php';
 $output = addClearNames();
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
        <div class="col-12">
        <button type="submit" class="btn btn-primary" name="addName">Add Name</button>
        <button type="submit" class="btn btn-primary" name="clearNames">Clear Names</button>
        </div>
        <label for="enterName" class="form-label">Enter Name</label>
        <input type="text" class="form-control" name="enterName" id="enterName">
    </div>
    <label for="nameList" class="form-label">List of Names</label>
    <textarea style="height: 500px;" class="form-control" id="nameList" name="nameList"><?php echo $output ?></textarea>
   </form>
</body>
<!--
1. What is the purpose of separating the functionality between index.php and processNames.php in this assignment?

2. How does the $_SERVER["REQUEST_METHOD"] variable help determine when to process form submissions in PHP?

3. How does PHP handle string-to-array conversion using the explode function, and why is this useful in this application?

4. What role does the implode function play in formatting the output for the textarea?

5. How does processNames.php determine whether to add a new name or clear all names based on which button was clicked?

-->