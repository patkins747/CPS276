<?php


$result="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "classes/Directories.php";
    $directryName = $_POST['directoryName'];
    $fileContent = $_POST['fileContent'];
    $directory = new Directories();
    $result = $directory->createDir($directryName, $fileContent);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>File and Directory</title>
</head>
<body class="container">

<h1>File and Directory Assignment</h1>
 <p>Enter a folder name and the contents of a file.  Folder names should contain alpha numeric characters only.</p>      

    <?php echo $result ?>
      <form method="post" action="index.php">
        <div class="form-group">
          <label for="folderName">Folder Name</label>
          <input type="text" class="form-control" id="folderName" name="directoryName">
        </div>
        <div class="form-group">
          <label for="fileContent">File Content</label>
          <textarea id="fileContent" name="fileContent" class="form-control" cols="20" rows="6"></textarea>
          
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </form>
 </body>
 </html>
 <!---
    1. Explain the difference between creating a directory and creating a file in PHP. 
        ◦ What PHP functions are used for each operation, and why is it important to check if a directory already exists before attempting to create it?
      2. Describe the flow of data from an HTML form submission to PHP processing. 
        ◦ How does PHP access form data, and what considerations should developers keep in mind when handling user input from forms?
      3. Why is it important to properly close file handles after writing to files? 
        ◦ What problems can occur if file handles are not closed, and how does this relate to system resource management?
      4. Why did we use 777 permissions and what should we use and why.
      5. Explain the benefits of organizing file and directory operations into a class structure.
        ◦ How does this approach improve code organization, reusability, and maintainability compared to writing all operations in procedural code?
--->