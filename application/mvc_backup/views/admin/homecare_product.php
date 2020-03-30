<?php
$concern_edit = $category_edit = array();
if ($edit != "") {
    $homecare_product_id = $edit->homecare_product_id;
    $homecare_id = $edit->homecare_id;
    $green_text = $edit->green_text;
    $show_product = $edit->show_product;
    $black_text = $edit->black_text;
    $homecare_product_cost = $edit->homecare_product_cost;
    $short_text = $edit->short_text;
    $thum_image = $edit->thum_image;
    $banner_image = $edit->banner_image;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $homecare_product_status = $edit->homecare_product_status;
    $validation = '';
    $edit = site_url() . "admin/home/update_homecare_product";

//    if ($edit_category) {
//        foreach ($edit_category as $r) {
//            $category_edit[] = $r->homecare_id;
//        }
//    }

    if ($edit_concern) {
        foreach ($edit_concern as $c) {
            $concern_edit[] = $c->homecare_concern_id;
        }
    }
} else {
    $homecare_product_id = "";
    $homecare_id = "";
    $green_text = "";
    $show_product = "";
    $black_text = "";
    $homecare_product_cost = "";
    $short_text = "";
    $thum_image = "";
    $banner_image = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $homecare_product_status = "";
    $validation = 'required';
    $edit = site_url() . "admin/home/add_homecare_product";
}
?>



<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Homecare Product</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>

                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="homecare_id">
                                <option value="">Select Category</option>

                                <?php
                                $i = 0;
                                foreach ($category_data as $row) {
                                    ?>
                                    <option <?php echo $row->homecare_id == $homecare_id ? 'selected' : '' ?> value="<?php echo $row->homecare_id ?>"><?php echo $row->homecare_category_name ?></option>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Is Innovative Product </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="show_product">
                                <option value="">Select</option>
                                <option <?php echo $show_product == 'innovative' ? "selected" : "" ?> value="innovative">Yes</option>
                                <option <?php echo $show_product == 'homecare' ? "selected" : "" ?> value="homecare">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Concern (Press Ctrl+ Click) </label>

                        <div class="col-sm-3">
                            <select required="" multiple class="form-control col-xs-10 col-sm-5" name="concern_id[]" >

                                <?php
                                foreach ($concern_data as $row) {
                                    ?>
                                    <option <?php echo in_array($row->homecare_concern_id, $concern_edit) ? 'selected' : '' ?> value="<?php echo $row->homecare_concern_id ?>"><?php echo $row->homecare_concern_name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Color Text </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="green_text" value="<?php echo $green_text ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Title</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="product_slug" onblur="check('homecare_product','product_slug',this.id,'Product')" name="black_text" value="<?php echo $black_text ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <span id="errmsg"></span>
                            <input required="" type="hidden" id="form-field-1" name="homecare_product_id" value="<?php echo $homecare_product_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="thum_image" value="<?php echo $thum_image ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner_image" value="<?php echo $banner_image ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Cost </label>

                        <div class="col-sm-9">
                            <input required="" type="text" min="0" max="20000" data-parsley-type="number" id="form-field-1" name="homecare_product_cost" value="<?php echo $homecare_product_cost ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Thumb Images</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile1" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Banner Image</label>
                        <div class="col-sm-9">
                            <input  type="file" id="form-field-1" <?php echo $validation ?> name="userfile2" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text</label>

                        <div class="col-sm-9"> 
                            <textarea required="" style="height: 150px; width: 600px"id="hghjhg" class=" col-xs-10 col-sm-5" name="short_text"><?php echo $short_text ?></textarea>
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
                                <option <?php echo $homecare_product_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $homecare_product_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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
                                <th>Product Title</th>
                                <th>Color Text</th>
                                <th>Thumb Image</th>
                                <th>Banner Image</th>
                                <th>Status</th>
                                <th>Add/Update</th>
                                <th>Action</th>
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
                                            <?php echo $row->green_text ?>
                                        </td>

                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->thum_image ?>"></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->banner_image ?>"></td>
                                        <td><?php echo $row->homecare_product_status ?></td>

                                        <td><a href="<?php echo site_url(); ?>admin/home/homecare_benefits/<?php echo base64_encode($row->homecare_product_id); ?>">Add Benefits</a>
                                            | <a href="<?php echo site_url(); ?>admin/home/homecare_ingredients_photos/<?php echo base64_encode($row->homecare_product_id); ?>">Add Ingredients Photo</a>
                                            | <a href="<?php echo site_url(); ?>admin/home/homecare_ingredients_list/<?php echo base64_encode($row->homecare_product_id); ?>">Add Ingredients List</a><br>
                                            <!--| <a href="<?php echo site_url(); ?>admin/home/homecare_happy_customers/<?php echo base64_encode($row->homecare_product_id); ?>">Happy Customer</a>-->
                                            | <a href="<?php echo site_url(); ?>admin/home/homecare_steps/<?php echo base64_encode($row->homecare_product_id); ?>">Add Steps</a>
                                            | <a href="<?php echo site_url(); ?>admin/home/homecare_faq/<?php echo base64_encode($row->homecare_product_id); ?>">Add FAQ</a>



                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/homecare_product/<?php echo base64_encode($row->homecare_product_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_homecare_product/<?php echo base64_encode($row->homecare_product_id); ?>/<?php echo base64_encode($row->thum_image); ?>/<?php echo base64_encode($row->banner_image); ?>">
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




