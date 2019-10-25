<?php
$author1	= "SELECT * FROM authors WHERE id = '$id_author'";
$author2    = $this->db->query($author1)->row();
$author3    = $author2->author;

$type1	    = "SELECT * FROM types WHERE id = '$id_type'";
$type2      = $this->db->query($type1)->row();
$type3      = $type2->type;

$prodi1	    = "SELECT * FROM prodi WHERE id = '$id_prodi'";
$prodi2     = $this->db->query($prodi1)->row();
$prodi3     = $prodi2->program_studi;



?>
<!-- Main content -->
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>REPOSITORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"> <table class='table table-bordered'>
	    <tr><td>Date (mm-dd-yyyy)</td>
            <td><input type="date" class="form-control" name="date" value="<?= $date ?>"/>
        </td>

        <input type="hidden" name="id" value="<?= $id ?>">        
	    
	    <tr><td>Author </td>
            <td> 
            <select class="form-control" name="id_author">
                <option value="<?= $id_author ?>"> <?= $author3 ?> </option>
                <?php foreach ($authors->result() as $row1): ?>                                
                <option value="<?php echo $row1->id; ?>"><?php echo $row1->author; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
	    <tr><td>Type </td>
            <td> 
            <select class="form-control" name="id_type">
                <option value="<?= $id_type ?>"> <?= $type3 ?> </option>
                <?php foreach ($types->result() as $row2): ?>                                
                <option value="<?php echo $row2->id; ?>"><?php echo $row2->type; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
	    <tr><td>Document </td>
            <td>
            <select class="form-control" name="id_prodi">
                <option value="<?= $id_prodi ?>"> <?= $prodi3 ?> </option>
                <?php foreach ($prodi->result() as $row3): ?>                                
                <option value="<?php echo $row3->id; ?>"><?php echo $row3->program_studi; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
	    <tr><td>Title </td>
            <td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $title ?>" required>
        </td>
	    <tr><td>Description </td>
            <td><textarea class="form-control" rows="8" name="description" id="description" placeholder="Description"><?= $description ?></textarea>
        </td></tr>
	    <tr><td>File ( .pdf/.doc )</td>
            <td>
            <!--<a target="_blank" href="<?= base_url() ?>uploads/<?= $file_repo ?>"><?= $file_repo ?> </a> -->
            <input type="file" class="form-control" name="file" />
            <p>* Lewati ini bila tidak ingin mengubah file sebelumnya</p>
        </td>
	    <tr><td>Thumbnail ( .jpg/.png ) </td>
            <td>
            <!--<img class="img-thumbnail" src="<?= base_url() ?>uploads/<?= $thumb ?>"> -->
            <input type="file" class="form-control" name="thumbnail" />
            <p>* Lewati ini bila tidak ingin mengubah thumbnail sebelumnya</p>
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary">Save</button> 
	    <a href="<?php echo site_url('repository') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

