<?php
if($_SESSION['access'] !== "accessGranted"){
  header('Location: index.php');
}

require_once 'controllers/deleteContactProc.php';

function init(){
    global $records, $msg, $deleted;
    if(count($records) === 0){
        $msg = "<p></p>";
        $output = "<p>There are no records to display</p>";
    }
    else {
        $output = <<<HTML

        <form method='post' action='index.php?page=deleteContacts'>
            <input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><br><table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Contact</th>
                    <th>Age</th>
                    <th>Delete</th>
                </tr>
            </thead>
        <tbody>

HTML;

        foreach($records as $row){
            $dob = date('m/d/Y',$row['dob']);
            $contactArr = explode('_', $row['contacts']);
            $thisContact = '';
            $thisCount = count($contactArr);
            for($i=0; $i<$thisCount; $i++){
                $thisContact.= $contactArr[$i].'<br>';
            }
            switch($row['age']){
                case 'ag1':
                    $age = '0-17';
                    break;
                case 'ag2':
                    $age = '18-30';
                    break;
                case 'ag3':
                    $age = '30-50';
                    break;
                default:
                    $age = '50+';
            }
            $output .= "<tr><td>{$row['fname']}</td>
            <td>{$row['lname']}</td>
            <td>{$row['address']}</td>
            <td>{$row['city']}</td>
            <td>{$row['state']}</td>
            <td>{$row['zip']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['email']}</td>
            <td>{$dob}</td>
            <td>{$thisContact}</td>
            <td>{$age}</td>
            <td><input type='checkbox' name='chkbx[]' value='{$row['id']}' /></td></tr>";
        }

        $output .= "</tbody></table></form>";

        if($records == "error"){
            $msg = "<p style='color:red'>Could not display records</p>";
        }
        else {
            if(!$deleted){
                $msg = "<p>&nbsp;</p>";
            }
            else {
                $msg = "<p style='color: green'>Contact(s) deleted</p>";
            }
            
        }
        
    }

    return $msg.$output;
}