<?php
    class Admin extends DB{
    function fetchData(){
        $sql = "SELECT * FROM users 
                WHERE role != Admin";
            $stmt = DB::getInstance()->prepare($sql);
            $stmt->execute();
            $rsult = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
            
    }
}