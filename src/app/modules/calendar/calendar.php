<!-- Include list if module type is list -->
<?php if ($moduleType === 'list') include('calendar-list.php'); ?>

<!-- Include editable calendar if module type is full -->
<?php if ($moduleType === 'full') include('calendar-full.php'); ?>