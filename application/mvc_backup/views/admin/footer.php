<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">Cherly's</span>
                Application 
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
                <a href="#">
                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                </a>
            </span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo $this->config->item('assets'); ?>assets/js/jquery-2.1.4.min.js"></script>
<script>

    $(document).ready(function () {

        $("input[name$='banner_type']").click(function () {
            var test = $(this).val();
            if (test == "img")
            {
                $("input#img").prop('required', true);
                $("input#video").prop('required', false);

            } else
            {
                $("input#video").prop('required', true);
                $("input#img").prop('required', false);

            }


            $("div.desc").hide();
            $("#Cars_" + test).show();
        });
    });
</script>
<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo $this->config->item('assets'); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/buttons.colVis.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/dataTables.select.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo $this->config->item('assets'); ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/ace.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/js/jitu.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>assets/ckeditor/ckeditor.js"></script>

<!-- inline scripts related to this page -->
<script>
    $(document).ready( function () {
    $('#dynamic-table').DataTable();
} );
    </script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
    $(document).ready(function () {

        $(".datepicker").datepicker();


    });

    function check(tablename, table_slug, slug_id, error)
    {
        // alert('22')

        var slug_val = $('#' + slug_id).val();

        var ur = '<?php echo base_url(); ?>admin/home/exits';
        $.ajax({
            type: 'post',
            url: ur,
            data: {tablename: tablename, table_slug: table_slug, slug_val: slug_val},
            success: function (data)
            {
                if (data != 0)
                {
                    $('#' + slug_id).val('');
                    // $('#' + slug_id).val();

                    $("#errmsg").fadeIn();
                    $('#errmsg').html(error + ' already exists');
                    $('#errmsg').delay(5000).fadeOut('slow');
                }

            }

        })



    }

</script>




</body>
</html>
