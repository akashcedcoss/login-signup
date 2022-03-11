<?php
    class Checkout
    {
        public function checkoutP($fname, $lname, $username, $address, $country, $state, $zip, $pname, $pprice)
        {
            $sql = "INSERT INTO checkout (fname, lname, username, address, country, state, zip, pname, pprice)
                    VALUES ('".$fname."', '".$lname."', '".$username."', '".$address."', '".$country."', '".$state."', '".$zip."','".$pname."', '".$pprice."' )";
             $stmt = DB::getInstance()->prepare($sql);
             $stmt->execute();
            
        }
    }
?>


