<?php
    include('../connect.php');

    $tloai = filter_input_array(INPUT_POST);

    if(isset($tloai['txtCatId'])){
        if(isset($tloai['txtCatName'])){
            $slq_update = "UPDATE theloai SET ten_tloai=:ten_tloai WHERE ma_tloai=:id; ";
            $result_update = pdo($pdo,$slq_update,['ten_tloai' => $tloai['txtCatName'], 'id' => $tloai['txtCatId']]);
            if($result_update){
                echo "<script>alert('Chỉnh sửa thể loại thành công');</script>";
                echo "<script>window.location = 'category.php'</script>";
            }
        }
    }
    else{
    if($tloai['txtCatName'] == ''){
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
        echo "<script>window.location = 'add_category.php'</script>";
    }
    $sql_select = "SELECT * FROM theloai";
    $count = pdo($pdo,$sql_select)->rowCount();
    $sql_insert = "INSERT INTO theloai(ma_tloai, ten_tloai) VALUE (:result_count,:txtCatName)"; 
    $result = pdo($pdo,$sql_insert,['result_count' => $count + 10 ,'txtCatName' => $tloai['txtCatName']]);
    if($result){
        echo "<script>alert('Thêm thể thể loại thành công');</script>";
        echo "<script>window.location = 'category.php'</script>";
    }
    else{
        echo "<script>alert('Thêm thể thể loại không công');</script>";
        echo "<script>window.location = 'category.php'</script>";
    }
}

  

   



   

    



    


?>