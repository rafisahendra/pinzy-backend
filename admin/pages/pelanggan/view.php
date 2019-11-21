<div class="content-wrapper">
<? include 'tabs2.php' ?>
  <section class="content-header">
    <h1>
     Pelanggan
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pelanggan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
           
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Toko</th>
                    <th>Alamat</th>
                    <th>Area Toko</th>
                    <th>No Telepon</th>
                 
                   
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
          $tanggal = date('Y-m-d');
          $waktu = date('h:i:s');
          $no=1;
          // menampilkan Gambar
      

          // menampilkanPelanggan
          $be = mysqli_query($kon, "SELECT * FROM tb_pelanggan a JOIN tb_area b ON a.id_area=b.id_area  Where b.id_area ='$id_area' order by a.id_pelanggan asc  ");    
					foreach($be as $r){
           $id_pelanggan = $r['id_pelanggan'] 
        ?>
       
                  <tr>
                    <td><?= $no++;?></td>
                    <td><?= $r['nama_pemilik']?></td>
                    <td><?= $r['kota']?></td>
                    <td><?= $r['alamat']?></td>
                    <td><?= $r['nama_area']?></td>
                    <td><?= $r['nohp']?></td>
                 

                    <td>

                      <button type="button" class=" btn btn-info" data-toggle="modal"
                        data-target="#myModal<?= $r['id_pelanggan'] ?>">Konfirmasi</button>
                        <a href="?module=pelanggan/aksi&aksi=hapus&id=<?= $r['id_pelanggan']; ?>"
                        class="fa fa-edit btn btn-warning"></a>
                      <a href="?module=pelanggan/aksi&aksi=hapus&id=<?= $r['id_pelanggan']; ?>"
                        class="fa fa-trash btn btn-danger"></a>
                    </td>


<!-- Modal Untuk Detail pelanggan -->

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal<?= $r['id_pelanggan'] ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <b>Konfirmasi Pelanggan</b>
        
        </div>
        <div class="modal-body">
          <div class="col-sm-3">
            <p>Nama Toko</p>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['nama_area']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            <p>Nama Pemilik </p>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['nama_pemilik']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            <p>Alamat</p>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['alamat']; ?> </p>
          </div>
        </div>
        <div class="modal-body">
          <div class="col-sm-3">
            <p>Pembelian Pertama</p>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['nohp']; ?></p>
          </div>
        </div>

      <form action="">
        <div class="modal-body">
          <div class="col-sm-3">
            <p>Jeneis Pelanggan</p>
          </div>
          <div class="col-sm-6" style="padding-bottom:20px;">
            <select name="jenis_p" class="form-control" id="" required>
            <option value="">--Pilih Jenis Pelanggan--</option>
              <option value="Y">Prioritas</option>
              <option value="T">Reguler</option>
            </select>
          </div>
        </div>
            <div class="form-group">
            <button style="margin-left:250px;" type="submit" class="btn btn-info btn-sm ">Konfirmasi</button>
            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Batal</button>
            </div>
            </form>
            <div class="modal-footer">
     
     </div>
      </div>
    </div>
  </div>
</div>




                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


