<?php
//print_r($edit);
//die;
if ($edit != "") {
    $customer_id = $edit->customer_id;
    $services_product_id = $edit->services_product_id;
    $status = $edit->status;
    $text = $edit->text;
    $name = $edit->name;
    $link = $edit->link;
    $banner = $edit->photo;
    $designation = $edit->designation;
    $validation = '';
    $edit = site_url() . "admin/home/update_services_happy_customers";
} else {
    $customer_id = "";
    $services_product_id = "";
    $status = "";
    $text = "";
    $name = "";
    $link = "";
    $designation = "";
    $banner = "";
    $validation = 'required';
    $edit = site_url() . "admin/home/add_services_happy_customers";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Services Happy Customers</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Homecare Product </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="services_product_id" id="form-field-select-1">
                                <option value="">Select Services Product</option>
                                <?php foreach ($homecare_product as $row) { ?>
                                    <option <?php echo $services_product_id == $row->services_product_id ? "selected" : "" ?> value="<?php echo $row->services_product_id ?>"><?php echo $row->black_text ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="name" value="<?php echo $name ?>" placeholder="Sofia Mayer, 35 yrs" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Designation </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="designation" value="<?php echo $designation ?>" placeholder="MBA Student" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Link</label>

                        <div class="col-sm-9">
                            <input required="" type="url" data-parsley-type='url' id="form-field-1" name="link" value="<?php echo $link ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="customer_id" value="<?php echo $customer_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Message</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 200px" class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>
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

                                <th>Name</th>
                                <th>Designation</th>
                                <th>Message</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="javascript:void(0)"><?php echo $row->name ?></a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"><?php echo $row->designation ?></a>
                                        </td>
                                        <td><?php echo substr($row->text, 0, 90) ?></td>
                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/customer/<?php echo $row->photo ?>"></td>
                                        <td><?php echo ucfirst($row->status) ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/services_happy_customers/<?php echo base64_encode($row->customer_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_services_happy_customers/<?php echo base64_encode($row->customer_id); ?>/<?php echo base64_encode($row->photo); ?>">
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




