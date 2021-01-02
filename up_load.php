<?php 
    if(isset($_FILES['ok'])) {
        $fileName = $_FILES['ok']['name'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newName = time() . '.' . $fileType;
        $fileTmp = $_FILES['ok']['tmp_name'];
        $location = 'uploads/' . $newName;

        if(move_uploaded_file($fileTmp, $location)) {
            $con = new mysqli('localhost', 'root', '', 'test');
            $sql = "insert into up_file(file_name) values('{$newName}')";
            $stmt = $con->prepare($sql);
            if($stmt->execute()) {
                echo "THÀNH CÔNG";
            }
            else {
                echo 'error osask sdsd';
            }
        }
    }
?>
