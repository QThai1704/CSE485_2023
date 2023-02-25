<?php
    include('../connect.php');


   
    
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $txtCatName = $_POST['txtCatName'];
    //     $txtCatId = $_POST['txtCatId'];
        
    //     $slq_update = "UPDATE theloai SET ten_tloai=:ten_tloai WHERE ma_tloai=:id; ";
    //     $result_update = pdo($pdo,$slq_update,['ten_tloai' => $txtCatName, 'id' => $txtCatId]);

    //     $sql_select = "SELECT * FROM theloai";
    //     $count = pdo($pdo,$sql_select)->rowCount();
    //     $txtCatName_Ins = $_POST['txtCatName_Ins'];
        
    //     $sql_insert = "INSERT INTO theloai VALUE (:result_count,:txtCatName)";
    //     $result = pdo($pdo,$sql_insert,['result_count' => $count + 1 ,'txtCatName' => txtCatName_Ins]);

    // }

    $tloai = filter_input_array(INPUT_POST);

    if(isset($tloai['txtCatId'])){
        if(isset($tloai['txtCatName'])){
            $slq_update = "UPDATE theloai SET ten_tloai=:ten_tloai WHERE ma_tloai=:id; ";
            $result_update = pdo($pdo,$slq_update,['ten_tloai' => $tloai['txtCatName'], 'id' => $tloai['txtCatId']]);
        }
        else{
        }
    }
    else{
        
    $sql_select = "SELECT * FROM theloai";
    $count = pdo($pdo,$sql_select)->rowCount();
    
    $sql_insert = "INSERT INTO theloai VALUE (:result_count,:txtCatName)";
    $result = pdo($pdo,$sql_insert,['result_count' => $count + 1 ,'txtCatName' => $tloai['txtCatName']]);
    }

  

   



   

    



    


?>