<div class="content-wrapper">
  
<? include 'tabs.php' ?>
  <section class="content-header">
    <h1>
      Produk
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Produk</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">




          <div class="box-header with-border">
            <a href="?module=produk/aksi&aksi=tambah" class="btn btn-flat btn-primary pull-right">Buat Baru </a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="3px">No</th>
                    <th width="3px">Kode Produk</th>
                    <th style=" width:100px;">Nama Produk</th>
                    <th width="7px">Kategori</th>
                    <th width="7px">Merek</th>
                    <th width="7px">Kuantitas</th>
                    <th style=" width:80px;">Harga Prioritas</th>
                    <th style=" width:80px;">Haga Reguler</th>
                   
              
                    <th width="17%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
          $tanggal = date('Y-m-d');
          $waktu = date('h:i:s');
         
          // menampilkan 
          
          $be = mysqli_query($kon, "SELECT * FROM tb_produk a  JOIN tb_kategori c on a.id_kategori=c.id_kategori JOIN tb_brand d ON a.merk=d.id_brand  Where id_area ='$id_area' order by a.tgl_masuk asc  ");      
          // var_dump($be); die;
					foreach($be as $no => $r){
         
        ?>
       
                  <tr>
                    <td><?= $no+1;?></td>
                    <td><?= $r['kode_produk']?></td>
                    <td><?= $r['nama_produk']?></td>
                    <td><?= $r['nama_kategori']?></td>
                    <td><?= $r['nama_brand']?></td>
                      <td><?= $r['kuantitas']?></td>
                    <td>Rp <?=number_format($r['harga_prioritas'],2) ?></td>
                    <td>Rp <?= number_format($r['harga_reguler'],2)?></td>
                  
           
                    <td>
                        <div style="margin-bottom:5px;">
                       <button type="button" class=" btn btn-info btn-sm" data-toggle="modal"
                        data-target="#myModal<?= $r['id_produk'] ?>"> Detail</button>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#myModal2<?= $r['id_produk'] ?>"> Foto</button>

                        <button type="button" class=" btn btn-info btn-sm" data-toggle="modal"
                        data-target="#myModal3<?= $r['id_produk'] ?> "> Spec</button>

                        </div>
                        <div>
                        <a href="?module=produk/aksi&aksi=tambah_stok&id=<?= $r['id_produk'] ?>"
                        class="fa fa-plus btn btn-primary btn-sm"> Stok</a>

                        <a href="?module=produk/aksi&aksi=edit&id=<?= $r['id_produk'] ?>"
                          class="fa fa-edit btn btn-warning btn-sm"></a>
                        <a href="?module=produk/aksi&aksi=hapus&id=<?= $r['id_produk']; ?>"
                          class="fa fa-trash btn btn-danger btn-sm"></a>
                          </div>



   
  <!-- Modal -->
  <div class="modal fade" id="myModal<?= $r['id_produk']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Produk</h4>
          <button type="button" class="btn btn-success fa fa-reply" data-dismiss="modal"> Kembali</button>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            
            <label for="">Nama Produk</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['nama_produk']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            
            <label for="">kode Produk</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['kode_produk']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            <label for="">Kategori</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['nama_kategori']; ?></p>
          </div>
        </div>
        <div class="modal-body">
          <div class="col-sm-3">
            <label for="">Kuantitas</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['kuantitas']; ?> </p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            <label for="">Harga Prioritas</label>
          </div>
          <div class="col-sm-9">
            <p>: Rp <?= number_format($r['harga_prioritas'],2); ?></p>
          </div>
        </div>
        
        <div class="modal-body">
          <div class="col-sm-3">
         <label for="">Harga Reguler</label>
          </div>
          <div class="col-sm-9">
            <p>: Rp <?= number_format($r['harga_reguler'],2); ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
         <label for="">Diskon</label>
          </div>
          <div class="col-sm-9">
            <p>:<?= $r['diskon']; ?> %</p>
          </div>
        </div>
        
        
        <div class="modal-body">
          <div class="col-sm-3">
         <label for="">Merek</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['nama_brand']; ?> </p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
            <label for="">Tanggal Masuk</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['tgl_masuk']; ?> </p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
          <label for="">Perusahaan</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['perusahaan']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
         <label for="">Rekomendasi</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['rekomendasi']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
          <label for="">Flash Sale</label>
          </div>
          <div class="col-sm-9">
            <p>: <?= $r['flash_sale']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
          <label for="">Deskripsi</label>
          </div>
          <div class="col-sm-9">
            <p >: <?= $r['deskripsi']; ?></p>
          </div>
        </div>

        <div class="modal-body">
          <div class="col-sm-3">
          <label for="">Purna Jual</label>
          </div>
          <div class="col-sm-9">
            <p >: <?= $r['purna_jual']; ?></p>
          </div>
        </div>


        <div class="modal-footer">
     
        </div>
      </div>
    </div>
  </div>





                 
  <!-- Modal -->
  <div class="modal fade" id="myModal2<?= $r['id_produk']?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gambar Produk</h4>
          <button type="button" class="btn btn-success fa fa-reply" data-dismiss="modal"> Kembali</button>
          <a href="?module=produk/edit_foto&aksi=edit&id=<?= $r['id_produk'] ?>"
                        class="btn btn-warning fa fa-edit"> Edit Foto</a>
        </div>

        <div class="modal-body">
        
            <p>Foto :</p>
          
          
          <div class="col-sm-12">
          <?php
          $pr = $r['id_produk'];
          $no=1;
          $m2 = mysqli_query($kon, "SELECT * FROM tb_gambar  WHERE id_produk='$pr' ");
           foreach($m2 as $no=> $data){ ?>
             
            <img style="width:150px;height:150px; margin-left:10px" src="../../android/images/produk/<?=$data['gambar_produk']?>" alt="No Foto ">
            <?php }?>
          </div>
        </div>

        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal3<?= $r['id_produk']?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Spesifikasi</h4>
          <button type="button" class="btn btn-success fa fa-reply" data-dismiss="modal"> Kembali</button>
        </div>

        <div class="modal-body">
        <div>
          <ul>
     <label for="">Jenis Spesifikasi</label>
        </div>  
          <?php
          $pr = $r['id_produk'];
          $no=1;
          $m3 = mysqli_query($kon, "SELECT * FROM tb_spesifikasi  WHERE id_produk='$pr' ");
 foreach($m3 as $xyy){ ?>
             <div style="margin-left:40px;" class=""> <li> <?= $xyy['jenis_spek'] ?></li></div>
           
            <?php }?>
            </ul>
       <ul>
            <label style="margin-top:20px"  for="">Detail</label>
      <?php
      $pr = $r['id_produk'];
      $no=1;
      $m3 = mysqli_query($kon, "SELECT * FROM tb_spesifikasi  WHERE id_produk='$pr' ");
foreach($m3 as $xyy){ ?>
         <div class=""> <li> <?= $xyy['spesifikasi'] ?></li></div>
       
        <?php }?>
        </ul>


      </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>


  
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


   