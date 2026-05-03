<?php

$path = "index.php?page=login";

require_once('includes/security.php');



if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        $nav = sess();
        require_once('views/addContactForm.php');
        $content = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        $nav = sess();
        require_once('views/deleteContactsTable.php');
        $content = init();
    }
    else if($_GET['page'] === "addAdmin"){
        $nav = sess();
        require_once('views/addAdminForm.php');
        $content = init();
    }
    else if($_GET['page'] === "deleteAdmins"){
        $nav = sess();
        require_once('views/deleteAdminsTable.php');
        $content = init();
    }

    else if($_GET['page'] === "welcome"){
        $nav = sess();    
        require_once('views/welcome.php');
        
        $content = init();

    }
    else if($_GET['page'] === "login"){
        require_once('views/loginForm.php');
        $content = init();

    }   

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}
?>