<?php
  session_start();
  session_destroy();
  unset($_SESSION['id_user']);
						unset($_SESSION['nm_customer']);
						unset($_SESSION['email']);
						unset($_SESSION['tingkat_user']);
						unset($_SESSION['id_user']);
  echo "<script>alert('Anda Berhasil Logout'); window.location = 'index'</script>";
?>
