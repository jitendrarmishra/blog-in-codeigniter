<?php
//print_r($edit);
//die;
if ($edit != "") {
    $step_id = $edit->step_id;
    $text = $edit->text;
    $step_status = $edit->step_status;
    $edit = site_url() . "admin/home/update_steps";
} else {
    $step_id = "";
    $text = "";
    $step_status = "";

    $edit = site_url() . "admin/home/add_steps";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Steps</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Step Text</label>

                        <div class="col-sm-9">
                            <!--<input required="" type="text" id="form-field-1" name="text" value="<?php echo $text ?>" placeholder="" class="col-xs-10 col-sm-5" />-->
                            <textarea style="height: 100px; width: 600px" required="" id="hghjhg" class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>
                            <input required="" type="hidden" id="form-field-1" name="step_id" value="<?php echo $step_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="services_product_inner_id" value="<?php echo $product_id ?>"/>
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
                                <th class="">Page Name</th>
                                <th class="">Step</th>
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
                                        <td><?php echo $row->inner_title ?></td>
                                        <td><?php echo $row->text ?></td>
                                        <td><?php echo $row->step_status ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/steps/<?php echo base64_encode($product_id) ?>/<?php echo base64_encode($row->step_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_steps/<?php echo base64_encode($product_id) ?>/<?php echo base64_encode($row->step_id); ?>">
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




