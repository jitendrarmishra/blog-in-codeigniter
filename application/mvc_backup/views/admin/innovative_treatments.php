<?php
if ($edit != "") {
    $page_id = $edit->page_id;
    $banner = $edit->image;
    $bold_text = $edit->bold_text;
    $normal_text = $edit->normal_text;
    $image_below_text = $edit->image_below_text;
    $service_offerd_top_text = $edit->service_offerd_top_text;
    $service_offerd_bottom_text = $edit->service_offerd_bottom_text;
    $status = $edit->insta_status;

    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "/admin/home/update_innovative_treatments";
} else {
    $page_id = "";
    $banner = "";
    $bold_text = "";
    $normal_text = "";
    $image_below_text = "";
    $service_offerd_top_text = "";
    $service_offerd_bottom_text = "";
    $status = "";

    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";

    $validation = 'required';
    $edit = site_url() . "/admin/home/add_innovative_treatments";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Innovative treatments</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                if($show_form == 0)
                {
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bold Text </label>

                        <div class="col-sm-9">

                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="bold_text"><?php echo $bold_text ?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Text </label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="normal_text"><?php echo $normal_text ?></textarea>


                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Insta Image Below Text </label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="image_below_text"><?php echo $image_below_text ?></textarea>


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Service Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="service_offerd_top_text"><?php echo $service_offerd_top_text ?></textarea>
                            <input required="" type="hidden" id="form-field-1" name="page_id" value="<?php echo $page_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Service Bottom Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="service_offerd_bottom_text"><?php echo $service_offerd_bottom_text ?></textarea>

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
<?php

}
?>

                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Title</th>

                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Photo</th>

                                <th class="hidden-480">Status</th>
                                <th class="hidden-480">Add/Update</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td>
                                           Insta Wow Treatment
                                        </td>
                                      
                                     
                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/common/<?php echo $row->image ?>"></td>
                                       
                                        <td><?php echo ucfirst($row->insta_status) ?></td>
                                        <td><a class="green" href="<?php echo site_url(); ?>admin/home/insta_points/<?php echo base64_encode($row->page_id); ?>">Add Insta Points</a>
                                        | <a class="green" href="<?php echo site_url(); ?>admin/home/insta_services/<?php echo base64_encode($row->page_id); ?>">Add Services</a>
                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/innovative_treatments/<?php echo base64_encode($row->page_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_innovative_treatments/<?php echo base64_encode($row->page_id); ?>/<?php echo base64_encode($row->image); ?>">
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
