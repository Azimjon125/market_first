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
	<script type="text/javascript" src="../js/jquery.js"></script>
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
echo $uz["3"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["3"];  
}
        ?>
          
        </label>
      <input type="text" class="form-control" name="login">
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

    <input type="submit" name="ok" value="<?
 if ($_SESSION["til"]=="uz") {
echo $uz["5"];  
}
if ($_SESSION["til"]=="ru") {
echo $ru["5"];  
}
        ?>" class="btn btn-info">

<?
if (isset($_GET["ok"])) {
     $login=addslashes($_GET["login"]);
      $parol=addslashes($_GET["parol"]);
  include 'conf.php';
$sql="select * from users where login='{$login}' and parol='{$parol}'";
  $baj=mysqli_query($con,$sql)or die(mysqli_error());
  $chiq=mysqli_fetch_array($baj,MYSQLI_ASSOC);
if ($chiq) {
  $_SESSION["user"]=$chiq["login"];
  echo $_SESSION["user"];
  ?>
<script type="text/javascript">
 window.location.href="index.php";
</script>

  <?

}
else
{
  echo "Login yoki parol xato";
}

}
?>
<div class="row">
<div class="col-lg-4 offset-4">
  <a href="royxat.php" class="btn-info btn">Royxatdan Otish</a>
</div>
</div>




			</div>
		</div>
		
	</div>

</body>
</html>