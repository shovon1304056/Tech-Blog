jQuery(document).ready(function($)
	{

		$('.post-grid-meta-box .select2, #post_grid_post_settings .select2').select2({
			width: '360px',
			allowClear: true
		});



		$(document).on('change', '#post_grid_metabox .select-layout-content', function()
			{
				var layout = $(this).val();		
			
				
				jQuery.ajax(
					{
				type: 'POST',
				url: post_grid_ajax.post_grid_ajaxurl,
				data: {"action": "post_grid_layout_content_ajax","layout":layout},
				success: function(data)
						{	
							//jQuery(".layout-content").html(data);
							jQuery("#post_grid_metabox .layer-content").html(data);
						}
					});
				
			})	


	});	







