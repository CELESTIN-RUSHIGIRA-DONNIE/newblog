<?php 

    if( $_SESSION['auth_role'] != '2')
    {
        $_SESSION['message'] = "You are not authorised as super admin";
        header("Location: index.php");
        exit(0);
    }

?>