<?php

include 'assets/include.php';
require './assets/dbInfo.php';
$query = "SELECT id, first_name, last_name, pen_name FROM Author ORDER BY first_name";  
$resultObj = $connection->query($query);
if(count($_POST) > 0)
{
    if($_POST['email'] != '')
    {
        $_SESSION['formPostData'] = $_POST;
        header('Location: final.php');
    }
    else
    {
        $emailError = 'validation';
    }
}
       
?>
<!DOCTYPE html>
<html >
    <head>
        <title>PHP Fundamentals</title>
		<link href="assets/styles.css" rel="stylesheet" type="text/css" />
                <link rel="icon" href="assets/mail.png">
    </head>
    <body >
        
		<div id="Header">
                    <img src="assets/mail.png" border="0" alt="">
			<h2>
				Join Our Literature Mailing List
			</h2>
		</div>        
        <div id="Body">
            <form method="post" action="index.php" >
                <div>
                    <label>Favorite Author:</label>                                       
                                        <select name="author">
                        <?php while($row = $resultObj->fetch_assoc()): ?>
                            <option value="<?=$row['first_name']?> <?=$row['last_name']?>">
                                <?=$row['first_name']?> <?=$row['last_name']?></option>
                        <?php endWhile; ?>
                    </select>
                  
                </div>		
                <div class="multiple">
                    <label>Favorite Century:</label>
                    17th Century <input type="checkbox" name="century[]" value="17th">
                    18th Century <input type="checkbox" name="century[]" value="18th"> 
                    19th Century <input type="checkbox" name="century[]" value="19th"> 
                </div>
                <div>
                    <label>Comments:</label>
                    <textarea name="comments"></textarea>
                </div>
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" />
                </div>
                <div class="<?=$emailError?>">
                    <label>E-mail Address:</label>
                    <input type="text" name="email" />
                </div>
                <div  class="multiple">
                    <label>Receive Newsletter:</label>
                    Yes <input type="radio" name="newsletter" value="YES">
                    No <input type="radio" name="newsletter" value="NO">
                </div>
                <div class="multiple">
                    <label>&nbsp;</label>
                    <input type="submit" name="submit" value="Join Mailing List">
                </div>
            </form>
        </div>
	</body>
        
</html>

<?php

$resultObj->close();
$connection->close();

?>