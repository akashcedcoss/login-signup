<?php
    class Cart
    {
        function fetchData($id){
        $sql = "SELECT * FROM product
                where id = $id ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $rsult = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function quantity() {

    }

}


?>