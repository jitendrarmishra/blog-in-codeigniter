<?php
if ($edit != "") {
    $media_id = $edit->media_id;
    $title = $edit->title;
    $publish_date = $edit->publish_date;
    $view_article_link = $edit->view_article_link;
    $view_product_link = $edit->view_product_link;
    $media_status = $edit->media_status;
    $banner = $edit->photo;
    $validation = '';
    $edit = site_url() . "/admin/home/update_media";
} else {
    $media_id = "";
    $title = "";
    $publish_date = "";
    $view_article_link = "";
    $view_product_link = "";
    $media_status = "";
    $banner = "";
    $validation = 'required';
    $edit = site_url() . "/admin/home/add_media";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Media</h3>

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
                            <input required="" type="hidden" id="form-field-1" name="media_id" value="<?php echo $media_id ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="banner" value="<?php echo $banner ?>"/>
                            <input required="" type="hidden" id="form-field-1" name="view_article_link" value="<?php echo $view_article_link ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Article link</label>

                        <div class="col-sm-9">
                            <input required="" type="text" id="form-field-1" name="view_article_link" value="<?php echo $view_article_link ?>" placeholder="" class="col-xs-10 col-sm-5" />

                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product link</label>

                        <div class="col-sm-9">

                            <input required="" type="url" data-parsley-type='url' id="form-field-1" name="view_product_link" value="<?php echo $view_product_link ?>" placeholder="" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="media_status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $media_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $media_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Name</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Designation</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Text</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Photo</th>
                                <th class="hidden-480">Add/Update</th>
                                <th class="hidden-480">Status</th>
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
                                        <td><?php echo substr($row->view_article_link, 0, 90) ?></td>
                                        <td><img height="200" width="200" src="<?php echo base_url() ?>uploads/media/<?php echo $row->photo ?>"></td>
                                        <td> <?php echo $row->view_product_link ?></td>
                                        <td><?php echo $row->media_status ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/media/<?php echo base64_encode($row->media_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_media/<?php echo base64_encode($row->media_id); ?>/<?php echo base64_encode($row->photo); ?>">
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