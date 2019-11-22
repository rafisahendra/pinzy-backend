<div class="content-wrapper">
  <section class="content-header">
    <h1>
     Sales
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Sales</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=sales/aksi&aksi=tambah" class="btn btn-flat btn-primary">Tambah</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sales</th>
                    <th>Area</th>
                    <th>Tanggal masuk</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>No Terdekat</th>
                    <th>Plat Kendaraan</th>
                    <th width="10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
          $tanggal = date('Y-m-d');
          $waktu = date('h:i:s');
          $no=1;
    
      

          // menampilkanPelanggan
          $be = mysqli_query($kon, "SELECT * FROM tb_sales a JOIN tb_area b ON a.id_area=b.id_area  Where b.id_area ='$id_area' order by a.tgl_masuk asc  ");      
  
					foreach($be as $r){
        
        ?>
       
                  <tr>
                    <td><?= $no++;?></td>
                    <td><?= $r['nama_sales']?></td>
                    <td><?= $r['nama_area']?></td>
                    <td><?= kitiang($r['tgl_masuk'])?></td>
                    <td><?= $r['alamat']?></td>
                    <td><?= $r['no_telepon']?></td>
                    <td><?= $r['no_terdekat']?></td>
                    <td><?= $r['plat_kendaraan']?></td>

                    <td>

                    
                        <a href="?module=sales/aksi&aksi=edit&id=<?= $r['id_sales']; ?>"
                        class="fa fa-edit btn btn-warning"></a>
                      <a href="?module=sales/aksi&aksi=hapus&id=<?= $r['id_sales']; ?>"
                        class="fa fa-trash btn btn-danger"></a>
                    </td>

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




