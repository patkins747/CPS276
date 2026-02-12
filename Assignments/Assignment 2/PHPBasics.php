<?php
$array = [1];
for($i=2; $i<=50; $i++){
    array_push($array,$i);
}
$evenNumbers = '<p>Even Numbers: ';
    foreach($array as $num)
    if($num % 2 == 0){
        $evenNumbers .= "$num - ";
    }
$evenNumbers = trim($evenNumbers, ' - ');
$evenNumbers .= "</p>";

$form = <<<html
<form class="row g-3" action="#" method="POST">
    <div class="row g-3">
      <label for="inputEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="inputEmail">
  </div>
  <div class="row g-3">
    <label for="textArea" class="form-label">Example textarea</label>
    <textarea class="form-control" name="email" id="textArea">
    </textarea>
  </div>    
</form>
html;

function createTable($rows, $columns){
    $table = '<table class="table table-bordered table-hover">';
    for($i=1; $i<=$rows; $i++){
        $table .= "<tr>";
        for($j=1; $j<=$columns; $j++){
            $table .= "<td>Row $i, Col $j</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";
    return $table;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>PHP Basics</title>
</head>
<body class="container">
    <?php
        echo $evenNumbers;
        echo $form;
        echo createTable(8, 6);
    ?>
</body>
<!--
1. The assignment specifies that "all PHP written at the top above the HTML Doctype". 
    Explain the implications of this placement on how the server processes the page. 
    What advantage does generating all PHP variables ($evenNumbers, $form, $table) before any HTML output provide in terms 
    of execution flow?

2. Beyond simply finding even numbers, describe a scenario where you would use a similar foreach loop with a conditional 
    (if) statement to filter or process elements from an array based on different criteria like finding all numbers divisiable by 7

3. Discuss the primary benefits of using heredoc for embedding large blocks of HTML or other text within PHP strings, 
    especially when that text contains quotes or multiple lines. How does it improve code readability compared to 
    concatenating strings with double quotes?

4. The createTable function uses nested for loops to build the table. Describe the role of each loop: which one is 
    responsible for iterating through the rows, and which for the columns? How does the concatenation (.=) 
    inside these loops incrementally build the complete HTML table string?

5. The createTable() function returns a string that is later echoed, rather than echoing directly inside the function. 
    Explain the benefits of this approach. How does returning a value make the function more reusable and flexible 
    compared to having the function echo directly? What are the implications for testing or reusing this function in 
    different contexts?

-->
    </html>