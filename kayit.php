<?php
include("fonksiyon.php");

$kadi = isset($_POST["kadi"]) ? $_POST['kadi'] : '';
$sifre = isset($_POST["sifre"]) ? $_POST['sifre'] : '';

if($kadi == true) {
	$sql = "INSERT INTO kullanicilar (kadi,sifre) VALUES ('$kadi', '$sifre')";
		$kayit_kontrol = mysqli_query($conn, "SELECT * FROM kullanicilar where kadi='$kadi'");
		$kayit_fetch = mysqli_fetch_array($kayit_kontrol);
		if($kayit_fetch != true) {  
			if ($conn->query($sql) === TRUE) {
				echo 'Kayıt Başarılı';
				echo '<hr>';
				echo '<meta http-equiv="refresh" content="1;URL=giris">';
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
			echo 'Bu Kullanıcı İsmiyle Daha Önce Kayıt Olunmuştur.';
			echo '<hr>';
		}
} 
?>

<div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      CAMPLY
    </div>
  </div>
  <input type="checkbox" id="nav-check">
  <div class="nav-links">
    <a href="giris">Giriş Yap ?</a>
  </div>
</div>



<?php if(isset($_SESSION['login']) ? $_SESSION['login'] : '' != true) { ?>
<form method="POST">
  <label>Kullanıcı Adı</label>
  <input class='input' type="text" name="kadi">
  <label>Şifreniz</label>
  <input type="password" name="sifre">
  <input type="submit" value="Kayıt Ol">
</form>
<?php } else { ?>
Zaten Giriş Yaptınız, Yönlendiriliyorsunuz.
<meta http-equiv="refresh" content="1;URL=anasayfa">
<?php } ?>

<style>
* {
  box-sizing: border-box;
}

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

.nav-header {
  display: inline;
}

.nav-title {
  display: inline-block;
  font-size: 22px;
  color: #fff;
  padding: 10px 10px 10px 10px;
}

.nav-links {
  display: inline;
  float: right;
  font-size: 18px;
}

.nav>.nav-links>a {
  display: inline-block;
  padding: 13px 10px 13px 10px;
  text-decoration: none;
  color: #efefef;
}

.nav>.nav-links>a:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

.nav>#nav-check {
  display: none;
}
</style>