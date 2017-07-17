<?php
session_start();
if(!isset($_SESSION['employee_id']) || empty($_SESSION['employee_id'])) {
?>
<SCRIPT LANGUAGE="Javascript">
	alert("คุณยังไม่เข้าสู่ระบบ");
	window.location="index.php";
</SCRIPT>
<?php
}
 ?>
