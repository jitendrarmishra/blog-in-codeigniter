<?php
if ($edit != "") {
    $business_support_id = $edit->business_support_id;
    $flagship_stores_text = $edit->flagship_stores_text;
    $flagship_stores_sub_text = $edit->flagship_stores_sub_text;
    $business_development_text = $edit->business_development_text;
    $business_development_sub_text = $edit->business_development_sub_text;
    $Professionalising_salon_text = $edit->Professionalising_salon_text;
    $status = $edit->business_support_status;
    $meta_title = $edit->meta_title;
    $meta_description = $edit->meta_description;
    $meta_keyword = $edit->meta_keyword;
    $validation = '';
    $edit = site_url() . "/admin/home/update_business_support";
} else {
    $business_support_id = "";
    $flagship_stores_text = "";
    $flagship_stores_sub_text = "";
    $business_development_text = "";
    $business_development_sub_text = "";
    $Professionalising_salon_text = "";
    $status = "";
    $meta_title = "";
    $meta_description = "";
    $meta_keyword = "";

    $validation = 'required';
    $edit = site_url() . "/admin/home/add_business_support";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update Business Support</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                if($show_form == 0)
                {
                ?>
                <form enctype="multipart/form-data" id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Flagship stores text </label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="flagship_stores_text"><?php echo $flagship_stores_text ?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Flagship stores sub text </label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="flagship_stores_sub_text"><?php echo $flagship_stores_sub_text ?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Business Development Text</label>
                        <div class="col-sm-9">
                            <textarea required="" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="business_development_text"><?php echo $business_development_text ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Business Development Sub Text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="business_development_sub_text"><?php echo $business_development_sub_text ?></textarea>
                            <input required="" type="hidden" id="form-field-1" name="business_support_id" value="<?php echo $business_support_id ?>"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Professionalising salon_text</label>

                        <div class="col-sm-9">
                            <textarea required="" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="Professionalising_salon_text"><?php echo $Professionalising_salon_text ?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Title</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_title"><?php echo $meta_title ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Description</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_description"><?php echo $meta_description ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Meta Keyword</label>

                        <div class="col-sm-9">
                            <textarea id="hghjhg" style="height: 100px; width: 600px" class=" col-xs-10 col-sm-5" name="meta_keyword"><?php echo $meta_keyword ?></textarea>
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

                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Flagship stores text</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Flagship stores sub text</th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table" >Business Development Text</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Business Development Sub Text</th>
                                <th class="hidden-480">Professionalising salon_text</th>
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
                                        <td><?php echo substr($row->flagship_stores_text, 0, 50) ?></td>
                                        <td><?php echo substr($row->flagship_stores_sub_text, 0, 50) ?></td>
                                        <td><?php echo substr($row->business_development_text, 0, 50) ?></td>
                                        <td><?php echo substr($row->business_development_sub_text, 0, 50) ?></td>
                                        <td><?php echo substr($row->Professionalising_salon_text, 0, 50) ?></td>
                                        <td><?php echo ucfirst($row->business_support_status) ?></td>
                                        
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/business_support/<?php echo base64_encode($row->business_support_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_business_support/<?php echo base64_encode($row->business_support_id); ?>">
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
                                            $(function () {
                                                $(".datepicker").datepicker();
                                            });
</script>