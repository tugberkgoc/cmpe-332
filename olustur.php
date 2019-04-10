<?php
include("fonksiyon.php");

$baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : '';
$aciklama = isset($_POST["aciklama"]) ? $_POST["aciklama"] : '';;
$fiyat = isset($_POST["fiyat"]) ? $_POST["fiyat"] : '';
$foto1 = isset($_POST["foto1"]) ? $_POST["foto1"] : '';
$foto2 = isset($_POST["foto2"]) ? $_POST["foto2"] : '';
$olusturan = $_SESSION['kadi'];

if($baslik == true) {
  if(is_numeric($fiyat)) {
  	$sql = "INSERT INTO camp
   (baslik,aciklama,fiyat,foto1,foto2,olusturan) VALUES ('$baslik', '$aciklama', '$fiyat', '$foto1', '$foto2', '$olusturan')";
  		if ($conn->query($sql) === TRUE) {
  			echo 'Kamp Kaydı Başarılı';
  			echo '<meta http-equiv="refresh" content="2;URL=anasayfa">';
  		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
      }
  } else {
    echo 'Fiyatı doğru giriniz!';
    echo '<meta http-equiv="refresh" content="2;URL=olustur">';
  }
} 
?>

<div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      CAMPLY
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  <div class="nav-links">
    <a href="anasayfa">Anasayfa</a>
    <a href="cikis">Çıkış Yap</a>
  </div>
</div>

<div id="wrapper">
  <form method="POST" id="form">

    <label for="baslik">Başlık</label>
    <input type="text" id="baslik" name="baslik" />

    <label for="aciklama">Açıklama</label>
    <input type="text" id="aciklama" name="aciklama" />

    <label for="fiyat">Fiyat</label>
    <input type="text" id="fiyat" name="fiyat" />

    <label for="foto1">Foto - 1</label>
    <textarea id="foto1" cols="30" rows="10" name="foto1"></textarea><br />

    <label for="foto2">Foto - 2</label>
    <textarea id="foto2" cols="30" rows="10" name="foto2"></textarea><br />

    <input type="submit" value="Oluştur" name="submit" id="submit" />
  </form>
</div>

<style>
#wrapper {
  font-family: 'Roboto';
  margin: 30px auto;
  padding: 30px;
  background: #4D6879; /* You can change the main color of thew form here. */
  font-size: 14px;
  width: 100%;
  max-width: 500px;
}

label {
  display: block;
  font-size: 24px;
  padding: 13px 0;
  color: #fff;
}

input {
  height: 18px;
  padding: 20px;
  width: 100%;
}

textarea {
  height: 150px;
  width: 100%;
  padding: 15px;
  border: 1px solid #fff;
}

input[type="text"]:hover,
textarea:hover {
  border: 1px solid #fff;
}

input#submit {
  text-align: center;
  color: #fff;
  height: 50px;
  padding: 0;
  margin-top: 50px;
  border: 1px solid #000;
  background: #000;
}

input#submit:hover {
  color: #ccc;
  cursor: pointer;
}

label {
  text-transform: uppercase;
  font-size: 14px;
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

.nav>.nav-header {
  display: inline;
}

.nav>.nav-header>.nav-title {
  display: inline-block;
  font-size: 22px;
  color: #fff;
  padding: 10px 10px 10px 10px;
}

.nav>.nav-btn {
  display: none;
}

.nav>.nav-links {
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
</style>