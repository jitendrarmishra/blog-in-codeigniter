<?php
//print_r($edit);
//die;
if ($edit != "") {
    $faqs_id = $edit->faqs_id;
    $faqs_category_id = $edit->faqs_category_id;
    $faqs_question = $edit->faqs_question;
    $faqs_answer = $edit->faqs_answer;
    $faqs_status = $edit->faqs_status;
    $edit = site_url() . "/admin/home/update_faqs";
} else {
    $faqs_id = "";
    $faqs_category_id = "";
    $faqs_question = "";
    $faqs_answer = "";
    $faqs_status = "";

    $edit = site_url() . "/admin/home/add_faqs";
}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add/Update FAQ'S</h3>

                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <form id="myform" data-parsley-validate="" class="form-horizontal" role="form" method="post" action="<?php echo $edit ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select FAQ Category </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="faqs_category_id" id="form-field-select-1">
                                <option value=""></option>
                                <?php
                                foreach ($faqs_category as $row) {
                                    ?>
                                    <option <?php echo $row->faqs_category_id == $faqs_category_id ? "selected" : "" ?> value="<?php echo $row->faqs_category_id ?>"><?php echo $row->faqs_category ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Question</label>

                        <div class="col-sm-9">
                            <textarea required style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="faqs_question"><?php echo $faqs_question ?></textarea>

                            <input required="" type="hidden" id="form-field-1" name="faqs_id" value="<?php echo $faqs_id ?>"/>
                            <!--<input required="" type="hidden" id="form-field-1" name="faqs_category_id" value="<?php // echo $faqs_category_id ?>"/>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Answer</label>

                        <div class="col-sm-9">
                            <textarea required style="height: 150px; width: 600px" class=" col-xs-10 col-sm-5" name="faqs_answer"><?php echo $faqs_answer ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

                        <div class="col-sm-3">
                            <select required="" class="form-control col-xs-10 col-sm-5" name="faqs_status" id="form-field-select-1">
                                <option value=""></option>
                                <option <?php echo $faqs_status == 'active' ? "selected" : "" ?> value="active">Active</option>
                                <option <?php echo $faqs_status == 'inactive' ? "selected" : "" ?> value="inactive">inactive</option>
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
                                <th>FAQ Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->faqs_category ?></td>
                                        <td>
                                            <?php echo $row->faqs_question ?>
                                        </td>
                                        <td>
                                            <?php echo $row->faqs_answer ?>
                                        </td>
                                        <td><?php echo ucfirst($row->faqs_status) ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo site_url(); ?>admin/home/faqs/<?php echo base64_encode($row->faqs_id); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure want to delete?')" class="red" href="<?php echo site_url(); ?>admin/home/delete_faqs/<?php echo base64_encode($row->faqs_id); ?>">
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




