
<!-- Date Picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <!-- widgets -->
      <div class="row">
<!--          total blog-->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
                  echo $count_blog;
                 ?></h3>

              <p>Total Blogs</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
<!--          total like-->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Total Views</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
<!--       total comment-->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Total Comments</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
      </div>
      <!--widgets end -->

       <!-- top blogs -->
      <div class="row">

        <section class="content col-lg-8">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Latest Blogs</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date</th>
                        <th>Time</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($view_data as $row){
                        echo '
                         <tr>
                      <td>'. $row->article_name .'</td>
                      <td>'. $row->description .'</td>
                      <td>'. $row->date .'</td>
                       <td>'. $row->time .'</td>
                      <td><a href="#" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></a></td>

                    </tr>
                        ';
                    } ?>

                    </tbody>
                  </table>
                </div>

              </div>

            </div>

          </div>
        </section>


        <!-- Modal for Edit top blog -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Title</h4>
                </div>
                <div class="modal-body">
                  Description
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
            </div>
      </div>
<!--    top blog ends-->

<!--            blogs by date-->
            <div class="row content col-lg-8">
                <div class="box-body">
                    <div class="box-header" style="margin-top: 20px; !important;">
                        <h3 class="box-title">Blogs By Date</h3>
                    </div>

                    <?php
                    $attributes = array('class' => 'form-horizontal','id'=>'myform');
                    echo form_open('', $attributes);  ?>

                    <div class="input-group date">
                        <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="datepicker" placeholder="Enter Date">
                    </div>
                    <div class="">
                        <input type="submit" name="submit" value="Submit" class="btn bg-green pull-right" id="getdata">
                    </div>
                    <?php echo form_close( ); ?>

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                    </table>
                </div>

            </div>
        </section>





  <!-- datepicker -->
  <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>


  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>public/dist/js/demo.js"></script>

<script>
    $(document).ready(function () {

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });

        $("#datepicker").attr("autocomplete", "off");


    $(document).on('submit','#myform',function(){
        event.preventDefault();
        var date = $('#datepicker').val();
        console.log(date);
        $.ajax({
            type:"POST",
            url:"<?php echo base_url().'admin/Dashboard/get_blog'; ?>",
            data:{date:date},
            dataType: "json",
            success:function(data) {
                console.log(data[0].blog_id);
                let i;
                let html = '';
                for(i=0;i<data.length;i++){
                    html += '<tr><td>' + data[i].article_name + '</td>' +
                        '<td>' + data[i].description + '</td>' +
                        '<td>' + data[i].date + '</td>' +
                        '<td>' + data[i].time + '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
            },
            error: function() {
                alert("oops...");
            },

        });
        // event.preventDefault();
    });

    });

</script>

<script>
$("#dashboard1").addClass('active');
</script>  