<?php

require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');

$formConfig = [
    // Email field configuration
    'email' => [
        'type' => 'text',
        'regex' => 'none',
        'label' => 'Email',
        'name' => 'email',
        'id' => 'email',
        'errorMsg' => 'No data entered',
        'error' => '',
        'required' => true,
        'value' => 'patkins@admin.com'
    ],
    // password field configuration
    'password' => [
        'type' => 'password',
        'regex' => 'none',
        'label' => 'Password',
        'name' => 'password',
        'id' => 'password',
        'errorMsg' => 'No data emtered',
        'error' => '',
        'required' => true,
        'value' => 'Password1!'
    ],
    // Master status for form validation
    'masterStatus' => [
        'error' => false
    ]
];

$stickyForm = new StickyForm();
$acknowledgment = '';

//Initialize PDO for database access
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formConfig = $stickyForm->validateForm($_POST, $formConfig);
    if (!$stickyForm->hasErrors() && $formConfig['masterStatus']['error'] == false) {
	   
	    $pdo = new PdoMethods();
	    $sql = "SELECT email, password, fname, lname, status FROM admins WHERE email = :email";
		
		$bindings = [
			[':email', $_POST['email'], 'str']
		];
		
		$records = $pdo->selectBinded($sql, $bindings);

		/** IF THERE WAS AN RETURN ERROR STRING */
		if($records == 'error'){
			$acknowledgment = "There was an error logging in";
		}
		
		else{
			if(count($records) != 0){
	            /** IF THE PASSWORD IS NOT VERIFIED USING PASSWORD_VERIFY THEN RETURN FAILED, OTHERWISE RETURN SUCCESS, IF NO RECORDS ARE FOUND RETURN NO RECORDS FOUND. */
	            if(password_verify($_POST['password'], $records[0]['password'])){
	                session_start();
	                $_SESSION['access'] = "accessGranted";
                    $_SESSION['name'] = $records[0]['fname']." ".$records[0]['lname'];
                    $_SESSION['status'] = $records[0]['status'];
	                header("location: index.php?page=welcome");
	            }
	            else {
                    $_SESSION['access'] = "denied";
	                $acknowledgment = "There was a problem logging in with those credentials";
	            }
			}
			else {
                $_SESSION['access'] = "denied";
				$acknowledgment = "There was a problem logging in with those credentials";
			}
		}
    }
}
?>