<div class="blog-page">
    <div class="container-fluid">
        <div class="row row card-body">
            <div class="col-sm-12">

<div class="clear">
            <?php echo validation_errors(); ?>
            <p style="color:red">

            <?php
            if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
            }
            ?>
            </p>
           
        </div>
           
           <div class="clear">

                <form method="post" action="<?php echo site_url('login/check') ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email (jitendra.mishra@yahoo.com)</label>
                    <input type="email" required="" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password (123)</label>
                    <input type="password" required="" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <input type="hidden" name="redirect" value="<?php print_r($_SERVER['HTTP_REFERER']);
 ?>">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
</div>


        </div>



</div>
</div>
</div>
