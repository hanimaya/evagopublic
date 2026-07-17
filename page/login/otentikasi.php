<?php
include('../../inc/config.php');

session_start();
//tangkap data dari form login

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? md5(trim($_POST['password'])) : '';

//untuk mencegah sql injection
//kita gunakan db_escape (SQLite safe version)

$email = db_escape($email);
$password = db_escape($password);
// query cek
$q = db_query( "select * from tbl_user where email='$email' and password='$password'");

// tampil data
$data = db_fetch_array($q);
// Some PDO drivers (SQLite) don't return reliable rowCount() for SELECT,
// so check fetched row instead of rowCount
if ($data){
	
	$_SESSION['email']       = $email;
	$_SESSION['nama']        = $data["nama"];
	$_SESSION['id_user']     = $data["id_user"];
	$_SESSION['password']	 = $data['password'];
	$_SESSION['level']		 = $data['level'];
	$nama = $data['nama'];
	
// kode levelisasi
	if($data["level"]=="admin")
	{ 
	?>
		<script type="text/javascript">
		alert("Selamat Datang <?php echo $nama;?>");
	    document.location='../../admin/index.php';
        </script>       
	<?php
	}
	else if($data["level"]=="user")
	{
	?>
		<script type="text/javascript">
		alert("Selamat Datang <?php echo $nama;?>");
		document.location='../../admin/index.php';
	    </script>			
	<?php		
	}
	else if($data["level"]=="kepala")
	{
	?>
		<script type="text/javascript">
		alert("Selamat Datang <?php echo $nama;?>");
		document.location='../../admin/index.php';
	    </script>			
	<?php		
	}
			
}
else
{
	?>
	<script type="text/javascript">
		alert("email atau password salah");
		document.location='../../index.php?mod=page/login&pg=form_login';
	</script>
    <?php            
}
mysqli_close($conn);
?>