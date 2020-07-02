<?php
/*
Template Name: Color Fix
*/
get_header(); 

$sites = get_sites();

echo '<script type="text/javascript">
var ajaxurl = "' . admin_url('admin-ajax.php') . '";
</script>';

?>
<script src='<?php echo get_template_directory_uri(); ?>/js/colorwheel.js'></script>
<?php
foreach($sites as $site) {
	switch_to_blog($site->blog_id);

	
	$current_theme = get_current_theme();

	// only on labs by sedoo them
	if($current_theme == 'Labs by Sedoo') {
		$main_color = get_theme_mod('labs_by_sedoo_color_code');
		if($main_color) { $main_color = substr($main_color, 1); }
		else { $main_color = 'ffffff';	}
		?>
		<script>
		
			// calculate colors from first one
			var scheme = new ColorScheme;
			scheme.from_hex(<?php echo json_encode($main_color) ?>)         
				.scheme('triade')   
				.variation('soft');
				// color list
			var colors = scheme.colors();

			// ordering the colors
			var color1 = colors[0];
			var color2 = colors[1];
			var color3 = colors[2];
			var color4 = colors[3];
			var color5 = colors[4];

			// Passing the colors to ajax for saving them
			jQuery.ajax({
				url: ajaxurl,
				type: "POST",
				data: {
				'action': 'save_theme_colors',
				'color1': color1,
				'color2': color2,
				'color3': color3,
				'color4': color4,
				'color5': color5,
				'siteid' : <?php echo json_encode($site->blog_id) ?>
				}
			}).done(function(response) {
				
			});
		</script>

	<?php 
	}
}

get_footer();