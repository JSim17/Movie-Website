<?php
    // Start session if user is logged in 
    session_start();
?>

<!doctype html>
<html>
<head>
	<title>Good Films</title>
	
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	
</head>
<body class="d-flex flex-column min-vh-100">
	
    <?php include_once'navBar.php';?>
	<div class="container-xl">
	<h1 class="text-left"><?php echo $page_title;?></h1>
    <p class="text-end">
        <?php if(isset($_SESSION['loggedin'])){
            echo "<p>Welcome " . $_SESSION['name'] . "</p>";
        }
        ?>
    </p>