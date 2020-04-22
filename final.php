<?php 
include 'assets/include.php';
$postedData = $_SESSION['formPostData'];
if(isset($_SESSION['formPostData']))
{
    $postedData = $_SESSION['formPostData'];
    unset($_SESSION['formPostData']);
}
else
{
    header('Location: index.php');   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Fundamentals</title>
	<link href="assets/styles.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="assets/mail.png">
                
    </head>
    <body>
		<div id="Header">
                    <img src="assets/mail.png" border="0" alt="">
			<h2>
				Mailing List Information
			</h2>
		</div>        
        <div id="Body">
            <div>
                <label>Favorite Author:</label> 
                <span><?=$postedData['author']?></span>
            </div>		
            <div>
                <label>Favorite Century:</label>
                <span><?php
                        foreach ($postedData['century'] as $century) {
                        echo "$century ";                       
                        }
                        ?></span>
            </div>
            <div>
                <label>Comments:</label>
                <span><?=$postedData['comments']?></span>
            </div>
            <div>
                <label>Name:</label>
                <span><?=$postedData['name']?></span>
            </div>
            <div>
                <label>E-mail Address:</label>
                <span><?=$postedData['email']?></span>
            </div>
            <div>
                <label>Receive Newsletter:</label>
                <span><?=$postedData['newsletter']?></span>
            </div>
        </div>
	</body>
</html>