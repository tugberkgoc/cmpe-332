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

<div class="container">

	<div class="wrap">
	
		<?php
			$query = mysqli_query($conn, "SELECT * FROM camp");
				while ($row = mysqli_fetch_array($query)) {
		?>
		
	<div class="tooltip">
  	<span class="tooltiptext">Yorum Yap</span>

	<a href="profil?id=<?php echo $row['id']; ?>">
		<div class="box one" style="background: url(<?php echo'uploads/'.$row['foto1']; ?>); background-repeat: no-repeat;
		background-size: cover;
		background-position: center;">
			<div class="date">
				<h4><?php echo $row['tarih']; ?></h4>
			</div>
			<h1><?php echo $row['baslik']; ?></h1>
			<!-- <div class="poster p1">
				<h4>Z</h4>
			</div> -->
		</div>
	</a>
	</div>
	
	<?php } ?>
	</div>

</div>


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

body {
	font-family: 'Roboto', sans-serif;
	background: #fff;
}

.conatiner {
	width: 100%;
	height: 500px;
}
.wrap {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	    flex-wrap: wrap;
	-webkit-box-pack: center;
	    -ms-flex-pack: center;
	        justify-content: center;
	-webkit-box-align: center;
	    -ms-flex-align: center;
	        align-items: center;
	-webkit-box-orient: horizontal;
	-webkit-box-direction: normal;
	    -ms-flex-direction: row;
	        flex-direction: row;
}

.box {
	margin: 10px;
	width: 300px;
	height: 490px;
	text-align: center;
	border-radius: 3px;
	-webkit-transition: 200ms ease-in-out;
	-o-transition: 200ms ease-in-out;
	transition: 200ms ease-in-out;
	-webkit-box-shadow: 0 0 15px rgba(0,0,0,0.3);
	        box-shadow: 0 0 15px rgba(0,0,0,0.3);
}
.box:hover {
	margin-bottom: -10px;
	-webkit-box-shadow: 0 0 5px rgba(0,0,0,0.7);
	        box-shadow: 0 0 5px rgba(0,0,0,0.7);
}
.box h1 {
	color: #fff;
	padding: 30px;
	margin-top: 373px;
	text-align: center;
	font-weight: 100;
	font-size: 25px;
	background: rgba(0,0,0,0.8);
	-webkit-box-shadow: 0 0 30px rgba(0,0,0,0.7);
	        box-shadow: 0 0 30px rgba(0,0,0,0.8);
}

.date h4 {
	color: #444444;
	font-weight: 300;
	text-align: center;
	padding-top: 10px;
	letter-spacing: 3px;
	text-shadow: 0 0 3px rgba(0,0,0,0.9);
}

/* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;

  /* Position the tooltip text */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;

  /* Fade in tooltip */
  opacity: 0;
  transition: opacity 0.3s;
}

/* Tooltip arrow */
.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

</style>