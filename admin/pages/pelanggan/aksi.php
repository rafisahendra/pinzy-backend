
<div class="content-wrapper">
<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambah" :
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $save= mysqli_query($kon,"INSERT INTO `tb_pelanggan`( `nama_pemilik`, `kode`, `password`, `alamat`, `kode_sales`, `id_area`, `nohp`, `email`, `jenis_pelanggan`, `kota`) VALUES ");

          echo "<script>
              alert('Tambah Data Berhasil');
              window.location='?module=sales/view';
              </script>";
              exit;
      }
?>
<!-- Halaman Input Data -->
<section class="content-header">
      <h1>
        Tambah Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Pelanggan</li>
      </ol>
</section>
<!-- Content Header (Page header) -->
  <section class="content">
  <div class="row">
      <div class="col-xs-12">
       <div class="box box-info">
         <div class="box-header with-border">

         </div>
            <!-- form start -->
            <form method="POST" class="user form-horizontal" action="" enctype="multipart/form-data">
              <div class="box-body">
			          <div class="col-sm-12">
                    
                <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama Pelanggan</label>
                        <div class="col-sm-4">
                            <input name="nama_pelanggn" type="text"  class="form-control" placeholder="Nama Pemilik" required>
                        </div>

                        <label for="" class="col-sm-2 control-label">Toko</label>
                        <div class="col-sm-4">
                            <input name="toko" type="text"  class="form-control" placeholder="Nama Pemilik" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tanggal Masuk</label>
                        <div class="col-sm-4">
                            <input name="tgl_masuk" type="date"  class="form-control" placeholder="Tanggal Masuk" required>
                        </div>
                        <label for="" class="col-sm-2 control-label">Plat Kendaraan</label>
                        <div class="col-sm-4">
                          <input type="text" name="plat_k"type="text" class="form-control" placeholder="Plat Kendaraan" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No Telepon</label>
                        <div class="col-sm-4">
                            <input name="no_telepon" type="number"  class="form-control" placeholder="No Telepon" required>
                        </div>
                        <label for="" class="col-sm-2 control-label">No Terdekat</label>
                        <div class="col-sm-4">
                    
                    <input name="no_terdekat" type="number"  class="form-control" placeholder="No Terdekat" required>
                        </div>
                    </div>
                    <hr>

                  
                    <div class="form-group">
							
                <div class="col-sm-12">
                  <label for="" >Alamat</label>
                  <textarea class="form-control editor"  name="alamat" required></textarea>

								</div>
							</div>

                    <div class="form-group">
                      <div class="col-sm-12 text-right">
                      <button type="submit" name=""  class=" btn btn-primary btn-flat btn-block">Simpan</button>
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
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
      $('.editor').summernote();
    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
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
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
<!-- Tambah Foto -->

<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-form2").click(function(){ // Ketika tombol Tambah Data Form di klik
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
    $("#btn-reset-form2").click(function(){
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
      $sql = mysqli_query($kon, "SELECT * FROM tb_sales where id_sales='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
    }
   
     if($_SERVER['REQUEST_METHOD'] == "POST"){
      $save=mysqli_query($kon, "UPDATE tb_sales SET nama_sales='$_POST[nama_sales]', id_area='$_POST[area_s]', tgl_masuk='$_POST[tgl_masuk]', alamat='$_POST[alamat]',no_telepon='$_POST[no_telepon]',no_terdekat='$_POST[no_terdekat]',plat_kendaraan='$_POST[plat_k]' where id_sales='$_GET[id]'");
      if($save) {
        echo "<script>
            alert('Edit Data Sales Berhasil');
            window.location='?module=sales/view';
              </script>";
        }else{
          echo "<script>alert('Gagal ');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
        Edit Sales
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Sales</li>
      </ol>
</section>
<!-- Content Header (Page header) -->
  <section class="content">
  <div class="row">
      <div class="col-xs-12">
       <div class="box box-info">
         <div class="box-header with-border">

         </div>
            <!-- form start -->
            <form method="POST" class="user form-horizontal" action="" enctype="multipart/form-data">
              <div class="box-body">
			          <div class="col-sm-12">
                    
                <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama Sales</label>
                        <div class="col-sm-4">
                            <input name="nama_sales" type="text"  class="form-control" value="<?= $data['nama_sales']?>" required>
                        </div>

                        <label for="" class="col-sm-2 control-label">Rekomendasi</label>
                        <div class="col-sm-4">
                            <select name="area_s" id="idarea" class="form-control">
                            <option value="">-- Silahkan Pilih Area --</option>
                                <?php
                                  $m = mysqli_query($kon, "SELECT * FROM tb_area");
                                  while($are = mysqli_fetch_assoc($m)){
                                    $id_area= $are['id_area'];
                                ?>
                                <option value="<?= $are['id_area']?>"><?=$are['nama_area']?></option>
                                  <?php } ?>
                            </select>
                           
                        </div>
                            <script>
                      
                              document.getElementsByName("area_s")[0].value = "<?= $id_area ?>";
                            </script>
                            
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tanggal Masuk</label>
                        <div class="col-sm-4">
                            <input name="tgl_masuk" type="date"  class="form-control"value="<?= $data['tgl_masuk']?>" required>
                        </div>
                        <label for="" class="col-sm-2 control-label">Plat Kendaraan</label>
                        <div class="col-sm-4">
                          <input type="text" name="plat_k"type="text" class="form-control"value="<?= $data['plat_kendaraan']?>" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No Telepon</label>
                        <div class="col-sm-4">
                            <input name="no_telepon" type="number"  class="form-control" value="<?= $data['no_telepon']?>" required>
                        </div>
                        <label for="" class="col-sm-2 control-label">No Terdekat</label>
                        <div class="col-sm-4">
                    
                    <input name="no_terdekat" type="number"  class="form-control" value="<?= $data['no_terdekat']?>" required>
                        </div>
                    </div>
                    <hr>

                  
                    <div class="form-group">
							
                <div class="col-sm-12">
                  <label for="" >Alamat</label>
                  <textarea class="form-control editor"  name="alamat" required><?= $data['alamat']?></textarea>

								</div>
							</div>

                    <div class="form-group">
                      <div class="col-sm-12 text-right">
                      <button type="submit" name=""  class=" btn btn-primary btn-flat btn-block">Update & Simpan</button>
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
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
      $('.editor').summernote();
    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
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
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
<!-- Tambah Foto -->

<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-form2").click(function(){ // Ketika tombol Tambah Data Form di klik
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
    $("#btn-reset-form2").click(function(){
      $("#insert-form2").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form2").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
</section>
<?php
    break;
    case "hapus" :

    if(isset($_GET['id'])){
      
      mysqli_query($kon, "DELETE from tb_sales where id_sales='$_GET[id]'");
   
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=sales/view';
    				  </script>";
    
    }  else{
      echo "<script>
              alert('Data Gagal Dihapus');
              window.location='index.php?module=sales/view';
            </script>";
    }



  break;
  case "konfirmasi" :

  if(isset($_GET['id'])){
    
   
    mysqli_query($kon, " UPDATE tb_pelanggan SET jenis_pelanggan='$_POST[jenis_p]' where id_pelanggan='$_GET[id]'");

      echo "<script>
               alert('Konfimasi Berhasil');
               window.location='index.php?module=pelanggan/view';
            </script>";
  
  }  else{
    echo "<script>
            alert('Konfirmasi Gagal');
            window.location='index.php?module=pelanggan/view';
          </script>";
  }
?>
<?php
break;
}
}
?>
 </div>
