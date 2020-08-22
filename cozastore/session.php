<?
session_start();
//session_destroy();

if (!(isset($_SESSION["til"]))) {
    $_SESSION["til"]="uz";
}
if (isset($_GET["til"])) {
    $_SESSION["til"]=$_GET["til"];
}
?>
