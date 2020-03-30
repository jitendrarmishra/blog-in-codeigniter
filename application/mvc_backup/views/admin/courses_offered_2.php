	<style type="text/css">
		* { box-sizing:border-box; }

		body {
			/* font-family: Helvetica;
			background: #eee; */
		-webkit-font-smoothing: antialiased;
		}
		
		.group { 
			position: relative; 
			/* margin-bottom: 45px;  */
		}
		
		input,select,textarea {
			font-family: 'designio_mediumregular';
			font-size:1.3em;
			padding: 15px 10px 15px 10px;
			-webkit-appearance: none;
			display: block;
			background: transparent;
			color:#000;
			width: 100%;
			border: none;
			border-radius: 0;
			border: 1px solid #dbdbdb;
			outline:none;
		}
		
		select{
			cursor:pointer;
		}
		
		textarea{
			resize:none;
		}
		
		
		input:focus { outline: none; }
		
		
		/* Label */
		
		label {
			color: #000; 
			font-size: 1.3em;
			font-family: 'designio_mediumregular';
			font-weight: normal;
			position: absolute;
			pointer-events: none;
			left: 10px;
			top: 12px;
			transition: all 0.2s ease;
		}
		
		
		
		/* active */
		
		input:focus ~ label, input.used ~ label {
			top: -20px;
		/* transform: scale(.75); left: -2px; */
		transform: scale(.85); left: -2px;
			/* font-size: 14px; */
			color: rgba(0,0,0,0.50);
		}
		
		select:focus ~ label, select.used ~ label {
			top: -20px;
		/* transform: scale(.75); left: -2px; */
		transform: scale(.85); left: -2px;
			/* font-size: 14px; */
			color: rgba(0,0,0,0.50);
		}
		
		textarea:focus ~ label, textarea.used ~ label {
			top: -20px;
		/* transform: scale(.75); left: -2px; */
		transform: scale(.85); left: -2px;
			/* font-size: 14px; */
			color: rgba(0,0,0,0.50);
		}
		
		
		/* Underline */
		
		.bar {
			position: relative;
			display: block;
			width: 100%;
		}
		
		.bar:before, .bar:after {
			content: '';
			height: 2px; 
			width: 0;
			bottom: 0px; 
			position: absolute;
			background: rgba(0,0,0,0.50); 
			transition: all 0.2s ease;
		}
		
		.bar:before { left: 50%; }
		
		.bar:after { right: 50%; }
		
		
		/* active */
		
		input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }
		
		
		/* Highlight */
		
		.highlight {
			font-family: 'designio_mediumregular';
			color:#000;
			position: absolute;
			height: 60%; 
			width: 100px; 
			top: 25%; 
			left: 0;
			pointer-events: none;
			opacity: 0.5;
		}
		
		
		/* active */
		
		input:focus ~ .highlight {
			animation: inputHighlighter 0.3s ease;
		}
		
		.inpt{
			width:100%;
		}
	</style>

	<div class="container">

		<div data-stellar-background-ratio="0.5" class="courses_offered_box1 posr grid-100 mobile-grid-100 tablet-grid-100">
			<div class="bullet_box animate_left hide-on-mobile hide-on-tablet">
				<a class="bullet_text" href="javascript:void(0);">Home</a> > <span class="bullet_text">Treatments</span>
			</div>
			<div class="service_box1_sub1 parallax">
				<h1 class="service_box1_text1 animate_left courses_offerd_text1 cot">Transformation from being a Beautician to</h1>
				<h1 class="service_box1_text1 animate_left courses_offerd_text1">A Skincare Professional</h1>
				<p class="service_box1_text2 courses_offerd_text2 animate_bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				<p class="service_box1_text2 courses_offerd_text2 animate_bottom">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>	
			</div>
			<span id="point1" class="blank1"></span>
			<img src="<?php echo $this->config->item('assets'); ?>fassets/images/mouse.png" class="mouse" alt="" />
		</div>


		<div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
			<div class="grid-container">
				<div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
				
					<div class="homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
						<h1 class="courses_offered_header animate_top">Journey from a beautician to a skin care professional</h1>
						<p class="skin_text1 animate_bottom" style="text-align:center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					
					<div class="courses_offered_tab grid-100 mobile-grid-100 tablet-grid-100">
						<div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
							<div class="courses_box grid-33 mobile-grid-33 tablet-grid-33"><p class="courses_offerd_text3 courses_box_click1 courses_offered_text3_active">01</p></div>
							<div class="courses_box grid-33 mobile-grid-33 tablet-grid-33"><p class="courses_offerd_text3 courses_box_click2">02</p></div>
							<div class="courses_box grid-33 mobile-grid-33 tablet-grid-33"><p class="courses_offerd_text3 courses_box_click3">03</p></div>
							<div class="courses_line_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
								<div class="courses_line_box_sub"><div class="courses_triangle_box courses_triangle_box_active"></div></div>
							</div>
						</div>
						<div class="courses_info_box cib1 pad0 grid-100 mobile-grid-100 tablet-grid-100">
							<img src="<?php echo $this->config->item('assets'); ?>fassets/images/courses_img.jpg" class="wdh" alt="" />
							<div class="pad0 grid-70 mobile-grid-100 tablet-grid-70">
								<h1 class="courses_offerd_text4">Introduction To Cheryl’s</h1>
								<p class="courses_offerd_text5">This course takes you through the basics of skin, analysis of four skin types and two conditions, complete knowledge of all Facials, Bleach and home care according to skin types and condition. After this you will able to do facials on all skin types with confidence. </p>
							</div>
							<div class="courses_apply_box grid-20 prefix-5 mobile-grid-100 tablet-grid-20 tablet-prefix-5">
								<h1 class="skin_span btext2" style="font-weight:bold;">Duration : 1 day  </h1>
								<h1 class="skin_span btext2">&#x20B9; 10,000</h1>
								<div style="margin:25px 0 15px 0;" class="wdh"><a class="courses_apply_a" href="javascript:void(0);">APPLY NOW</a></div>
							</div>
							<div class="grid-100 mobile-grid-100 tablet-grid-100">
								<ul class="courses_ul">
									<li class="courses_li">Skin types</li>
									<li class="courses_li">OxyDerm and OxyDerm Gold Bleach</li>
									<li class="courses_li">TanClear tan removal facial</li>
									<li class="courses_li">Skin conditions</li>
									<li class="courses_li">GloVite fairness facial</li>
									<li class="courses_li">HeelPeel Treatment</li>
									<li class="courses_li">Skin analysis</li>
								</ul>
							</div>
						</div>
						<div class="courses_info_box cib2 hide pad0 grid-100 mobile-grid-100 tablet-grid-100">
							<img src="<?php echo $this->config->item('assets'); ?>fassets/images/courses_img.jpg" class="wdh" alt="" />
							<div class="pad0 grid-70 mobile-grid-100 tablet-grid-70">
								<h1 class="courses_offerd_text4">Introduction To Cheryl’s</h1>
								<p class="courses_offerd_text5">This course takes you through the basics of skin, analysis of four skin types and two conditions, complete knowledge of all Facials, Bleach and home care according to skin types and condition. After this you will able to do facials on all skin types with confidence. </p>
							</div>
							<div class="courses_apply_box grid-20 prefix-5 mobile-grid-100 tablet-grid-20 tablet-prefix-5">
								<h1 class="skin_span btext2" style="font-weight:bold;">Duration : 2 day  </h1>
								<h1 class="skin_span btext2">&#x20B9; 20,000</h1>
								<div style="margin:25px 0 15px 0;" class="wdh"><a class="courses_apply_a" href="javascript:void(0);">APPLY NOW</a></div>
							</div>
							<div class="grid-100 mobile-grid-100 tablet-grid-100">
								<ul class="courses_ul">
									<li class="courses_li">Skin types</li>
									<li class="courses_li">OxyDerm and OxyDerm Gold Bleach</li>
									<li class="courses_li">TanClear tan removal facial</li>
									<li class="courses_li">Skin conditions</li>
									<li class="courses_li">GloVite fairness facial</li>
									<li class="courses_li">HeelPeel Treatment</li>
									<li class="courses_li">Skin analysis</li>
								</ul>
							</div>
						</div>
						<div class="courses_info_box cib3 hide pad0 grid-100 mobile-grid-100 tablet-grid-100">
							<img src="<?php echo $this->config->item('assets'); ?>fassets/images/courses_img.jpg" class="wdh" alt="" />
							<div class="pad0 grid-70 mobile-grid-100 tablet-grid-70">
								<h1 class="courses_offerd_text4">Introduction To Cheryl’s</h1>
								<p class="courses_offerd_text5">This course takes you through the basics of skin, analysis of four skin types and two conditions, complete knowledge of all Facials, Bleach and home care according to skin types and condition. After this you will able to do facials on all skin types with confidence. </p>
							</div>
							<div class="courses_apply_box grid-20 prefix-5 mobile-grid-100 tablet-grid-20 tablet-prefix-5">
								<h1 class="skin_span btext2" style="font-weight:bold;">Duration : 3 day  </h1>
								<h1 class="skin_span btext2">&#x20B9; 30,000</h1>
								<div style="margin:25px 0 15px 0;" class="wdh"><a class="courses_apply_a" href="javascript:void(0);">APPLY NOW</a></div>
							</div>
							<div class="grid-100 mobile-grid-100 tablet-grid-100">
								<ul class="courses_ul">
									<li class="courses_li">Skin types</li>
									<li class="courses_li">OxyDerm and OxyDerm Gold Bleach</li>
									<li class="courses_li">TanClear tan removal facial</li>
									<li class="courses_li">Skin conditions</li>
									<li class="courses_li">GloVite fairness facial</li>
									<li class="courses_li">HeelPeel Treatment</li>
									<li class="courses_li">Skin analysis</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div style="margin-top:5%;" class="career_form_sub career_form1 grid-100 mobile-grid-100 tablet-grid-100">
						<div class="cfs grid-100 mobile-grid-100 tablet-grid-100">
							<h1 class="box2_text1 animate_bottom">Interested In A Course</h1> <br /> <br />
							<div class="grid-80 prefix-10 mobile-grid-100 tablet-grid-50">
								<p class="skin_text1 animate_bottom" style="text-align:center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
									<div class="cfb animate_bottom grid-50 mobile-grid-100 tablet-grid-50">
										<div class="group">
											<input type="text" name="name" ><span class="highlight"></span><span class="bar"></span>
											<label>Name*</label>
										</div>
									</div>
									<div class="cfb animate_bottom grid-50 mobile-grid-100 tablet-grid-50">
										<div class="group">
											<input type="email" name="email" ><span class="highlight"></span><span class="bar"></span>
											<label>E-mail Id*</label>
										</div>
									</div>
									<div class="cfb animate_bottom grid-50 mobile-grid-100 tablet-grid-50">
										<div class="group">
											<input type="text" name="number" ><span class="highlight"></span><span class="bar"></span>
											<label>Phone Number*</label>
										</div>
									</div>
									<div class="cfb animate_bottom posr grid-50 mobile-grid-100 tablet-grid-50">
										<img src="<?php echo $this->config->item('assets'); ?>fassets/images/down_arrow.png" class="down_arow" alt="" />
										<div class="group">
											<select>
												<option value="0"></option>
												<option value="1">level 2</option>
												<option value="2">Level 3</option>
											</select><span class="highlight"></span><span class="bar"></span>
											<label>Level 1</label>
										</div>
									</div>
									<div class="cfb animate_bottom posr grid-50 mobile-grid-100 tablet-grid-50">
										<img src="<?php echo $this->config->item('assets'); ?>fassets/images/down_arrow.png" class="down_arow" alt="" />
										<div class="group">
											<select>
												<option value="0"></option>
												<option value="1">Maharashtra</option>
												<option value="2">Gujarat</option>
											</select><span class="highlight"></span><span class="bar"></span>
											<label>Select State</label>
										</div>
									</div>
									<div class="cfb animate_bottom posr grid-50 mobile-grid-100 tablet-grid-50">
										<img src="<?php echo $this->config->item('assets'); ?>fassets/images/down_arrow.png" class="down_arow" alt="" />
										<div class="group">
											<select>
												<option value="0"></option>
												<option value="1">Mumbai</option>
												<option value="2">Pune</option>
											</select><span class="highlight"></span><span class="bar"></span>
											<label>Select City</label>
										</div>
									</div>
									<div class="cfb animate_bottom posr grid-100 mobile-grid-100 tablet-grid-100">
										<input type="submit" class="career_submit" value="SUBMIT">
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>	
			</div>	
		</div>


	</div>
