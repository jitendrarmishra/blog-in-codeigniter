<?php
//print_r($edit);
//die;
if ($edit != "") {
    $our_reach_id = $edit->our_reach_id;
    $top_text = $edit->top_text;
    $city_photo = $edit->city_photo;
    $beauticians_photo = $edit->beauticians_photo;
    $consumers_photo = $edit->consumers_photo;
    $number_of_city = $edit->number_of_city;
    $number_of_beauticians = $edit->number_of_beauticians;
    $number_of_consumers = $edit->number_of_consumers;
    $our_reach_status = $edit->our_reach_status;
    $btext = $edit->btext;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "/admin/home/update_our_reach";
} else {
    $our_reach_id = "";
    $top_text = "";
    $city_photo = "";
    $beauticians_photo = "";
    $consumers_photo = "";
    $number_of_city = "";
    $number_of_beauticians = "";
    $number_of_consumers = "";
    $our_reach_status = "";
    $btext = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";
    $validation = 'required';
    $edit = site_url() . "/admin/home/add_our_reach";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Our Reach</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                 if($show_form==0)
               {
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Top Text</label>

                        <div class="col-sm-9"> 
                            <textarea required="" style="height: 150px; width: 600px"id="hghjhg" class=" col-xs-10 col-sm-5" name="top_text"><?php echo $top_text ?></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">City Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile1" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Number Of City </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="number_of_city" value="<?php echo $number_of_city ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Beauticians Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile2" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Number Of Beauticians </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="number_of_beauticians" value="<?php echo $number_of_beauticians ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="our_reach_id" value="<?php echo $our_reach_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image1" value="<?php echo $city_photo ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image2" value="<?php echo $beauticians_photo ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="image3" value="<?php echo $consumers_photo ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Consumers Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile3" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Number Of Consumers </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="number_of_consumers" value="<?php echo $number_of_consumers ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bottom Text</label>

                        <div class="col-sm-9"> 
                            <textarea required="" style="height: 150px; width: 600px"id="hghjhg" class=" col-xs-10 col-sm-5" name="btext"><?php echo $btext ?></textarea>
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
                                <option <?php echo $our_reach_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $our_reach_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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
               <?php } ?>

                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">
                                <th>Top Text</th>
                                <th>City Photo</th>
                                <th>City Count</th>
                                <th>Beauticians Photo</th>
                                <th>Beauticians Count</th>
                                <th>Consumers Photo</th>
                                <th>Consumers Count</th>
                                <th>Bottom Text</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo substr($row->top_text,0,100) ?></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/common/<?php echo $row->city_photo ?>"></td>
                                        <td><?php echo $row->number_of_city ?></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/common/<?php echo $row->beauticians_photo ?>"></td>
                                        <td><?php echo $row->number_of_beauticians ?></td>
                                        <td><img height="100" width="100" src="<?php echo base_url() ?>uploads/common/<?php echo $row->consumers_photo ?>"></td>
                                        <td><?php echo $row->number_of_consumers ?></td>
                                        <td><?php echo substr($row->btext,0,100) ?></td>
                                        <td><?php echo ucfirst($row->our_reach_status) ?></td>

                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/our_reach/<?php echo base64_encode($row->our_reach_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_our_reach/<?php echo base64_encode($row->our_reach_id); ?>/<?php echo base64_encode($row->city_photo); ?>/<?php echo base64_encode($row->beauticians_photo); ?>/<?php echo base64_encode($row->consumers_photo); ?>">
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




