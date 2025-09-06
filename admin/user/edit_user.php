<?php 
  
  include "../../inc/config.php";

  $id_user          = $_POST['id_user'];
  $email         = $_POST['email'];
  $password         = md5($_POST['password']);
  $password2        = md5($_POST['password2']);
  @$level           = $_POST['level'];

  if ($password != $password2){
    ?>
        <script type="text/javascript">
        alert("Password tidak sesuai");
        document.location="../index.php?mod=user&pg=form_edit_user&id_user=<?php echo $id_user?>";
        </script>
    <?php 
  }
  else{

  $sql   = "UPDATE tbl_user SET email='$email',password='$password',level='$level' WHERE id_user='$id_user'";
  $query = mysql_query($sql);
  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
        document.location="../index.php?mod=user&pg=data_user";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal diubah");
        document.location="../index.php?mod=user&pg=data_user";
        </script>
    <?php 
  }  
  mysql_close();
}
 ?>