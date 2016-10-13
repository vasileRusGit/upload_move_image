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

// part2
<?php
$databaseConnection = new PDO('mysql:host=localhost;dbname=datatables_crud;charset=utf8', 'root', '');

var_dump($_POST);
var_dump($_FILES);

//$fileTmp = $_FILES['image_file_input']['tmp_name'];
//$fileName = $_FILES['image_file_input']['name'];
//$fileType = $_FILES['image_file_input']['type'];
//$filePath = 'images/' . $fileName;
//
//move_uploaded_file($fileTmp, $filePath);

if (0 < $_FILES['file']['error']) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {
    $filePath = 'images/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
}

$sql = "INSERT INTO image_upload(image) VALUE('$filePath')";
$query = $databaseConnection->prepare($sql);
$query->execute();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="css/sweetalert2.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <!--<link rel="stylesheet" href="css/bootstrap.min.css"/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    </head>
    <body onload="viewData()">

        <div class="container">
            <p></p> 
            <button class="btn btn-primary" data-toggle="modal" data-target='#addData'>Insert Data</button>

            <!-- Modal -->
            <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <form method="post" class="form_cnvc">
                            <input id="sortpicture" type="file" name="sortpic" />
                            <button id="upload">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $databaseConnection = mysqli_connect("localhost", "root", "", "datatables_crud");
    $sql = "SELECT * FROM image_upload";
    $result = mysqli_query($databaseConnection, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<img src='" . $row['image'] . "'>"; //'image' is the name from the database
    }
    ?>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/index.js"></script>
    <script src="/js/ajaxupload.js" type="text/javascript"></script>
    <script>
        $('#upload').on('click', function () {
            var file_data = $('#sortpicture').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: 'http://localhost:8080/play.php', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function () {
                    alert('work');
                }
            });
        });
    </script>


</body>
</html>

