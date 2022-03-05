<?php
    class Admin extends DB{
    function fetchData(){
        $sql = "SELECT * FROM users 
                WHERE role != 'Admin'";
            $stmt = DB::getInstance()->prepare($sql);
            $stmt->execute();
            $rsult = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
            
    }
    public function deleteUser($id, $table){
        $sql = "DELETE FROM ".$table." WHERE id = ".$id."";
        DB :: getInstance()->exec($sql);

    }
    public function approve($id,$action){
        $sql = "UPDATE `users` SET `status` = 'Approved' WHERE `users`.`id` = $id";
        DB :: getInstance()->exec($sql);
    }
    public function restrict($id,$action){
        $sql = "UPDATE `users` SET `status` = 'Not Approved' WHERE `users`.`id` = $id";
        DB :: getInstance()->exec($sql);
    }
    
}