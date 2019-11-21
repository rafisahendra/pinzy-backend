<div class="content-wrapper">
    <?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "edit":
   
     if($_SERVER['REQUEST_METHOD'] == "POST"){
         $id_spek = $_POST['id_spek'];
        $cekspek=  mysqli_query($kon,"UPDATE tb_spesifikasi SET jenis_spek='".$_POST['jenis_spek']."',spesifikasi='".$_POST['spek']."' where id_spesifikasi=".$id_spek);
        if($cekspek) {
          echo "<script>
              alert('Edit Data Spesifikasi Berhasil');
                </script>";
          }else{
            echo "<script>alert('Gagal');
                </script>";
         }
        
      
   
    }
?>

    <!-- Halaman Input Data -->
    <section class="content-header">
        <h1>Edit spesifikasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Produk</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <a href="index.php?module=produk/view" style="margin:10px; "
                        class="btn btn-success fa fa-reply">Kembali</a>
                    <div class="box-header with-border">

                    </div>
                    <!-- form start -->

                    <div class="box-body">
                    <?php 
                      $detail = mysqli_query($kon," SELECT * FROM tb_spesifikasi where id_produk=$_GET[id] "); 
                    foreach($detail as $no=> $dp){ ?>
                        <div class="col-sm-12">

                        
                            <form method="POST" class="user form-horizontal" action="" enctype="multipart/form-data">

                                <div class="form-group">

                                    <label for="spek" class="col-sm-2 control-label">Jenis Spesifikasi <?= $no+1?></label>
                                    <div class="col-sm-4">
                                        <input name="jenis_spek" type="text" class="form-control"
                                            value="<?= $dp['jenis_spek'] ?>" required>
                                        <input type="hidden" name="id_spek" value="<?= $dp['id_spesifikasi'] ?>">
                                    </div>
                                    <label for="spek" class="col-sm-2 control-label">Detail</label>
                                    <div class="col-sm-4">
                                        <input name="spek" type="text" class="form-control"
                                            value="<?= $dp['spesifikasi'] ?>" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-4 col-md-offset-2">
                                        <button style="margin-bottom:5px;" type="submit"
                                            class="form-control btn btn-info"><i class="fa fa-edit"></i> Edit
                                            spesifikasi</button>
                                        <a class="btn btn-danger form-control fa fa-trash-o"
                                            href="?module=produk/edit_spesifikasi&aksi=hapus&id=<?= $dp['id_spesifikasi'] ?>">
                                            Hapus spesifikasi</a>
                                    </div>

                                </div>

                       

                        </form>

                        </div>
                  
                    <?php } ?>
                    </div>
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
          
            "<label for='spek' style='margin-top:10px'  class='col-sm-2 control-label'>Jenis Spesifikasi " + nextform + "</label>" +
            "<div class='col-sm-4' style='margin-top:10px'; >" +
                "<input name='jenis_spek[]' type='text' id='jenis_spek'  class='form-control' placeholder='Jenis Spesifikasi' required>" +
            "</div>" +
            "<label for='spek' style='margin-top:10px'   class='col-sm-2 control-label'>Detail " + nextform + "</label>" +
            "<div class='col-sm-4'style='margin-top:10px' >" +
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
    </section>

    <section class="content">

<div class="row">
    <div class="col-xs-12">
    <h4>Tambah Spesifikasi</h4>
      <div class="box box-info">
        <div class="box-header with-border">
          <form action="?module=produk/edit_spesifikasi&aksi=tambah_spek&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-xm-12">
               
              <hr>
                    <div id="insert-form">
                    <div class="form-group">
                        <label for="spek" class="col-sm-2 control-label">Jenis Spesifikasi</label>
                        <div class="col-sm-4">
                            <input name="jenis_spek[]" type="text"  class="form-control" placeholder="Jenis Spesifikasi" required>
                        </div>
                        <label for="spek" class="col-sm-2 control-label">Detail</label>
                        <div class="col-sm-4">
                            <input name="spek[]" type="text"  class="form-control" placeholder="Detail" required>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5 col-md-offset-2 " style="margin-top:20px;">
                      <button type="button" id="btn-tambah-form" class="form-control btn btn-info"><i
                          class="fa fa-plus"></i> Tambah spesifikasi</button>
                    </div>
                  </div>
                  

                
              </div>
              <div class="form-group " >
                    <div class="col-sm-2 col-sm-offset-4 " style="margin-top:50px;">
                      <button type="submit" class="btn btn-primary btn-flat btn-block" ><i
                          class=""></i> Simpan spesifikasi</button>
                    </div>
                    <div class="col-sm-2 "  style="margin-top:50px">
                      <a  href="index.php?module=produk/view" class=" btn btn-warning btn-flat btn-block "> Batal</a>
                      </div>
                  </div>
                  </div>
                  <input type="hidden" id="jumlah-form" value="1">
     
          </form>

        </div>
      </div>
    </div>
  </div>
  </section>





    <?php
break;
case "hapus";
if(isset($_GET['id']))
    {
        // ambiak id fotonyo lu
        $id_spek = $_GET['id'];
        // hapus data spek dari database
  
        mysqli_query($kon, "DELETE from tb_spesifikasi where id_spesifikasi='$_GET[id]'");

    
          echo "<script>alert('Data Berhasil Dihapus');</script>";
          echo "<script>window.history.back();</script>";
    
    }
    else
    {
      echo "<script>alert('Data Gagal Dihapus');</script>";
      echo "<script>alert('index.php?module=produk/edit_spesifikasi');</script>";
    }
?>
    <?php
break;
case "tambah_spek" :

if($_SERVER['REQUEST_METHOD'] == "POST"){
  
    $id_produk = $_GET['id'];
    $data_spek = $_POST['spek'];

    foreach($data_spek as $i => $spek)
    {
    
      mysqli_query($kon, "INSERT INTO tb_spesifikasi (id_produk, jenis_spek, spesifikasi) VALUES 
      (".$id_produk.", '".$_POST['jenis_spek'][$i]."', '".$spek."')");
    }

    echo "<script>window.history.back();</script>";
}
break;

}
  }
?>
</div>