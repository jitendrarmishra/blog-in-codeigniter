<?php
if ($edit != "") {
    $courses_offered_list_id = $edit->courses_offered_list_id;
    $courses_offered_id = $edit->courses_offered_id;
    $course_banner = $edit->course_banner;
    $course_title = $edit->course_title;
    $intro_text = $edit->intro_text;
    $duration = $edit->duration;
    $cost = $edit->cost;
    $status = $edit->courses_offered_list_status;
    $validation = '';
    $edit = site_url() . "admin/home/update_courses_offered_lists";
} else {
    $courses_offered_list_id = "";
    $courses_offered_id = "";
    $course_banner = "";
    $course_title = "";
    $intro_text = "";
    $duration = "";
    $cost = "";
    $status = "";
    $validation = 'required';
    $edit = site_url() . "admin/home/add_courses_offered_lists";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Courses Offered List</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>

                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Course Title</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="course_title" value="<?php echo $course_title ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="courses_offered_list_id" value="<?php echo $courses_offered_list_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="courses_offered_id" value="<?php echo $courses_offered_id ?>"/>
                        </div>
                    </div>
                    
                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Duration</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="duration" value="<?php echo $duration ?>" placeholder="1 day" class="col-xs-10 col-sm-5" />
                            
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Cost</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" data-parsley-type="number" name="cost" value="<?php echo $cost ?>" placeholder="10,000" class="col-xs-10 col-sm-5" />
                            
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px"  class=" col-xs-10 col-sm-5" name="intro_text"><?php echo $intro_text ?></textarea>
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


                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">

                                <th>Title</th>

                                <th>Photo</th>
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
                                        <td>
                                            <?php echo $row->course_title ?> 
                                        </td>

                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/courses/<?php echo $row->course_banner ?>"></td>
                                        <td><?php echo $row->courses_offered_list_status ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/courses_offered_lists/<?php echo base64_encode($row->courses_offered_id); ?>/<?php echo base64_encode($row->courses_offered_list_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_courses_offered_lists/<?php echo base64_encode($row->courses_offered_id); ?>/<?php echo base64_encode($row->courses_offered_list_id); ?>/<?php echo base64_encode($row->banner); ?>">
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




