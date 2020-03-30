
	
	<div class="container">
		
		<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="career_box1_sub"></div>
			<h1 style="text-align:center;" class="service_box1_text1 animate_bottom">our reach</h1>	
		</div>
		
		<div class="mission_box2 grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				
				<div class="mission_info_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<p class="box2_text2 animate_bottom"><?php echo $our_reach->top_text ?></p>
				</div>
				
				<div class="our_reach_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<div class="mission_vision_sub grid-100 mobile-grid-100 tablet-grid-100">
						<div class="mission_sub grid-60 mobile-grid-100 tablet-grid-50"><img src="<?php echo base_url() ?>uploads/common/<?php echo $our_reach->city_photo ?>" class="wdh" alt="" /></div>
						<div class="reach_sub posr grid-40 mobile-grid-100 tablet-grid-50">
							<h1 class="reach_text animate_left"><?php echo $our_reach->number_of_city ?></h1>
							<p class="skin_text1 animate_right">Cities Cheryl’s has reached</p>
						</div>
					</div>
					<div class="mission_vision_sub grid-100 mobile-grid-100 tablet-grid-100">
						<div class="mission_sub float_right grid-60 mobile-grid-100 tablet-grid-50"><img src="<?php echo base_url() ?>uploads/common/<?php echo $our_reach->beauticians_photo ?>" class="wdh" alt="" /></div>
						<div class="reach_sub posr grid-40 mobile-grid-100 tablet-grid-50">
							<h1 style="text-align:right;" class="reach_text animate_right"><?php echo $our_reach->number_of_beauticians ?></h1>
							<p style="text-align:right;" class="skin_text1 animate_left">Number of Beauticians trained</p>
						</div>
					</div>
					<div class="mission_vision_sub grid-100 mobile-grid-100 tablet-grid-100">
						<div class="mission_sub grid-60 mobile-grid-100 tablet-grid-50"><img src="<?php echo base_url() ?>uploads/common/<?php echo $our_reach->consumers_photo ?>" class="wdh" alt="" /></div>
						<div class="reach_sub posr grid-40 mobile-grid-100 tablet-grid-50">
							<h1 class="reach_text animate_left"><?php echo $our_reach->number_of_consumers ?></h1>
							<p class="skin_text1 animate_right">Number of Consumers touched</p>
						</div>
					</div>
				</div>
				
				<div class="reach_text_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
					<p class="box2_text2 animate_bottom"><?php echo $our_reach->btext ?> </p>
                                        <div class="gj animate_bottom"><a class="slider_a bb_pd" href="<?php echo $this->config->item('flagship_link')  ?>">VISIT OUR FLAGSHIP STORE</a></div>
				</div>
				
			</div>	
		</div>
		
	</div>
	
	