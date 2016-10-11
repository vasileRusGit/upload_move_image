<?php

$databaseConnection = new PDO('mysql:host=localhost;dbname=datatables_crud;charset=utf8', 'root', '');


$fileTmp = $_FILES['fileName']['tmp_name'];
$fileName = $_FILES['fileName']['name'];
$fileType = $_FILES['fileName']['type'];
$filePath = 'Images/Coffee/' . $fileName;

move_uploaded_file($fileTmp, $filePath);

$sql = "INSERT INTO image_upload(image) VALUE('$filePath')";
$query = $databaseConnection->prepare($sql);
$query->execute();
?>

<form action="play.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileName"><br/>
    <input type="submit" name="moveFile" value="Upload">
</form>

<?php
$databaseConnection = mysqli_connect("localhost", "root", "","datatables_crud");
$sql = "SELECT * FROM image_upload";
$result = mysqli_query($databaseConnection, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<img src='" . $row['image'] . "'>"; //'image' is the name from the database
}
?>
if ($page == 'add') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $roast = $_POST['roast'];
    $country = $_POST['country'];
    $review = $_POST['review'];
    $image = $_POST['file'];

    $result2 = explode('.', $image);
    $name = $result2[count($result2) - 2];
    $name = explode("\\", $name);
    $name = $name[count($name) - 1];

    $result = explode('.', $image);
    $ext = $result[count($result) - 1];
    $file_name = $name . '.' . $ext;
    $url = "Images/Coffee/" . $name . '.' . $ext;

    if (in_array($ext, array('gif', 'jpg', 'jpeg', 'png'))) {
//        if (is_upload ed_file($name)) {
        move_uploaded_file($file_name, "Images/Coffee/");
        $query = $databaseConnection->prepare("INSERT INTO coffee(name, type , price, roast, country,image, review, deleted) VALUES('$name', '$type', '$price', '$roast', '$country', '$url', '$review', '0')");
        $query->execute();
    }
//        }
//}

