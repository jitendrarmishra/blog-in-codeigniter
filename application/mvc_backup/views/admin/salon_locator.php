
<?php
if ($edit != "") {
    $city_id = $edit->city_id;
    $center_id = $edit->id;
    $center_name = $edit->name;
    $lat = $edit->lat;
    $lng = $edit->lng;
    $center_address = $edit->address;
    $center_number = $edit->number;
    $status = $edit->status;
    $edit = site_url() . "/admin/home/update_salon_locator";
} else {
    $city_id = "";
    $center_id = "";
    $center_name = "";
    $lat = "";
    $lng = "";
    $center_address = "";
    $center_number = "";
    $status = "";
    $edit = site_url() . "/admin/home/add_salon_locator";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Salon Locator</h3>

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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store Name</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_name" value="<?php echo $center_name ?>" placeholder=" Name" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="id" value="<?php echo $center_id ?>" placeholder="Center Name" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Latitude (click <a target="_blank" href="https://www.latlong.net/">here</a> for Lat & Log)</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="lat" value="<?php echo $lat ?>" placeholder="lat" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Longitude</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="lat" value="<?php echo $lng ?>" placeholder="lng" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_address" value="<?php echo $center_address ?>" placeholder=" Address" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Number</label>
                        <div class="col-sm-9">
                            <input required="" type="number" data-parsley-type='number' id="form-field-1" name="center_number" value="<?php echo $center_number ?>" placeholder=" Number" class="col-xs-10 col-sm-5" />
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
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Latitude & Longitude</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Number</th>
                                <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            foreach ($result as $row) {
                                ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->lat ?>-<?php echo $row->lng ?></td>
                                    <td><?php echo $row->address ?></td>
                                    <td><?php echo $row->number ?></td>
                                    <td><?php echo $row->status ?></td>
                                   
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="green" href="<?php echo site_url(); ?>admin/home/salon_locator/<?php echo base64_encode($row->id); ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_salon_locator/<?php echo base64_encode($row->id); ?>">
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
