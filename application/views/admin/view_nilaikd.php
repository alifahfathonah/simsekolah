<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1 class="mb-3">Nilai KD</h1>
    <br>
    <div class="form-group mt-2 form-inline">
          
          <select id="pilihPelajaran" class="form-control" name="">

              <?php foreach($pelajaran as $item) : ?>
              <option value="<?php echo $item['idmapel'] ?>"><?php echo $item['mapel'] ?></option>
              <?php endforeach; ?>
          </select>

          <select id="pilihKelas" class="form-control" name="">
          <?php foreach($kelas as $item) : ?>
              <option value="<?php echo $item['idkelas'] ?>"><?php echo $item['kelas'] ?></option>
              <?php endforeach; ?>
          </select>

          <select id="pilihTahun" class="form-control" name="">

              <?php foreach($tahun as $item) : ?>
              <option value="<?php echo $item['idtahun'] ?>"><?php echo $item['tahun'] ?></option>
              <?php endforeach; ?>
          </select>

          <select id="pilihSemester" class="form-control" name="">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
          </select>
      </div>

      


  </div>
  <div class="content-header-right">
     
    <button class="btn btn-primary btn-sm" id="generateNilaiKD" type="button">Generate</button>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#my-modal" type="button">Import File</button>
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

      <div class="box box-info">

        <div class="box-body table-responsive">
          <table id="nilaiKD" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">NISN</th>
                
                <th colspan="3" class="text-center ketkd">Pengetahuan</th>
                <th colspan="3" class="text-center ketkd">Ketrampilan</th>
              </tr>
              <tr id="kd">
                  
              </tr>
            </thead>
           
          </table>
        </div>
      </div>
    </section>


    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-body">
                <div class="row m-3">
                        <div class="col-md-9">

                       
                            
						<h5 class="page-heading">Import File ExceL</h5>
                        <?php
						$attr = array('id'=>'importMapel');
						echo form_open_multipart(base_url('admin/nilaikd/pilihFile'),$attr) ?>
                        
							<div class="form-group" style="border: solid 1px grey;   " >
								
								<input id="my-input"  class="form-control-file" type="file" name="fileExcel">
                            </div>
							<button class="btn btn-success" type="submit">Pilih file</button>
							
							<button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
						<?php echo form_close() ?>
                        </div>
                    </div>

					
				</div>
				
			</div>
		</div>
	</div>