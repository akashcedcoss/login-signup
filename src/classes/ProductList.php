<?php

    class ProductList{
        
        public function addProduct($name, $category, $price){
            $sql = "INSERT INTO product (name, category, price)
                    VALUES ('".$name."', '".$category."', ".$price.")";
            DB::getInstance()->exec($sql);
            
        }
        function fetchData($query){
            $sql = "SELECT * FROM product ".$query."";
                $stmt = DB::getInstance()->prepare($sql);
                $stmt->execute();
                $rsult = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
                
        }

        function fetchEditData($id){
            $sql = "SELECT * FROM product
                    WHERE id = ".$id."";
                $stmt = DB::getInstance()->prepare($sql);
                $stmt->execute();
                $rsult = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
                
        }


        public function deleteProduct($id, $table){
            $sql = "DELETE FROM ".$table." WHERE id = ".$id."";
            DB :: getInstance()->exec($sql);
    
        }
        public function updateProduct($id, $name, $category, $price){

            $sql = "UPDATE product SET name = '".$name."', category = '".$category."', price = ".$price." WHERE id = ".$id."";
            DB::getInstance()->exec($sql);
            
        }
    }
?>