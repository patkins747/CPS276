<?php
require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');

$formConfig = [
    // First name field configuration
    'firstName' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => 'First Name',
        'name' => 'firstName',
        'id' => 'firstName',
        'errorMsg' => null,//if this is set to null then the default error message will appear
        'error' => '',
        'required' => true,
        'value' => ''
    ],
    // Last name field configuration
    'lastName' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => 'Last Name',
        'name' => 'lastName',
        'id' => 'lastName',
        'errorMsg' => 'You must enter a valid last name.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],
    // Email field configuration
    'email' => [
        'type' => 'text',
        'regex' => 'email',
        'label' => 'Email',
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
        'label' => 'Password',
        'name' => 'password',
        'id' => 'password',
        'errorMsg' => 'Password must contian at least 8 characters with 1 uppercase, 1 symbol, and 1 number.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],
    'status' => [
        'type' => 'select',
        'label' => 'Status',
        'name' => 'status',
        'id' => 'status',
        'errorMsg' => 'You must select a status.',
        'error' => '',
        'selected' => '',
        'required' => true,
        'options' => [
            '0' => 'Please Select a Status',//The zero entry tells the script that no value was selected.
            'staff' => 'Staff',
            'admin' => 'Admin'
        ]
    ],
    // Master status for form validation
    'masterStatus' => [
        'error' => false
    ]
];

$stickyForm = new StickyForm();
$acknowledgment = '';
$blankForm = $formConfig;
//Initialize PDO for database access
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formConfig = $stickyForm->validateForm($_POST, $formConfig);
    if (!$stickyForm->hasErrors() && $formConfig['masterStatus']['error'] == false) {
        $pdo = new PdoMethods();
	    $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $email= $_POST['email'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $status = $_POST['status'];
        $sql = "REPLACE INTO admins(fname, lname, email, password, status) values (:fName, :lName, :email, :pass, :status)";
        $bindings = [['fName', $first_name, 'str'],['lName', $last_name, 'str'],['email', $email, 'str'],['pass', $password, 'str'],['status', $status, 'str']];
        $result = $pdo->otherBinded($sql, $bindings);
        if($result === 'error'){
            $acknowledgment = "<p>There was an error updating the database.</p>";
        }
        else{
            $acknowledgment = "<p>Admin has been added to the database.</p>";
            $formConfig = $blankForm;
        }
    }
}
?>