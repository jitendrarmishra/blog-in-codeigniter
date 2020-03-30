<?php
//print_r($edit);
//die;
if ($edit != "") {
    $post_id = $edit->post_id;
    $category_id = $edit->category_id;
    $post_title = $edit->post_title;
    $post_text = $edit->post_text;
    $post_author = $edit->post_author;
    $is_featured = $edit->is_featured;
    $image = $edit->image;
    $status = $edit->post_status;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "admin/home/update_blog_posts";
} else {
    $post_id = "";
    $category_id = "";
    $post_title = "";
    $post_text = "";
    $post_author = "";
    $status = "";
    $is_featured = "";
    $image = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $validation = 'required';
    $edit = site_url() . "admin/home/add_blog_posts";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Category Menu</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">



                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Select Category </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="category_id" id="form-field-select-1">
                                <option value=""></option>
                                <?php
                                foreach ($category as $row) {
                                    ?>
                                    <option <?php echo $row->category_id == $category_id ? "selected" : "" ?> value="<?php echo $row->category_id ?>"><?php echo $row->category_name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Featured Post </label>
                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="is_featured" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $is_featured == 'yes' ? "selected" : "" ?> value="yes">Yes</option>
                                <option <?php echo $is_featured == 'no' ? "selected" : "" ?> value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Image</label>
                        <div class="col-sm-9">
                            <input  type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Title</label>
                        <div class="col-sm-10">
                            <input required="" type="text" id="post_slug" onblur="check('blog_post', 'post_slug', this.id, 'Post title ')" name="post_title" value="<?php echo $post_title ?>" class="col-xs-10 col-sm-5" />
                            <span id="errmsg"></span>
                            <input required="" type="hidden" id="form-field-1" name="post_id" value="<?php echo $post_id ?>" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="image" value="<?php echo $image ?>" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Post Text </label>

                        <div class="col-sm-10">
                            <textarea class="ckeditor col-xs-10 col-sm-5" name="post_text"><?php echo $post_text ?></textarea>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Meta Title</label>

                        <div class="col-sm-10">
                            <textarea id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_title"><?php echo $meta_title ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Meta Description</label>

                        <div class="col-sm-10">
                            <textarea id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_description"><?php echo $meta_description ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Meta Keyword</label>

                        <div class="col-sm-10">
                            <textarea id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_keyword"><?php echo $meta_keyword ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Status </label>
                        <div class="col-sm-4">
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
                                <th>Category</th>
                                <th>Post Title</th>
                                <th>Text</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->category_name ?></td>
                                        <td><?php echo $row->post_title ?></td>
                                        <td><?php echo substr($row->post_text, 0, 100) ?></td>
                                        <td><img style="height: 100px;width: 300px" src="<?php echo base_url() ?>uploads/blog/<?php echo $row->image ?>"></td>
                                        <td><?php echo ucfirst($row->post_status) ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/blog_posts/<?php echo base64_encode($row->post_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_blog_posts/<?php echo base64_encode($row->post_id); ?>/<?php echo base64_encode($row->image); ?>">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>
                                            </div>


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
