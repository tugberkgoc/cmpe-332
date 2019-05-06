<?php
include("fonksiyon.php");
?>


<div class="nav">
  <div class="nav-header">
    <div class="nav-title" style="color: #777777;">
      CAMPLY
    </div>
  </div>
  <div class="nav-links">
    <a style="color: #777777;">Signed In As <?php echo $_SESSION['kadi'] ?></a>
    <a href="anasayfa" style="color: #777777;">Home</a>
    <a href="cikis" style="color: #777777;">Log Out</a>
  </div>
</div>

<?php
include("fonksiyon.php");
$query = mysqli_query($conn, "SELECT * FROM camp where id=".$_GET['id']."");
$row = mysqli_fetch_array($query);
?>


<img class="images" src="<?php echo 'uploads/'.$row['foto1']; ?>">
	

<span class="baslik"><?php echo $row['baslik']; ?></span>

<span class="aciklama"><?php echo $row['aciklama']; ?></span>

<span class="fiyat" style="font-weight: bold;"><?php echo $row['fiyat']." TL/Günlük"; ?></span>

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
  display: flex;
  justify-content: center;
  font-family: Helvetica;
  font-size: 50px;
}

.aciklama {
  display: flex;
  justify-content: center;
  font-family: Helvetica;
  font-size: 20px;
}

.fiyat {
  display: flex;
  justify-content: center;
  font-family: Helvetica;
  font-size: 20px;
}

.images {
  padding-top: 40px;
  display: flex;
  justify-content: center;
  margin-left: auto;
  margin-right: auto;
  width: 860px;
  height: 540px;
}

body {
  margin: 0px;
  padding:0;
}

.nav {
  height: 50px;
  width: 100%;
  background-color: #F8F8F8;
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
  font-family: 'Pacifico';
}

.nav-links { /* Navigation linkleri inline yap */
  padding-top: 4px;
  display: inline;
  float: right;
  font-size: 14px;
}

.nav>.nav-links>a { /* Navigation link buttons */
  display: inline-block;
  padding: 12px 15px 12px 15px;
  text-decoration: none;
  color: #efefef;
  font-size: 16px;
  font-family: "Helvetica Neue";
}

</style>