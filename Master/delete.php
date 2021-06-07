<?php include 'dbconnect.php'; ?>
<?php
$tbl_name = $_GET['tbl'];
$id = $_GET['id'];


$sql = "DELETE FROM $tbl_name WHERE id=$id";
$results = mysqli_query($conn,$sql) or die("SQL Query Failed.");
if(isset($tbl_name) && $tbl_name == "tbl_wishlist") 
{
	echo '<script>window.location="my-wishlist.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_product_comparison") 
{
	echo '<script>window.location="product-comparison.php"</script>';
}
if(isset($tbl_name) && $tbl_name == "tbl_orders") 
{
	echo '<script>window.location="checkout.php"</script>';
}

?>