<section class="calendar calendar--full">

	<div class="calendar__month-picker">
		
		<?php if($month == '01') { ?>
			
			<a class="calendar__button calendar__button--prev" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . formatDate('y', $year, $month, $day, '-1 year') . '&day=' . $day; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill-rule="evenodd"/></svg>
				<span><?php echo formatDate('M', $year, $month, $day, '-1 month') ?></span>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button--prev" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . $year . '&day=01'; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill-rule="evenodd"/></svg>
				<span><?php echo formatDate('M', $year, $month, $day, '-1 month') ?></span>
			</a>

		<?php } ?>
		
		<p>
			<?php echo formatDate('F Y', $year, $month, $day, false); ?>		
		</p>

		<?php if($month == '12') { ?>
			
			<a class="calendar__button calendar__button--next" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . formatDate('y', $year, $month, $day, '+1 year') . '&day=' . $day ?>">
				<span><?php echo formatDate('M', $year, $month, $day, '+1 month') ?></span>
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button--next" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . $year . '&day=01'; ?>">
				<span><?php echo formatDate('M', $year, $month, $day, '+1 month') ?></span>
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill-rule="evenodd"/></svg>
			</a>

		<?php } ?>

	</div>
    
    <form action="?page=<?php echo $page; ?>" method="post">
		<div class="calendar__dates">

			<ul>
				<?php forEach($dates as $key => $date) {  ?>
					
					<?php if($date['status'] === 'out') { ?>
						
						<li <?php echo ($date['disabled'] ? 'disabled' : ''); ?>  class="calendar__date calendar__date--out">

							<input name="dates[]" id="<?php echo $key ?>" type="checkbox" value="<?php echo $date['date']; ?>"> 

							<label for="<?php echo $key ?>" class="<?php echo (isCurrentDay($date['date']) ? 'is--today' : '');?>">
							
								<time>
									<?php echo $key ?>
									<span><?php echo $date['day'] ?></span>
								</time>
							
							</label>

						</li>

					<?php } ?>

					<?php if($date['status'] === 'office') { ?>
						
						<li <?php echo ($date['disabled'] ? 'disabled' : ''); ?>  class="calendar__date">

							<input name="dates[]" id="<?php echo $key ?>" type="checkbox" value="<?php echo $date['date']; ?>"> 

							<label for="<?php echo $key ?>" class="<?php echo (isCurrentDay($date['date']) ? 'is--today' : '');?>">
							
								<time>
									<?php echo $key ?>
									<span><?php echo $date['day'] ?></span>
								</time>
							
							</label>

						</li>

					<?php } ?>
					
					<?php if($date['status'] === 'away') { ?>
						
						<li <?php echo ($date['disabled'] ? 'disabled' : ''); ?> class="calendar__date calendar__date--away">

							<input name="dates[]" id="<?php echo $key ?>" type="checkbox" value="<?php echo $date['date']; ?>"> 

							<label for="<?php echo $key ?>" class="<?php echo (isCurrentDay($date['date']) ? 'is--today' : '');?>">
							
								<time>
									<?php echo $key ?>
									<span><?php echo $date['day'] ?></span>
								</time>
							
							</label>

						</li>

					<?php } ?>

				<?php } ?>
			</ul>
			
		</div>

		<section class="grid__container">
			
			<h2 class="title title--secondary">Select your status</h2>
			
			<button name="away" type="submit" class="button--highlighted">away</button>
			<button name="out" type="submit" class="button--highlighted">out of office</button>	
			<button name="office" type="submit" class="button--highlighted button--pushed">at the office</button>
			
		</section>

	</form>

</section>