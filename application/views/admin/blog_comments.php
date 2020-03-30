<?php
if ($edit != "") {
    $comment_id = $edit->comment_id;
    $user_name = $edit->user_name;
    $comment = $edit->comment;
    $status = $edit->status;
    $edit = site_url() . "/admin/home/update_blog_comments";
} else {
    $comment_id = "";
    $user_name = "";
    $comment = "";
    $status = "";
    $edit = "";
}
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Blog Comments</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                if($showform ==1) {
                ?>

                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">User name</label>

                        <div class="col-sm-9">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <input required="" type="text" id="form-field-1" readonly="" name="user_name" value="<?php echo $user_name ?>" placeholder="" class="form-control col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" readonly="" name="comment_id" value="<?php echo $comment_id ?>"/>


                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Comment</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px" class="form-control col-xs-10 col-sm-5" name="comment"><?php echo $comment ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $status == 'approve' ? "selected" : "" ?> value="approve">Approve</option>
                                <option <?php echo $status == 'not_approve' ? "selected" : "" ?> value="not_approve">Un approve</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                <?php
                }
                ?>

                <div class="">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">

                                <th>Blog Title</th>
                                <th>Comments</th>
                                <th>User name</th>
                                <th>User Email</th>
                                <th>Status</th>
                                <th style="width: 12%">Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td>
                                            <?php echo $row->post_title ?>
                                        </td>
                                        <td><?php echo $row->comment ?></td>
                                        <td><?php echo ucfirst($row->user_name) ?></td>
                                        <td><?php echo $row->email ?></td>
                                        <td><?php echo $row->status ?></td>
                                        <td>
                                           
                                                <a class="green btn" href="<?php echo site_url(); ?>admin/home/blog_comments/<?php echo base64_encode($row->comment_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                                <a class="btn delete" onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_blog_comments/<?php echo base64_encode($row->comment_id); ?>">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>
                                           
                                        </td>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>



