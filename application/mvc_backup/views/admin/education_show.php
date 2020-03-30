<?php
if ($edit != "") {
    $education_show_id = $edit->education_show_id;
    $title = $edit->title;
    $publish_date = $edit->publish_date;
    $place = $edit->place;
    $text = $edit->text;
    $status = $edit->education_show_status;
    $banner = $edit->photo;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "/admin/home/update_education_show";
} else {
    $education_show_id = "";
    $title = "";
    $publish_date = "";
    $place = "";
    $text = "";
    $status = "";
    $banner = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";

    $validation = 'required';
    $edit = site_url() . "/admin/home/add_education_show";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Education Show</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title </label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="title" value="<?php echo $title ?>" placeholder="" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Date </label>

                        <div class="col-sm-9">
                            <input required="" type="text" name="publish_date" value="<?php echo $publish_date ?>" placeholder="" class="col-xs-10 col-sm-5 datepicker" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1" <?php echo $validation ?> name="userfile" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Place</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="place" value="<?php echo $place ?>" placeholder="" class="col-xs-10 col-sm-5" />
                            <input required="" type="hidden" id="form-field-1" name="education_show_id" value="<?php echo $education_show_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="text"><?php echo $text ?></textarea>

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


                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                            <tr role="row">

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Title</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Date</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Text</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Photo</th>
                                <th class="hidden-480">Place</th>
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
                                            <?php echo $row->title ?>
                                        </td>
                                        <td>
                                            <?php echo $row->publish_date ?>
                                        </td>
                                        <td><?php echo substr($row->text, 0, 90) ?></td>
                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/education/<?php echo $row->photo ?>"></td>
                                        <td> <?php echo $row->place ?></td>
                                        <td><?php echo ucfirst($row->education_show_status) ?></td>
                                        <td><a class="green" href="<?php echo site_url(); ?>admin/home/education_show_slider/<?php echo base64_encode($row->education_show_id); ?>">Add Slider</a></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/education_show/<?php echo base64_encode($row->education_show_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_education_show/<?php echo base64_encode($row->education_show_id); ?>/<?php echo base64_encode($row->photo); ?>">
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>