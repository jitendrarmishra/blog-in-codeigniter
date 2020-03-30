<?php
if ($edit != "") {
    $concern_id = $edit->category_id;
    $menu_id = $edit->menu_id;
    $concern_name = $edit->category_name;
    $text = $edit->text;
    $concern_status = $edit->category_status;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;

    $edit = site_url() . "admin/home/update_category";
} else {
    $concern_id = "";
    $menu_id = "";
    $concern_name = "";
    $text = "";
    $concern_status = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $edit = site_url() . "admin/home/add_category";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Category</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category</label>

                        <div class="col-sm-9">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <input required="" type="text" id="category_slug" onblur="check('blog_category','category_slug',this.id,'Category')" name="title" value="<?php echo $concern_name ?>" placeholder="Category" class="col-xs-10 col-sm-5 form-control" />
                            <span id="errmsg"></span>
                            <input required="" type="hidden" id="form-field-1" name="category_id" value="<?php echo $concern_id ?>"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Title</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 150px;" class=" col-xs-10 col-sm-5 form-control" name="meta_title"><?php echo $meta_title ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Description</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 150px;" class=" col-xs-10 col-sm-5 form-control" name="meta_description"><?php echo $meta_description ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Keyword</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 150px;" class=" col-xs-10 col-sm-5 form-control" name="meta_keyword"><?php echo $meta_keyword ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-4">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $concern_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $concern_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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

                                <th class="sorting">Name</th>
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
                                        <td>
                                            <a href="javascript:void(0)"><?php echo $row->category_name ?></a>


                                        </td>
                                        <td><?php echo $row->category_status ?></td>
                                        <td>
                                            
                                                <a class="green btn" href="<?php echo site_url(); ?>admin/home/category/<?php echo base64_encode($row->category_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a class="btn delete" onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_category/<?php echo base64_encode($row->category_id); ?>">
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





