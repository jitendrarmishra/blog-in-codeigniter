
<?php
if ($edit != "") {
    $city_id = $edit->city_id;
    $city_name = $edit->city_name;
    $status = $edit->city_status;
    $edit = site_url() . "/admin/home/update_center_city";
} else {
    $city_id = "";
    $city_name = "";
    $status = "";
    $edit = site_url() . "/admin/home/add_center_city";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update City</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Enter City </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="city_name" value="<?php echo $city_name ?>" placeholder="Enter Menu" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="city_id" value="<?php echo $city_id ?>"/>
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

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Name</th>
                                <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            foreach ($result as $row) {
                                ?>
                                <tr role="row" class="odd">
                                    <td>
                                        <?php echo $row->city_name ?>


                                    </td>
                                    <td><?php echo $row->city_status ?></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="green" href="<?php echo site_url(); ?>admin/home/center_city/<?php echo base64_encode($row->city_id); ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_center_city/<?php echo base64_encode($row->city_id); ?>">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>


                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
