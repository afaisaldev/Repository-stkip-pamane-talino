
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>REPOSITORY LIST <br><br> <?php echo anchor('repository/create/','Create',array('class'=>'btn btn-danger btn-sm'));?> </h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
            <tr>
                <th width="10px">No</th>
    		    <th width="60px">Date</th>
    		    <th>Author</th>
    		    <th>Type</th>
    		    <th>Document</th>
    		    <th>Title</th>
    		    <th>Action</th>
            </tr>
            </thead>
	        <tbody>
            <?php
            $start = 0;
            foreach ($repository_data as $repository)
            {
                ?>
            <tr>
            <?php
            $date_new = date('d-m-Y',strtotime($repository->date . "+0 days"));
            $author = $this->db->query("SELECT * FROM authors WHERE id = '$repository->id_author'")->row()->author;
            $type = $this->db->query("SELECT * FROM types WHERE id = '$repository->id_type'")->row()->type;
            $prodi = $this->db->query("SELECT * FROM prodi WHERE id = '$repository->id_prodi'")->row()->program_studi;
            ?>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $date_new ?></td>            
		    <td><?php echo $author ?></td>
		    <td><?php echo $type ?></td>
		    <td><?php echo $prodi ?></td>
		    <td><?php echo $repository->title ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('repository/read/'.$repository->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('repository/update/'.$repository->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('repository/delete/'.$repository->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
        
                    </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->