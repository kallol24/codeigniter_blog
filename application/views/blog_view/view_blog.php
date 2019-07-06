<!-- Modal -->
<form id="edit_form">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <input type="text" name="article_name" class="form-control" id="article_name" placeholder="Article Name">
                </div>
                <div class="form-group">
                <input type="text" name="description" class="form-control" id="description" placeholder="Description">
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
<div class="content">
    <?php
        foreach ($view_data as $row){
    echo'    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user" style="margin-bottom:0px !important;">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-image: url('.base_url('uploads/').$row->cover_image.');background-position: center;background-repeat: no-repeat; background-size: cover;">
                    <h2 class="widget-user-username">Alexander Pierce</h2>
                    <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="'.base_url().'public/dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="box box-widget">
                <div class="box-body">
                    <!-- post text -->
                    <h1 class="page-header">
                    '.$row->article_name.'
                    <br>
                    </h1>

                    <p> '.$row->description.'
                    <br></p>

                    <!-- Attachment -->
                    <div class="img-responsive pad">
                        <img class="attachment-img" src="'.base_url("uploads/$row->body_image").'" alt="Attachment Image" height="300px" width="700px">
                        <!-- /.attachment-pushed -->
                    </div>


                    <!-- /.attachment-block -->

                    <!-- edit and delete button -->
                    <a  href="#" class="btn btn-default btn-xs edit_blog" id="'.$row->blog_id.'" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>Edit</a>
                    <a  href="'.base_url('Blog/Blog/delete_data/'.$row->blog_id.'').'" class="btn btn-default btn-xs delete_blog" id="'.$row->blog_id.'"><i class="fa fa-delete"></i>Delete</a>
                    <span class="description pull-right">Shared publicly - '.$row->date.' &ensp; '.$row->time.'</span>
                </div>
                <!-- /.box-body -->

            </div>
        </div>
    </div>';
    }
    ?>
    <?php echo $links; ?>
</div>

<script>
    $(document).ready(function(){
        $(document).on('submit','#edit_form',function(event){
            event.preventDefault();
            var article_name = $('#article_name').val();
            var description = $('#description').val();
                console.log(article_name);
            $.ajax({
                url:"<?php echo base_url().'blog/Blog/update'; ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data){
                    $('#myModal').modal('hide');
                    location.reload();
                }
            })
        });


    });

    $(document).on('click','.edit_blog',function(){
        var blog_id = $(this).attr("id");
        console.log(blog_id);
        $.ajax({
            url:"<?php echo base_url().'blog/Blog/fetch'; ?>",
            method: "POST",
            data: {blog_id:blog_id},
            dataType:"json",
            success: function(data){
                $('#myModal').modal('show');
                $('#article_name').val(data.article_name);
                $('#description').val(data.description);
                $('#blog_id').val(blog_id);
                $('#action').val("save");
            }
        })
    });

</script>

<script>
    $(document).ready(function(){
        $('.delete_blog').click(function(){
            var blog_id = $(this).attr("id");
            if(confirm("Are you sure?")){
                window.location="<?php echo base_url(); ?>blog/Blog/delete_data"+blog_id;
            }
            else{
                return false;
            }
        });
    });
</script>