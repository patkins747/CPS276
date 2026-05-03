<?php
if($_SESSION['access'] !== "accessGranted"){
  header('Location: index.php');
}

require_once 'controllers/addContactProc.php';
function init(){
  global $formConfig, $stickyForm, $acknowledgment;
  

return<<<HTML
{$acknowledgment}
<div class="container mt-5">

<p><h1>Add Contact</h1></p>
    <form method="post" action="">
        <div class="row">
            <!-- Render first name field -->
            <div class="col-md-6">
                {$stickyForm->renderInput($formConfig['first_name'], 'mb-3')}
            </div>

            <!-- Render last name field -->
            <div class="col-md-6">
                {$stickyForm->renderInput($formConfig['last_name'], 'mb-3')}
            </div>
        </div>

        <!-- Render address field -->
        <div class="row">
            <div class="col-md-12">
                {$stickyForm->renderInput($formConfig['address'], 'mb-3')}
            </div>
        </div>

        <!-- Render zip code, phone, and email fields -->
        <div class="row">
            <div class="col-md-3">
                {$stickyForm->renderInput($formConfig['city'], 'mb-3')}
            </div>
            <!-- Render state select box -->
            <div class="col-md-3">
                {$stickyForm->renderSelect($formConfig['state'], 'mb-3')}
            </div>
            <div class="col-md-3">
                {$stickyForm->renderInput($formConfig['zip_code'], 'mb-3')}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                {$stickyForm->renderInput($formConfig['phone'], 'mb-3')}
            </div>
            <div class="col-md-3">
                {$stickyForm->renderInput($formConfig['email'], 'mb-3')}
            </div>
            <div class="col-md-3">
                {$stickyForm->renderInput($formConfig['dob'], 'mb-3')}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {$stickyForm->renderRadio($formConfig['age'], 'mb-3', $formConfig['age']['layout'])}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {$stickyForm->renderCheckboxGroup($formConfig['contacts'], 'mb-3', $formConfig['contacts']['layout'])}
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Add Contact">
    </form>
</div>

HTML;

}

?>