<?php
    $password = $_REQUEST['password'];

    $specialChar = false;
    $uppercaseLetter = false;
    $lowercaseLetter = false;
    $number = false;

    for ($i = 0; $i < strlen($password); $i++) {
        $char = $password[$i];
        
        if (!ctype_alnum($char)) {
            $specialChar = true;
        }
        
        if (ctype_upper($char)) {
            $uppercaseLetter = true;
        }
        
        if (ctype_lower($char)) {
            $lowercaseLetter = true;
        }
        
        if (ctype_digit($char)) {
            $number = true;
        }
    }

    if ($specialChar && $uppercaseLetter && $lowercaseLetter && $number) {
        echo " Strong password.";
    }elseif (($specialChar && $uppercaseLetter) || ($specialChar && $lowercaseLetter) || ($lowercaseLetter && $number) || ($uppercaseLetter && $number) || ($specialChar && $number) ||(($uppercaseLetter || $lowercaseLetter) && $specialChar)) {
        echo " Moderate password.";
    }else{
        echo "Weak password.";
    }
?>
