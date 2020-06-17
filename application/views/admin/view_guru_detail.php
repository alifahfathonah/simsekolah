<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Detail Guru</h1>
  </div>
  <div class="content-header-right">
    <a href="<?php echo base_url(); ?>admin/guru" class="btn btn-primary btn-sm">View All</a>
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
          <li><a href="#tab_a" data-toggle="tab">Data Diri</a></li>
          <?php if($tambah==false){  ?>
            <li><a href="#tab_b" data-toggle="tab">Data Pegawai</a></li>
            <li><a href="#tab_c" data-toggle="tab">Data Alamat</a></li>
            <li><a href="#tab_d" data-toggle="tab">Data Keuangan</a></li>
            <li><a href="#tab_e" data-toggle="tab">Data Keluarga</a></li>
            <li><a href="#tab_f" data-toggle="tab">Data Keahlian</a></li>
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
            <?php echo form_open_multipart(base_url("admin/guru/proses/$id"),array('class' => 'form-horizontal')); ?>
            <div class="box box-info">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="nik" value="<?php echo ($tambah==false)?$guru['NIK']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">NIP</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="nip" value="<?php echo ($tambah==false)?$guru['NIP']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama" value="<?php echo ($tambah==false)?$guru['Nama']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-2">
                    <select id="jk" class="form-control" name="jk">
                      <option value="L" <?php echo ($guru!="" && $guru['JK']=="L")?'selected':''?>>Laki-Laki</option>
                      <option value="P"<?php echo ($guru!="" && $guru['JK']=="P")?'selected':''?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="tempatl" value="<?php echo ($tambah==false)?$guru['TempatLahir']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="tanggall" value="<?php echo ($tambah==false)?$guru['TanggalLahir']:"";?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-2">
                    <select id="agama" class="form-control" name="agama">
                      <?php foreach ($agama as $a) { ?>
                        <option value="<?=$a?>"><?=$a?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kode Guru</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="kodeguru" value="<?php echo ($tambah==false)?$guru['KodeGuru']:"";?>">
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
              <?php echo form_open_multipart(base_url("admin/guru/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NUPTK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nuptk" value="<?=$guru['NUPTK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status Kepegawaian</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="statuskep" value="<?=$guru['StatusKepegawaian'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jenis PTK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="jenisptk" value="<?=$guru['JenisPTK'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">TugasTambahan</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="tugastambahan" style="height:80px;"><?=$guru['TugasTambahan']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">SK CPNS</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="skcpns" value="<?=$guru['SKCPNS'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tanggal CPNS</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control" name="tglcpns" value="<?=$guru['TanggalCPNS'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">SK Pengangkatan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="skpengangkatan" value="<?=$guru['SKPengangkatan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">TMT Pengangkatan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="tmtpengangkatan" value="<?=$guru['TMTPengangkatan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Lembaga Pengangkatan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="lembagapengangkatan" value="<?=$guru['LembagaPengangkatan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pangkat Golongan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="pangkatgol" value="<?=$guru['PangkatGolongan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">TMT PNS</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="tmtpns" value="<?=$guru['TMTPNS'];?>">
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
              <?php echo form_open(base_url("admin/guru/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alamat Jalan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="alamatjalan" value="<?=$guru['AlamatJalan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">RT</label>
                    <!-- <div class="col-sm-2"> -->
                    <div class="col-sm-1"><input type="text" class="form-control" name="rt" value="<?=$guru['RT'];?>"></div>
                    <label for="" class="col-sm-1 control-label">RW</label>
                    <div class="col-sm-1"><input type="text" class="form-control" name="rw" value="<?=$guru['RW'];?>"></div>
                    <!-- </div> -->
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Dusun</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="dusun" value="<?=$guru['NamaDusun'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kelurahan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="kelurahan" value="<?=$guru['DesaKelurahan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kecamatan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="kecamatan" value="<?=$guru['Kecamatan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kode Pos</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="kodepos" value="<?=$guru['KodePos'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="telp" value="<?=$guru['Telepon'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">No. HP</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="hp" value="<?=$guru['HP'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="email" value="<?=$guru['Email'];?>">
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
              <?php echo form_open(base_url("admin/guru/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NPWP</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="npwp" value="<?=$guru['NPWP'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Wajib Pajak</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nama" value="<?=$guru['NamaWajibPajak'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kewarganegaraan</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="kewarganegaraan" value="<?=$guru['Kewarganegaraan'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Bank</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="bank" value="<?=$guru['Bank'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nomor Rekening</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="norek" value="<?=$guru['NomorRekeningBank'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Atas Nama Rekening</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="atasnama" value="<?=$guru['RekeningAtasNama'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Sumber Gaji</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="sumbergaji" value="<?=$guru['SumberGaji'];?>">
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
              <?php echo form_open(base_url("admin/guru/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Ibu Kandung</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="namaibu" value="<?=$guru['NamaIbuKandung'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status Perkawinan</label>
                    <div class="col-sm-3">
                      <select id="statusperkawinan" class="form-control" name="status">
                        <option value="Belum" <?php echo ($guru['StatusPerkawinan']=="Belum")?"selected":""?>>Belum Menikah</option>
                        <option value="Sudah" <?php echo ($guru['StatusPerkawinan']=="Sudah")?"selected":""?>>Sudah Menikah</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Suami/Istri</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="namapasangan" value="<?=$guru['NamaSuamiIstri'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NIP Suami/Istri</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nippasangan" value="<?=$guru['NIPSuamiIstri'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pekerjaan Suami/Istri</label>
                    <div class="col-sm-3">
                      <select id="pekerjaan" class="form-control" name="pekerjaan">
                        <?php foreach ($pekerjaan as $a) { ?>
                          <option value="<?=$a?>" <?php echo ($guru!="" && $guru['PekerjaanSuamiIstri']==$a)?"selected":"";?>><?=$a?></option>
                        <?php } ?>
                      </select>
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
              <?php echo form_open_multipart(base_url("admin/guru/proses/$id"),array('class' => 'form-horizontal')); ?>
              <div class="box box-info">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Sudah Lisensi Kepala Sekolah</label>
                    <div class="col-sm-2">
                      <select id="kps" class="form-control" name="lisensikepsek">
                        <option value="Ya" <?php echo ($guru['SudahLisensiKepalaSekolah']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($guru['SudahLisensiKepalaSekolah']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pernah Diklat Kepengawasan</label>
                    <div class="col-sm-2">
                      <select id="kps" class="form-control" name="pernahdiklat">
                        <option value="Ya" <?php echo ($guru['PernahDiklatKepengawasan']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($guru['PernahDiklatKepengawasan']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Keahlian Braille</label>
                    <div class="col-sm-2">
                      <select id="braille" class="form-control" name="braille">
                        <option value="Ya" <?php echo ($guru['KeahlianBraille']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($guru['KeahlianBraille']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Keahlian Isyarat</label>
                    <div class="col-sm-2">
                      <select id="isyarat" class="form-control" name="isyarat">
                        <option value="Ya" <?php echo ($guru['KeahlianBahasaIsyarat']=="Ya")?"selected":""?>>Ya</option>
                        <option value="Tidak" <?php echo ($guru['KeahlianBahasaIsyarat']=="Tidak")?"selected":""?>>Tidak</option>
                      </select>
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
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
