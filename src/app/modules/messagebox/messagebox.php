<?php if( isset($_SESSION['formError']) || isset($_SESSION['formMessage']) || isset($_SESSION['formWarning']) ) { ?>
		
		<?php if(isset($_SESSION['formError'])) { ?>

			<div class="message-box message-box--error js--message-box is--active">

				<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path d="M25.6 4.386c-5.848-5.848-15.365-5.849-21.214 0-5.849 5.85-5.848 15.365 0 21.214 5.849 5.849 15.365 5.849 21.214 0 5.848-5.849 5.848-15.365 0-21.214zm-4.692 16.522c-.45.45-1.18.45-1.631 0l-4.284-4.283-4.487 4.487a1.154 1.154 0 1 1-1.632-1.632l4.488-4.487-4.284-4.284a1.154 1.154 0 1 1 1.631-1.631l4.284 4.284 4.08-4.08a1.154 1.154 0 1 1 1.631 1.632l-4.08 4.08 4.284 4.283c.45.45.45 1.18 0 1.631z" fill="#FFF" fill-rule="evenodd"/></svg>

				<p><strong>Error :</strong> <?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

				<button class="message-box__button">
					<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M5.847 9.034L.335 3.522 3.451.407l5.512 5.511L14.512.37l3.119 3.12-5.55 5.548 5.512 5.512-3.115 3.116-5.512-5.512-5.478 5.478L.37 14.51z" fill-rule="evenodd"/></svg>
				</button>

			</div> 

		<?php } ?>

		<?php if(isset($_SESSION['formMessage'])) { ?>

			<div class="message-box js--message-box is--active">

				<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path d="M15 0C6.73 0 0 6.729 0 15s6.73 15 15 15 15-6.729 15-15S23.27 0 15 0zm8.363 9.998l-9.231 10.384a1.152 1.152 0 0 1-1.584.135L6.778 15.9A1.154 1.154 0 0 1 8.222 14.1l4.913 3.93 8.503-9.566a1.153 1.153 0 1 1 1.726 1.535z" fill="#FFF" fill-rule="evenodd"/></svg>

				<p><strong>Success :</strong> <?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

				<button class="message-box__button">
					<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M5.847 9.034L.335 3.522 3.451.407l5.512 5.511L14.512.37l3.119 3.12-5.55 5.548 5.512 5.512-3.115 3.116-5.512-5.512-5.478 5.478L.37 14.51z" fill-rule="evenodd"/></svg>
				</button>

			</div>

		<?php } ?>

		<?php if(isset($_SESSION['formWarning'])) { ?>

			<div class="message-box message-box--warning js--message-box is--active">

				<svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg"><path d="M29.7 23.56L16.684 1.006c-.755-1.307-2.645-1.307-3.4 0L.266 23.559c-.754 1.307.19 2.945 1.7 2.945h26.037c1.509 0 2.454-1.638 1.699-2.945zM15.003 7.951c.834 0 1.509.693 1.484 1.527l-.245 8.565a1.247 1.247 0 0 1-2.49 0l-.24-8.565A1.493 1.493 0 0 1 15 7.952zm-.019 15.49a1.547 1.547 0 0 1-1.546-1.545c0-.853.693-1.547 1.546-1.547a1.547 1.547 0 0 1 0 3.092z" fill="#FFF" fill-rule="evenodd"/></svg>

				<p><strong>Warning :</strong> <?php echo $_SESSION['formWarning']; unset($_SESSION['formWarning']);?></p>

				<button class="message-box__button">
					<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M5.847 9.034L.335 3.522 3.451.407l5.512 5.511L14.512.37l3.119 3.12-5.55 5.548 5.512 5.512-3.115 3.116-5.512-5.512-5.478 5.478L.37 14.51z" fill-rule="evenodd"/></svg>
				</button>

			</div>

		<?php } ?>

	</div>

<?php } ?>