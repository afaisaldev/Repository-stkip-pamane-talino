
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Repository</h3>
        <table class="table table-bordered table-hover">
<?php
$date_new = date('d-m-Y',strtotime($date . "+0 days"));
$author = $this->db->query("SELECT * FROM authors WHERE id = '$id_author'")->row()->author;
$type = $this->db->query("SELECT * FROM types WHERE id = '$id_type'")->row()->type;
$prodi = $this->db->query("SELECT * FROM prodi WHERE id = '$id_prodi'")->row()->program_studi;

if($thumbnail == ''){
  $thumb = 'noimg.png';
}else{
  $thumb = $thumbnail;
}

if($file_repo == ''){
  $frepo = 'No File';
}else{
  $frepo = $file_repo;
}

?>

	    <tr><td>Date</td><td><?php echo $date_new; ?></td></tr>
	    <tr><td>Author</td><td><?php echo $author; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td>Document</td><td><?php echo $prodi; ?></td></tr>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>File</td><td><?php echo $frepo; ?></td></tr>
	    <tr><td>Thumbnail</td><td><img style="width:300px" class="img-thumbnail" src="<?= base_url() ?>uploads/<?php echo $thumb; ?>"></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('repository') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->