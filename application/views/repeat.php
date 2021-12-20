<?php
$count = 0; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form class="repeater">
    <!--
        The value given to the data-repeater-list attribute will be used as the
        base of rewritten name attributes.  In this example, the first
        data-repeater-item's name attribute would become group-a[0][text-input],
        and the second data-repeater-item would become group-a[1][text-input]
    -->
    <div data-repeater-list="linedata">
      <div data-repeater-item>
       <input type="hidden" name="linedata[<?= $count; ?>][id]" id="r"/>
       <input type="text" name="description" />
       <input type="text" name="cat-slug" />
       <input data-repeater-delete type="button" value="Delete"/>
      </div>
    </div>
    <input data-repeater-create type="button" value="Add"/>

   
</form>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="<?= site_url()?>assets/js/repeat.js"></script>

	<script>
	$(document).ready(function () {
			'use strict';
	window.id = 0;

	$('.repeater').repeater(
	{
		defaultValues: {
			'linedata[<?= $count; ?>][id]': window.id,
				
				},
		show: function () {
					$(this).slideDown();
		console.log($(this).find('input')[1]);
		$('#r').val(window.id);
				},
				hide: function (deleteElement) {
					if(confirm('Are you sure you want to delete this element?')) {
					window.id--;
						$('#r').val(window.id);
					$(this).slideUp(deleteElement);
					console.log($('.repeater').repeaterVal());
					}
				},
				ready: function (setIndexes) {
				

				}
	}
	);

			
		});
	</script>
</body>
</html>