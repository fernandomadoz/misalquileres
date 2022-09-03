	// Shuffle
	// -------------------------------------------------------------

	$(window).on('load', function() {
		/** this is come when complete page is fully loaded, including all frames, objects and images **/

		if ($('#gridWrapper').length > 0) {
		 
			/* initialize shuffle plugin */
			var $grid = $('#gridWrapper');

			$grid.shuffle({
				itemSelector: '.portfolio-wrapper' // the selector for the items in the grid
			});

			/* reshuffle when user clicks a filter item */
			$('#filter a').on('click', function (e) {
				e.preventDefault();

				// set active class
				$('#filter a').removeClass('active');
				$(this).addClass('active');

				// get group name from clicked item
				var groupName = $(this).attr('data-group');

				// reshuffle grid
				$grid.shuffle('shuffle', groupName );
			});
		}
		
	});