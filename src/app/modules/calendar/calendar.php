<section class="calendar">
	
	<div class="calendar__month-picker">
		
		<?php if($month == '01') { ?>
			
			<a class="calendar__button calendar__button-prev" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . formatDate('y', $year, $month, $day, '-1 year'); ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button-prev" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . $year; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } ?>
		
		<p>
			<?php echo formatDate('F Y', $year, $month, $day, false); ?>		
		</p>

		<?php if($month == '12') { ?>
			
			<a class="calendar__button calendar__button-next" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . formatDate('y', $year, $month, $day, '+1 year'); ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button-next" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . $year; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } ?>

	</div>
      
	<div class="calendar__dates">

		<ul>
			<?php forEach($dates as $key => $date) {  ?>	
				
				<li class="calendar__date <?php echo ($date['status'] ? '' : 'calendar__date--away'); ?>">
					
					<a href="#">
					
						<i class="calendar__indicator"></i>
					
						<time>
							<?php echo $key ?>
							<span><?php echo $date['date'] ?></span>
						</time>
					
					</a>

				</li>

			<?php } ?>
		</ul>
		
	</div>
	
	<section class="calendar__content grid__container">
		
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