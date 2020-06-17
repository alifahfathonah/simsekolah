<section class="content-header mt-3">
    <h1>Insert Buku</h1>
    <div class="content-header-right">
        
    </div>
</section>
<section class="content">
    <div class="row">
		<div class="col-md-12">
            <!--  Session Flash Messages -->
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
            <!--  ./Session Flash Messages -->

            <h3 class="text-muted mt-4">Import Excel Form</h3> <!--  head 2 -->
            <?php
            echo form_open_multipart(base_url('admin_perpustakaan/insert_buku/pilihFile')) ?>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="excel-file-input" name="fileExcel">
                            <label class="custom-file-label" for="excel-file-input">Choose file</label>
                        </div>
                    </div>
                    <div class="col-md-8 pl-3">
                        <button class="btn btn-info btn-sm" type="submit" id="generateBtn">Upload</button>
                    </div>
                </div>
            <?php echo form_close() ?>

            <h3 class="text-muted mt-4">Preview Data</h3> <!--  head 3 -->
			<div class="box box-info">
				<div class="box-body table-responsive">

					<table id="insert-buku" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID Buku</th>
								<th>Judul</th>
							</tr>
						</thead>
					</table>
				</div>
            </div>
            
            <!-- <button class="btn btn-success btn-block">Send Data</button> -->
		</div>
	</div>
    
</section>