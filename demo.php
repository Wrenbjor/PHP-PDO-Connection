<?

include('Database.php'); // Include the class

$dataBase = new DB; // Create new DB object

$sqlInsert = "INSERT INTO testTable (`test1`, `test2`) VALUES('This', 'is a test')"; // Basic SQL INSERT statment

$dataBase->runQuery($sqlInsert); // This will run the SQL statement above and will throw an exception if the SQL statement is bad.

$sqlSelect = "SELECT test1, test2 FROM testTable WHERE test1 = 'This'"; // Basic SQL SELECT Statment

$data = $dataBase->getQuery($sqlSelect); // This will run the SQL statment and return and associative array.

foreach($data as $d)
{
	echo $d["test1"]." ".$d["test2"]."!"; // This will output "This is a test!"
}

?>