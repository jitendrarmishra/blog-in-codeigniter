<?php
//print_r($edit);
//die;
if ($edit != "") {
    $service_id = $edit->service_id;
    $service_name = $edit->service_name;
    $service_heading = $edit->service_heading;
    $text = $edit->text;
    $service_status = $edit->service_status;
    $banner = $edit->banner;
    $btext = $edit->btext;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
     $validation = '';
    $edit = site_url() . "admin/home/update_service";
} else {
   $service_id = "";
    $service_name = "";
    $service_heading = "";
    $text = "";
    $btext =  "";
    $service_status = "";
    $banner = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
     $validation = 'required';
    $edit = site_url() . "admin/home/add_service";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Services</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Service Name </label>

                        <div class="col-sm-9">
                           <input required="" type="text" id="services_slug" onblur="check('services','services_slug',this.id,'Service')" name="service_name" value="<?php echo $service_name ?>" placeholder="" class="col-xs-10 col-sm-5" />
                           <span id="errmsg"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Text Title</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="service_heading" value="<?php echo $service_heading ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="service_id" value="<?php echo $service_id	 ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner	 ?>"/>
                        </div>
                    </div>
                    
                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Banner</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />
                  
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Banner Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="width:600px;height: 150px" class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>
                         </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bottom Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="width:600px;height: 150px" id="hghjhg" class=" col-xs-10 col-sm-5" name="btext"><?php echo $btext ?></textarea>
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
                                <option <?php echo $service_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $service_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Service name</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Service title	</th>
                               <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Banner</th>
                                <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                                 
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="javascript:void(0)"><?php echo $row->service_name ?></a>
                                        </td>
                                         <td><?php echo $row->service_heading ?></td>
                                         <td><img height="100" width="200" src="<?php echo base_url() ?>uploads/services/<?php echo $row->banner ?>"></td>
                                        <td><?php echo $row->service_status ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/services/<?php echo base64_encode($row->service_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_service/<?php echo base64_encode($row->service_id); ?>/<?php echo base64_encode($row->banner); ?>">
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




