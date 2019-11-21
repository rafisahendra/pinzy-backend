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
  <li <?=aktifkanTab($_GET['module'], "produk/view")?>><a href="index.php?module=produk/view">Produk</a></li>
    <li <?=aktifkanTab($_GET['module'], "kategori/view")?>><a href="index.php?module=kategori/view">Katgori</a></li>
    <li <?=aktifkanTab($_GET['module'], "brand/view")?>><a href="index.php?module=brand/view">Brand</a></li>    
  </ul>
</div>
