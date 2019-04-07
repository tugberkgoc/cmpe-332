<?php
include("fonksiyon.php");

$baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : '';
$aciklama = isset($_POST["aciklama"]) ? $_POST["aciklama"] : '';;
$fiyat = isset($_POST["fiyat"]) ? $_POST["fiyat"] : '';
$foto1 = isset($_POST["foto1"]) ? $_POST["foto1"] : '';
$foto2 = isset($_POST["foto2"]) ? $_POST["foto2"] : '';
$olusturan = $_SESSION['kadi'];

if($baslik == true) {
	$sql = "INSERT INTO camp
 (baslik,aciklama,fiyat,foto1,foto2,olusturan) VALUES ('$baslik', '$aciklama', '$fiyat', '$foto1', '$foto2', '$olusturan')";
		if ($conn->query($sql) === TRUE) {
			echo 'Kamp Kaydı Başarılı';
			echo '<meta http-equiv="refresh" content="2;URL=anasayfa">';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
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
  <input type="checkbox" id="nav-check">
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
  font-family: verdana;
  margin: 30px auto;
  padding: 30px;
  background: #4D6879;
  /* You can change the main color of thew form here. */
  font-size: 14px;
  width: 100%;
  max-width: 500px;
  box-sizing: border-box;
}

label {
  display: block;
  font-size: 24px;
  padding: 13px 0;
  color: #fff;
  text-shadow: 1px 1px 1px #666;
}

input {
  height: 18px;
  padding: 20px;
  width: 100%;
  box-sizing: border-box;
  -webkit-border-radius: 6px;
  -khtml-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0 0 10px #444;
  -moz-box-shadow: 0 0 10px #444;
  box-shadow: 0 0 10px #444;
  border: 1px solid #fff;
}

textarea {
  height: 150px;
  width: 100%;
  box-sizing: border-box;
  padding: 15px;
  border: 1px solid #fff;
  -webkit-border-radius: 6px;
  -khtml-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0 0 10px #444;
  -moz-box-shadow: 0 0 10px #444;
  box-shadow: 0 0 10px #444;
}

input[type="text"]:hover,
textarea:hover {
  border: 1px solid #fff;
  -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.25) inset, 0 0 5px rgba(255, 255, 255, 0.4);
  -moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.25) inset, 0 0 5px rgba(255, 255, 255, 0.4);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.25) inset, 0 0 5px rgba(255, 255, 255, 0.4);
}

input#submit {
  text-align: center;
  color: #fff;
  height: 50px;
  padding: 0;
  text-shadow: 1px 1px 1px #000;
  font-size: 18px;
  text-transform: uppercase;
  margin-top: 50px;
  border: 1px solid #000;
  background: #000;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3b3b3b), color-stop(100%, #000000));
  background: -webkit-linear-gradient(top, #3b3b3b 0%, #000000 100%);
  background: -moz-linear-gradient(top, #3b3b3b 0%, #000000 100%);
  background: -o-linear-gradient(top, #3b3b3b 0%, #000000 100%);
  background: -ms-linear-gradient(top, #3b3b3b 0%, #000000 100%);
  background: linear-gradient(top, #3b3b3b 0%, #000000 100%);
  opacity: 0.5;
}

input#submit:hover {
  color: #ccc;
  cursor: pointer;
  opacity: 0.8;
}

label {
  text-transform: uppercase;
  font-size: 14px;
}

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

.nav>#nav-check {
  display: none;
}
</style>