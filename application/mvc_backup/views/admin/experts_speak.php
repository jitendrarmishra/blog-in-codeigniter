<?php
if ($edit != "") {
    $experts_speak_id = $edit->experts_speak_id;
    $experts_name = $edit->experts_name;
    $experts_designation = $edit->experts_designation;
    $experts_since = $edit->experts_since;
    $experts_text = $edit->experts_text;
    $experts_status = $edit->experts_status;
    $banner = $edit->photo;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "/admin/home/update_experts_speak";
} else {
    $experts_speak_id = "";
    $experts_name = "";
    $experts_designation = "";
    $experts_since = "";
    $experts_text = "";
    $experts_status = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";

    $banner = "";
    $validation = 'required';
    $edit = site_url() . "/admin/home/add_experts_speak";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Experts Speak</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="experts_name" value="<?php echo $experts_name ?>" placeholder="" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Designation </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="experts_designation" value="<?php echo $experts_designation ?>" placeholder="" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Since</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="experts_since" value="<?php echo $experts_since ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="experts_speak_id" value="<?php echo $experts_speak_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="experts_text"><?php echo $experts_text ?></textarea>
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
                            <select required="" class="form-control col-xs-10 col-sm-5" name="experts_status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $experts_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $experts_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Name</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Designation</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Text</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Photo</th>
                                <th class="hidden-480">Add/Update</th>
                                <th class="hidden-480">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="javascript:void(0)"><?php echo $row->experts_name ?></a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"><?php echo $row->experts_designation ?></a>
                                        </td>
                                        <td><?php echo substr($row->experts_text, 0, 90) ?></td>
                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/experts_speak/<?php echo $row->photo ?>"></td>
                                        <td><a href="<?php echo site_url(); ?>admin/home/expert_speak_qa/<?php echo base64_encode($row->experts_speak_id); ?>">Add QA</a></td>
                                        <td><?php echo $row->experts_status ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/experts_speak/<?php echo base64_encode($row->experts_speak_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_experts_speak/<?php echo base64_encode($row->experts_speak_id); ?>/<?php echo base64_encode($row->photo); ?>">
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




