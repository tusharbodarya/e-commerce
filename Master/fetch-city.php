<?php
$conn1 = mysqli_connect("localhost","root","","city") or die("Connection Failed");
$state = $_POST["state"];
$stateresult = mysqli_query($conn1,"select * from state_list WHERE state='".$state."' ");
$staterow = mysqli_fetch_array($stateresult);
$stateid = $staterow['id'];
$result = mysqli_query($conn1,"select * from all_cities WHERE state_code='".$stateid."'");
while($row = mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
	<?php
}
?>