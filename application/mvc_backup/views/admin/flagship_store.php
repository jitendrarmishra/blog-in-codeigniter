<?php
if ($edit != "") {

    $center_id = $edit->center_id;
    $center_name = $edit->center_name;
    $email = $edit->email;
    $center_address = $edit->center_address;
    $center_number = $edit->center_number;
    $status = $edit->center_status;
    $store_open_time1 = $edit->store_open_time1;
    $store_open_time2 = $edit->store_open_time2;
    $edit = site_url() . "/admin/home/update_flagship_store";
} else {
    $city_id = "";
    $center_id = "";
    $center_name = "";
    $email = "";
    $center_address = "";
    $center_number = "";
    $status = "";
    $store_open_time1 = "";
    $store_open_time2 = "";
    $edit = site_url() . "/admin/home/add_flagship_store";
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store Name</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_name" value="<?php echo $center_name ?>" placeholder="Store Name" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="center_id" value="<?php echo $center_id ?>" placeholder="Store Name" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store Address </label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="center_address" value="<?php echo $center_address ?>" placeholder="Store Address" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    

                   

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store Number</label>
                        <div class="col-sm-9">
                            <input required="" type="number" data-parsley-type='number' id="form-field-1" name="center_number" value="<?php echo $center_number ?>" placeholder="Store Number" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>
                        <div class="col-sm-9">
                            <input required="" type="email" id="form-field-1" name="email" value="<?php echo $email ?>" placeholder="abc@gmail.com" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    
                      <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store time (Mon-Sat)</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="store_open_time1" value="<?php echo $store_open_time1 ?>" placeholder="Mon-Sat: 11am – 7pm " class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store time (Sunday)</label>
                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="store_open_time2" value="<?php echo $store_open_time2 ?>" placeholder="Sun: 11am – 4pm" class="col-xs-10 col-sm-5" />
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
                                
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Number</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Email</th>
                                <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            foreach ($result as $row) {
                                ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row->center_name ?></td>
                                  
                                    <td><?php echo $row->center_address ?></td>
                                    <td><?php echo $row->center_number ?></td>
                                      <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->center_status ?></td>
                                    


                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="green" href="<?php echo site_url(); ?>admin/home/flagship_store/<?php echo base64_encode($row->center_id); ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_flagship_store/<?php echo base64_encode($row->center_id); ?>">
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
</div>