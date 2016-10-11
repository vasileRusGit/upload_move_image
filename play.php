<?php
//$resorce = opendir('Images/Coffee/');
//
//while(($entry = readdir($resorce)) != false){
//    echo $entry.'<br/>';
//}

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
