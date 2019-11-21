<?php
    function aktifkanTab($halaman_sekarang, $halaman)
    {
        if($halaman_sekarang == $halaman)
        {
            echo "class='active'";
        }
    }
?>
<div class="container">
  <h2></h2>
  <ul class="nav nav-tabs">
  <li <?=aktifkanTab($_GET['module'], "pelanggan/view")?>><a href="index.php?module=pelanggan/view">Data Pelanggan</a></li>
    <li <?=aktifkanTab($_GET['module'], "pelanggan/konfirmasi")?>><a href="index.php?module=pelanggan/konfirmasi">Konfirmasi</a></li>
     
  </ul>
</div>
