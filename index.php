<?php
include("fonksiyon.php");
?>

<?php if($_SESSION['login'] == true) { ?>

<div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      CAMPLY
    </div>
  </div>
  <div class="nav-links">
    <a href="olustur">Kamp Oluştur</a>
    <a href="cikis">Çıkış Yap</a>
  </div>
</div>

<table id="t01">
  <tr>
    <th>#</th>
    <th>Başlık</th>
    <th>Aciklama</th>
    <th>Fiyat</th>
    <th>Fotoğraf - 1</th>
    <th>Fotoğraf - 2</th>
    <th>İşlem</th>
  </tr>

  <?php
		$query = mysqli_query($conn, "SELECT * FROM camp");
			while ($row = mysqli_fetch_array($query)) {
	?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['baslik']; ?></td>
    <td><?php echo $row['aciklama']; ?></td>
    <td><?php echo $row['fiyat']; ?></td>
    <td><?php echo $row['foto1']; ?></td>
    <td><?php echo $row['foto2']; ?></td>
    <?php if($_SESSION['kadi'] == $row['olusturan'] || $grup == 1) { ?>
    <td><a href="sil?id=<?php echo $row['id']; ?>">Sil</a> | <a href="profil?id=<?php echo $row['id']; ?>">Yorum Yap</a>
    </td>
    <?php } else { ?>
    <td><a href="profil?id=<?php echo $row['id']; ?>">Yorum Yap</a></td>
    <?php } ?>
  </tr>
  <?php } ?>

</table>

<?php } else { ?>
Giriş Yapmadınız, Yönlendiriliyorsunuz.
<meta http-equiv="refresh" content="1;URL=giris">
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