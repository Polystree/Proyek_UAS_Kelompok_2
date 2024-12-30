<?php
require_once "dbcontroller.php";
$db = new DBController();

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $delete = "DELETE FROM data_mahasiswa WHERE nim = $nim";
    $db->runSQL($delete);
    header("Location: index.php");
}
?>
