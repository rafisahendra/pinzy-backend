
<div class="content-wrapper">
<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambah" :
    
    if(isset($_POST['save1'])){
        $lokasi_file=$_FILES['fupload']['tmp_name'];
        $nama_file=$_FILES['fupload']['name'];
        $nama = date('Ymdhis').$nama_file;
        if(!empty($lokasi_file)){
            move_uploaded_file($lokasi_file, "../../android/images/kategori/".$nama);
        }
    
    $save= mysqli_query($kon,"INSERT INTO tb_kategori (nama_kategori,gambar_kategori) VALUES ('$_POST[kategori]','$nama')");
	 if($save) {
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=kategori/view';
            </script>";
            exit;
      }else{
        echo "<script>alert('Gagal');
            </script>";
      }
    }
?>
<section class="content-header">
      <h1>
        Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kategori</li>
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
            <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
              <div class="box-body">
			    <div class="col-sm-12">
					
                    <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama Kategori</label>
                        <div class="col-sm-8">
                            <input name="kategori" type="text"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Foto Kategori</label>
                        <div class="col-sm-8">
                            <input name="fupload" id="fupload" type="file"  class="form-control">
                        </div>
                    </div>
			
				    <div class="form-group">
					  <div class="col-sm-4 col-md-offset-2">
            <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
            <a href="?module=kategori/view" class="btn btn-primary btn-flat">Batal</a>
					  </div>
					</div>
			    </div>
          </form>
        </div>
      </div>
    </div>
</section>


<?php
    break;
    case "edit":
    if(isset($_GET['id'])){
      $sql = mysqli_query($kon, "SELECT * FROM tb_kategori where id_kategori='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){
		  
      $lokasi_file=$_FILES['fupload']['tmp_name'];
    $nama_file=$_FILES['fupload']['name'];
    if(!empty($lokasi_file)){
      move_uploaded_file($lokasi_file, "../../android/images/kategori/".$nama_file);
      }else{
     $nama_file=$_POST["fuploadlama"];
    }
    
      $save=mysqli_query($kon, "UPDATE tb_kategori set nama_kategori='$_POST[kategori]',  gambar_kategori='$nama_file' where id_kategori='$_GET[id]'");
      if($save) {
        echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=kategori/view';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
       Edit Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Kategori</li>
      </ol>
</section>

<section class="content">
  <div class="row">
      <div class="col-xs-12">
       <div class="box box-info">
         <div class="box-header with-border">

         </div>

            <!-- form start -->
            <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
              <div class="box-body">
			    <div class="col-sm-12">
				
        <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama Kategori</label>
                        <div class="col-sm-8">
                         <input name="kategori" type="text"  class="form-control" value="<?= $data['nama_kategori']?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Foto Kategori</label>
                        <div class="col-sm-8">
                        <input name="fuploadlama" id="fupload" type="hidden"  class="form-control" value="<?= $data['gambar_kategori']?>">
                            <input name="fupload" id="fupload" type="file"  class="form-control">
                        </div>
                    </div>
								
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
					<a href="?module=kategori/view" class="btn btn-primary btn-flat">Batal</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</section>
<?php
    break;
    case "hapus" :

    if(isset($_GET['id'])){


      $del = mysqli_query($kon, "DELETE FROM tb_kategori where id_kategori='$_GET[id]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=kategori/view';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=kategori/view';
              </script>";
      }
    }
?>
<?php
break;
}
}
?>
 </div>
