<!-- Normal calendar -->
<section class="calendar js--calendar">

	<div class="calendar__month-picker">
		
		<?php if($month == '01') { ?>
			
			<a class="calendar__button calendar__button--prev" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . formatDate('y', $year, $month, $day, '-1 year') . '&day=' . $day; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button--prev" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '-1 month') . '&year=' . $year . '&day=01'; ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.087 16l1.879-1.867L3.792 8l6.174-6.133L8.086 0 .035 8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } ?>
		
		<p>
			<?php echo formatDate('F Y', $year, $month, $day, false); ?>		
		</p>

		<?php if($month == '12') { ?>
			
			<a class="calendar__button calendar__button--next" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . formatDate('y', $year, $month, $day, '+1 year') . '&day=' . $day ?>">
				<svg width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.913 0L.034 1.867 6.208 8 .034 14.133 1.914 16l8.052-8z" fill="#FFF" fill-rule="evenodd"/></svg>
			</a>

		<?php } else { ?>

			<a class="calendar__button calendar__button--next" href="<?php echo '?page=home&month=' . formatDate('m', $year, $month, $day, '+1 month') . '&year=' . $year . '&day=01'; ?>">
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
			<a href="/?page=calendar" class="icon"><svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M4.154 3.968h.243c.37 0 .67-.305.67-.68V.707c0-.376-.3-.68-.67-.68h-.243c-.37 0-.67.304-.67.68V3.287c0 .376.3.68.67.68zM12.737 3.95h.243c.37 0 .67-.304.67-.68V.692c0-.376-.3-.68-.67-.68h-.243c-.37 0-.67.304-.67.68v2.58c0 .375.3.68.67.68z"/><path d="M15.91 1.41h-1.717v2.039c0 .68-.544 1.055-1.213 1.055h-.243a1.225 1.225 0 0 1-1.213-1.233V1.41H5.61v1.877c0 .68-.544 1.234-1.213 1.234h-.243A1.225 1.225 0 0 1 2.94 3.287V1.41H1.088C.488 1.41 0 1.906 0 2.516v13.366c0 .61.488 1.106 1.088 1.106H15.91c.6 0 1.088-.496 1.088-1.106V2.516c0-.61-.488-1.106-1.088-1.106zm0 14.472H1.088V5.788H15.91v10.094z"/><path d="M9.06 9.174h1.954c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H9.061a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142zM12.249 9.174h1.953c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142h-1.953a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142zM2.685 11.99H4.64c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H2.685a.141.141 0 0 0-.14.142v1.72c0 .079.063.142.14.142zM5.873 11.99h1.953c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H5.873a.141.141 0 0 0-.14.142v1.72c0 .079.063.142.14.142zM9.06 11.99h1.954c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142H9.061a.141.141 0 0 0-.14.142v1.72c0 .079.062.142.14.142zM12.249 11.99h1.953c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142h-1.953a.141.141 0 0 0-.14.142v1.72c0 .079.062.142.14.142zM4.639 12.8H2.685a.141.141 0 0 0-.14.143v1.72c0 .078.063.142.14.142H4.64c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142zM7.826 12.8H5.873a.141.141 0 0 0-.14.143v1.72c0 .078.063.142.14.142h1.953c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142zM11.014 12.8H9.061a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142h1.953c.078 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142zM14.202 12.8h-1.953a.141.141 0 0 0-.14.143v1.72c0 .078.062.142.14.142h1.953c.077 0 .14-.064.14-.143v-1.72a.141.141 0 0 0-.14-.142z"/></g></svg></a>
			<a href="/">today</a>		
		</div>

	</div>
      
	<div class="calendar__dates">

		<ul>
			<?php forEach($dates as $key => $date) {  ?>

				<li class="calendar__date <?php echo ($date['status'] ? '' : 'calendar__date--out'); ?> <?php echo (matchDay($date['date'], $fullDate) ? 'is--active' : ''); ?>">
					
					<a class="<?php echo (isCurrentDay($date['date']) ? 'is--today' : '');?>" href="<?php echo '?page=home&month='. $month . '&year='. $year . '&day='. $date['day-full'] ?>">
					
						<i class="calendar__indicator"></i>
					
						<time>
							<?php echo $key ?>
							<span><?php echo $date['day'] ?></span>
						</time>
					
					</a>

				</li>

			<?php } ?>
		</ul>
		
	</div>
	
	<section class="calendar__content grid__container">
		
		<?php if($pageData['status'] === 'home') { ?>
		
			<h2 class="title">
				<span class="is--active">status:</span> working out of the office
			</h2>

		<?php } else { ?>

			<h2 class="title">
				<span>status:</span> working at the office
			</h2>

		<?php } ?>

		<div class="grid__column grid__column--half">
			
			<h3 class="calendar__box-title">seats <span>available</span></h3>

			<div class="calendar__holder">
				<p class="calendar__amount">25</p>
				<svg class="calendar__icon" width="49" height="65" viewBox="0 0 49 65" xmlns="http://www.w3.org/2000/svg"><g fill="#31A5E0" fill-rule="evenodd"><path d="M11.014 34.24c3.496-.843 8.531-1.353 13.485-1.353 4.88 0 9.84.496 13.33 1.318l2.457-25.457C40.684 4.318 37.215.5 32.8.5H16.164c-4.408 0-7.87 3.798-7.492 8.214l2.342 25.525zM34.718 58.23c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-.781-.257-1.495-.695-2.072-.925-1.57-2.801-2.908-5.501-3.92-2.086-.782-4.576-1.318-7.235-1.576v-6.102h-7.188v6.102c-2.66.258-5.15.794-7.236 1.576-2.983 1.114-4.96 2.636-5.764 4.423a3.408 3.408 0 0 0-.377 1.57c0 1.888 1.525 3.423 3.401 3.423s3.402-1.535 3.402-3.424c0-1.114-.527-2.1-1.343-2.724a14.638 14.638 0 0 1 1.626-.72c2.39-.897 5.393-1.434 8.579-1.55v4.654a3.419 3.419 0 0 0-2.052 3.146c0 1.889 1.525 3.424 3.402 3.424 1.876 0 3.401-1.535 3.401-3.424a3.433 3.433 0 0 0-2.052-3.146v-4.647c3.16.123 6.136.66 8.498 1.55.6.224 1.16.475 1.653.733a3.41 3.41 0 0 0-1.322 2.704z"/><path d="M45.327 38.513v-7.888l-3.995-.014s.128 4.974-2.889 5.857c-1.95-.557-4.623-.992-7.56-1.257a72.535 72.535 0 0 0-6.384-.286c-2.153 0-4.333.102-6.385.286-2.936.265-5.609.7-7.559 1.257-2.774-.958-2.909-5.911-2.909-5.911H3.738v7.956c0 2.215 1.789 4.015 3.989 4.015h33.604c2.208 0 3.996-1.8 3.996-4.015zM1.72 28.933c.04 0 .081.007.122.007H8.28c0-.143-.007-.285-.02-.421-.21-2.297-2.134-4.097-4.469-4.097a4.465 4.465 0 0 0-3.3 1.454c-1.046 1.134-.27 2.962 1.228 3.057zM47.352 28.92c1.431-.177 2.133-1.944 1.114-3.05a4.465 4.465 0 0 0-3.3-1.455c-2.356 0-4.286 1.828-4.475 4.151a6.601 6.601 0 0 0-.014.367h6.439c.081 0 .155-.007.236-.013z"/></g></svg>
			</div>

		</div>

		<div class="grid__column grid__column--half">
			
			<h3 class="calendar__box-title">employees <span>coming</span></h3>
			
			<div class="calendar__holder">
				<p class="calendar__amount calendar__amount--left"><?php echo $amountEmployees; ?></p>
				<svg class="calendar__icon calendar__icon--right" width="61" height="48" viewBox="0 0 61 48" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M60.105 45.582h-12.38a4.735 4.735 0 0 0 .936-3.824L46.124 28.38a4.734 4.734 0 0 0-3.141-3.607l-6.47-2.166a.887.887 0 0 0-.343-.043v-1.727a7.562 7.562 0 0 0 1.91-5.05v-2.126a2.82 2.82 0 0 0 1.91-2.67V6.195C39.99 3.055 37.446.5 34.32.5h-7.64a2.812 2.812 0 0 0-2.685 1.999 3.78 3.78 0 0 0-2.985 3.696v4.796c0 1.24.8 2.293 1.91 2.67v1.845c0 1.981.724 3.812 1.91 5.21v1.848a.888.888 0 0 0-.343.044l-6.47 2.165a4.734 4.734 0 0 0-3.14 3.607l-2.538 13.378a4.735 4.735 0 0 0 .936 3.824H.895A.897.897 0 0 0 0 46.48c0 .497.4.9.895.9H60.105a.897.897 0 0 0 .895-.9c0-.497-.4-.9-.895-.9zM25.725 24.36a.897.897 0 0 0 .895-.9v-1.189a7.237 7.237 0 0 0 3.883 1.13 7.493 7.493 0 0 0 3.877-1.07v1.13c0 .496.4.899.895.899l.037-.002c-.233 2.218-2.302 3.958-4.812 3.958-2.51 0-4.579-1.74-4.812-3.958l.037.002zM22.8 10.99V6.195c0-1.09.884-1.978 1.97-1.978a.897.897 0 0 0 .895-.9c0-.561.456-1.019 1.015-1.019h7.64c2.14 0 3.88 1.748 3.88 3.897v4.796c0 .173-.044.336-.12.479v-1.438a2.815 2.815 0 0 0-2.805-2.818h-9.55a2.815 2.815 0 0 0-2.805 2.818v1.438a1.017 1.017 0 0 1-.12-.479zm1.91-.96c0-.561.456-1.018 1.015-1.018h9.55c.56 0 1.015.457 1.015 1.019v5.755a5.782 5.782 0 0 1-1.758 4.174 5.739 5.739 0 0 1-4.21 1.638c-3.095-.093-5.612-2.827-5.612-6.094v-5.473zm-5.67 35.55a.06.06 0 0 1-.06-.06V33.053a.06.06 0 0 1 .06-.06h22.92a.06.06 0 0 1 .06.06v12.47a.06.06 0 0 1-.06.06H19.04zm24.83 0h-.063l.003-.06V33.053c0-1.024-.83-1.858-1.85-1.858H19.04c-1.02 0-1.85.834-1.85 1.858v12.47l.003.06h-.222a2.91 2.91 0 0 1-2.253-1.065 2.937 2.937 0 0 1-.62-2.422l2.537-13.378a2.936 2.936 0 0 1 1.949-2.237l5.342-1.789c.399 3.052 3.194 5.424 6.574 5.424s6.175-2.372 6.575-5.424l5.341 1.788a2.936 2.936 0 0 1 1.949 2.238l2.537 13.378a2.938 2.938 0 0 1-.62 2.422 2.91 2.91 0 0 1-2.253 1.065h-.16z" fill="#31A5E0"/><path d="M30.5 36.949a2.815 2.815 0 0 0-2.805 2.818 2.815 2.815 0 0 0 2.805 2.817 2.815 2.815 0 0 0 2.805-2.817 2.815 2.815 0 0 0-2.805-2.818zm0 3.837c-.56 0-1.015-.457-1.015-1.02 0-.561.455-1.019 1.015-1.019.56 0 1.015.458 1.015 1.02s-.455 1.019-1.015 1.019z" fill="#2395CC"/></g></svg>
			</div>	

		</div>
		
	</section>

	<section class="grid__container">

		<?php if($pageData['status'] === 'home') { ?>
		
			<h2 class="title title--secondary">are you working at the office?</h2>
		
			<form action="?page=home" method="post">
				<input name="date" type="hidden" value="<?php echo $year .'-'. $month . '-' . $day ?>">
				<button name="action" value="no" type="submit" class="button--highlighted">yes</button>	
			</form>

		<?php } else { ?>

			<h2 class="title title--secondary">are you working from home?</h2>
		
			<form action="?page=home" method="post">
				<input name="date" type="hidden" value="<?php echo $year .'-'. $month . '-' . $day ?>">
				<button name="action" value="yes" type="submit" class="button--highlighted">yes</button>	
			</form>

		<?php } ?>
		
	</section>

</section>