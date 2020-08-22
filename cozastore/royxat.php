<?
include 'session.php';
//session_destroy();


if (!(isset($_SESSION["user"]))) {
$_SESSION["user"]=$_GET["ism"]; 
}
else
{
  ?>
<script type="text/javascript">
  window.location.href="index.php";
</script>
  <?
  //$_SESSION["user"]=$_GET["ism"];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jqueru.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
<style type="text/css">

</style>
</head>
<body>
	<div class="container col">
		<div class="row">
			<div class="col-lg-4">
        <?
       // echo $_SESSION["til"];
$uz=array('Ism','Familya','Email','login','parol','Kirish');
//$ru=array('Ism_ru','Familya_ru','Email_ru','login_ru','parol_ru','kirish_ru');
$ru=array('Имя','Фамилия','По электронной почте','Логин','Пароль','Войти');


        ?>
      </div>
      <div class="col-lg-4">
			<form>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputtext">
        <?
 if ($_SESSION["til"]=="uz") {
echo $uz["0"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["0"];  
}
        ?>
          
        </label>
      <input type="text" class="form-control" name="ism">
    </div>
<div class="form-group col-md-12">
      <label for="inputtext">
        <?
 if ($_SESSION["til"]=="uz") {
echo $uz["1"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["1"];  
}
        ?>
          
        </label>
      <input type="text" class="form-control" name="fam">
    </div>
<div class="form-group col-md-12">
      <label for="inputtext">
        <?
 if ($_SESSION["til"]=="uz") {
echo $uz["2"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["2"];  
}
        ?>
          
        </label>
      <input type="Email" class="form-control"  name="email">
    </div>
<div class="form-group col-md-12">
      <label for="inputtext">
        <?
 if ($_SESSION["til"]=="uz") {
echo $uz["3"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["3"];  
}
        ?>
          
        </label>
      <input type="login" class="form-control"  name="login">
    </div>
<div class="form-group col-md-12">
      <label for="inputtext">
        <?
 if ($_SESSION["til"]=="uz") {
echo $uz["4"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["4"];  
}
        ?>
          
        </label>
      <input type="password" class="form-control" name="parol">
    </div>
    <input type="submit" name="ok" value=" <?
 if ($_SESSION["til"]=="uz") {
echo $uz["5"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["5"];  
}
        ?>" class="btn btn-info">

<?
if (isset($_GET["ok"])) {
  $ism=addslashes($_GET["ism"]);
   $fam=addslashes($_GET["fam"]);
    $email=addslashes($_GET["email"]);
     $login=addslashes($_GET["login"]);
      $parol=addslashes($_GET["parol"]);
  include 'conf.php';
  $sql="insert into users value('','{$ism}','{$fam}','{$email}','{$login}','{$parol}')";
$baj=mysqli_query($con,$sql)or die(mysqli_error());
if ($baj) {
  ?>
<script type="text/javascript">
  //alert("Royxatdan Otdingiz");
  window.location.href="index.php";
</script>

  <?

}

}
?>







			</div>
		</div>
		
	</div>

</body>
</html>