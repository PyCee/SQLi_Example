<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SQLi Example - Vulnerable</title>
        <meta charset="UTF-8">
		
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            #setDataButton {
                width: 100px;
                height: 40px;
                font-size: 24px;
            }
		</style>
	</head>
	<body>
		<form action="" method="post">
			<label>Enter username: </label>
			<input type="text" id="nameEntry" name="username">
        	<br />
			<label>Enter password: </label>
			<input type="text" id="passwordEntry" name="password">
			<br />
        	<button type="submit" id="setDataButton">Log In</button>
        </form>
        <?php 
			if(isset($_POST['username']) &&	
				isset($_POST['password']) &&
                strlen($_POST['username']) > 0 &&
                strlen($_POST['password']) > 0) {
                
                define("serverName", "localhost");
                define("DB_username", "root");
                define("DB_pass", "");
                define("databaseName", "sqli_example_db");
                define("userTableName", "`user_info`");
            
                $conn = new mysqli(serverName, DB_username, DB_pass, databaseName);
                if ($conn->connect_error) {
                    die("<p>Connection failed: " . $conn->connect_error . "</p>");
                }
                
                $sql_query = "SELECT username, card_number FROM " . userTableName;
                $sql_query .= " WHERE (username = '" . $_POST['username'] . "')";
                $sql_query .= " and (password = '" . $_POST['password'] . "')";

                $result = mysqli_query($conn, $sql_query);
                if(!$result || mysqli_num_rows($result) < 1){
                    echo "<p>Failed to log in user: " . $_POST['username'] . "</p>";
                    echo "<p>Failed with password: " . $_POST['password'] . "</p>";
                } else {
                    $row = mysqli_fetch_row($result);
                    echo "<p>Successful log in for user: " . $row[0] . "</p>";
                    echo "<p>Your entered password was: " . $_POST['password'] . "</p>";
                    echo "<p>Your private information can be accessed from this page.</p>";
                    echo "<p>Your stored credit card number is " . $row[1] . ".</p>";
                }
            }
			?>
	</body>
	<script>
		
	</script>
</html>