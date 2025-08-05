<div id="signin">
<fieldset>
<img src="../foto/avatar.png" width="120px" />
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>ADMIN</h3>
  <p>SILAHKAN LOGIN<p> 
  <input name="username" type="text" id="username" placeholder="Username">
  <input name="password" type="password" id="password" placeholder="Password">
  <input name="login" type="submit" value="LOGIN ADMIN">
</form>

<?php
if($_POST["login"]){
	$sqla = mysqli_query($kon, "select * from tbl_admin where username='$_POST[username]' and password='$_POST[password]'");
	$ra = mysqli_fetch_array($sqla);
	$row = mysqli_num_rows($sqla);
	if($row > 0){
		session_start();
		$_SESSION["useradm"]=$ra["username"];
		$_SESSION["passadm"]=$ra["password"];
		echo "<div align='center'>Login Berhasil</div>";		
	}else{
		echo "<div align='center'>Login Gagal</div>";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>

</fieldset>
</div>
