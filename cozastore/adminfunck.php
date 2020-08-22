<?php
function soni($v)
{
	include 'conf.php';
	if ($v==1) {
		$sql="select count(id) as soni from category";
	}
		if ($v==2) {
		$sql="select count(id) as soni from product";
	}
		if ($v==3) {
		$sql="select count(id) as soni from addcard";
	}
		if ($v==4) {
		$sql="select count(id) as soni from users";
	}
	$baj=mysqli_query($con,$sql);
	$chiq=mysqli_fetch_array($baj,MYSQLI_ASSOC);
	echo $chiq["soni"];
}


?>

<?php
function showcategory()
{
	include 'conf.php';

		$sql="select * from category";
		$baj=mysqli_query($con,$sql)or die(mysqli_error());
echo "<table class='table table-bordered table-dark'>";
echo "<thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Name</th>
      <th scope='col'>image</th>
      <th scope='col'>Delete</th>
      <th scope='col'>Update</th>
    </tr>
  </thead>";
$i=1;
while ($chiq=mysqli_fetch_array($baj,MYSQLI_ASSOC)) {
	?>
<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $chiq["name"]?></td>
 <td><img src="images/<?php echo $chiq["image"]?>" class="" style="width: 90px;"></td>
 <td><a href="?del=<?php echo $chiq["id"]?>" class="btn btn-danger" onclick="tt();"><i class="oi oi-delete"></i> </a></td>
<td><a href="?wri=<?php echo $chiq["id"]?>" class="btn btn-info"><i class="oi oi-pencil"></i> </a></td>
</tr>

	<?php
	$i++;
}
?>
</table>
<a href="?qosh=1" class="btn btn-info" style="margin: 10px; ">Yangi qoshish</a>


<?php
}
?>


<?php
function showproduct()
{
include 'conf.php';

		$sql="select * from product";
		$baj=mysqli_query($con,$sql)or die(mysqli_error());
echo "<table class='table table-bordered table-dark'>";
echo "<thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Name</th>
      <th scope='col'>price</th>
      <th scope='col'>image</th>
      <th scope='col'>Delete</th>
      <th scope='col'>Update</th>
    </tr>
  </thead>";
$i=1;
while ($chiq=mysqli_fetch_array($baj,MYSQLI_ASSOC)) {
	?>
<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $chiq["name"]?></td>
	<td><?php echo $chiq["price"]?></td>
 <td><img src="images/<?php echo $chiq["image"]?>" class="" style="width: 90px;"></td>
 <td><a href="?del=<?php echo $chiq["id"]?>" class="btn btn-danger" onclick="tt();"><i class="oi oi-delete"></i> </a></td>
<td><a href="?wri=<?php echo $chiq["id"]?>" class="btn btn-info"><i class="oi oi-pencil"></i> </a></td>
</tr>

	<?php
	$i++;
}
?>
</table>
<a href="?qosh=2" class="btn btn-info" style="margin: 10px; ">Yangi qoshish</a>


<?php	
}
?>
<?php
function showsale()
{
include 'conf.php';

		$sql="select * from addcard";
		$baj=mysqli_query($con,$sql)or die(mysqli_error());
echo "<table class='table table-bordered table-dark'>";
echo "<thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Name</th>
      <th scope='col'>Soni</th>
      <th scope='col'>Size</th>
      <th scope='col'>Color</th>
      <th scope='col'>Name</th>
      <th scope='col'>Price</th>
      <th scope='col'>Image</th>
    </tr>
  </thead>";
$i=1;
while ($chiq=mysqli_fetch_array($baj,MYSQLI_ASSOC)) {
	?>
<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $chiq["user"]?></td>
	<td><?php echo $chiq["num"]?></td>
	<td><?php echo $chiq["size"]?></td>
	<td><?php echo $chiq["color"]?></td>
	<td><?php echo $chiq["name"]?></td>
	<td><?php echo $chiq["price"]?></td>
 <td><img src="images/<?php echo $chiq["image"]?>" class="" style="width: 90px;"></td>
 <!--  -->
</tr>

	<?php
	$i++;
}
?>
</table>
<!-- <a href="?qosh=2" class="btn btn-info" style="margin: 10px; ">Yangi qoshish</a> -->


<?php	
}
?>



<?php
function addcategory()
{
	?>
<form class="form-control" method="POST" enctype="multipart/form-data">
	<label>Nomi</label>
	<input type="text" name="name" class="form-control">
	<label>Image</label>
	<input type="file" name="image" class="form-control">
	<input type="submit" name="ok1" class="btn btn-info">
</form>
	<?php
}
?>
<?php
function addproduct()
{
	?>
<form class="form-control" method="POST" enctype="multipart/form-data">
	<label>Categiriya Id</label>
	<input type="text" name="category" class="form-control" placeholder="1/ 2/ 3/ 4/">
<label>Nomi</label>
	<input type="text" name="name" class="form-control">
<label>Narxi</label>
	<input type="text" name="price" class="form-control">
<label>Rasm</label>
	<input type="file" name="image" class="form-control">

	<input type="submit" name="ok2" class="btn btn-info">
</form>
	<?php
}
?>