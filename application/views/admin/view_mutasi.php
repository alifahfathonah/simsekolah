<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Mutasi</h1>
  </div>
  <div class="content-header-right">
    <!-- <a href="<?php echo base_url(); ?>admin/kelas/tambah" class="btn btn-primary btn-sm">Tambah</a> -->
  </div>
</section>

<section class="content">
  <div class="row">
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
    $id = "tambah";
    if($this->uri->segment(4)!="tambah"){
      $id = $this->uri->segment(4);
    }
    ?>
    <div class="col-md-12" style="border-top:3px solid #4172A5; padding:10px 15px;">
      <label for=""><b>Tahun Ajaran </b>(Aktif) <b>: <?=$tahun?></b></label>
    </div>
    <div class="col-md-3">
      <label for="" class="">Status</label>
      <select id="status" class="form-control" name="status">
        <option value=""></option>
        <?php foreach ($tindakan as $k => $v) { ?>
          <option value="<?=$k?>"><?=$v?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-3">
      <label for="" class="">Kelas</label>
      <select id="kelas" class="form-control" name="kelas">
        <option value="null"></option>
        <?php foreach ($kelas as $k) {?>
          <option value="<?=$k['idkelas']?>"><?=$k['kelas']?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-3" id="pkelastujuan">
      <label for="" class="">Kelas Tujuan</label>
      <select id="kelastujuan" class="form-control" name="kelastujuan">
        <?php foreach ($kelas as $k) {?>
          <option value="<?=$k['idkelas']?>"><?=$k['kelas']?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-3" id="ptgl">
      <label for="" class="">Tanggal Mutasi</label>
      <input type="date" id="tglmutasi" name="tglmutasi" class="form-control" value="">
    </div>
    <div class="col-md-12" style="margin-top:20px;"></div>
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-body table-responsive">
          <table id="awal" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5"><button onclick="updateFlagAll(1)" type="button" id="selectAll" class="btn btn-success">All</button></th>
                <th>#</th>
                <th>NISN</th>
                <th>Nama</th>
              </tr>
            </thead>
            <tbody id="tampilSiswa">
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-9"></div>
      <div class="col-md-3">
        <input type="submit" id="refresh" class="form-control btn btn-primary" name="pilih_siswa" value="Pilih">
      </div>
    </div>
    <div class="col-md-6" id="pkanan">
      <div class="box box-info" id="pakhir">
        <div class="box-body table-responsive">
          <table id="akhir" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama</th>
                <th width="5"><button onclick="batalAll(0)" type="button" id="selectAll" class="btn btn-danger">All</button></th>
              </tr>
            </thead>
            <tbody id="selectedSiswa">
            </tbody>
          </table>
        </div>
      </div>
      <div class="box box-info" id="pket">
        <div class="box-body">
          <div class="col-md-12">
            <label for="" class="">Keterangan</label>
            <textarea class="form-control" id="ket" name="ket" style="height:80px;"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-9"></div>
      <div class="col-md-3">
        <button type="submit" id="selesai" class="form-control btn btn-success">Selesai</button>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
// $(document).ready(function($){
$("#kelas").change(function (){
  show_siswa();
  show_selected_siswa();
});

function show_siswa(){
  var id = $('#kelas').val();
  $.ajax({
    method: "POST",
    url: "<?=base_url('admin/mutasi/tampilsiswa/');?>",
    data: {id:id},
    dataType: "json",
    success: function(res) {
      // $('input[name=csrf_test_name]').val(res.token);
      var html = '';
      var i;
      if(res.length>0){
        for(i=0; i<res.length; i++){
          html += '<tr><td><input onchange="updateFlag(this.id)" type="checkbox" id="pilih'+i+'" value="'+res[i].NISN+'"></td><td>'+(i+1)+'</td><td>'+res[i].NISN+'</td><td>'+res[i].Nama+'</td></tr>';
        }
        $('#tampilSiswa').html(html);
      } else {
        $('#tampilSiswa').html('');
      }
    },
    error: function (response) {
      console.log(response);
    }
  });
}

function show_selected_siswa(){
  var id = $('#kelas').val();
  $.ajax({
    method: "POST",
    url: "<?=base_url('admin/mutasi/selectedsiswa/');?>",
    data: {id:id},
    dataType: "json",
    success: function(res) {
      // $('input[name=csrf_test_name]').val(res.token);
      var html = '';
      var i;
      if(res.length>0){
        for(i=0; i<res.length; i++){
          html += '<tr><td>'+(i+1)+'</td><td>'+res[i].NISN+'</td><td>'+res[i].Nama+'</td><td><button onclick="batal(this.id)" data-nisn="'+res[i].NISN+'" id="batal'+i+'" class="btn btn-danger btn-sm">Batal</button></td></tr>';
        }
        $('#selectedSiswa').html(html);
      } else {
        $('#selectedSiswa').html('');
      }
    },
    error: function (response) {
      console.log(response);
    }
  });
}

$("#selectAll").on("click", function () {
  $("#awal tr").each( function() {
    $(this).find("input").prop('checked', true);
  });
});

function updateFlag(id){
  var flag = 0;
  var nisn = $('#'+id).val();
  if($('#'+id).prop('checked')){
    flag = 1;
  }
  $.ajax({
    method: "POST",
    url: "<?=base_url('admin/mutasi/updateFlag/');?>",
    data: {flag:flag, nisn:nisn},
    dataType: "json",
    success: function(res) {
      console.log('sukses');
    },
    error: function (response) {
      console.log(response);
    }
  });
}

function updateFlagAll(flag){
  var id = $('#kelas').val();
  $.ajax({
    method: "POST",
    url: "<?=base_url('admin/mutasi/updateFlagAll/');?>",
    data: {id:id, flag:flag},
    dataType: "json",
    success: function(res) {
      console.log('sukses');
    },
    error: function (response) {
      console.log(response);
    }
  });
}

$("#refresh").on("click", function () {
  show_siswa();
  show_selected_siswa();
});

function batal(id){
  var flag = 0;
  var nisn = $('#'+id).data('nisn');
  $.ajax({
    method: "POST",
    url: "<?=base_url('admin/mutasi/updateFlag/');?>",
    data: {flag:flag, nisn:nisn},
    success: function(res) {
      show_siswa();
      show_selected_siswa();
      console.log('sukses');
    },
    error: function (response) {
      console.log(response);
    }
  });
}

function batalAll(){
  updateFlagAll(0);
  show_siswa();
  show_selected_siswa();
  console.log('batal semua');
}

$("#status").on("change", function (){
  if($('#status').val()=="0"){
    $('#pkelastujuan').show();
  } else if($('#status').val()=="1"){
    $('#pkelastujuan').hide();
  } else if($('#status').val()=="2"){
    $('#pkelastujuan').hide();
  } else if($('#status').val()=="3"){
    $('#pkelastujuan').show();
  } else if($('#status').val()=="4"){
    $('#pkelastujuan').hide();
  } else if($('#status').val()=="5"){
    $('#pkelastujuan').hide();
  } else if($('#status').val()=="6"){
    $('#pkelastujuan').hide();
  }
});

$("#selesai").click(function (){
  var idkelas = '-';
  var tglmutasi = $('#tglmutasi').val();
  var status = $('#status').val();
  var ket = $('#ket').val();
  if($('#status').val()=="0" || $('#status').val()=="3"){
    idkelas = $('#kelastujuan').val();
  } else {
    idkelas = $('#kelas').val();
  }

  $.ajax({
    method: "POST",
    url: "<?=base_url('admin/mutasi/selesai/');?>",
    data: {idkelas:idkelas, tglmutasi:tglmutasi, status:status, ket:ket},
    success: function(res) {
      location.reload();
    },
    error: function (response) {
      console.log(response.responseText);
    }
  });
});
// });
</script>
