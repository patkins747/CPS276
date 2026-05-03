<?php
require_once 'controllers/loginProc.php';
function init(){
  global $formConfig, $stickyForm, $acknowledgment;

return<<<HTML
{$acknowledgment}
<div class="container mt-5">

<H1>Login</H1>
    <form method="post" action="">
        <div class="row">
            <!-- Render email field -->
            <div class="col-md-6">
                {$stickyForm->renderInput($formConfig['email'], 'mb-3')}
            </div>
        </div>
        <div class="row">
            <!-- Render password field -->
            <div class="col-md-6">
                {$stickyForm->renderInput($formConfig['password'], 'mb-3')}
            </div>
        </div>
          

        <input type="submit" class="btn btn-primary" value="login">
    </form>
</div>

HTML;

}

?>