<?php
require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');

// Configuration array defining the structure and validation rules for the form
$formConfig = [
    // First name field configuration
    'first_name' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => '*First Name',
        'name' => 'first_name',
        'id' => 'first_name',
        'errorMsg' => null,//if this is set to null then the default error message will appear
        'error' => '',
        'required' => true,
        'value' => ''
    ],

    // Last name field configuration
    'last_name' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => '*Last Name',
        'name' => 'last_name',
        'id' => 'last_name',
        'errorMsg' => 'You must enter a valid last name.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],
       
    // Email field configuration
    'email' => [
        'type' => 'text',
        'regex' => 'email',
        'label' => '*Email',
        'name' => 'email',
        'id' => 'email',
        'errorMsg' => 'You must enter a valid email address.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],
    // password field configuration
    'password' => [
        'type' => 'password',
        'regex' => 'password',
        'label' => '*Password',
        'name' => 'password',
        'id' => 'password',
        'errorMsg' => 'Password must contian at least 8 characters with 1 uppercase, 1 symbol, and 1 number.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],
    // Password confirm field configuration
    'password_confirm' => [
        'type' => 'password_confirm',
        'regex' => 'password_confirm',
        'label' => '*Confirm Password',
        'name' => 'password_confirm',
        'id' => 'password_confirm',
        'errorMsg' => '',
        'error' => '',
        'required' => true,
        'value' => ''
    ],
    
    
    // Master status for form validation
    'masterStatus' => [
        'error' => false
    ]
];

// Initialize StickyForm instance for form handling
$stickyForm = new StickyForm();
//Initialize PDO for database access
$pdo = new PdoMethods();
$dbResult = '';
$table = '';
$blankForm = $formConfig;
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data and update form configuration
    $formConfig = $stickyForm->validateForm($_POST, $formConfig);
    
    // Check if form is valid (no errors)
    if (!$stickyForm->hasErrors() && $formConfig['masterStatus']['error'] == false) {
       
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email= $_POST['email'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "REPLACE INTO assignment9 (first_name, last_name, email, password) values (:fName, :lName, :email, :pass)";
        $bindings = [['fName', $first_name, 'str'],['lName', $last_name, 'str'],['email', $email, 'str'],['pass', $password, 'str']];
        $result = $pdo->otherBinded($sql, $bindings);
        if($result === 'error'){
            $dbResult = "<p>There was an error updating the database.</p>";
        }
        else{
            $dbResult = "<p>You have been added to the database.</p>";
            $formConfig = $blankForm;
        }
    }
}
//Display database table contents
$sql = "SELECT * FROM assignment9";
$result = $pdo->selectNotBinded($sql);
if($result === false){
    $table = "<p>There was an error reading from the database</p>";
}
else{
    if(count($result) > 0){
        $table = '<p><table class="table table-bordered table-hover"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr>';
        foreach($result as $item){
            $table .= "<tr><td>".$item['first_name']."</td><td>".$item['last_name']."</td><td>".$item['email']."</td><td>".$item['password']."</td></tr>";
        }
        $table .= "</table></p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sticky Form Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <?php echo $dbResult; ?>
    <p>All fields are required.</p>
    <!-- Main form container -->
    <form method="post" action="index.php">
        <!-- Name fields row -->
        <div class="row">
            <!-- First name field -->
            <div class="col-md-6">
                <?php echo $stickyForm->renderInput($formConfig['first_name'], 'mb-3'); ?>
            </div>

            <!-- Last name field -->
            <div class="col-md-6">
                <?php echo $stickyForm->renderInput($formConfig['last_name'], 'mb-3'); ?>
            </div>
        </div>

        <div class="row">           
            <!-- Email field -->
            <div class="col-md-3">
                <?php echo $stickyForm->renderInput($formConfig['email'], 'mb-3'); ?>
            </div>
            <!-- Password-->
            <div class="col-md-3">
                <?php echo $stickyForm->renderInput($formConfig['password'], 'mb-3'); ?>
            </div>
            <!-- Confirm Password-->
            <div class="col-md-3">
                <?php echo $stickyForm->renderInput($formConfig['password_confirm'], 'mb-3'); ?>
            </div>
        </div>

        <!-- Submit button -->
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
    <?php echo $table;?>
</div>

</body>
</html>
