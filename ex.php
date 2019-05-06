
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
    
    <td><a href="sil?id=<?php echo $row['id']; ?>">Sil</a> | <a href="profil?id=<?php echo $row['id']; ?>">Yorum Yap</a>
    </td>
    <
    <td><a href="profil?id=<?php echo $row['id']; ?>">Yorum Yap</a></td>
   
  </tr>

</table>