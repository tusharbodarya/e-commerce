<?php include 'dbconnect.php'; ?>
<?php
$tbl_name = $_GET['tbl'];
$id = $_GET['id'];


$sql = mysqli_query($conn,"UPDATE $tbl_name SET is_deleted='1' WHERE id=$id");

if(isset($tbl_name) && $tbl_name == "category") 
{
	echo '<script>window.location="show-category.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "sub_category") 
{
	echo '<script>window.location="show-subcategory.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "child_category") 
{
	echo '<script>window.location="show-childcategory.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "users") 
{
	echo '<script>window.location="show-user.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_product") 
{
	echo '<script>window.location="show-product.php"</script>';
}if(isset($tbl_name) && $tbl_name == "offer") 
{
	echo '<script>window.location="show-offer.php"</script>';
}

?>