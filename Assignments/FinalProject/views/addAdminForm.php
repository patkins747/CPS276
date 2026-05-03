<?php

if($_SESSION['access'] !== "accessGranted" or $_SESSION['status'] !== "admin"){
  header('Location: index.php?page=welcome');
}
require_once 'controllers/addAdminProc.php';
function init(){
  global $formConfig, $stickyForm, $acknowledgment;

return<<<HTML
{$acknowledgment}
<div class="container mt-5">

<H1>Add Admin</H1>
    <form method="post" action="">
        <div class="row">
            <!-- Render first name field -->
            <div class="col-md-6">
                {$stickyForm->renderInput($formConfig['firstName'], 'mb-3')}
            </div>
            <!-- Render last name field -->
            <div class="col-md-6">
                {$stickyForm->renderInput($formConfig['lastName'], 'mb-3')}
            </div>
        </div>
        <div class="row">
            <!-- Render email field -->
            <div class="col-md-4">
                {$stickyForm->renderInput($formConfig['email'], 'mb-3')}
            </div>
            <!-- Render password field -->
            <div class="col-md-4">
                {$stickyForm->renderInput($formConfig['password'], 'mb-3')}
            </div>
            <!-- Render status select box -->
            <div class="col-md-4">
                {$stickyForm->renderSelect($formConfig['status'], 'mb-3')}
            </div> 
        </div>
          

        <input type="submit" class="btn btn-primary" value="Add Admin">
    </form>
</div>

HTML;

}

?>