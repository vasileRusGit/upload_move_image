<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="Styles/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="Styles/bootstrap-responsive.min.css" />
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.js"></script>
        <script src="js/js.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <div id="banner">             
            </div>

            <!--    navigation area-->
            <nav id="navigation" class="navbar navbar-inverse">
                <ul id="nav">
                    <div id="navigation-menu" class="ontainer-fluid">
                        <ul class="nav navbar-nav" id="navbar">
                            <li><a class="hover" href="index.php">Home</a></li>
                            <li><a class="menu" href="Coffee.php">Coffee</a></li>
                            <li><a class="menu" href="Shop.php">Shop</a></li>
                            <li><a class="menu" href="About.php">About</a></li>
                            <li><a class="menu" href="Management.php">Management</a></li>
                        </ul>
                    </div>
                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                
            </div>
            
            <footer>
                <p>All rights reserved</p>
            </footer>
        </div>
    </body>
</html>
