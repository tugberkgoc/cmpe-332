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
    <a href="olustur">Kamp Oluştur</a>
    <a href="cikis">Çıkış Yap</a>
  </div>
</div>

<?php
include("fonksiyon.php");
$query = mysqli_query($conn, "SELECT * FROM camp where id=".$_GET['id']."");
$row = mysqli_fetch_array($query);
?>

<table>
  <tr>
    <?php if($row['foto1'] == true) { ?><td><img class="images" src="<?php echo $row['foto1']; ?>"></td>
    <?php } ?>
    <?php if($row['foto2'] == true) { ?><td><img class="images" src="<?php echo $row['foto2']; ?>"></td>
    <?php } ?>
  </tr>
</table>

<span class="baslik"><?php echo $row['baslik']; ?></span>
<br />
<span class="aciklama"><?php echo $row['aciklama']; ?></span>
<br />
<span class="fiyat" style="font-weight: bold;"><?php echo $row['fiyat']; ?></span><span style="font-weight: bold;"> TL/Günlük</span>


<h2>Yorumlar</h2>

<?php
		$query = mysqli_query($conn, "SELECT * FROM comment where pid=".$row['id']."");
			while ($com = mysqli_fetch_array($query)) {
	?>
<span style="font-weight:bold;color:red;"><?php echo $com['author']; ?> diyor ki :</span><br />

<?php echo $com['yorum']; ?>


<?php
$s = $_SESSION["kadi"];
if($s == $com['author']){ ?>
<form method="post">
  <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
  <input type="hidden" name="yorum" value="<?php echo $com['yorum']; ?>">
  <input type="submit" name="delete" value="Delete">
</form>
<?php
}
?>
<hr>
<?php } ?>


<?php
if(isset($_POST['comment']) ? $_POST['comment'] : '' == true) {
	$pid = $_POST['pid'];
	$yorum = $_POST['yorum'];
	$s = $_SESSION["kadi"];
	$sql = "INSERT INTO comment (pid,yorum,author) VALUES ('$pid', '$yorum', '$s')";
		if ($conn->query($sql) === TRUE) {
			echo 'Yorum Başarılı ile eklendi.';
			echo '<META http-equiv="Refresh" content="0;">';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
?>

<?php
if(isset($_POST['delete']) ? $_POST['delete'] : '' == true) {
	$pid = $_POST['pid'];
	$yorum = $_POST['yorum'];
	$s = $_SESSION["kadi"];
	$query = mysqli_query($conn, "SELECT * FROM comment WHERE pid='$pid' AND yorum='$yorum'");
	$com = mysqli_fetch_array($query);
				
	if($com['author'] == $s) {
		$id = $com['id'];
		$sql = "DELETE FROM comment WHERE id='$id' AND pid='$pid' AND yorum='$yorum'";
			if ($conn->query($sql) === TRUE) {
				echo 'Yorum Başarılı ile silindi.';
				echo '<META http-equiv="Refresh" content="0;">';
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}			
}
?>

<h1>Yorum Yap</h1>
<form method="post">
  <textarea name="yorum"></textarea>
  <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
  <input type="submit" name="comment" value="Gönder">
</form>

<style>
.baslik {
  padding-left: 45%;
  font-family: Helvetica;
  font-size: 50px;
}

.aciklama {
  padding-left: 45%;
  font-family: Helvetica;
  font-size: 20px;
}

.fiyat {
  padding-left: 45%;
  font-family: Helvetica;
  font-size: 20px;
}

.images {
  padding-left: 30%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width:100%;
  height:80%;
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