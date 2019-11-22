<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambah" :
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      // masukan data produk terlebih dahulu
 
      $save= mysqli_query($kon,"INSERT INTO tb_produk ( nama_produk, id_kategori, kuantitas, harga_prioritas, harga_reguler,diskon, merk, tgl_masuk, perusahaan,`rekomendasi`, `flash_sale`, `terjual`, id_area,deskripsi,purna_jual,kode_produk) VALUES ('$_POST[nama_p]','$_POST[kategori]','$_POST[kuantitas]','$_POST[harga_p]','$_POST[harga_r]','$_POST[diskon]','$_POST[merk]','$_POST[tgl_masuk]','$_POST[perusahaan]','$_POST[rekomendasi]','$_POST[flash_s]','0','$_POST[area]','$_POST[deskripsi]','$_POST[purna_jual]','$_POST[kode_p]')");

      //ambil id produk dari produk yg diinsert tadi
      $id_produk = mysqli_fetch_array(mysqli_query($kon, "SELECT LAST_INSERT_ID() as id_produk"));
      // $id = $save->insert_id();
      $data_spek = $_POST['spek'];
      foreach($data_spek as $i => $spek)
      {
      
        mysqli_query($kon, "INSERT INTO tb_spesifikasi (id_produk, jenis_spek, spesifikasi) VALUES 
        (".$id_produk['id_produk'].", '".$_POST['jenis_spek'][$i]."', '".$spek."')");
      }

      $data_foto = $_FILES['uploadf']['name'];
      $lokasi    =  $_FILES['uploadf']['tmp_name'];
     
      foreach($data_foto as $i => $allfoto)  
      {
       
        if(!empty($lokasi)){
          $nama_baru= date('Ymdhis').$allfoto;
          move_uploaded_file($lokasi[$i], "../../android/images/produk/".$nama_baru);
         }
        
         mysqli_query($kon,"INSERT INTO tb_gambar(gambar_produk,id_produk)
         VALUES('".$nama_baru."','".$id_produk['id_produk']."') ");

      }


          echo "<script>
              alert('Tambah Data Berhasil');
              window.location='?module=produk/view';
              </script>";
              exit;
      }
?>

  <!-- Halaman Input Data -->
  <section class="content-header">
    <h1>
      Tambah Produk
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tambah Produk</li>
    </ol>
  </section>
  <!-- Content Header (Page header) -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <a href="index.php?module=produk/view" style="margin:10px; " class="btn btn-success fa fa-reply"> Kembali</a>
          <div class="box-header with-border">

          </div>
          <!-- form start -->
          <form method="POST" class="user form-horizontal" action="" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-4">
                    <input name="nama_p" type="text" class="form-control" placeholder="Nama Produk" required>
                  </div>
                  <label for="" class="col-sm-2 control-label">Merek</label>
                  <div class="col-sm-4">
                    <select name="merk" id="" class="form-control">
                      <?php
                                  $m = mysqli_query($kon, "SELECT * FROM tb_brand");
                                  while($mrk = mysqli_fetch_assoc($m)){
                                ?>
                      <option value="<?= $mrk['id_brand']?>"><?=$mrk['nama_brand']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-4">
                    <select name="kategori" id="kategori" class="form-control" required>
                      <?php
                                $k = mysqli_query($kon, "SELECT * FROM tb_kategori");
                                while($kat=mysqli_fetch_assoc($k)){
                              ?>
                      <option value="<?=$kat['id_kategori']?>"><?=$kat['nama_kategori']?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <label for="" class="col-sm-2 control-label">Kode Produk</label>
                  <div class="col-sm-4">
                    <input name="kode_p" type="text" class="form-control" placeholder="Kode Produk" required>
                  </div>
                </div>

                <hr>
                <div id="insert-form">
                  <div class="form-group">

                    <label for="spek" class="col-sm-2 control-label">Jenis Spesifikasi</label>
                    <div class="col-sm-4">
                      <input name="jenis_spek[]" type="text" class="form-control" placeholder="Jenis Spesifikasi"
                        required>
                    </div>
                    <label for="spek" class="col-sm-2 control-label">Detail</label>
                    <div class="col-sm-4">
                      <input name="spek[]" type="text" class="form-control" placeholder="Detail" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="button" id="btn-tambah-form" class="form-control btn btn-primary"><i
                        class="fa fa-plus"></i> Tambah Spesifikasi</button>
                  </div>
                </div>

                <hr>

                <div id="insert-form2">
                  <div class="form-group">
                    <label for="uploadf" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-4">
                      <input name="uploadf[]" type="file" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="button" id="btn-tambah-form2" class="form-control btn btn-info"><i
                        class="fa fa-plus"></i> Tambah Foto</button>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Harga Prioritas</label>
                  <div class="col-sm-4">
                    <input name="harga_p" type="number" class="form-control" placeholder="Harga Prioritas" required>
                  </div>
                  <label for="" class="col-sm-2 control-label">Harga Reguler</label>
                  <div class="col-sm-4">

                    <input name="harga_r" type="number" class="form-control" placeholder="Harga Reguler" required>
                  </div>
                </div>



                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Perusahaan</label>
                  <div class="col-sm-4">
                    <input name="perusahaan" type="text" class="form-control" placeholder="Perusahaan" required>
                  </div>

                  <label for="" class="col-sm-2 control-label">Rekomendasi</label>
                  <div class="col-sm-4">
                    <select name="rekomendasi" class="form-control" id="" required>
                      <option value="">-- Silahkan Pilih --</option>
                      <option value="Y">Ya</option>
                      <option value="T">Tidak</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tanggal Masuk</label>
                  <div class="col-sm-4">
                    <input name="tgl_masuk" type="date" class="form-control" placeholder="Tanggal Masuk" required>
                  </div>
                  <label for="" class="col-sm-2 control-label">Flash Sale</label>
                  <div class="col-sm-4">
                    <select name="flash_s" class="form-control" id="" required>
                      <option value="">-- Silahkan Pilih --</option>
                      <option value="Y">Ya</option>
                      <option value="T">Tidak</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kuantitas</label>
                  <div class="col-sm-4">
                    <input name="kuantitas" type="number" class="form-control" placeholder="Kuantitas" required>
                  </div>

                    <label for="" class="col-sm-2 control-label">Diskon</label>
                  <div class="col-sm-4">
                    <input name="diskon" type="number" class="form-control" placeholder="Diskon " required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label" required>Area</label>
                  <div class="col-sm-4">
                    <select name="area" id="" class="form-control">
                      <option value="">-- Silahkan Pilih Area --</option>
                      <?php
                                  $m = mysqli_query($kon, "SELECT * FROM tb_area");
                                  while($are = mysqli_fetch_assoc($m)){
                                ?>
                      <option value="<?= $are['id_area']?>"><?=$are['nama_area']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control editor" name="deskripsi" required></textarea>

                  </div>
                  <div class="col-sm-12">
                    <label for="">Purna Jual</label>
                    <textarea class="form-control editor" name="purna_jual" required></textarea>

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-2 text-left">
                    <button type="submit" name="save1" class=" btn btn-primary btn-flat btn-block "> Simpan</button>
                  </div>
                  <div class="col-sm-2 text-right">
                    <a href="index.php?module=produk/view" class=" btn btn-warning btn-flat btn-block "> Batal</a>
                  </div>
                </div>

              </div>
            </div>
        </div>
        </form>
        <input type="hidden" id="jumlah-form" value="1">
        <input type="hidden" id="jumlah-form2" value="1">
      </div>
    </div>
</div>
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function () { // Ketika halaman sudah diload dan siap
    $('.editor').summernote();
    $("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $("#insert-form").append(
        "<div class='form-group'>" +

        "<label for='spek' class='col-sm-2 control-label'>Jenis Spesifikasi " + nextform + "</label>" +
        "<div class='col-sm-4'>" +
        "<input name='jenis_spek[]' type='text' id='jenis_spek'  class='form-control' placeholder='Jenis Spesifikasi' required>" +
        "</div>" +
        "<label for='spek' class='col-sm-2 control-label'>Detail " + nextform + "</label>" +
        "<div class='col-sm-4'>" +
        "<input name='spek[]' type='text' id='spek'  class='form-control' placeholder='Detail' required>" +
        "</div>" +
        "</div>"
      );

      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function () {
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
</script>
<!-- Tambah Foto -->

<script>
  $(document).ready(function () { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-form2").click(function () { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form2").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $("#insert-form2").append(
        "<div class='form-group'>" +


        "<label for='uploadf' class='col-sm-2 control-label'>Foto " + nextform + "</label>" +
        "<div class='col-sm-4'>" +
        "<input name='uploadf[]' type='file' id='uploadf'  class='form-control' required>" +
        "</div>" +
        "</div>"
      );

      $("#jumlah-form2").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form2").click(function () {
      $("#insert-form2").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form2").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
</script>
</section>



<?php
    break;
    case "edit":
    if(isset($_GET['id'])){
      $sql = mysqli_query($kon, "SELECT * FROM tb_produk where id_produk='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
      $id_kategori= $data['id_kategori'];
      $id_brand   = $data['merk'];
      $id_area2   = $data['id_area'];
      $rekomendasi  = $data['rekomendasi'];
      $flash_sale   = $data['flash_sale'];
    }
     if($_SERVER['REQUEST_METHOD'] == "POST"){



      $cekup =  mysqli_query($kon, "UPDATE `tb_produk` SET `nama_produk`='$_POST[nama_p]',`id_kategori`='$_POST[kategori]',`kuantitas`='$_POST[kuantitas]',`harga_prioritas`='$_POST[harga_p]',`harga_reguler`='$_POST[harga_r]',diskon='$_POST[diskon]',`merk`='$_POST[merk]',`tgl_masuk`='$_POST[tgl_masuk]',`perusahaan`='$_POST[perusahaan]',`rekomendasi`='$_POST[rekomendasi]',`flash_sale`='$_POST[flash_s]',`terjual`='0',`id_area`='$_POST[area]',`deskripsi`='$_POST[deskripsi]',`purna_jual`='$_POST[purna_jual]',`kode_produk`='$_POST[kode_p]' WHERE id_produk='$_GET[id]'");

		  
     
       
  
      if($cekup) {
        echo "<script>
            alert('Edit Data Produk Berhasil');
            window.location='?module=produk/view';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>

<!-- Halaman Edit Data -->
<section class="content-header">
  <h1>
    Edit Produk
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Produk</li>
  </ol>
</section>
<!-- Content Header (Page header) -->

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <a href="index.php?module=produk/view" style="margin:10px; " class="btn btn-success fa fa-reply"> Kembali</a>
        <div class="box-header with-border">

        </div>
        <!-- form start -->
        <form method="POST" class="user form-horizontal" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Nama Produk</label>
                <div class="col-sm-4">
                  <input name="nama_p" type="text" class="form-control" value="<?= $data['nama_produk']?>" required>
                </div>
                <label for="" class="col-sm-2 control-label">Merek</label>
                <div class="col-sm-4">
                  <select name="merk" id="" class="form-control">
                    <?php
                                  $m = mysqli_query($kon, "SELECT * FROM tb_brand");
                                  while($mrk = mysqli_fetch_assoc($m)){
                                   
                                ?>
                    <option value="<?= $mrk['id_brand']?>"><?=$mrk['nama_brand']?></option>

                    <?php } ?>
                  </select>
                </div>

              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-4">
                  <select name="kategori" id="kategori" class="form-control" required>
                    <?php
                                $k = mysqli_query($kon, "SELECT * FROM tb_kategori");
                                while($kat=mysqli_fetch_assoc($k)){
                                 
                              ?>
                    <option value="<?=$kat['id_kategori']?>"><?=$kat['nama_kategori']?></option>
                    <?php } ?>
                  </select>
                </div>
                <label for="" class="col-sm-2 control-label">Kode Produk</label>
                <div class="col-sm-4">
                  <input name="kode_p" type="text" class="form-control" value="<?= $data['kode_produk']?>" required>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Harga Prioritas</label>
                <div class="col-sm-4">
                  <input name="harga_p" type="number" class="form-control" value="<?= $data['harga_prioritas'] ?>"
                    required>
                </div>
                <label for="" class="col-sm-2 control-label"> Harga Reguler</label>
                <div class="col-sm-4">

                  <input name="harga_r" type="number" class="form-control" value="<?= $data['harga_reguler']?>"
                    required>
                </div>
              </div>



              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Perusahaan</label>
                <div class="col-sm-4">
                  <input name="perusahaan" type="text" class="form-control" value="<?= $data['perusahaan']?>" required>
                </div>

                <label for="" class="col-sm-2 control-label">Rekomendasi</label>
                <div class="col-sm-4">
                  <select name="rekomendasi" class="form-control" id="rekomendasi" required>
                    <option value="">-- Silahkan Pilih --</option>
                    <option value="Y">Ya</option>
                    <option value="T">Tidak</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Tanggal Masuk</label>
                <div class="col-sm-4">
                  <input name="tgl_masuk" type="date" class="form-control" value="<?= $data['tgl_masuk'] ?>" required>
                </div>
                <label for="" class="col-sm-2 control-label">Flash Sale</label>
                <div class="col-sm-4">
                  <select name="flash_s" class="form-control" id="" required>
                    <option value="">-- Silahkan Pilih --</option>
                    <option value="Y">Ya</option>
                    <option value="T">Tidak</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Kuantitas</label>
                <div class="col-sm-4">
                  <input name="kuantitas" type="number" class="form-control" value="<?= $data['kuantitas']?>" required>
                </div>
                 <label for="" class="col-sm-2 control-label">Diskon</label>
                  <div class="col-sm-4">
                    <input name="diskon" type="number" class="form-control" value="<?= $data['diskon']?>" required>
                  </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label" required>Area</label>
                <div class="col-sm-4">
                  <select name="area" id="" class="form-control">
                    <option value="">-- Silahkan Pilih Area --</option>
                    <?php
                                  $m = mysqli_query($kon, "SELECT * FROM tb_area");
                                  while($are = mysqli_fetch_assoc($m)){
                                ?>
                    <option value="<?= $are['id_area']?>"><?=$are['nama_area']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="">Deskripsi</label>
                  <textarea class="form-control editor" name="deskripsi" required><?= $data['deskripsi'] ?></textarea>

                </div>
                <div class="col-sm-12">
                  <label for="">Purna Jual</label>
                  <textarea class="form-control editor" name="purna_jual" required><?= $data['purna_jual'] ?></textarea>

                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2 text-left">
                  <button type="submit" name="save1" class=" btn btn-primary btn-flat btn-block "> Update</button>
                </div>
                <div class="col-sm-2 text-right">
                  <a href="index.php?module=produk/view" class=" btn btn-warning btn-flat btn-block "> Batal</a>
                </div>
              </div>


            </div>
        </form>
        <input type="hidden" id="jumlah-form" value="1">
        <input type="hidden" id="jumlah-form2" value="1">
      </div>
    </div>
  </div>


  <script>
    document.getElementsByName("kategori")[0].value = "<?= $id_kategori ?>";
    document.getElementsByName("merk")[0].value = "<?= $id_brand ?>";
    document.getElementsByName("area")[0].value = "<?= $id_area2  ?>";
    document.getElementsByName("rekomendasi")[0].value = "<?= $rekomendasi?>"
    document.getElementsByName("flash_s")[0].value = "<?= $flash_sale?>"
  </script>

  <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () { // Ketika halaman sudah diload dan siap
      $('.editor').summernote();
      $("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

        // Kita akan menambahkan form dengan menggunakan append
        // pada sebuah tag div yg kita beri id insert-form
        $("#insert-form").append(
          "<div class='form-group'>" +

          "<label for='spek' class='col-sm-2 control-label'>Jenis Spesifikasi " + nextform + "</label>" +
          "<div class='col-sm-4'>" +
          "<input name='jenis_spek[]' type='text' id='jenis_spek'  class='form-control' placeholder='Jenis Spesifikasi' required>" +
          "</div>" +
          "<label for='spek' class='col-sm-2 control-label'>Detail " + nextform + "</label>" +
          "<div class='col-sm-4'>" +
          "<input name='spek[]' type='text' id='spek'  class='form-control' placeholder='Detail' required>" +
          "</div>" +
          "</div>"
        );

        $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
      });

      // Buat fungsi untuk mereset form ke semula
      $("#btn-reset-form").click(function () {
        $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
      });
    });
  </script>
  <!-- Tambah Foto -->

  <script>
    $(document).ready(function () { // Ketika halaman sudah diload dan siap
      $("#btn-tambah-form2").click(function () { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form2").val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

        // Kita akan menambahkan form dengan menggunakan append
        // pada sebuah tag div yg kita beri id insert-form
        $("#insert-form2").append(
          "<div class='form-group'>" +


          "<label for='uploadf' class='col-sm-2 control-label'>Foto " + nextform + "</label>" +
          "<div class='col-sm-4'>" +
          "<input name='uploadf[]' type='file' id='uploadf'  class='form-control' required>" +
          "</div>" +
          "</div>"
        );

        $("#jumlah-form2").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
      });

      // Buat fungsi untuk mereset form ke semula
      $("#btn-reset-form2").click(function () {
        $("#insert-form2").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form2").val("1"); // Ubah kembali value jumlah form menjadi 1
      });
    });
  </script>
</section>


<!-- Stok -->

<?php
    break;
    case "tambah_stok":
    if(isset($_GET['id'])){
      $sql = mysqli_query($kon, "SELECT * FROM tb_produk where id_produk='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
      
    }
     if($_SERVER['REQUEST_METHOD'] == "POST"){
     $stok_lama  = $data['kuantitas'] ; 
     $tambah_stok= $_POST['tambah_stok'];
     $stok_baru  = $stok_lama + $tambah_stok;
     $tanggal    = date('Y-m-d');
       mysqli_query($kon, "UPDATE `tb_produk` SET `kuantitas`='$stok_baru' WHERE id_produk='$_GET[id]'");

       $cekup = mysqli_query($kon,"INSERT INTO tb_stok (id_produk, tgl_input_stok, jml_input_stok)values('$_GET[id]','$tanggal','$tambah_stok')");
     
       
  
      if($cekup) {
        echo "<script>
            alert('Edit Data Produk Berhasil');
            window.location='?module=produk/view';
              </script>";
        }else{
          echo "<script>alert('Gagal Tambah');
              </script>";
       }
    }
?>

<!-- Halaman Edit Data -->
<section class="content-header">
  <h1>
    Tambah Stok
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tambah Stok</li>
  </ol>
</section>
<!-- Content Header (Page header) -->

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <a href="index.php?module=produk/view" style="margin:10px; " class="btn btn-success fa fa-reply"> Kembali</a>
        <div class="box-header with-border">

        </div>
        <!-- form start -->
        <form method="POST" class="user form-horizontal" action="?module=produk/aksi&aksi=tambah_stok&id=<?=$_GET['id']?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="col-sm-12">
              <div class="form-group">
              
                <div class="col-sm-4">
                  <?php
                           $sqlg = mysqli_query($kon, "SELECT * FROM tb_gambar where id_produk='$_GET[id]'");
                           $im=mysqli_fetch_assoc($sqlg);
                          ?>
                  <p><img style="width:300px;height:300px;" src="../../android/images/produk/<?= $im['gambar_produk']?>"
                      alt=""></p>
                </div>
                <div class="col-md-6">
                  <div class="form-group">

                    <p><b>Kode Produk :</b> <?= $data['nama_produk']?></p><br>
                    <p><b>Kode Produk :</b> <?= $data['kode_produk']?></p><br>
                    <p><b>Kode Produk :</b> <?= $data['kode_produk']?></p><br>

                  </div>
                </div>
                <div class="col-md-2 text-left">
                  <div class="form-group">

                    <p><b>Kode Produk :</b> <?= $data['kode_produk']?></p><br>
                <div class="">
                  <label>Tambah Jumlah</label>
                  <input name="tambah_stok" type="number" class="form-control"required>
                  <br>
                  <div class="row">
                <div class="col-sm-6">
                  <button type="submit" name="" class=" btn btn-primary btn-flat btn-block "> Simpan</button>
                </div>
                <div class="col-sm-6">
                  <a href="index.php?module=produk/view" class=" btn btn-warning btn-flat btn-block "> Batal</a>
                </div>
                </div>
                </div>
                   

                  </div>
                </div>

              </div>
              <?php
                $spek7 = mysqli_query($kon,"SELECT * FROM tb_spesifikasi where id_produk ='$_GET[id]'");
                foreach($spek7 as $row):
              ?>
              <div class="row">
              <div class="col-sm-12">
                
              <div class="form-group">
                
                <div class="col-sm-3">
                <label for="" class=" control-label">Spesifikasi</label>
                <p> <?= $row['jenis_spek']?></p><br>
                
                </div>
               
                <div class="col-sm-3">
                <label for="" class="control-label">Detail</label>
                <p> <?= $row['spesifikasi']?></p><br>
             
                </div>

              
                
               
              
            
  

              </div>
              </div>
              </div>
              
            <?php endforeach ?>
           
        

              <hr>


            
            

            </div>
        </form>
        <input type="hidden" id="jumlah-form" value="1">
        <input type="hidden" id="jumlah-form2" value="1">
      </div>
    </div>
  </div>


  <script>
    document.getElementsByName("kategori")[0].value = "<?= $id_kategori ?>";
    document.getElementsByName("merk")[0].value = "<?= $id_brand ?>";
    document.getElementsByName("area")[0].value = "<?= $id_area2  ?>";
    document.getElementsByName("rekomendasi")[0].value = "<?= $rekomendasi?>"
    document.getElementsByName("flash_s")[0].value = "<?= $flash_sale?>"
  </script>

  <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () { // Ketika halaman sudah diload dan siap
      $('.editor').summernote();
      $("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

        // Kita akan menambahkan form dengan menggunakan append
        // pada sebuah tag div yg kita beri id insert-form
        $("#insert-form").append(
          "<div class='form-group'>" +

          "<label for='spek' class='col-sm-2 control-label'>Jenis Spesifikasi " + nextform + "</label>" +
          "<div class='col-sm-4'>" +
          "<input name='jenis_spek[]' type='text' id='jenis_spek'  class='form-control' placeholder='Jenis Spesifikasi' required>" +
          "</div>" +
          "<label for='spek' class='col-sm-2 control-label'>Detail " + nextform + "</label>" +
          "<div class='col-sm-4'>" +
          "<input name='spek[]' type='text' id='spek'  class='form-control' placeholder='Detail' required>" +
          "</div>" +
          "</div>"
        );

        $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
      });

      // Buat fungsi untuk mereset form ke semula
      $("#btn-reset-form").click(function () {
        $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
      });
    });
  </script>
  <!-- Tambah Foto -->

  <script>
    $(document).ready(function () { // Ketika halaman sudah diload dan siap
      $("#btn-tambah-form2").click(function () { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form2").val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

        // Kita akan menambahkan form dengan menggunakan append
        // pada sebuah tag div yg kita beri id insert-form
        $("#insert-form2").append(
          "<div class='form-group'>" +


          "<label for='uploadf' class='col-sm-2 control-label'>Foto " + nextform + "</label>" +
          "<div class='col-sm-4'>" +
          "<input name='uploadf[]' type='file' id='uploadf'  class='form-control' required>" +
          "</div>" +
          "</div>"
        );

        $("#jumlah-form2").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
      });

      // Buat fungsi untuk mereset form ke semula
      $("#btn-reset-form2").click(function () {
        $("#insert-form2").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form2").val("1"); // Ubah kembali value jumlah form menjadi 1
      });
    });
  </script>
</section>
<!-- /Stok -->




<?php
    break;
    case "hapus" :

    if(isset($_GET['id'])){
      
      mysqli_query($kon, "DELETE from tb_produk where id_produk='$_GET[id]'");
      mysqli_query($kon, "DELETE from tb_gambar where id_produk='$_GET[id]'");
      mysqli_query($kon, "DELETE from tb_spesifikasi where id_produk='$_GET[id]'");

      // $del = mysqli_query($kon, "DELETE  a*,b*,c* FROM tb_produk a,tb_gambar b ,tb_spesifikasi c where a.id_produk = '$_GET[id]' AND b.id_produk = '$_GET[id]' AND c.id_produk = '$_GET[id]'");
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=produk/view';
    				  </script>";
    
    }  else{
      echo "<script>
              alert('Data Gagal Dihapus');
              window.location='index.php?module=produk/view';
            </script>";
    }

  
?>
<?php
break;
}
}
?>
</div>