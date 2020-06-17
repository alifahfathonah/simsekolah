<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Wali Kelas</h1>
  </div>
  <div class="content-header-right">
    <!-- <a href="<?php echo base_url(); ?>admin/kelas/tambah" class="btn btn-primary btn-sm">Tambah</a> -->
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php
      if($this->session->flashdata('error')) {
        ?>
        <div class="callout callout-danger">
          <p><?php echo $this->session->flashdata('error'); ?></p>
        </div>
        <?php
      }
      if($this->session->flashdata('success')) {
        ?>
        <div class="callout callout-success">
          <p><?php echo $this->session->flashdata('success'); ?></p>
        </div>
        <?php
      }
      ?>

      <?php echo form_open_multipart(base_url().'admin/wali_kelas/proses/tambah',array('class' => 'form-horizontal', 'id'=>'formAuto')); ?>
      <div class="box box-info">
        <div class="box-body">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Kelas <span>*</span></label>
            <div class="col-sm-2">
              <select id="kelas" class="form-control" name="kelas">
                <?php foreach ($kelas as $k) { ?>
                  <option value="<?=$k['idkelas']?>"><?=$k['kelas']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Guru <span>*</span></label>
            <div class="col-sm-3">
              <select id="guru" class="form-control" name="guru">
                <?php foreach ($guru as $k) { ?>
                  <option value="<?=$k['NIK']?>"><?=$k['Nama']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
						<label for="" class="col-sm-2 control-label">Tahun Mapel </label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="tahun" value="<?=$tahun;?>" readonly>
						</div>
					</div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Keterangan </label>
            <div class="col-sm-9">
              <textarea class="form-control" name="ket" style="height:35px;"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" class="btn btn-success pull-left" name="simpan" id="simpan">Tambah</button>
              <a href="#" id="batal" class="btn btn-danger pull-left" style="margin-left:10px; display:none;" name="batal">Batal</a>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>

      <div class="box box-info">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Tahun</th>
                <th>Keterangan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach ($semua as $row) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?=$row['kelas']; ?></td>
                  <td><?=$row['Nama']; ?></td>
                  <td><?=$row['tahun']; ?></td>
                  <td><?=$row['ketwalikelas']; ?></td>
                  <td>
                    <a href="#" onclick="klikUbah(this.id)" id="btnUbah<?=$i?>" class="btn btn-primary btn-xs" data-nik="<?=$row['NIK']?>" data-kelas="<?=$row['idkelas']?>" data-ket="<?=$row['ketwalikelas']?>" data-id="<?=$row['idwalikelas']?>">Ubah</a>
                    <a onclick='konfirmasi("admin/wali_kelas/hapus/<?=$row['idwalikelas']?>", "Anda yakin ingin menghapus Wali Kelas?")' href="#" class="btn btn-danger btn-xs">Hapus</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">

    function klikUbah(id){
      var kelas = $('#'+id).data('kelas');
      var tingkat = $('#'+id).data('guru');
      var ket = $('#'+id).data('ket');
      var id = $('#'+id).data('id');
      var action = '<?=base_url("admin/wali_kelas/proses/")?>'+id;
      $('#kelas').val(kelas);
      $('#tingkat').val(tingkat);
      $('textarea[name="ket"]').html(ket);
      $('#formAuto').attr('action', action);
      $('#simpan').html('Ubah');
      $('#batal').show();
    }

    $('#batal').click(function(){
      var action = '<?=base_url("admin/wali_kelas/proses/")?>';
      $('textarea[name="ket"]').html("");
      $('#formAuto').attr('action', action);
      $('#simpan').html('Tambah');
      $('#batal').hide();
    });
    </script>
