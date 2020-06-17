<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Tahun Ajaran</h1>
  </div>
  <div class="content-header-right">
    <!-- <a href="<?php echo base_url(); ?>admin/tahun_ajar/tambah" class="btn btn-primary btn-sm">Tambah</a> -->
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

      <?php echo form_open_multipart(base_url("admin/tahun_ajar/proses/tambah"),array('class' => 'form-horizontal', 'id'=>'formAuto')); ?>
      <div class="box box-info">
        <div class="box-body">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Tahun Ajaran <span>*</span></label>
            <div class="col-sm-2">
              <input type="number" min="1945" max="9999" class="form-control" name="tahun_awal" required>
            </div>
            <div class="col-md-1" style="width:40px; font-size:25px;">-</div>
            <div class="col-sm-2">
              <input type="number" min="1945" max="9999" class="form-control" name="tahun_akhir" required>
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
                <th>Tahun Ajaran</th>
                <th>Status</th>
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
                  <td><?=$row['tahun']; ?></td>
                  <td>
                    <?php if($row['status']==1){ ?>
                      <a href="#" class="btn btn-success btn-xs">Aktif</a>
                    <?php } else { ?>
                      <a href="<?php echo base_url(); ?>admin/tahun_ajar/aktif/<?=$row['idtahun'];?>" class="btn btn-danger btn-xs">Non Aktif</a>
                    <?php } ?>
                  </td>
                  <td>
                    <a href="#" onclick="klikUbah(this.id)" id="btnUbah<?=$i?>" class="btn btn-primary btn-xs" data-tahun="<?=$row['tahun']?>" data-idt="<?=$row['idtahun']?>">Ubah</a>
                    <a onclick='konfirmasi("admin/tahun_ajar/hapus/<?=$row['idtahun']?>", "Anda yakin ingin menghapus Tahun Ajaran?")' href="#" class="btn btn-danger btn-xs">Hapus</a>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    function klikUbah(id){
      var thn = $('#'+id).data('tahun');
      pisah = thn.split("-");
      var thnAwal = pisah[0];
      var thnAkhir = pisah[1];
      var id = $('#'+id).data('idt');
      var action = '<?=base_url("admin/tahun_ajar/proses/")?>'+id;
      $('input[name="tahun_awal"]').val(pisah[0]);
      $('input[name="tahun_akhir"]').val(pisah[1]);
      $('#formAuto').attr('action', action);
      $('#simpan').html('Ubah');
      $('#batal').show();
    }

    $('#batal').click(function(){
      var action = '<?=base_url("admin/tahun_ajar/proses/")?>';
      $('input[name="tahun_awal"]').val();
      $('input[name="tahun_akhir"]').val();
      $('#formAuto').attr('action', action);
      $('#simpan').html('Tambah');
      $('#batal').hide();
    });
    </script>
