<?
// connect to database
$con = mysqli_connect("localhost","root","root","ads2trade");

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$section = $_REQUEST['section'];
	
switch($section) {
	case 'continent':
		$continent = $_REQUEST['continent'];
		
		$sql = "INSERT INTO location_continent (`name`) VALUES ('". $continent ."')";

		if(!$result = $con->query($sql)){
			die('There was an error running the query [' . $db->error . ']');
		}
		
		$sql2 = "SELECT id FROM location_continent WHERE `name` = '". $continent ."'";
		$result2 = $con->query($sql2);
		if(!$result2){
			die('There was an error running the query [' . $con->error . ']');
		}
		$id = "";
		while($row = $result2->fetch_assoc()) {
			$id = $row['id'];
		}
		echo $id;
		break;
	case 'country':
		$country = $_REQUEST['country'];
		$continentid = $_REQUEST['continentid'];
		
		$sql = "INSERT INTO location_countries (`continent_id`, `name`) VALUES ('". $continentid ."', '". $country ."')";
		$result = $con->query($sql);
		if(!$result){
			die('There was an error running the query [' . $con->error . ']');
		}
		
		$sql2 = "SELECT id FROM location_countries WHERE `name` = '". $country ."'";
		$result2 = $con->query($sql2);
		if(!$result2){
			die('There was an error running the query [' . $con->error . ']');
		}
		$id = "";
		while($row = $result2->fetch_assoc()) {
			$id = $row['id'];
		}
		echo $id;
		break;
	case 'town':
		$countryid = $_REQUEST['countryid'];
		$town = $_REQUEST['town'];
		
		$sql = "INSERT INTO location_province (`country_id`, `name`) VALUES ('". $countryid ."', '". $town ."')";

		if(!$result = $con->query($sql)){
			die('There was an error running the query [' . $con->error . ']');
		} else {
			echo 'success';
		}
		break;
}
	