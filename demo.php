<?php 
    if(isset($_POST['btn-upload'])) {
        if($_FILES['file']['error'] == 0) {
            $fileName = $_FILES['file']['name'];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            // echo $fileType;
            $newName = time() . '.' . $fileType;
            $folder = 'uploads/';
            $location = $folder . $newName;
            echo $location;

            move_uploaded_file($_FILES['file']['tmp_name'], $location);
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" multiple>
        <button name="btn-upload">upload</button>
    </form>
</body>
</html>
