
	
	<div class="container">
	
		<div data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url() ?>uploads/homecare/<?php echo $product->banner_image ?>) no-repeat;height:100vh;background-size:cover;" class="homecare_inner_box1 posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="bullet_box animate_left hide-on-mobile hide-on-tablet">
				<a class="bullet_text" href="javascript:void(0);">Home</a> > <span class="bullet_text"><?php echo $product->green_text ?></span>
			</div>
			<div class="skin_box parallax">
				<span class="skin_span animate_left"><?php echo $product->green_text ?></span>
				<h1 class="skin_h1 animate_right"><?php echo $product->black_text ?></h1>
				<p class="skin_text1 animate_left"><?php echo $product->short_text ?></p>
				<!-- <p class="skin_text1 animate_right">Ut enim ad minim veniam, quis nostrud ut enim ad minim veniam, quis nostrud</p> -->
				<p class="skt  animate_bottom">Rs. <?php echo $product->homecare_product_cost ?></p>
			</div>
		</div>
		
		<div class="homecare_inner_box2 grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				
				<div class="benefit_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<h1 class="box2_text1 animate_bottom">Benefits</h1> <br /> <br />

					<?php
						foreach ($benefits as $row) {
					?>
						<div class=" grid-30 mobile-grid-100 tablet-grid-50 homecare_push_left">
							<img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->benefits_photos ?>"  class="benefit_img animate_top" alt="" />
							<h1 class="skin_span animate_bottom btext"><?php echo $row->benefits_title ?></h1>
							<p class="skin_text1 animate_bottom" style="text-align:center;"><?php echo $row->benefits_text ?>.</p>
						</div>

					<?php
						}
					?>


					
				</div>
				
				<div class="better_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<h1 class="box2_text1 animate_bottom">Naturally Better Ingredients</h1> <br /> <br />

					<?php 
					foreach ($ingredients_photo as $row) {
						?>
					
					<div class="better_sub posr grid-25 mobile-grid-100 tablet-grid-50">
						<div class="b_s pad0 grid-100 mobile-grid-100 tablet-grid-100"><img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->ingredients_photos ?>" class="better_img" alt="" /></div>
						<div class="better_text_box grid-100 mobile-grid-100 tablet-grid-100">
							<h1 class="better_text1 animate_bottom btext"><?php echo $row->ingredients_photos_title ?></h1>
							<div class="line"></div>
							<p class="better_text2"><?php echo $row->ingredients_photos_text ?></p>
						</div>	
					</div>

					<?php
						}
					?>

					<div class="grid-100 mobile-grid-100 tablet-grid-100">
						<div class="ing_list_box grid-100 mobile-grid-100 tablet-grid-100">
							<a class="list_a" href="javascript:void(0);"><span class="list_span">Show</span> Complete Ingredients List <i class="fa list_arrow fa-angle-down" aria-hidden="true"></i></a>
							<div class="list_main hide pad0 grid-100 mobile-grid-100 tablet-grid-100">

								<?php
								foreach ($ingredients_list as $row) 
								{
									?>
								
								<div class="ing_list_sub grid-33 mobile-grid-100 tablet-grid-100">
									<h1 class="better_text1 btext"><?php echo $row->title ?></h1>
									<div class="line1"></div>
									<p class="better_text2 btext1"><?php echo $row->text ?></p>
								</div>

								<?php 
							}
							?>
								
							</div>
						</div>
					</div>
				</div> <br />
				
				<div class="happy_customer_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<h1 class="box2_text1 animate_bottom">Happy Customers</h1> <br /> <br />
					<div class="slider_box1 pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
						<div class="single-item1">

							<?php 
							foreach ($customer as $row) 
							{
								?>

							<div class="">
								<div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
									<div class="pad0 grid-50 mobile-grid-100 tablet-grid-50">
										<img src="<?php echo base_url() ?>uploads/customer/<?php echo $row->photo ?>" class="wdh" alt="" />
									</div>
									<div class="sbt grid-50 mobile-grid-100 tablet-grid-50">
										<p class="sbt_text"><?php echo $row->text ?></p>
										<p class="sbt_text1"><?php echo $row->name ?></p>
										<p class="sbt_text2"><?php echo $row->designation ?></p>
										<div class="wdh"><a class="slider_a bb_pd" href="<?php echo $row->link ?>">VIEW PRODUCT</a></div>
									</div>
								</div>
							</div>

							<?php

						}

						?>
							
						</div>
					</div>
				</div> <br />
				
				<div class="indulge_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<h1 class="box2_text1 animate_bottom">Indulge Yourself In A Healthy Habit</h1> <br /> <br />
					<div class="indulge_info_box posr grid-100 mobile-grid-100 tablet-grid-100">
						<div class="indulge_tab_box grid-80 mobile-grid-100 tablet-grid-80">
							<?php
								$i = 1;
								foreach ($steps as $row) {
							?>

								<a class="indulge_tab_a indulge_tab_a_active" href="javascript:void(0);"> <?php echo "Step" . $i ?> : <?php echo $row->step_title ?> <span class="indulge_tab_span "></span></a>

							<?php
								$i++;
								}
							?>
							
						</div>
						<?php
							$i = 1;
							foreach ($steps as $row) {
						?>
						<div class="pad0 grid-100 mobile-grid-100 tablet-grid-100 benefit-steps" >
							<div class="indulge_img_box grid-20 mobile-grid-100 tablet-grid-20"><img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->image ?>" class="wdh" alt="" /></div>
							<div class="indulge_text_box grid-60 mobile-grid-100 tablet-grid-80">
								<h1 class="better_text1 btext"><?php echo $row->step_heading ?></h1>
								<p class="better_text2 btext1"><?php echo $row->text ?>.</p>
								<div class="wdh">
									<a class="slider_a" href="<?php echo $row->product_link ?>">VIEW PRODUCTS</a>
								</div>
							</div>
						</div>
							

						<?php
							$i++;
							}
						?>
					</div>
				</div> <br />
				
				<div class="frequently_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<h1 class="box2_text1 animate_bottom">Frequently Asked Questions</h1> <br /> <br />
					<div class="frequently_box grid-100 mobile-grid-100 tablet-grid-100">
						<ol class="frequent_ol">
							<?php
							$i = 1;
							foreach ($faq as $row) {
						?>

							<li class="frequent_li">
								<a class="frequent_a" href="javascript:void(0);"><span class="frequent_span"><?php echo $row->faq_q ?></span> <i class="fa frequent_i fa-angle-down" aria-hidden="true"></i></a>
								<p class="frequent_text hide"><?php echo $row->faq_ans ?></p>
							</li>

							<?php
							$i++;
							}
						?>

						</ol>
					</div>
				</div>
				
			</div>
		</div>
		
		<div id="navbar" class="locator_box grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container pad0">
				<div class="grid-40 mobile-grid-100 tablet-grid-100"><p class="locator_text">Lorem ipsum dolor sit amet consectetur</p></div>
				<div class="grid-60 mobile-grid-100 tablet-grid-100">
					<div class="wdh">
						<a class="service_a" href="<?php echo $this->config->item('flagship_link')  ?>">visit our flagship store</a>
<a class="service_a" href="<?php echo $this->config->item('salon_link')  ?>">FIND A SALON</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>

