	<div class="container">

		<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="career_box1_sub"></div>
			<h1 style="text-align:center;" class="service_box1_text1 animate_bottom">Experts Speak</h1>
		</div>


		<div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				<div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
					<div class="pad0 speaker_inner_box grid-45 mobile-grid-100 tablet-grid-50">
						<img src="<?php echo base_url() ?>uploads/experts_speak/<?php echo $experts_speak->photo ?>" class="wdh" alt="" />
                                                <a class="expert_back" href="<?php echo site_url('experts-speaker'); ?>"><i class="fa expert_back_i fa-angle-left" aria-hidden="true"></i> BACK</a>
					</div>
					<div class="speaker_inner_box1 grid-50 prefix-5 mobile-grid-100 tablet-grid-50">
						<div class=" animate_left"><h1 class="better_text1 speaker_txt1"><?php echo $experts_speak->experts_name ?></h1></div>
						<p style="width:100%;" class="service_box1_text2 animate_right"><?php echo $experts_speak->experts_designation ?></p>
						<p style="width:100%; font-size:12px;" class="service_box1_text2 animate_right"><?php echo $experts_speak->experts_since ?></p> <br />
						<p style="width:100%;" class="service_box1_text2 animate_left"><?php echo $experts_speak->experts_text ?></p>
					</div>


					<div class="speaker_inner_box2 grid-100 tablet-grid-100 mobile-grid-100">
						<?php

							foreach ($experts_speak_qa as $row) {

						?>

						<div class="ssp pad0 grid-100 tablet-grid-100 mobile-grid-100">
							<h1 class="service_box1_text2 si1 animate_left"><?php echo $row->experts_qusertions ?></h1>
							<p class="service_box1_text2 si2 animate_right"><?php echo $row->experts_answers ?></p>
						</div>

						<?php

							}
						?>

					</div>
				</div>
			</div>
		</div>


	</div>
