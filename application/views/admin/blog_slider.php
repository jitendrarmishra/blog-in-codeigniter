<?php
//print_r($edit);
//die;
if ($edit != "") {
    $blog_slider_id = $edit->blog_slider_id;
    $post_id = $edit->post_id;
    $image = $edit->image;
    $status = $edit->status;

    $validation = '';
    $edit = site_url() . "admin/home/update_blog_slider";
} else {
    $post_id = "";
    $blog_slider_id = "";
    $status = "";
    $validation = 'required';
    $image = "";

    $edit = site_url() . "admin/home/add_blog_slider";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Blog Slider</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">



                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Select Post </label>

                        <div class="col-sm-3">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <select required="" class="form-control col-xs-10 col-sm-5" name="post_id" id="form-field-select-1">
                                <option value=""></option>
                                <?php
                                foreach ($category as $row) {
                                    ?>
                                    <option <?php echo $row->post_id == $post_id ? "selected" : "" ?> value="<?php echo $row->post_id ?>"><?php echo $row->post_title ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Image</label>
                        <div class="col-sm-9">
                            <input  type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5 form-control" />
                            <input required="" type="hidden" id="form-field-1" name="blog_slider_id" value="<?php echo $blog_slider_id ?>" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="image" value="<?php echo $image ?>" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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


                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">

                                <th class="sorting">Post Title</th>
                                
                                <th class="sorting">Image</th>
                                <th class="sorting">Status</th>
                                <th class="sorting">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->post_title ?></td>
                                      
                                        <td><img style="height: 100px;width: 300px" src="<?php echo base_url() ?>uploads/blog/<?php echo $row->image ?>"></td>
                                        <td><?php echo ucfirst($row->status) ?></td>
                                        <td>
                                           
                                                <a class="green btn" href="<?php echo site_url(); ?>admin/home/blog_slider/<?php echo base64_encode($row->blog_slider_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a class="btn delete" onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_blog_slider/<?php echo base64_encode($row->blog_slider_id); ?>/<?php echo base64_encode($row->image); ?>">
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