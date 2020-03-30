<?php
//print_r($edit);
//die;
if ($edit != "") {
    $services_product_inner_id = $edit->services_product_inner_id;
    $services_product_id = $edit->services_product_id;
    $inner_title = $edit->inner_title;
    $text = $edit->text;
    $image = $edit->image;
    $product_inner_status = $edit->product_inner_status;
    $duration = $edit->duration;
    $validation = '';
    $banner_type = $edit->banner_type;
    $edit = site_url() . "/admin/home/update_service_product_page";
} else {
    $services_product_inner_id = "";
    $services_product_id = "";
    $inner_title = "";
    $text = "";
    $image = "";
    $duration = "";
    $product_inner_status = "";
    $display = 'block';
    $banner_type = "";
    $validation = 'required';
    $edit = site_url() . "/admin/home/add_service_product_page";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Services Product Inner Page</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Service Product </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="services_product_id" id="form-field-select-1">
                                <option value="">Select Services Product</option>
                                <?php foreach ($services as $row) { ?>
                                    <option <?php echo $services_product_id == $row->services_product_id ? "selected" : "" ?> value="<?php echo $row->services_product_id ?>"><?php echo $row->black_text ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="inner_title" value="<?php echo $inner_title ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="services_product_inner_id" value="<?php echo $services_product_inner_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image" value="<?php echo $image ?>"/>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">What’s In It Banner</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile1" value="<?php echo $image ?>" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Select Banner Option</label>
                        <div class="col-sm-9">
                            <input required type="radio" <?php echo $banner_type == 'img' ? "checked" : "" ?> name="banner_type" value="img"/>Image
                            <input type="radio" <?php echo $banner_type == 'video' ? "checked" : "" ?> name="banner_type" value="video" />Video
                        </div>
                    </div>

                    <div class="form-group desc" id="Cars_img" style="<?php echo $banner_type == 'img' ? "" : "display: none" ?>">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="img" name="userfile" value="<?php echo $image ?>" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group desc" id="Cars_video" style="<?php echo $banner_type == 'video' ? "" : "display: none" ?>">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Video Link(You Tube)</label>
                        <div class="col-sm-9">
                            <input type="text" id="video"  name="userfile" value="<?php echo $image ?>" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Process Duration</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" required="" name="duration" value="<?php echo $duration ?>" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px"  class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>
                        </div>

                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $product_inner_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $product_inner_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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
                                <th class="sorting_disabled">Product&nbsp;Name</th>
                                <th class="sorting_disabled">Title</th>
                                <th class="sorting_disabled">Text</th>
                                <th class="sorting_disabled">Link</th>
                                <th class="sorting_disabled">Duration</th>
                                <th class="sorting_disabled">Status</th>
                                <th class="sorting_disabled">Add/Update</th>
                                <th class="sorting_disabled">Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->black_text ?></td>
                                        <td>
                                            <?php echo $row->inner_title ?>
                                        </td>
                                        <td><?php echo substr($row->text, 0, 50) ?>...</td>
                                        <td><?php echo $row->image ?></td>
                                        <td><?php echo $row->duration ?></td>
                                        <td><?php echo $row->services_product_status ?></td>
                                        <td><a href="<?php echo site_url(); ?>admin/home/steps/<?php echo base64_encode($row->services_product_inner_id); ?>">Add Steps</a> | <a href="<?php echo site_url(); ?>admin/home/faq/<?php echo base64_encode($row->services_product_inner_id); ?>">Add FAQ</a> |
                                            <a href="<?php echo site_url(); ?>admin/home/ingredients/<?php echo base64_encode($row->services_product_inner_id); ?>">Add Ingredients</a>


                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/service_product_page/<?php echo base64_encode($row->services_product_inner_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_service_product_page/<?php echo base64_encode($row->services_product_inner_id); ?>/<?php echo base64_encode($row->image); ?>">
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




