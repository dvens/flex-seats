<section class="calendar js--calendar">

	<div class="calendar__month-picker">
		
		<!-- If the month is equal to Januari -->
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
		
		<h1>
			<?php echo formatDate('F Y', $year, $month, $day, false); ?>		
		</h1>
		
		<!-- If the month is equal to December -->
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

	<ol class="calendar__dates">
		
		<!-- Echo each day of the current month -->
		<?php forEach($dates as $key => $date) {  ?>

			<li <?php echo ($date['disabled'] ? 'disabled' : ''); ?>  class="js--calendar-item calendar__date calendar__date--<?php echo $date['status']; ?> <?php echo (matchDay($date['date'], $fullDate) ? 'is--active' : ''); ?>">

				<a class="<?php echo (isCurrentDay($date['date']) ? 'is--today' : '');?>" href="<?php echo '?page=home&month='. $month . '&year='. $year . '&day='. $date['day-full'] ?>">
				
					<div class="calendar__date-holder">
						<h2>
							<?php echo $key ?>
							<span><?php echo $date['day'] ?></span>
						</h2>
					</div>

					<!-- If the day is equal to sun or saturday display the weekend text-->
					<?php if($date['disabled']) { ?>
						
						<p>Weekend</p>

					<?php } else { ?>

						<?php if( $date['status'] === 'out') { ?>
							
							<p>Working at home</p>

						<?php } ?>

						<?php if( $date['status'] === 'away') { ?>
							
							<p>Not available</p>

						<?php } ?>

						<?php if( $date['status'] === 'office') { ?>
							
							<p>Working at the office</p>

						<?php } ?>

						<div class="calendar__desk-holder">
							
							<?php if($amountDesks - $date['employees'] >= 1 ) { ?>
							
								<svg class="calendar__icon" width="18" height="24" viewBox="0 0 49 65" xmlns="http://www.w3.org/2000/svg"><g fill="#CECECE" fill-rule="evenodd"><path d="M11.014 34.24c3.496-.843 8.531-1.353 13.485-1.353 4.88 0 9.84.496 13.33 1.318l2.457-25.457C40.684 4.318 37.215.5 32.8.5H16.164c-4.408 0-7.87 3.798-7.492 8.214l2.342 25.525zM34.718 58.23c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-.781-.257-1.495-.695-2.072-.925-1.57-2.801-2.908-5.501-3.92-2.086-.782-4.576-1.318-7.235-1.576v-6.102h-7.188v6.102c-2.66.258-5.15.794-7.236 1.576-2.983 1.114-4.96 2.636-5.764 4.423a3.408 3.408 0 0 0-.377 1.57c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-1.114-.527-2.1-1.343-2.724a14.638 14.638 0 0 1 1.626-.72c2.39-.897 5.393-1.434 8.579-1.55v4.654a3.419 3.419 0 0 0-2.052 3.146c0 1.889 1.525 3.424 3.402 3.424 1.876 0 3.401-1.535 3.401-3.424a3.433 3.433 0 0 0-2.052-3.146v-4.647c3.16.123 6.136.66 8.498 1.55.6.224 1.16.475 1.653.733a3.41 3.41 0 0 0-1.322 2.704z"/><path d="M45.327 38.513v-7.888l-3.995-.014s.128 4.974-2.889 5.857c-1.95-.557-4.623-.992-7.56-1.257a72.535 72.535 0 0 0-6.384-.286c-2.153 0-4.333.102-6.385.286-2.936.265-5.609.7-7.559 1.257-2.774-.958-2.909-5.911-2.909-5.911H3.738v7.956c0 2.215 1.789 4.015 3.989 4.015h33.604c2.208 0 3.996-1.8 3.996-4.015zM1.72 28.933c.04 0 .081.007.122.007H8.28c0-.143-.007-.285-.02-.421-.21-2.297-2.134-4.097-4.469-4.097a4.465 4.465 0 0 0-3.3 1.454c-1.046 1.134-.27 2.962 1.228 3.057zM47.352 28.92c1.431-.177 2.133-1.944 1.114-3.05a4.465 4.465 0 0 0-3.3-1.455c-2.356 0-4.286 1.828-4.475 4.151a6.601 6.601 0 0 0-.014.367h6.439c.081 0 .155-.007.236-.013z"/></g></svg>
								<span><?php echo $amountDesks - $date['employees']; ?></span>

							<?php } elseif($amountDesks - $date['employees'] < 1 ) { ?>

								<svg class="calendar__icon" width="18" height="24" viewBox="0 0 49 65" xmlns="http://www.w3.org/2000/svg"><g fill="#CECECE" fill-rule="evenodd"><path d="M11.014 34.24c3.496-.843 8.531-1.353 13.485-1.353 4.88 0 9.84.496 13.33 1.318l2.457-25.457C40.684 4.318 37.215.5 32.8.5H16.164c-4.408 0-7.87 3.798-7.492 8.214l2.342 25.525zM34.718 58.23c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-.781-.257-1.495-.695-2.072-.925-1.57-2.801-2.908-5.501-3.92-2.086-.782-4.576-1.318-7.235-1.576v-6.102h-7.188v6.102c-2.66.258-5.15.794-7.236 1.576-2.983 1.114-4.96 2.636-5.764 4.423a3.408 3.408 0 0 0-.377 1.57c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-1.114-.527-2.1-1.343-2.724a14.638 14.638 0 0 1 1.626-.72c2.39-.897 5.393-1.434 8.579-1.55v4.654a3.419 3.419 0 0 0-2.052 3.146c0 1.889 1.525 3.424 3.402 3.424 1.876 0 3.401-1.535 3.401-3.424a3.433 3.433 0 0 0-2.052-3.146v-4.647c3.16.123 6.136.66 8.498 1.55.6.224 1.16.475 1.653.733a3.41 3.41 0 0 0-1.322 2.704z"/><path d="M45.327 38.513v-7.888l-3.995-.014s.128 4.974-2.889 5.857c-1.95-.557-4.623-.992-7.56-1.257a72.535 72.535 0 0 0-6.384-.286c-2.153 0-4.333.102-6.385.286-2.936.265-5.609.7-7.559 1.257-2.774-.958-2.909-5.911-2.909-5.911H3.738v7.956c0 2.215 1.789 4.015 3.989 4.015h33.604c2.208 0 3.996-1.8 3.996-4.015zM1.72 28.933c.04 0 .081.007.122.007H8.28c0-.143-.007-.285-.02-.421-.21-2.297-2.134-4.097-4.469-4.097a4.465 4.465 0 0 0-3.3 1.454c-1.046 1.134-.27 2.962 1.228 3.057zM47.352 28.92c1.431-.177 2.133-1.944 1.114-3.05a4.465 4.465 0 0 0-3.3-1.455c-2.356 0-4.286 1.828-4.475 4.151a6.601 6.601 0 0 0-.014.367h6.439c.081 0 .155-.007.236-.013z"/></g></svg>
								<span class="not--available"><?php echo $amountDesks - $date['employees']; ?></span>

							<?php } ?>

						</div>

					<?php } ?>
					
				</a>

				<?php if(!$date['disabled']) { ?>
					
					<section class="calendar__content">
						
						<!-- IF there are not desks available -->
						<?php if($amountDesks - $date['employees'] >= 1 ) { ?>
							
							<h3 class="calendar__box-title">desks <span>available</span></h3>
							<svg class="calendar__icon" width="32" height="42" viewBox="0 0 49 65" xmlns="http://www.w3.org/2000/svg"><g fill="#D4D4D4" fill-rule="evenodd"><path d="M11.014 34.24c3.496-.843 8.531-1.353 13.485-1.353 4.88 0 9.84.496 13.33 1.318l2.457-25.457C40.684 4.318 37.215.5 32.8.5H16.164c-4.408 0-7.87 3.798-7.492 8.214l2.342 25.525zM34.718 58.23c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-.781-.257-1.495-.695-2.072-.925-1.57-2.801-2.908-5.501-3.92-2.086-.782-4.576-1.318-7.235-1.576v-6.102h-7.188v6.102c-2.66.258-5.15.794-7.236 1.576-2.983 1.114-4.96 2.636-5.764 4.423a3.408 3.408 0 0 0-.377 1.57c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-1.114-.527-2.1-1.343-2.724a14.638 14.638 0 0 1 1.626-.72c2.39-.897 5.393-1.434 8.579-1.55v4.654a3.419 3.419 0 0 0-2.052 3.146c0 1.889 1.525 3.424 3.402 3.424 1.876 0 3.401-1.535 3.401-3.424a3.433 3.433 0 0 0-2.052-3.146v-4.647c3.16.123 6.136.66 8.498 1.55.6.224 1.16.475 1.653.733a3.41 3.41 0 0 0-1.322 2.704z"/><path d="M45.327 38.513v-7.888l-3.995-.014s.128 4.974-2.889 5.857c-1.95-.557-4.623-.992-7.56-1.257a72.535 72.535 0 0 0-6.384-.286c-2.153 0-4.333.102-6.385.286-2.936.265-5.609.7-7.559 1.257-2.774-.958-2.909-5.911-2.909-5.911H3.738v7.956c0 2.215 1.789 4.015 3.989 4.015h33.604c2.208 0 3.996-1.8 3.996-4.015zM1.72 28.933c.04 0 .081.007.122.007H8.28c0-.143-.007-.285-.02-.421-.21-2.297-2.134-4.097-4.469-4.097a4.465 4.465 0 0 0-3.3 1.454c-1.046 1.134-.27 2.962 1.228 3.057zM47.352 28.92c1.431-.177 2.133-1.944 1.114-3.05a4.465 4.465 0 0 0-3.3-1.455c-2.356 0-4.286 1.828-4.475 4.151a6.601 6.601 0 0 0-.014.367h6.439c.081 0 .155-.007.236-.013z"/></g></svg>
							<p class="calendar__amount"><?php echo $amountDesks - $date['employees']; ?></p>

						<?php } else { ?>

							<!-- IF there are desks available -->
							<h3 class="calendar__box-title">no desks <span>available</span></h3>
							<svg class="calendar__icon" width="32" height="42" viewBox="0 0 49 65" xmlns="http://www.w3.org/2000/svg"><g fill="#D4D4D4" fill-rule="evenodd"><path d="M11.014 34.24c3.496-.843 8.531-1.353 13.485-1.353 4.88 0 9.84.496 13.33 1.318l2.457-25.457C40.684 4.318 37.215.5 32.8.5H16.164c-4.408 0-7.87 3.798-7.492 8.214l2.342 25.525zM34.718 58.23c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-.781-.257-1.495-.695-2.072-.925-1.57-2.801-2.908-5.501-3.92-2.086-.782-4.576-1.318-7.235-1.576v-6.102h-7.188v6.102c-2.66.258-5.15.794-7.236 1.576-2.983 1.114-4.96 2.636-5.764 4.423a3.408 3.408 0 0 0-.377 1.57c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-1.114-.527-2.1-1.343-2.724a14.638 14.638 0 0 1 1.626-.72c2.39-.897 5.393-1.434 8.579-1.55v4.654a3.419 3.419 0 0 0-2.052 3.146c0 1.889 1.525 3.424 3.402 3.424 1.876 0 3.401-1.535 3.401-3.424a3.433 3.433 0 0 0-2.052-3.146v-4.647c3.16.123 6.136.66 8.498 1.55.6.224 1.16.475 1.653.733a3.41 3.41 0 0 0-1.322 2.704z"/><path d="M45.327 38.513v-7.888l-3.995-.014s.128 4.974-2.889 5.857c-1.95-.557-4.623-.992-7.56-1.257a72.535 72.535 0 0 0-6.384-.286c-2.153 0-4.333.102-6.385.286-2.936.265-5.609.7-7.559 1.257-2.774-.958-2.909-5.911-2.909-5.911H3.738v7.956c0 2.215 1.789 4.015 3.989 4.015h33.604c2.208 0 3.996-1.8 3.996-4.015zM1.72 28.933c.04 0 .081.007.122.007H8.28c0-.143-.007-.285-.02-.421-.21-2.297-2.134-4.097-4.469-4.097a4.465 4.465 0 0 0-3.3 1.454c-1.046 1.134-.27 2.962 1.228 3.057zM47.352 28.92c1.431-.177 2.133-1.944 1.114-3.05a4.465 4.465 0 0 0-3.3-1.455c-2.356 0-4.286 1.828-4.475 4.151a6.601 6.601 0 0 0-.014.367h6.439c.081 0 .155-.007.236-.013z"/></g></svg>
							<p class="calendar__amount not--available"><?php echo $amountDesks - $date['employees']; ?></p>

						<?php } ?>

						<form action="?page=<?php echo $page; ?>" method="post">

							<input name="date" type="hidden" value="<?php echo $date['date']; ?>">

							<?php if( $date['status'] === 'office') { ?>
								
								<button name="action" value="yes" type="submit" class="button--highlighted">
									<svg class="icon-succes" width="17" height="14" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg"><path d="M15.387 1.109a.673.673 0 0 0-.943 0L6.595 8.863 2.553 4.842a.67.67 0 0 0-.942 0L.194 6.24a.656.656 0 0 0 0 .933l5.926 5.894c.259.255.681.255.943 0l9.74-9.626a.654.654 0 0 0 0-.936l-1.416-1.396z" fill="#31A5E0" fill-rule="evenodd"/></svg>
									<div>i'm working from home</div>
								</button>	

							<?php } else { ?>
								
								<button name="action" value="no" type="submit" class="button--highlighted">
									<svg class="icon-succes" width="17" height="14" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg"><path d="M15.387 1.109a.673.673 0 0 0-.943 0L6.595 8.863 2.553 4.842a.67.67 0 0 0-.942 0L.194 6.24a.656.656 0 0 0 0 .933l5.926 5.894c.259.255.681.255.943 0l9.74-9.626a.654.654 0 0 0 0-.936l-1.416-1.396z" fill="#31A5E0" fill-rule="evenodd"/></svg>
									<div>i'm working at the office</div>
								</button>	

							<?php } ?>

						</form>
				
					</section>

				<?php } ?>

			</li>
		
		<?php } ?>
	</ol>

</section>