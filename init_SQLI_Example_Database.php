<?php
	date_default_timezone_set("America/Chicago");

	define("serverName", "localhost");
	define("username", "root");
    define("pass", "");
    define("databaseName", "sqli_example_db");
    define("userTableName", "`user_info`");
	
	// Create connection
	$conn = new mysqli(serverName, username, pass);
	// Check connection
	if ($conn->connect_error) {
		die("<p>Connection failed: " . $conn->connect_error . "</p>");
	} 		
	
	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS " . databaseName;
	if ($conn->query($sql) === TRUE) {
		echo "<p>Database has been created</p>";
	} else {
		echo "<p>Error creating database: " . $conn->error . "</p>";
	}
	// Create connection
	$conn = new mysqli(serverName, username, pass, databaseName);
	// Check connection
	if ($conn->connect_error) {
		die("<p>Connection failed: " . $conn->connect_error . "</p>");
	}
	
	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS " . userTableName . " (
		username VARCHAR(64) NOT NULL,
		password VARCHAR(64),
        card_number INT(255) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		echo "<p>Table " . userTableName . " has been created</p>";
	} else {
		echo "<p>Error creating table: " . $conn->error . "</p>";
    }
    
    // sql to populate table
    $sql = "INSERT INTO " . userTableName . " 
        (`username`, `password`, `card_number`) VALUES 
        ('bob', 'password', '111111111')
    ";
	if ($conn->query($sql) === TRUE) {
		echo "<p>Populated " . userTableName . " with bob</p>";
	} else {
		echo "<p>Error creating table: " . $conn->error . "</p>";
    }
    // sql to populate table
    $sql = "INSERT INTO " . userTableName . " 
        (`username`, `password`, `card_number`) VALUES 
        ('joe', 'password', '222222222')
    ";
	if ($conn->query($sql) === TRUE) {
		echo "<p>Populated " . userTableName . " with joe</p>";
	} else {
		echo "<p>Error creating table: " . $conn->error . "</p>";
    }
    // sql to populate table
    $sql = "INSERT INTO " . userTableName . " 
        (`username`, `password`, `card_number`) VALUES 
        ('emily', 'password', '333333333')
    ";
	if ($conn->query($sql) === TRUE) {
		echo "<p>Populated " . userTableName . " with emily</p>";
	} else {
		echo "<p>Error creating table: " . $conn->error . "</p>";
	}
	
	$conn->close();
	
?>