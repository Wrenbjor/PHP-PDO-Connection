<?php

class DB
{
	/*** mysql hostname ***/
	private $hostname = 'localhost'; // Put your host name here
	
	/*** mysql username ***/
	private $username = 'username'; // Put your MySQL User name here
	
	/*** mysql password ***/
	private $password = 'password'; // Put Your MySQL Password here
	
	/*** mysql password ***/
	private $dbName = 'db'; // Put Your MySQL Database name here
	
	
	/*** database resource ***/
	public $dbh = NULL; // Database handler
	
	public function __constructor() // Default Constructor
	{
		try
		{
			$this->dbh = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password);
			/*** echo a message saying we have connected ***/
			//echo 'Connected to database'; // Test with this string
		}
		catch(PDOException $e)
		{
			echo __LINE__.$e->getMessage();
		}
	}
	
	public function __destructor()
	{
		$this->dbh = NULL; // Setting the handler to NULL closes the connection propperly
	}
	
	public function runQuery($sql)
	{
		try
		{
			//echo $sql;
			$count = $this->dbh->exec($sql) or print_r($this->dbh->errorInfo());
		}
		catch(PDOException $e)
		{
			echo __LINE__.$e->getMessage();
		}
	}

	public function getQuery($sql)
	{
		$stmt = $this->dbh->query($sql);
	
	    $stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt; // Returns an associative array that can be diectly accessed or looped through with While or Foreach
	}
	
}
?>