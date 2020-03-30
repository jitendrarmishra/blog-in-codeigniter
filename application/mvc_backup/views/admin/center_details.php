
<?php
if ($edit != "") {
    $city_id =  $edit->city_id;
    $center_id = $edit->center_id;
    $center_name = $edit->center_name;
    $center_area = $edit->center_area;
    $center_address = $edit->center_address;
    $center_number = $edit->center_number;
    $status = $edit->center_status;
    $edit = site_url() . "/admin/home/update_center_details";
} else {
    $city_id = "";
    $center_id = "";
    $center_name = "";
    $center_area = "";
    $center_address = "";
    $center_number = "";
    $status = "";
    $edit = site_url() . "/admin/home/add_center_details";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Center</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select City </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="city_id" id="form-field-select-1">
                                <option value="">Select City</option>
                                <?php
                                foreach ($city as $row) {
                                    ?>
                                    <option <?php echo $row->city_id == $city_id ? "selected" : "" ?> value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Center Name</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_name" value="<?php echo $center_name ?>" placeholder="Center Name" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="center_id" value="<?php echo $center_id ?>" placeholder="Center Name" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Center Area</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_area" value="<?php echo $center_area ?>" placeholder="Center Area" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Center Address </label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_address" value="<?php echo $center_address ?>" placeholder="Center Address" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Center Number</label>
                        <div class="col-sm-9">
                            <input required="" type="number" data-parsley-type='number' id="form-field-1" name="center_number" value="<?php echo $center_number ?>" placeholder="Center Number" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="status" id="form-field-select-1">
                                <option value="">Select Status</option>
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
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Area</th>
                                 <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Address</th>
                                  <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Number</th>
                                <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Add/Update</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            foreach ($result as $row) {
                                ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row->center_name ?></td>
                                    <td><?php echo $row->center_area ?></td>
                                    <td><?php echo $row->center_address ?></td>
                                    <td><?php echo $row->center_number ?></td>
                                    <td><?php echo $row->center_status ?></td>
                                    <td><a href="<?php echo site_url(); ?>admin/home/center_gallery/<?php echo base64_encode($row->center_id); ?>">Add Gallery</a></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="green" href="<?php echo site_url(); ?>admin/home/center_details/<?php echo base64_encode($row->center_id); ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_center_details/<?php echo base64_encode($row->center_id); ?>">
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
