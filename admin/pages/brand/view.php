

 <div class="content-wrapper">
 <? include 'tabs.php' ?>
<section class="content-header">
      <h1>
      Brand
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Brand</li>
      </ol>
</section> 
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
      
            <div class="box-header with-border">          
              <a href="?module=brand/aksi&aksi=tambah" class="btn btn-flat btn-primary pull-right ">Buat Baru</a> 
            </div>
           <div class="box-body">
              <div class="table table-responsive">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Nama Brand</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($kon, "SELECT * FROM tb_brand");
                    $no=1;
                    while($r=mysqli_fetch_assoc($be)){

				?>
				<tr>
					<td align="center" width="5px"><?= $no ?></td>
					<td width="300px"><?= $r['nama_brand']?></td>					
                    <td width="100px"><img src="../../android/images/brand/<?= $r['gambar_brand']; ?>" width="50px"></td>          
                    <td  align="center" width="10px">
                      <a href="?module=brand/aksi&aksi=edit&id=<?= $r['id_brand'] ?>" class="fa fa-edit btn btn-warning"></a>
                      <a href="?module=brand/aksi&aksi=hapus&id=<?= $r['id_brand'] ?>" class="fa fa-trash btn btn-danger"></a>
                    </td>
                </tr>
					<?php $no++;} ?>
				</tbody>
              </table>
            </div>
            </div>
            </div>
          </div>
          </div>
     </section>
</div>