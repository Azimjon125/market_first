<?
include 'session.php';
include 'header.php';
include 'adminfunck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/open-iconic-bootstrap.css">
</head>
<div class="row">
	<div class="col-lg-3">
<!-- List group -->
<div class="list-group" id="myList" role="tablist">
  <a class="list-group-item list-group-item-action active"  href="admin.php" role="tafb">Home</a>
  <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Categories <span class="badge badge-primary badge-pill"  style="float: right;"> <?php soni(1); ?> </span></a>
  <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab">Mahsulotlar<span class="badge badge-primary badge-pill"  style="float: right;"> <?php soni(2); ?> </span></a>
  <a class="list-group-item list-group-item-action" data-toggle="list" href="#settings" role="tab">Buyurmalar<span class="badge badge-primary badge-pill"  style="float: right;"> <?php soni(3); ?> </span></a>
</div>
</div>
<!-- Tab panes -->
<div class="col-lg-8">
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel">.Bosh sahifa..</div>
  <div class="tab-pane" id="profile" role="tabpanel">
<div><?php
showcategory(); ?>
</div>
 </div>
  


  <div class="tab-pane" id="messages" role="tabpanel"><?php
showproduct(); ?></div>
  <div class="tab-pane" id="settings" role="tabpanel"><?php
showsale(); ?></div>
</div>
	
	
		
	</div>
	
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4 " style="margin-bottom: 100px;">
		<?php
if (isset($_GET["qosh"])) {
if ($_GET["qosh"]==1) {
	addcategory();
}
if ($_GET["qosh"]==2) {
	addproduct();
}
}
		?>
	</div>
</div>



<?php
if (isset($_POST["ok1"])) 
{
$t_uz=addslashes($_POST["name"]);
$r=$_FILES["image"]["tmp_name"];
$r2=$_FILES["image"]["name"];
move_uploaded_file($r, 'images/'.$r2);
$sql="insert into category value('','{$t_uz}','{$r2}')";
$bal=mysqli_query($con,$sql)or die(mysqli_error());
if ($bal) {
?>
<script type="text/javascript">
	alert("Malumot Qo'shildi");
	window.location.href="admin.php";
</script>
<?php
	}
}

?>




<?php
if (isset($_POST["ok2"])) 
{
$c_id=addslashes($_POST["category"]);
$name=addslashes($_POST["name"]);
$price=addslashes($_POST["price"]);
$r=$_FILES["image"]["tmp_name"];
$r2=$_FILES["image"]["name"];
move_uploaded_file($r, 'images/'.$r2);
$sql="insert into product value('','{$c_id}','{$name}','{$price}','{$r2}')";
$bal=mysqli_query($con,$sql)or die(mysqli_error());
if ($bal) {
?>
<script type="text/javascript">
	alert("Malumot Qo'shildi");
	window.location.href="admin.php";
</script>
<?php
	}
}

?>






















<script type="text/javascript">
	$('#myList a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>















<!-- footer -->
<?php
include 'footer.php';
?>
<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<!-- sa'xaiduifyugucadsljkhjchiohuygiyftuyxfgfhfyiytudxfhcjfyitudfgiyftufhcgfygcj -->








<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script type="text/javascript">


</script>


</body>
</html>