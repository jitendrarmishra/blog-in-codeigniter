	
	<style type="text/css">
		/* isotope css */
		* { box-sizing: border-box; }
		
		/* force scrollbar, prevents initial gap */
		html {
		overflow-y: scroll; 
		}
		
		
		/* ---- grid ---- */
		
		
		/* clear fix */
		.grid:after {
		content: '';
		display: block;
		clear: both;
		}
		
		/* ---- .element-item ---- */
		
		/* 5 columns, percentage width */
		.grid-item,
		.grid-sizer {
		width: 30%;
		margin:1.5%;
		}
		
		.grid-item {
		float: left;
		}
		
		.grid-item--width2 { width: 40%; }
		.grid-item--height2 { height: 200px; }
		/* isotope css */
		
	</style>

	
	<div class="container">
		
		<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="career_box1_sub"></div>
			<h1 style="text-align:center;" class="service_box1_text1 nw_pro_fnt animate_bottom"><?php echo $center_name->center_name ?></h1>	
		</div>
		
		<div class="posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				
				<a class="training_back" href="<?php echo base_url() ?>our-training-centres"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
				
				<div class="grid-100 mobile-grid-100 tablet-grid-100">
					<div class="grid">
						<div class="grid-sizer"></div>
						<?php 
						foreach ($gallery as $row) { ?>
							
						<div class="grid-item">
							<a data-fancybox="gallery" href="<?php echo base_url() ?>uploads/tcenter/<?php echo $row->image ?>"><img src="<?php echo base_url() ?>uploads/tcenter/<?php echo $row->image ?>" class="wdh" alt="" /></a>
						</div>
					<?php } ?>
						
					</div>
				</div>
				
			</div>
		</div>
		
		
	</div>
