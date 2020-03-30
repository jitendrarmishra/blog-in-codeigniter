	
	<div class="container">

		<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="career_box1_sub"></div>
			<h1 style="text-align:center;" class="service_box1_text1 animate_bottom">Experts Speak</h1>	
		</div>
		
		
		<div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				<div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">

					<?php
$i = 1;
foreach ($experts_speak as $row) {

    ?>
					<div class="animate_bottom grid-33 mobile-grid-100 tablet-grid-50">
						<div class="pad0 speaker_box grid-100 mobile-grid-100 tablet-grid-100">
							<a href="<?php echo base_url() ?>experts-speaker/experts-speaker-inner/<?php echo base64_encode($row->experts_speak_id) ?>">
								<img src="<?php echo base_url() ?>uploads/experts_speak/<?php echo $row->photo ?>" class="wdh" alt="" />
								<div class="animate_left"><h1 class="better_text1 speaker_txt"><?php echo $row->experts_name ?> <i class="fa speaker_i fa-angle-right" aria-hidden="true"></i></h1></div>
							</a>	
						</div>
					</div>
					<?php
$i++;
}
?>
					<!-- <div class="animate_bottom grid-33 mobile-grid-100 tablet-grid-50">
						<div class="pad0 speaker_box grid-100 mobile-grid-100 tablet-grid-100">
							<a href="experts_speaker_inner.php">
								<img src="images/speaker_img1.jpg" class="wdh" alt="" />
								<div class="animate_left"><h1 class="better_text1 speaker_txt">Lorem Ipsum <i class="fa speaker_i fa-angle-right" aria-hidden="true"></i></h1></div>
							</a>	
						</div>
					</div>
					<div class="animate_bottom grid-33 mobile-grid-100 tablet-grid-50">
						<div class="pad0 speaker_box grid-100 mobile-grid-100 tablet-grid-100">
							<a href="experts_speaker_inner.php">
								<img src="images/speaker_img1.jpg" class="wdh" alt="" />
								<div class="animate_left"><h1 class="better_text1 speaker_txt">Lorem Ipsum <i class="fa speaker_i fa-angle-right" aria-hidden="true"></i></h1></div>
							</a>	
						</div>
					</div>
					<div class="animate_bottom grid-33 mobile-grid-100 tablet-grid-50">
						<div class="pad0 speaker_box grid-100 mobile-grid-100 tablet-grid-100">
							<a href="experts_speaker_inner.php">
								<img src="images/speaker_img1.jpg" class="wdh" alt="" />
								<div class="animate_left"><h1 class="better_text1 speaker_txt">Lorem Ipsum <i class="fa speaker_i fa-angle-right" aria-hidden="true"></i></h1></div>
							</a>	
						</div>
					</div> -->
				</div>	
			</div>	
		</div>
		
	</div>
	
	