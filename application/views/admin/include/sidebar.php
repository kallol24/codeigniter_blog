<?php
$cur_tab = $this->uri->segment(2)==''?'': $this->uri->segment(2);
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= ucwords($this->session->userdata('name')); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li id="dashboard">
                <a href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li id="bed" class="treeview">
                <a href="#">
                    <i class="fa fa-bed"></i> <span>Blog</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li id="add_user"><a href="<?=base_url('blog/Blog'); ?>"><i class="fa fa-circle"></i> Add Blog</a></li>
                    <li id="view_blog"><a href="<?=base_url('blog/Blog/view_blog'); ?>"><i class="fa fa-circle"></i> View Blog</a></li>
                    <li id="tag_blog"><a href="<?=base_url('blog/Blog/tag_blog'); ?>"><i class="fa fa-circle"></i> Tag Blog</a></li>


                </ul>
            </li>
           

        </ul>


    </section>
    <!-- /.sidebar -->
</aside>


<script>
    $("#<?= $cur_tab; ?>").addClass('active');
    console.log(<?= $cur_tab; ?>);
</script>
