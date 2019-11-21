<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "edit":
   
     if($_SERVER['REQUEST_METHOD'] == "POST"){
        $data_foto = $_FILES['fuploadlama']['name'];
        $lokasi    =  $_FILES['fuploadlama']['tmp_name'];
        $id_foto = $_POST['id_foto'];
        
      
        // ambil nama foto lama
        $foto_lama = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM tb_gambar WHERE id_gambar = ".$id_foto));
  
        // cek dulu ado ndak file fotonyo, kalau ado, hapus foto lamonyo
        if(file_exists("../../android/images/produk/".$foto_lama['gambar_produk']))
        {
            // hapus file fotonyo 
            unlink("../../android/images/produk/".$foto_lama['gambar_produk']);
        }
  
       if(!empty($lokasi)){
        // upload foto baru
        $nama_baru = date('Ymdhis').$data_foto; // kasih nama fotonya
        move_uploaded_file($lokasi, "../../android/images/produk/".$nama_baru); // proses upload foto
      }else{
        $nama_baru=$_POST["fuploadlama"];
    
       }
        // update data foto di database
        $cekup=  mysqli_query($kon,"UPDATE tb_gambar SET gambar_produk='".$nama_baru."' where id_gambar=".$id_foto);
        if($cekup) {
          echo "<script>
              alert('Edit Foto Berhasil');
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
      Edit Foto
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Foto</li>
    </ol>
  </section>
  <!-- Content Header (Page header) -->

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <a href="index.php?module=produk/view" style="margin:10px; " class="btn btn-success fa fa-reply">Kembali</a>
          <div class="box-header with-border">
         
          </div>
          <div class="box-body">
          <!-- form start -->
          <?php 
                    $jpg = mysqli_query($kon," SELECT * FROM tb_gambar where id_produk=$_GET[id] "); 
                    foreach($jpg as $no=> $jp){  
                    ?>
                    <div class="col-xs-12 col-sm-6">
          <form method="POST" class="user form-horizontal" action="" enctype="multipart/form-data">
            
              

                <div class="form-group">
                  <label for="fuploadlama" class="col-sm-2 control-label">Foto <?= $no+1; ?></label>
                  <div class="col-sm-4">
                    <img style="height:90px;width:90px; margin-left:30px;margin-bottom:30px;margin-top:30px;"  src="../../android/images/produk/<?= $jp['gambar_produk'] ?>"
                      alt="">
                  
                    <input name="fuploadlama" type="file" class="form-control" value="<?= $jp['gambar_produk']?>" required >
                    <input type="hidden" name="id_foto" value="<?= $jp['id_gambar'] ?>" >
                    <input type="hidden" name="fuploadlama" value="<?= $jp['gambar_produk'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button style="margin-bottom:5px;" type="submit" class="form-control btn btn-info"><i class="fa fa-edit"></i> Edit
                      Foto</button>
                    <a class="btn btn-danger form-control fa fa-trash-o"
                      href="?module=produk/edit_foto&aksi=hapus&id=<?= $jp['id_gambar'] ?>"> Hapus Foto</a>
                  </div>
                </div>
              </div>
          </form>
          <?php } ?>
                    </div>
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


          
            "<div class='col-sm-5  col-md-offset-2'>" +
            "<label for='uploadf' style='margin-top:5px;' class='col-sm-2 control-label'>Foto" + nextform + "</label>" +
            "<input name='uploadf[]' type='file' id='uploadf'  class='form-control' required>" +
            "</div>" +
            "</div>"+
            "<div class='col-dm-5'></div>"
          );

          $("#jumlah-form2").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form2").click(function () {
          $("#insert-form2").html(""); // Kita kosongkan isi dari div insert-form " + nextform + "
          $("#jumlah-form2").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
      });
    </script>
  </section>

<section class="content">

  <div class="row">
      <div class="col-xs-12">
      <h4>Tambah Foto</h4>
        <div class="box box-info">
          <div class="box-header with-border">
            <form action="?module=produk/edit_foto&aksi=tambah_foto&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-xm-12">
                 
                    <div id="insert-form2">
                      <div class="form-group">  
                        <div class="col-sm-5 col-md-offset-2">
                        <label for="uploadf" class="col-sm-2 control-label">Foto</label>
                          <input name="uploadf[]" type="file" class="form-control" required>
                        </div>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-5 col-md-offset-2 " style="margin-top:20px;">
                        <button type="button" id="btn-tambah-form2" class="form-control btn btn-info"><i
                            class="fa fa-plus"></i> Tambah Foto</button>
                      </div>
                    </div>
                    

                  
                </div>
                <div class="form-group " >
                      <div class="col-sm-2  col-md-offset-4 "  style="margin-top:50px">
                        <button type="submit" class="btn btn-primary btn-flat btn-block" ><i
                            class=""></i> Simpan foto</button>
                      </div>
                      <div class="col-sm-2  "  style="margin-top:50px">
                      <a  href="index.php?module=produk/view" class=" btn btn-warning btn-flat btn-block "> Batal</a>
                      </div>
                    </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
          <input type="hidden" id="jumlah-form2" value="1">
            </form>

          </div>
        </div>
      </div>
    </div>
    </section>

  <?php
    break;
    case "hapus" :

    if(isset($_GET['id']))
    {
        // ambiak id fotonyo lu
        $id_foto = $_GET['id'];
        
        // ambil nama foto
        $foto_lama = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM tb_gambar WHERE id_gambar = ".$id_foto));

        // cek dulu ado ndak file fotonyo, kalau ado, hapus foto lamonyo
        if(file_exists("../../android/images/produk/".$foto_lama['gambar_produk']))
        {
            // hapus file fotonyo 
            unlink("../../android/images/produk/".$foto_lama['gambar_produk']);
        }
        
        // hapus data gambar dari database
        mysqli_query($kon, "DELETE from tb_gambar where id_gambar='$_GET[id]'");

          echo "<script>alert('Data Berhasil Dihapus');</script>";
          echo "<script>location='index.php?module=produk/edit_foto&aksi=edit&id=".$foto_lama['id_produk']."';</script>";
    
    }
    else
    {
      echo "<script>alert('Data Gagal Dihapus');</script>";
      echo "<script>alert('index.php?module=produk/edit_foto');</script>";
    }
?>
  <?php
break;
case "tambah_foto" :

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $data_foto = $_FILES['uploadf']['name'];
  $lokasi    =  $_FILES['uploadf']['tmp_name'];
  $id_produk = $_GET['id'];
  foreach($data_foto as $i => $allfoto)  
  {
   
    if(!empty($lokasi)){
      $nama_baru= date('Ymdhis').$allfoto;
      move_uploaded_file($lokasi[$i], "../../android/images/produk/".$nama_baru);
     }
    
     mysqli_query($kon,"INSERT INTO tb_gambar(gambar_produk,id_produk)
     VALUES('".$nama_baru."','".$id_produk."') ");

  }

  echo "<script>location='index.php?module=produk/edit_foto&aksi=edit&id=".$id_produk."';</script>";
}



break;
}
}
?>
</div>