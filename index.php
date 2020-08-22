<?php
include 'cozastore/session.php';
//session_destroy();


if (!(isset($_SESSION["user"]))) {
?>
<script type="text/javascript">
  window.location.href="cozastore/kirish.php";
</script>
  <?
//$_SESSION["user"]=$_GET["ism"]; 
}
else
{
  ?>
<script type="text/javascript">
  window.location.href="cozastore/index.php";
</script>
  <?
  //$_SESSION["user"]=$_GET["ism"];
}