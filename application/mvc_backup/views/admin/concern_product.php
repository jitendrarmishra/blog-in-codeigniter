<?php
//print_r($edit);
//die;
if ($edit != "") {
    $concern_product_id = $edit->concern_product_id;
    $green_text = $edit->green_text;
    $concern_id = $edit->concern_id;
    $black_text = $edit->black_text;
    $text = $edit->short_text;
    $image1 = $edit->image1;
    $image2 = $edit->image2;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $product_type = $edit->product_type;
    $bottom_text = $edit->bottom_text;
    $bottom_subtext = $edit->bottom_subtext;
    $concern_product_status = $edit->concern_product_status;
    $validation = '';
    $edit = site_url() . "/admin/home/update_concern_product";
} else {
    $concern_product_id = "";
    $green_text = "";
    $black_text = "";
    $text = "";
    $image1 = "";
    $product_type = "";
    $image2 = "";
    $concern_id = "";
    $bottom_text = "";
    $bottom_subtext = "";
    $concern_product_status = "";
    $concern_id = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $validation = 'required';
    $edit = site_url() . "/admin/home/add_concern_product";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Concern Product</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Concern </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="concern_id" id="form-field-select-1">
                                <option value="">Select Concern</option>
                                <?php foreach ($services as $row) { ?>
                                    <option <?php echo $concern_id == $row->concern_id ? "selected" : "" ?> value="<?php echo $row->concern_id ?>"><?php echo $row->concern_name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Type </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="product_type" id="form-field-select-1">
                                <option value="">Select Product Type</option>
                                <option <?php echo $product_type == 'facial' ? "selected" : "" ?> value="facial">Facial</option>
                                <option <?php echo $product_type == 'treatment' ? "selected" : "" ?> value="treatment">Treatment</option>
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="black_text" value="<?php echo $black_text ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="concern_product_id" value="<?php echo $concern_product_id ?>"/>
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
                            <textarea required="" id="hghjhg" class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>
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
                                <option <?php echo $concern_product_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $concern_product_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Concern</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Type</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Color Text</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Product Title	</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Image1</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Image2</th>
                                  <th class="hidden-480 ">Bottom Title</th>
                                <th class="hidden-480 ">Bottom Text</th>
                                <th class="hidden-480 ">Status</th>
                              
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo ucfirst($row->concern_name) ?></td>
                                        <td><?php echo ucfirst($row->product_type) ?></td>
                                        <td><?php echo ucfirst($row->green_text) ?></td>
                                        <td><?php echo ucfirst($row->black_text) ?></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/concern_product/<?php echo $row->image1 ?>"></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/concern_product/<?php echo $row->image2 ?>"></td>
                                          <td><?php echo ucfirst($row->bottom_text) ?></td>
                                        <td><?php echo ucfirst($row->bottom_subtext) ?></td>
                                        <td><?php echo ucfirst($row->concern_product_status) ?></td>
                                    
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/concern_product/<?php echo base64_encode($row->concern_product_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_concern_product/<?php echo base64_encode($row->concern_product_id); ?>/<?php echo base64_encode($row->image1); ?>/<?php echo base64_encode($row->image2); ?>">
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




