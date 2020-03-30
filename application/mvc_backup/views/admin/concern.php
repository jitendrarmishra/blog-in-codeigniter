<?php
//print_r($edit);
//die;
if ($edit != "") {
    $concern_id = $edit->concern_id;

    $concern_name = $edit->concern_name;
    $text = $edit->text;
    $concern_status = $edit->concern_status;
    $banner = $edit->banner;

    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $btext = $edit->btext;
    $validation = '';
    $edit = site_url() . "/admin/home/update_concern";
} else {
    $concern_id = "";


    $btext = "";
    $concern_name = "";
    $text = "";
    $banner = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $concern_status = "";
    $validation = 'required';
    $edit = site_url() . "/admin/home/add_concern";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Concern</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form  enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Concern Name</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="concern_slug" onblur="check('services_concern','concern_slug',this.id,'Concern')" name="title" value="<?php echo $concern_name ?>" placeholder="Concern" class="col-xs-10 col-sm-5" />
                            <span id="errmsg"></span>
                            <input required="" type="hidden" id="form-field-1" name="concern_id" value="<?php echo $concern_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Top Text</label>

                        <div class="col-sm-9">
                            <textarea required id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="text" value="xxx"><?php echo $text ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bottom Text</label>

                        <div class="col-sm-9">
                            <textarea required id="hghjhg" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="btext"><?php echo $btext ?></textarea>
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

                                <th class="" tabindex="0">Name</th>
                                <th class="" tabindex="0">Text</th>
                                <th class="" tabindex="0">Image</th>
                                <th class="hidden-480">Status</th>
                                <th class="hidden-480">Add/Update</th>
                                <th class="sorting_disabled">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->concern_name ?></td>
                                        <td><?php echo $row->text ?></td>
                                        <td><img height="100" width="150" src="<?php echo base_url() ?>uploads/concern/<?php echo $row->banner ?>"></td>
                                        <td><?php echo ucfirst($row->concern_status) ?></td>
                                        <td><a href="<?php echo site_url(); ?>admin/home/causes/<?php echo base64_encode($row->concern_id); ?>">Add Causes</a></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/concern/<?php echo base64_encode($row->concern_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_concern/<?php echo base64_encode($row->concern_id); ?>/<?php echo base64_encode($row->banner); ?>">
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




