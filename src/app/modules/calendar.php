<section class="calendar">
	
	<div class="calendar__month-picker">
		
		<a class="calendar__button calendar__button-prev" href="#">
			<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
		</a>
		
		<p>May 2016</p>

		<a class="calendar__button calendar__button-next" href="#">
			<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill="#FFF" fill-rule="evenodd"/></svg>
		</a>

	</div>
	
	<div class="calendar__dates">
			
		<ul>
			<?php for($i = 0; $i < 7; $i++ ) { ?>	
				
				<li class="calendar__date">
					
					<a href="#">
					
						<i class="calendar__indicator"></i>
					
						<time>
							<?php echo date('d', strtotime('+' . $i . 'day')); ?>
							<span><?php echo date("M"); ?></span>
						</time>
					
					</a>

				</li>

			<?php } ?>
		</ul>

	</div>

	<section class="calendar__container grid__container">
		
		<h2 class="calendar__title">
			<span>status:</span> working from the office
		</h2>

		<div class="grid__column grid__column--half">
			<p class="calendar__box-title">seats<span>available</span></p>
		</div>

		<div class="grid__column grid__column--half">
			<p class="calendar__box-title">employees<span>coming</span></p>
		</div>
		
	</section>

	<section class="grid__container">
		
	</section>

</section>