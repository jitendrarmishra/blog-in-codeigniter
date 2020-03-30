	
	<div class="container">
		
		<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="career_box1_sub"></div>
			<h1 style="text-align:center;" class="service_box1_text1 animate_bottom">BUSINESS SUPPORT</h1>	
		</div>
		
		
		<div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				<div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
					
					<div style="box-shadow:none;" class="pad0 support_slider_box speaker_inner_box grid-50 mobile-grid-100 tablet-grid-50">
						<div class="single-item1">
							<?php
							foreach ($top_slider as $row) { ?>
								
							<div class="posr">
								<img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $row->business_support_photos ?>" class="wdh" alt="" />
							</div>

						<?php } ?>
							<!-- <div class="posr">
								<img src="<?php// echo $this->config->item('assets'); ?>fassets/images/support_img1.png" class="wdh" alt="" />
							</div> -->
						</div>
					</div>
					
					<div class="speaker_inner_box1 grid-45 prefix-5 mobile-grid-100 tablet-grid-50">
						<h1 class="box4_text1 animate_left">Flagship Stores</h1> <br /> 
						<p style="font-style:inherit;" class="sbt_text"><?php echo $flagship_details->flagship_stores_text ?></p>
					</div>
					
					<br /> <br />
					
					<div class="support_box1 career_box2 grid-100 mobile-grid-100 tablet-grid-100">
						<p class="service_box1_text2 oily_txt animate_top"><?php echo $flagship_details->flagship_stores_sub_text ?></p> <br /> <br />
						<div class="grid-40 prefix-30"><a class="slider_a bb_pd" style="float:none;" href="<?php echo site_url('flagship-store'); ?>">VIEW OUR FLAGSHIP STORES</a></div>
					</div>
					
					<div style="border:none;" class="int_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
						<h1 class="box2_text1 animate_bottom">Business Development</h1> <br /> <br />
						<p class="service_box1_text2 oily_txt animate_top"><?php echo $flagship_details->business_development_text ?></p> <br /> <br />
						<?php
						$i =1;
						foreach ($advantage as $row) { ?>
							
						<div class="grid-30 mobile-grid-100 tablet-grid-50">
							<img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $row->business_support_photos ?>" class="benefit_img bi animate_top" alt="" />
							<p class="skin_text1 animate_bottom" style="text-align:center;"><?php echo $row->business_support_photos_title ?></p>
							<p class="skin_text1 animate_bottom" style="text-align:center;"><?php echo $row->business_support_photos_text ?></p>
						</div>

						<?php
						$i++;
						}
						?>
						<!-- <div class="grid-30 prefix-5 mobile-grid-100 tablet-grid-50">
							<img src="<?php// echo $this->config->item('assets'); ?>fassets/images/intro_icon2.png" class="benefit_img bi animate_top" alt="" />
							<p class="skin_text1 animate_bottom" style="text-align:center;">ADVANTAGE 02</p>
							<p class="skin_text1 animate_bottom" style="text-align:center;">Advantages of being partner with cheryls will be listed in this section</p>
						</div>
						<div class="grid-30 prefix-5 mobile-grid-100 tablet-grid-50">
							<img src="<?php// echo $this->config->item('assets'); ?>fassets/images/intro_icon3.png" class="benefit_img bi animate_top" alt="" />
							<p class="skin_text1 animate_bottom" style="text-align:center;">ADVANTAGE 03</p>
							<p class="skin_text1 animate_bottom" style="text-align:center;">Advantages of being partner with cheryls will be listed in this section</p>
						</div> -->
					</div>
					
					<div class="benefit_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">

						<?php 
						foreach ($promotions as $row) { ?>
						
						<div class="ib grid-50 mobile-grid-100 tablet-grid-50">
							<div style="border:1px solid #e4e4e5;" class="wdh">
								<img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $row->business_support_photos ?>" class="wdh animate_top" alt="" />
								<h1 class="skin_span animate_bottom btext"><?php echo $row->business_support_photos_title ?></h1>
								<p class="skin_text1 animate_bottom" style="text-align:center;"><?php echo $row->business_support_photos_text ?></p>
							</div>	
						</div>

					<?php } ?>


					<!-- 	<div class="ib grid-50 mobile-grid-100 tablet-grid-50">
							<div style="border:1px solid #e4e4e5;" class="wdh">
								<img src="<?php// echo $this->config->item('assets'); ?>fassets/images/it2.jpg" class="wdh animate_top" alt="" />
								<h1 class="skin_span animate_bottom btext">SAMPLING</h1>
								<p class="skin_text1 animate_bottom" style="text-align:center;">Sampling home care 5 ml samples for key products like DermaLite Facewash Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
							</div>	
						</div> -->
						<div style="padding-top:3%;" class="grid-100 mobile-grid-100 tablet-grid-100">
							<p style="font-style:inherit; text-align:center;" class="sbt_text"><?php echo $flagship_details->business_development_sub_text ?></p>
						</div>	
					</div>
					

					<?php
					foreach ($insta_wow as $row) { ?>
						
					<div class="insta_wow_box grid-100 mobile-grid-100 tablet-grid-100">
						<div class="grid-60 mobile-grid-100 tablet-grid-50">
							<img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $row->business_support_photos ?>" class="wdh" alt="" />
						</div>
						<div class="grid-40 mobile-grid-100 tablet-grid-50">
							<div class="wow_sub grid-100 mobile-grid-100 tablet-grid-100">
								<h1 style="text-align:left;" class="skin_span animate_left btext"><?php echo $row->business_support_photos_title ?></h1>
								<p class="skin_text1 animate_bottom"><?php echo $row->business_support_photos_text ?></p>
								<a class="slider_a bb_pd" href="<?php echo site_url('innovative-treatments'); ?>">VIEW OUR TREATMENT</a>
							</div>
						</div>
					</div>

				<?php } ?>
					
					<div class="benefit_box support_box2 homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
						<div style="padding-top:3%;" class="grid-100 mobile-grid-100 tablet-grid-100">
							<p style="font-style:inherit; text-align:center; margin-bottom:2%;" class="sbt_text">Professionalising salon space with multiple offerings</p>
							<p class="service_box1_text2 oily_txt animate_top"><?php echo $flagship_details->Professionalising_salon_text ?></p> <br /> <br />
							<div class="responsive1">

								<?php 
								foreach ($bootom_slider as $row) {  ?>
									
								<div class="posr">
									<div style="border:1px solid #e4e4e5;" class="other_service_sub shadow_box">
										<img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $row->business_support_photos ?>" class="wdh" alt="" />
										<h1 class="skin_span btext"><?php echo $row->business_support_photos_title ?></h1>
										<p class="skin_text1" style="text-align:center;"><?php echo $row->business_support_photos_text ?></p>
									</div>
								</div>

							<?php } ?>
								<!-- <div class="posr">
									<div style="border:1px solid #e4e4e5;" class="other_service_sub shadow_box">
										<img src="<?php// echo $this->config->item('assets'); ?>fassets/images/it2.jpg" class="wdh" alt="" />
										<h1 class="skin_span btext">TREATMENT ROOM</h1>
										<p class="skin_text1" style="text-align:center;">Basis the business challenge Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia, quis nostrud exercitation</p>
									</div>
								</div>
								<div class="posr">
									<div style="border:1px solid #e4e4e5;" class="other_service_sub shadow_box">
										<img src="<?php// echo $this->config->item('assets'); ?>fassets/images/it3.jpg" class="wdh" alt="" />
										<h1 class="skin_span btext">SERVICE DELIVERY TOOLS</h1>
										<p class="skin_text1" style="text-align:center;">Basis the business challenge Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia, quis nostrud exercitation</p>
									</div>
								</div>
								<div class="posr">
									<div style="border:1px solid #e4e4e5;" class="other_service_sub shadow_box">
										<img src="<?php //echo $this->config->item('assets'); ?>fassets/images/it1.jpg" class="wdh" alt="" />
										<h1 class="skin_span btext">RECEPTION</h1>
										<p class="skin_text1" style="text-align:center;">Basis the business challenge Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia, quis nostrud exercitation</p>
									</div>
								</div> -->
							</div>
						</div>	
					</div>
					
				</div>	
			</div>	
		</div>
	
	</div>
	
	