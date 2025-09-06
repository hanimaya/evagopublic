<?php 
  
  include "../../inc/config.php";

  $email         = $_POST['email'];
  $password         = md5($_POST['password']);
  $password2        = md5($_POST['password2']);
  @$level           = $_POST['level'];

  if ($password != $password2){
    ?>
        <script type="text/javascript">
        alert("Password tidak sesuai");
        document.location="../index.php?mod=user&pg=form_input_user";
        </script>
    <?php 
  }
  else{

  $sql   = "INSERT INTO tbl_user VALUES(null,'$email','$password','$level')";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil disimpan");
        document.location="../index.php?mod=user&pg=data_user";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan <?php echo $email.$password.$level?>");
        document.location="../index.php?mod=user&pg=data_user";
        </script>
    <?php 
  }  
  mysql_close();
}
 ?>