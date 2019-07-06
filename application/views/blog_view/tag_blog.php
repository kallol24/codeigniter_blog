<form id="edit_form">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Tag</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="tag_name" class="form-control" id="tag_name" placeholder="Add Tag">
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="blog_id" id="blog_id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="action" id="action" value="Save">
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <!-- Left col -->
    <section class="content col-lg-8">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tag Blogs</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Tag</th>
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
                      <td>'. $row->tag_name .'</td>
                      <td><a href="#" class="add_tag" id="'.$row->blog_id.'" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></a></td>

                    </tr>
                        ';
                            } ?>

                            </tbody>
                        </table>
                    </div>
                    <?php echo $links; ?>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
        $(document).on('submit','#edit_form',function(event){
            event.preventDefault();
            var tag_name = $('#tag_name').val();
            $.ajax({
                url:"<?php echo base_url().'blog/Blog/add_tag'; ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data){
                    $('#myModal').modal('hide');
                    location.reload();
                    // $('#article_name').val(data.article_name);
                    // $('#description').val(data.description);
                    // $('#blog_id').val(blog_id);
                }
            })
        });


    });

    $(document).on('click','.add_tag',function(){
        var blog_id = $(this).attr("id");
        console.log(blog_id);
        $.ajax({
            url:"<?php echo base_url().'blog/Blog/fetch'; ?>",
            method: "POST",
            data: {blog_id:blog_id},
            dataType:"json",
            success: function(data){
                $('#myModal').modal('show');
                $('#tag_name').val(data.tag_name);
                $('#blog_id').val(blog_id);
                $('#action').val("save");
            }
        })
    });

</script>