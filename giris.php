<?php
		include("fonksiyon.php");
		if($_POST) { 
    // Post Parametreleri
    /**
     * kullanici adi = kadi
     * sifre = sifre
     */
		$kadi = $_POST['kadi'];
		$sifre = $_POST['sifre'];
		$sql = mysqli_query($conn, "select * from kullanicilar where kadi = '$kadi' and sifre = '$sifre'") or die ("Failed to query database" .mysqli_error());
		$row = mysqli_fetch_array($sql);

		if ($row['kadi'] == $kadi && $row['sifre'] == $sifre) {
				echo "Tamamlanıyor...";
        echo '<hr>';
        
				$_SESSION["login"] = "true";
        $_SESSION["kadi"] = $kadi;

        // URL=anasayfa
				echo '<meta http-equiv="refresh" content="5;URL=anasayfa">';
			} else {
				echo "<div class=\"alert alert-danger\"><strong>Hata</strong> Bilgiler Yanlış.</div>";
				echo '<hr>';
      }
      
		}
?>

<?php  if(isset($_SESSION['login']) ? $_SESSION['login'] : '' != true) { ?>

<div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      CAMPLY
    </div>
  </div>
  <div class="nav-links">
    <a href="kayit">Kayıt Ol ?</a>
  </div>
</div>

<form method="POST">

  <label>Kullanıcı Adı</label>
  <input type="text" name="kadi">

  <label>Şifreniz</label>
  <input type="password" name="sifre">
  <input type="submit" value="Giriş Yap">
</form>

<?php } else { ?>

Tamamlanıyor...
<meta http-equiv="refresh" content="1111;URL=anasayfa">

<?php } ?>


<style>
body {
  margin: 0px;
  font-family: 'Roboto';
}

.nav {
  height: 50px;
  width: 100%;
  background-color: #4d4d4d;
  position: relative;
}

.nav>.nav-header {
  display: inline;
}

.nav>.nav-header>.nav-title {
  display: inline-block;
  font-size: 22px;
  color: #fff;
  padding: 10px 10px 10px 10px;
}

.nav-links { /* Navigation linkleri inline yap */
  display: inline;
  float: right;
  font-size: 18px;
}

.nav>.nav-links>a { /* Navigation link buttons */
  display: inline-block;
  padding: 13px 10px 13px 10px;
  text-decoration: none;
  color: #efefef;
}
</style>