<?php 
	class Validation {
		public function isDuplicate()
		{
			$db_name = "bq";
			$mysqlpassword = "";
			$mysqlusername = "root";
			$server = "localhost";
			$conn = new mysqli_($server, $mysqlusername, $mysqlpassword, $db_name) or die($conn->error.__LINE__);

			$query = "select * from admins  where email ='".$data."'";
			$result = $conn->query($query) or die($conn->error(.__LINE__);
			$num_rows = $result->num_rows;
			$conn->close();
			if($num_rows > 0)
			{
				return 	true;
			}
			return false;
		}
	}

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$data = $request->data;
	$validation = new Validation();
	echo $validation->isDuplicate($data);