<?php
if(isset($_POST['upload'])){
    $target = "uploads/".basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    echo "File uploaded";
}
?>

<form method="post" enctype="multipart/form-data">
    Upload racer image:
    <input type="file" name="file">
    <button name="upload">Upload</button>
</form>
