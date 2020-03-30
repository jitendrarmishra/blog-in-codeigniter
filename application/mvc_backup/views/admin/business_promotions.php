<?php
if ($edit != "") {
    $business_support_slider_id = $edit->business_support_slider_id;
    $business_support_photos_title = $edit->business_support_photos_title;
    $business_support_photos_text = $edit->business_support_photos_text;
    $image = $edit->business_support_photos;
    $type = $edit->type;
    $status = $edit->business_support_photos_status;
    $validation = '';
    $edit = site_url() . "admin/home/update_business_support_slider";
} else {
    $business_support_slider_id = "";
    $business_support_photos_title = "";
    $business_support_photos_text = "";
    $image = "";
    $type = "";
    $status = "";
    $validation = 'required';
    $edit = site_url() . "admin/home/add_business_support_slider";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Business support (Promotions)</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                if ($show_form == 0 OR $show_form < 2)
                {
                    ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="business_support_photos_title" value="<?php echo $business_support_photos_title ?>" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Text </label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="business_support_photos_text"><?php echo $business_support_photos_text ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>
                        <div class="col-sm-9">
                            <input  type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="business_support_slider_id" value="<?php echo $business_support_slider_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image" value="<?php echo $image ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="type" value="<?php echo 'promotions' ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="redirect" value="<?php echo 'business_promotions' ?>"/>
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
                <?php
                }
                ?>


                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">
                                <th class="">Title</th>
                                <th class="">Text</th>

                                <th class="">Images</th>
                                <th class="hidden-480">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo ucfirst($row->business_support_photos_title) ?></td>
                                        <td><?php echo substr($row->business_support_photos_text, 0, 75) ?></td>
                                        <td><img style="height: 100px;width: 300px" src="<?php echo base_url() ?>uploads/common/<?php echo $row->business_support_photos ?>"></td>
                                        <td><?php echo ucfirst($row->business_support_photos_status) ?></td>
                                        <td>
                                            <a class="green" href="<?php echo site_url(); ?>admin/home/business_promotions/<?php echo base64_encode($row->business_support_slider_id); ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_business_support_slider/<?php echo base64_encode($row->business_support_slider_id); ?>/<?php echo base64_encode($row->business_support_photos); ?>/<?php echo base64_encode('business_promotions'); ?>">
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


