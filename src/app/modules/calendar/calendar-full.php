<section class="calendar calendar--full">

	<div class="calendar__month-picker">
		
		<?php if($month == '01') { ?>
			
			<a class="calendar__button calendar__button--prev" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . formatDate('y', $year, $month, $day, '-1 year') . '&day=' . $day; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button--prev" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . $year . '&day=01'; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } ?>
		
		<p>
			<?php echo formatDate('F Y', $year, $month, $day, false); ?>		
		</p>

		<?php if($month == '12') { ?>
			
			<a class="calendar__button calendar__button--next" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . formatDate('y', $year, $month, $day, '+1 year') . '&day=' . $day ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button--next" href="<?php echo '?page='. $page .'&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . $year . '&day=01'; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } ?>

	</div>

	<div class="calendar__legend">
		
		<ul>
			<li>at the office</li>
			<li>out of office</li>
			<li>away</li>
		</ul>
		
		<div class="calendar__legend-buttons">
			<a href="/" class="icon is--active"><svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M4.154 3.968h.243c.37 0 .67-.305.67-.68V.707c0-.376-.3-.68-.67-.68h-.243c-.37 0-.67.304-.67.68V3.287c0 .376.3.68.67.68zM12.737 3.95h.243c.37 0 .67-.304.67-.68V.692c0-.376-.3-.68-.67-.68h-.243c-.37 0-.67.304-.67.68v2.58c0 .375.3.68.67.68z"/><path d="M15.91 1.41h-1.717v2.039c0 .68-.544 1.055-1.213 1.055h-.243a1.225 1.225 0 0 1-1.213-1.233V1.41H5.61v1.877c0 .68-.544 1.234-1.213 1.234h-.243A1.225 1.225 0 0 1 2.94 3.287V1.41H1.088C.488 1.41 0 1.906 0 2.516v13.366c0 .61.488 1.106 1.088 1.106H15.91c.6 0 1.088-.496 1.088-1.106V2.516c0-.61-.488-1.106-1.088-1.106zm0 14.472H1.088V5.788H15.91v10.094z"/><path d="M9.06 9.174h1.954c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H9.061a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142zM12.249 9.174h1.953c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142h-1.953a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142zM2.685 11.99H4.64c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H2.685a.141.141 0 0 0-.14.142v1.72c0 .079.063.142.14.142zM5.873 11.99h1.953c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H5.873a.141.141 0 0 0-.14.142v1.72c0 .079.063.142.14.142zM9.06 11.99h1.954c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H9.061a.141.141 0 0 0-.14.142v1.72c0 .079.062.142.14.142zM12.249 11.99h1.953c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142h-1.953a.141.141 0 0 0-.14.142v1.72c0 .079.062.142.14.142zM4.639 12.8H2.685a.141.141 0 0 0-.14.143v1.72c0 .078.063.142.14.142H4.64c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142zM7.826 12.8H5.873a.141.141 0 0 0-.14.143v1.72c0 .078.063.142.14.142h1.953c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142zM11.014 12.8H9.061a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142h1.953c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142zM14.202 12.8h-1.953a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142h1.953c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142z"/></g></svg></a>
			<a href="/<?php echo '?page='. $page; ?>">today</a>		
		</div>

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