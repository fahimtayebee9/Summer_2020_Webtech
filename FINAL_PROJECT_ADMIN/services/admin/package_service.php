<?php
    require_once('../../../db/config.php');
    function get_all(){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from package";
        $result = mysqli_query($conn, $sql);

        $packages = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($packages, $row);
        }
        
        return $packages;
    }

    function getData_byType($type){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from package where type='$type'";
        $result = mysqli_query($conn, $sql);

        $packages = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($packages, $row);
        }
        
        return $packages;
    }

    function getData_byId($id){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from package where id='$id'";
        $result = mysqli_query($conn, $sql);

        $package = [];

		while($row = mysqli_fetch_assoc($result)){
            array_push($package, $row);
        }
        
        return $package;
    }

    function removePackage($id){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }
        $package = null;
        $sql = "delete from package where id='$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $package = $row ;
        }
        return $package;
    }

    function update($package){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "update package set name='{$package[1]}', type='{$package[2]}', facility='{$package[3]}', price='{$package[4]}', available='{$package[5]}' where id='{$package[0]}'";
        $result = mysqli_query($conn,$sql);

        return $result;
    }

    function insert($object){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "insert into package  (id,name,type,facility,price,available) values('','{$object->name}','{$object->type}','$object->facility','{$object->price}','{$object->available}')";
        $result = mysqli_query($conn,$sql);

        return $result;
    }
?>