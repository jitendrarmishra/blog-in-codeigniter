<?php
//print_r($edit);
//die;
if ($edit != "") {
    $homecare_ingredients_list_id = $edit->homecare_ingredients_list_id;
    $text = $edit->text;
    $title = $edit->title;
//    $banner = $edit->banner;
    $step_status = $edit->ingredients_status;
    $validation = "";
    $edit = site_url() . "admin/home/update_homecare_ingredients_list";
} else {
    $homecare_ingredients_list_id = "";
    $text = "";
    $title = "";
//    $banner = "";
    $step_status = "";
    $validation = "required";
    $edit = site_url() . "admin/home/add_homecare_ingredients_list";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Homecare Ingredients</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ingredients Title</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="title" value="<?php echo $title ?>" placeholder="" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

<!--                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Banner</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ingredients Text</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="text" value="<?php echo $text ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="homecare_ingredients_list_id" value="<?php echo $homecare_ingredients_list_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="homecare_product_id" value="<?php echo $product_id ?>"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $step_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $step_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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
                                <th class="sorting">Page Name</th>
                                <th class="sorting">Ingredients Title</th>
                                <th class="hidden-480 sorting">Ingredients Text</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->black_text ?></a></td>
                                        <td><?php echo $row->title ?></a></td>
                                        <td><?php echo $row->text ?></a></td>
                                        <td><?php echo $row->ingredients_status ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/homecare_ingredients_list/<?php echo base64_encode($product_id) ?>/<?php echo base64_encode($row->homecare_ingredients_list_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_homecare_ingredients_list/<?php echo base64_encode($product_id) ?>/<?php echo base64_encode($row->homecare_ingredients_list_id); ?>">
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




