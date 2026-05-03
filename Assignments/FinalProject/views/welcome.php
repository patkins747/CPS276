<?php
//session_start();
if($_SESSION['access'] !== "accessGranted"){
  header('Location: index.php');
}

function init(){

 $name = $_SESSION['name'];

return<<<HTML

<div class="container mt-5">

<H1>Welcome Page</H1>
<H5>Welcome {$name}</h5>

</div>
HTML;

}

?>