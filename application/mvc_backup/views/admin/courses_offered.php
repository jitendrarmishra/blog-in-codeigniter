<?php
if ($edit != "") {
    $courses_offred_id = $edit->courses_offered_id;
    $banner_title = $edit->banner_title;
    $banner_bold_title = $edit->banner_bold_title;
    $banner_text = $edit->banner_text;
    $banner = $edit->banner;
    $paragraph_title = $edit->paragraph_title;
    $paragraph_text = $edit->paragraph_text;
    $status = $edit->courses_offered_status;
     $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "admin/home/update_courses_offered";
} else {
    $courses_offred_id = "";
    $banner_title = "";
    $banner_bold_title = "";
    $banner_text = "";
    $banner = "";
    $paragraph_title = "";
    $paragraph_text = "";
    $status = "";
    $validation = 'required';
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $edit = site_url() . "admin/home/add_courses_offered";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Courses Offered</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }

                if ($show_form == 0) {
                    ?>

                    <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Banner Title</label>

                            <div class="col-sm-9">
                                <input required="" type="text" id="form-field-1" name="banner_title" value="<?php echo $banner_title ?>" placeholder="" class="col-xs-10 col-sm-5" />
                                <input required="" type="hidden" id="form-field-1" name="courses_offered_id" value="<?php echo $courses_offred_id ?>"/>
                                <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Banner Bold Title </label>

                            <div class="col-sm-9">
                                <input required="" type="text" id="form-field-1" name="banner_bold_title" value="<?php echo $banner_bold_title ?>" placeholder="" class="col-xs-10 col-sm-5" />

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Banner text</label>

                            <div class="col-sm-9">
                                <textarea required="" style="height: 150px; width: 600px"  class=" col-xs-10 col-sm-5" name="banner_text"><?php echo $banner_text ?></textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Paragraph title</label>
                            <div class="col-sm-9">
                                <input required="" type="text" id="form-field-1" name="paragraph_title" value="<?php echo $paragraph_title ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Paragraph text</label>

                            <div class="col-sm-9">
                                <textarea required="" style="height: 150px; width: 600px"  class=" col-xs-10 col-sm-5" name="paragraph_text"><?php echo $paragraph_text ?></textarea>
                            </div>
                        </div>
                        
                        
<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Title</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_title"><?php echo $meta_title ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Description</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_description"><?php echo $meta_description ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Keyword</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_keyword"><?php echo $meta_keyword ?></textarea>
                        </div>
                    </div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

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
                <?php } ?>

                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">

                                <th>Title</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Add Courses</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td>
                                            <?php echo $row->banner_title ?> <?php echo $row->banner_bold_title ?>
                                        </td>

                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/courses/<?php echo $row->banner ?>"></td>
                                        <td><?php echo ucfirst($row->courses_offered_status) ?></td>

                                        <td><a href="<?php echo site_url('admin/home/courses_offered_lists/' . base64_encode($row->courses_offered_id)); ?>">Add Courses</a></td>

                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/courses_offered/<?php echo base64_encode($row->courses_offered_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_courses_offered/<?php echo base64_encode($row->courses_offered_id); ?>/<?php echo base64_encode($row->banner); ?>">
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
<script type="text/javascript">
    $(function () {
        $('#myform').parsley().on('field:validated', function () {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
                .on('form:submit', function () {
                    return false; // Don't submit form for this demo
                });
    });



</script>




