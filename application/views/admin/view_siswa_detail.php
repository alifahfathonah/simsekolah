<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Detail Siswa</h1>
  </div>
  <div class="content-header-right">
    <a href="<?php echo base_url(); ?>admin/siswa" class="btn btn-primary btn-sm">View All</a>
  </div>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
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

    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_a" data-toggle="tab">Data Utama</a></li>
          <?php if($tambah==false){  ?>
            <li><a href="#tab_b" data-toggle="tab">Data Kependudukan</a></li>
            <li><a href="#tab_c" data-toggle="tab">Data Ayah</a></li>
            <li><a href="#tab_d" data-toggle="tab">Data Ibu</a></li>
            <li><a href="#tab_e" data-toggle="tab">Data Wali</a></li>
            <li><a href="#tab_f" data-toggle="tab">Data Diri</a></li>
            <li><a href="#tab_g" data-toggle="tab">Beasiswa</a></li>
          <?php } ?>
        </ul>
        <?php
          $id = "tambah";
          if($tambah==false){
              $id = $this->uri->segment(4);
          }
        ?>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_a">
            <?php echo form_open_multipart(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
            <div class="box box-info">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">NISN</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="nisn" value="<?php echo ($tambah==false)?$siswa['NISN']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-2">
                  <select id="kelas" class="form-control" name="kelas" <?php echo ($tambah=="true")?"":"readonly";?>>
                    <?php if($tambah==true){ ?>
                      <?php foreach ($kelas as $k) { ?>
                        <option value="<?=$k['idkelas']?>"><?=$k['kelas']?></option>
                      <?php } ?>
                  <?php } else { ?>
                    <option value="<?=$kelas['idkelas']?>"><?=$kelas['kelas']?></option>
                  <?php } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama" value="<?php echo ($tambah==false)?$siswa['Nama']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">NIPD</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="nipd" value="<?php echo ($tambah==false)?$siswa['NIPD']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-2">
                    <select id="jk" class="form-control" name="jk">
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="tempatl" value="<?php echo ($tambah==false)?$siswa['TempatLahir']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="tanggall" value="<?php echo ($tambah==false)?$siswa['TanggalLahir']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-3">
                    <select id="agama" class="form-control" name="agama">
                      <?php foreach ($agama as $a) { ?>
                        <option value="<?=$a?>" <?php echo ($siswa!="" && $a==$siswa['Agama'])?"selected":"";?>><?=$a?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <input type="hidden" name="tambah" value="<?php echo ($tambah==false)?"false":"true";?>">
                    <button type="submit" class="btn btn-success pull-left" name="form_a">Simpan</button>
                  </div>
                </div>
              </div>
            </div>

            <?php echo form_close(); ?>
          </div>

          <?php if($tambah==false){  ?>
            <div class="tab-pane" id="tab_b">
              <?php echo form_open_multipart(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nik" value="<?=$siswa['NIK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nomor KK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nokk" value="<?=$siswa['NoKK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No. Akta Lahir</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="noakta" value="<?=$siswa['NoRegistrasiAktaLahir'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="alamat" style="height:80px;"><?=$siswa['Alamat']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">RT</label>
                    <!-- <div class="col-sm-2"> -->
                    <div class="col-sm-1"><input type="text" class="form-control" name="rt" value="<?=$siswa['RT'];?>"></div>
                    <label for="" class="col-sm-1 control-label">RW</label>
                    <div class="col-sm-1"><input type="text" class="form-control" name="rw" value="<?=$siswa['RW'];?>"></div>
                    <!-- </div> -->
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Dusun</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="dusun" value="<?=$siswa['Dusun'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kelurahan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="kelurahan" value="<?=$siswa['Kelurahan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kecamatan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="kecamatan" value="<?=$siswa['Kecamatan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kode Pos</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="kodepos" value="<?=$siswa['KodePos'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Lintang</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="lintang" value="<?=$siswa['Lintang'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Bujur</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="bujur" value="<?=$siswa['Bujur'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jarak Rumah</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="jarak" value="<?=$siswa['JarakRumah'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jenis Tinggal</label>
                    <div class="col-sm-2">
                      <select id="jenistinggal" class="form-control" name="jenistinggal">
                        <?php foreach ($hunian as $h) { ?>
                          <option value="<?=$h?>" <?php echo ($siswa!="" && $siswa['JenisTinggal']==$h)?"selected":"";?>><?=$h?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alat Trasnportasi</label>
                    <div class="col-sm-2">
                      <select id="alatransportasi" class="form-control" name="alatransportasi">
                        <?php foreach ($transportasi as $t) { ?>
                          <option value="<?=$t?>" <?php echo ($siswa!="" && $siswa['AlatTransportasi']==$h)?"selected":"";?>><?=$t?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="telp" value="<?=$siswa['Telepon'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No. HP</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="hp" value="<?=$siswa['HP'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="email" value="<?=$siswa['Email'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form_b">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_c">
              <?php echo form_open(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nik" value="<?=$siswa['AyahNIK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nama" value="<?=$siswa['AyahNama'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tahun Lahir</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="tahun" value="<?=$siswa['AyahTahunLahir'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jenjang Pendidikan</label>
                    <div class="col-sm-3">
                      <select id="pendidikan" class="form-control" name="pendidikan">
                        <?php foreach ($pendidikan as $p) { ?>
                          <option value="<?=$p?>" <?php echo ($siswa!="" && $siswa['AyahJenjangPendidikan']==$p)?"selected":"";?>><?=$p?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-3">
                      <select id="pekerjaan" class="form-control" name="pekerjaan">
                        <?php foreach ($pekerjaan as $a) { ?>
                          <option value="<?=$a?>" <?php echo ($siswa!="" && $siswa['AyahPekerjaan']==$a)?"selected":"";?>><?=$a?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Penghasilan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="penghasilan" value="<?=$siswa['AyahPenghasilan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form_c">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_d">
              <?php echo form_open(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nik" value="<?=$siswa['IbuNIK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nama" value="<?=$siswa['IbuNama'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tahun Lahir</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="tahun" value="<?=$siswa['IbuTahunLahir'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jenjang Pendidikan</label>
                    <div class="col-sm-3">
                      <select id="pendidikan" class="form-control" name="pendidikan">
                        <?php foreach ($pendidikan as $p) { ?>
                          <option value="<?=$p?>" <?php echo ($siswa!="" && $siswa['IbuJenjangPendidikan']==$p)?"selected":"";?>><?=$p?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-3">
                      <select id="pekerjaan" class="form-control" name="pekerjaan">
                        <?php foreach ($pekerjaan as $a) { ?>
                          <option value="<?=$a?>" <?php echo ($siswa!="" && $siswa['IbuPekerjaan']==$a)?"selected":"";?>><?=$a?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Penghasilan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="penghasilan" value="<?=$siswa['IbuPenghasilan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form_d">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_e">
              <?php echo form_open(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nik" value="<?=$siswa['WaliNIK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nama" value="<?=$siswa['WaliNama'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tahun Lahir</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="tahun" value="<?=$siswa['WaliTahunLahir'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jenjang Pendidikan</label>
                    <div class="col-sm-3">
                      <select id="pendidikan" class="form-control" name="pendidikan">
                        <?php foreach ($pendidikan as $p) { ?>
                          <option value="<?=$p?>" <?php echo ($siswa!="" && $siswa['WaliJenjangPendidikan']==$p)?"selected":"";?>><?=$p?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-3">
                      <select id="pekerjaan" class="form-control" name="pekerjaan">
                        <?php foreach ($pekerjaan as $a) { ?>
                          <option value="<?=$a?>" <?php echo ($siswa!="" && $siswa['WaliPekerjaan']==$a)?"selected":"";?>><?=$a?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Penghasilan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="penghasilan" value="<?=$siswa['WaliPenghasilan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form_e">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_f">
              <?php echo form_open_multipart(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kebutuhan Khusus</label>
                    <div class="col-sm-3">
                      <select id="kebutuhan" class="form-control" name="kebutuhan">
                        <option value="Ya" <?php echo ($siswa['KebutuhanKhusus']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($siswa['KebutuhanKhusus']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Berat Badan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="berat" value="<?=$siswa['BeratBadan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tinggi Badan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="tinggi" value="<?=$siswa['TinggiBadan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Lingkar Kepala</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="lingkar" value="<?=$siswa['LingkarKepala'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jumlah Saudara</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="jmlsaudara" value="<?=$siswa['JmlSaudara'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Anak ke</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="anakke" value="<?=$siswa['Anakkeberapa'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form_f">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_g">
              <?php echo form_open(base_url("admin/siswa/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Penerima KPS</label>
                    <div class="col-sm-2">
                      <select id="kps" class="form-control" name="kps">
                        <option value="Ya" <?php echo ($siswa['PenerimaKPS']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($siswa['PenerimaKPS']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No. KPS</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="nokps" value="<?=$siswa['NoKPS'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No. KKS</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="nokks" value="<?=$siswa['NomorKKS'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Penerima KIP</label>
                    <div class="col-sm-2">
                      <select id="kip" class="form-control" name="penerimakip">
                        <option value="Ya" <?php echo ($siswa['PenerimaKIP']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($siswa['PenerimaKIP']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No KIP</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="nokip" value="<?=$siswa['NomorKIP'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama di KIP</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="namakip" value="<?=$siswa['NamadiKIP'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Layak KIP</label>
                    <div class="col-sm-2">
                      <select id="layakkip" class="form-control" name="layakkip">
                        <option value="Ya" <?php echo ($siswa['LayakPIP']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($siswa['LayakPIP']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alasan Layak PIP</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="alasanlayak" style="height:80px;"><?=$siswa['AlasanLayakPIP']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Bank</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="bank" value="<?=$siswa['Bank'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No Rekening</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="norek" value="<?=$siswa['NomorRekeningBank'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Atas Nama</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="atasnama" value="<?=$siswa['RekeningAtasNama'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form_g">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
