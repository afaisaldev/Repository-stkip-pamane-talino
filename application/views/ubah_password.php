<!-- Main content -->
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>UBAH PASSWORD</h3>

<?php if ($this->session->flashdata('message') == 'true'): ?>
<div class="alert alert-success" style="border: 1px solid black"><center>Berhasil mengganti password</center></div>
<?php endif; ?>

                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>New Password</td>
            <td><input type="password" class="form-control" name="new_password" id="myInput"  placeholder="New Password"/>
            
            <div class="form-check">
                <input type="checkbox" onclick="myFunction()" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
            </div>
        </td>  

              
	    
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary">Save</button> 
	    </td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>