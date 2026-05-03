<?php

require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');

$acknowledgment = "<p></p>";//I use $acknowledgment as a placeholder because sometimes it has data and sometimes it does not and if it does not I don't want the space to collapse. 

$formConfig = [
    'first_name' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => 'First Name',
        'name' => 'first_name',
        'id' => 'first_name',
        'errorMsg' => 'You must enter a valid first name',
        'error' => '',
        'required' => true,
        'value' => 'Scott'
    ],
    'last_name' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => 'Last Name',
        'name' => 'last_name',
        'id' => 'last_name',
        'errorMsg' => 'You must enter a valid last name.',
        'error' => '',
        'required' => true,
        'value' => 'Shaper'
    ],
    'address' => [
        'type' => 'text',
        'regex' => 'address',
        'label' => 'Address',
        'name' => 'address',
        'id' => 'address',
        'errorMsg' => 'You must enter a valid address.',
        'error' => '',
        'required' => true,
        'value' => '123 Anyplace'
    ],
    'city' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => 'City',
        'name' => 'city',
        'id' => 'city',
        'errorMsg' => 'You must enter a valid name.',
        'error' => '',
        'required' => true,
        'value' => 'Cityname'
    ],
    'state' => [
        'type' => 'select',
        'label' => 'State',
        'name' => 'state',
        'id' => 'state',
        'errorMsg' => 'You must select a state.',
        'error' => '',
        'selected' => 'mi',
        'required' => true,
        'options' => [
            '0' => 'Please Select a State',
            'ca' => 'California',
            'tx' => 'Texas',
            'mi' => 'Michigan',
            'ny' => 'New York',
            'fl' => 'Florida'
        ]
    ],  
    'zip_code' => [
        'type' => 'text',
        'regex' => 'zip',
        'label' => 'Zip Code',
        'name' => 'zip_code',
        'id' => 'zip_code',
        'errorMsg' => 'You must enter a valid zip code.',
        'error' => '',
        'required' => true,
        'value' => '12345'
    ],  
    'phone' => [
        'type' => 'text',
        'regex' => 'phone',
        'label' => 'Phone',
        'name' => 'phone',
        'id' => 'phone',
        'errorMsg' => 'You must enter a valid phone number.',
        'error' => '',
        'required' => true,
        'value' => '999.999.9999'
    ],
    'email' => [
        'type' => 'text',
        'regex' => 'email',
        'label' => 'Email',
        'name' => 'email',
        'id' => 'email',
        'errorMsg' => 'You must enter a valid email address.',
        'error' => '',
        'required' => true,
        'value' => 'sshaper@wccnet.edu'
    ],
    'dob' => [
        'type' => 'text',
        'regex' => 'dob',
        'label' => 'Date of Birth',
        'name' => 'dob',
        'id' => 'dob',
        'errorMsg' => 'Date format should be mm/dd/yyyy.',
        'error' => '',
        'required' => true,
        'value' => 'mm/dd/yyyy'
    ],
    'age' => [
        'type' => 'radio',
        'label' => 'Choose an Age Range',
        'name' => 'age',
        'id' => 'age',
        'errorMsg' => 'You must select an age range.',
        'error' => '',
        'required' => true,
        'options' => [
            ['value' => 'ag1', 'label' => '0-17', 'checked' => false],
            ['value' => 'ag2', 'label' => '18-30', 'checked' => false],
            ['value' => 'ag3', 'label' => '30-50', 'checked' => false],
            ['value' => 'ag4', 'label' => '50+', 'checked' => false]
        ],
        'layout' => 'horizontal'
    ],
    // Checkbox group configuration
    'contacts' => [
        'type' => 'checkbox',
        'label' => 'Select One or More Options',
        'name' => 'contacts',
        'id' => 'contacts',
        'errorMsg' => 'You must select at least one item.',
        'error' => '',
        'required' => true,
        'options' => [
            ['value' => 'newsletter', 'label' => 'newsletter', 'checked' => false],
            ['value' => 'email', 'label' => 'email', 'checked' => false],
            ['value' => 'text', 'label' => 'text', 'checked' => false]
        ],
        'layout' => 'horizontal'
    ],
       
    'masterStatus' => [
        'error' => false
    ]

];


// Initialize StickyForm instance
$stickyForm = new StickyForm();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $formConfig = $stickyForm->validateForm($_POST, $formConfig);
    if (!$stickyForm->hasErrors() && $formConfig['masterStatus']['error'] == false) {
      
      $pdo = new PdoMethods;

      $sql = "INSERT INTO contacts (fname, lname, address, city, state, zip, phone, email, dob, contacts, age) 
            VALUES (:fname, :lname, :address, :city, :state, :zip, :phone, :email, :dob, :contacts, :age)";
        $contacts = '';
        foreach($_POST['contacts'] as $choice){
            $contacts.= $choice.'_';
        }
        $dob = strtotime($_POST['dob']);
      $bindings = [
        [':fname',$_POST['first_name'],'str'],
        [':lname',$_POST['last_name'],'str'],
        [':address',$_POST['address'],'str'],
        [':city',$_POST['city'],'str'],
        [':state',$_POST['state'],'str'],
        [':zip',$_POST['zip_code'],'int'],
        [':phone',$_POST['phone'],'str'],
        [':email',$_POST['email'],'str'],
        [':dob',$dob,'int'],
        [':contacts',$contacts,'str'],
        [':age',$_POST['age'],'str']
      ];

      $result = $pdo->otherBinded($sql, $bindings);

      if($result === 'error'){
        $acknowledgment = '<p style="color: red">There was an error adding the record</p>'.$contacts.$dob;
      }
      else {
        $acknowledgment = '<p style="color: green">Name has been added</p>';
      }
    }  
}