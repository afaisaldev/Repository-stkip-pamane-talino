<!-- Main content -->
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>REPOSITORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"> <table class='table table-bordered'>
	    <tr><td>Date </td>
            <td><input type="date" class="form-control" name="date" />
        </td>
	    
	    <tr><td>Author </td>
            <td> 
            <select class="form-control" name="id_author">
                <option value="">- Pilih Author -</option>
                <?php foreach ($authors->result() as $row1): ?>                                
                <option value="<?php echo $row1->id; ?>"><?php echo $row1->author; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
	    <tr><td>Type </td>
            <td> 
            <select class="form-control" name="id_type">
                <option value="">- Pilih Type -</option>
                <?php foreach ($types->result() as $row2): ?>                                
                <option value="<?php echo $row2->id; ?>"><?php echo $row2->type; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
	    <tr><td>Program Studi </td>
            <td>
            <select class="form-control" name="id_prodi">
                <option value="">- Pilih Program Studi -</option>
                <?php foreach ($prodi->result() as $row3): ?>                                
                <option value="<?php echo $row3->id; ?>"><?php echo $row3->program_studi; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
	    <tr><td>Title </td>
            <td><input type="text" class="form-control" name="title" id="title" placeholder="Title"  required>
        </td>
	    <tr><td>Description </td>
            <td><textarea class="form-control" rows="8" name="description" id="description" placeholder="Description"></textarea>
        </td></tr>
	    <tr><td>File ( .pdf/.doc )</td>
            <td>
            
            <input type="file" class="form-control" name="file" />
        </td>
	    <tr><td>Thumbnail ( .jpg/.png ) </td>
            <td><input type="file" class="form-control" name="thumbnail" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary">Save</button> 
	    <a href="<?php echo site_url('repository') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

