<?php
$concern_edit = $category_edit = array();
if ($edit != "") {
    $services_product_id = $edit->services_product_id;
    $green_text = $edit->green_text;
    $show_product = $edit->show_product;
    $black_text = $edit->black_text;
    $text = $edit->short_text;
    $image1 = $edit->image1;
    $image2 = $edit->image2;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $bottom_text = $edit->bottom_text;
    $bottom_subtext = $edit->bottom_subtext;
    $services_product_status = $edit->services_product_status;
    $product_type = $edit->product_type;
    $validation = '';
    $services_id = $edit->service_id;
    $edit = site_url() . "admin/home/update_service_product";


//    if ($edit_category) {
//        foreach ($edit_category as $r) {
//            $category_edit[] = $r->services_id;
//        }
//    }

    if ($edit_concern) {
        foreach ($edit_concern as $c) {
            $concern_edit[] = $c->concern_id;
        }
    }
} else {
    $services_product_id = "";
    $services_id = "";
    $green_text = "";
    $black_text = "";
    $text = "";
    $show_product = "";
    $image1 = "";
    $image2 = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $product_type = "";
    $bottom_text = "";
    $bottom_subtext = "";
    $services_product_status = "";
    $validation = 'required';
    $edit = site_url() . "admin/home/add_service_product";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Services Product</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Service </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="service_id" id="form-field-select-1">
                                <option value="">Select Salon Category</option>
                                <?php foreach ($services as $row) { ?>
                                    <option <?php echo $row->service_id == $services_id ? 'selected' : '' ?> value="<?php echo $row->service_id ?>"><?php echo $row->service_name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Concern </label>

                        <div class="col-sm-3">
                            <select multiple="" required="" class="form-control col-xs-10 col-sm-5" name="concern_id[]" id="form-field-select-1">

                                <?php foreach ($concern as $row) { ?>
                                    <option <?php echo in_array($row->concern_id, $concern_edit) ? 'selected' : '' ?> value="<?php echo $row->concern_id ?>"><?php echo $row->concern_name ?></option>
                                    <?php
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
                                <option <?php echo $show_product == 'salon' ? "selected" : "" ?> value="salon">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Type </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="product_type" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $product_type == 'Facial' ? "selected" : "" ?> value="Facial">Facial</option>
                                <option <?php echo $product_type == 'Treatment' ? "selected" : "" ?> value="Treatment">Treatment</option>
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
                            <input required="" type="text" id="product_slug" onblur="check('services_product','product_slug',this.id,'Product')" name="black_text" value="<?php echo $black_text ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <span id="errmsg"></span>
                            <input required="" type="hidden" id="form-field-1" name="services_product_id" value="<?php echo $services_product_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image1" value="<?php echo $image1 ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image2" value="<?php echo $image2 ?>"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image1</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile1" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image2</label>
                        <div class="col-sm-9">
                            <input  type="file" id="form-field-1" <?php echo $validation ?> name="userfile2" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text</label>

                        <div class="col-sm-9"> 
                            <textarea required="" style="height: 150px; width: 600px"id="hghjhg" class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bottom Title </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="bottom_text" value="<?php echo $bottom_text ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bottom Text </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="bottom_subtext" value="<?php echo $bottom_subtext ?>" placeholder="" class="col-xs-10 col-sm-5" />
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
                                <option <?php echo $services_product_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $services_product_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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

                                <th>Color Text</th>
                                <th>Product Title	</th>
                                <th>Image1</th>
                                <th>Image2</th>
                                <th>Status</th>
                                <th>Bottom Title</th>
                                <th>Bottom Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">

                                        <td>
                                            <?php echo $row->green_text ?>
                                        </td>
                                        <td><?php echo $row->black_text ?></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image1 ?>"></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image2 ?>"></td>
                                        <td><?php echo $row->services_product_status ?></td>
                                        <td><?php echo $row->bottom_text ?></td>
                                        <td><?php echo $row->bottom_subtext ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/service_product/<?php echo base64_encode($row->services_product_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_service_product/<?php echo base64_encode($row->services_product_id); ?>/<?php echo base64_encode($row->image1); ?>/<?php echo base64_encode($row->image2); ?>">
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




