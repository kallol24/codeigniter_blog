
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Blog</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
             
           
            <?php echo form_open_multipart(base_url('blog/Blog/insert'), 'class="form-horizontal"');  ?>
              <div class="form-group">
                <label for="article_name" class="col-sm-2 control-label">Article Name</label>

                <div class="col-sm-9">
                  <input type="text" name="article_name" class="form-control" id="article_name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-9">
                  <input type="text" name="description" class="form-control" id="description" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="datepicker" class="col-sm-2 control-label">Date:</label>

                <div class="input-group date col-sm-9">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="datepicker" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>

            <div class="bootstrap-timepicker">
                <div class="form-group">
                    <label for="timepicker" class="col-sm-2 control-label">Time picker:</label>

                    <div class="input-group col-sm-9">
                        <input type="text" class="form-control timepicker" name="timepicker" id="timepicker">

                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
            <div class="form-group">
                <label for="body_image" class="col-sm-2 control-label">Upload Body Image</label>
                <div class="col-sm-9">
                <input type="file" name="body_image" class="form-control" id="body_image">
                </div>
            </div>

            <div class="form-group">
                <label for="cover_image" class="col-sm-2 control-label">Upload Cover Image</label>
                <div class="col-sm-9">
                    <input type="file" name="cover_image" class="form-control" id="cover_image">
                </div>
            </div>

              <div class="form-group">
                    <input type="submit" name="submit" value="Add Blog" class="btn bg-green pull-right">
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>
</section> 

<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>


<!-- //Date picker -->
<script>
    $(document).ready(function(){
        $('#datepicker').datepicker({
        autoclose: true,
            format: 'yyyy-mm-dd',
    });
        $("#datepicker").attr("autocomplete", "off");
    $(".timepicker").timepicker({
      showInputs: false
    });
    });
   
</script>
<script>
   $("#bed").addClass('active menu-open');
   $("#cat").addClass('active');
</script>   