<?php // create custom plugin settings menu
add_action('admin_menu', 'baw_create_menu');

function baw_create_menu()
	{

	// create new top-level menu

	add_menu_page('Weather Plugin Settings', 'Weather Settings', 'manage_options', __FILE__, 'byw_settings_page', plugins_url('../images/icon.png', __FILE__));

	// call register settings function

	add_action('admin_init', 'register_mysettings');
	}

function register_mysettings()
	{

	// register our settings

	register_setting('byw-settings-group', 'byw_lang');
	register_setting('byw-settings-group', 'byw_name_city');
	register_setting('byw-settings-group', 'byw_woeid');
	register_setting('byw-settings-group', 'byw_image_set');
	register_setting('byw-settings-group', 'byw_unit');
	register_setting('byw-settings-group', 'byw_bgcolor');
	register_setting('byw-settings-group', 'byw_fontsize');
	register_setting('byw-settings-group', 'byw_mylang');
	register_setting('byw-settings-group', 'byw_smylang');
	register_setting('byw-settings-group', 'byw_rtlorltr');
	register_setting('byw-settings-group', 'byw_css');
	}

function byw_settings_page()
	{ ?>

        <div class="wrap" >
        <h2>Beautiful Yahoo Weather</h2>
        
        <?php echo get_option( 'plugin_error' );
	if (isset($_GET['settings-updated']))
		{ ?>
            <div id="message" class="updated">
                <p><strong><?php _e('Settings saved.') ?></strong></p>                        
            </div>
        <?php // Clear database cache weather_feed in shortcode.php
		set_transient('weather_feed', "", 0);
		} ?>
        
<form method="post" action="options.php">
	<?php settings_fields('byw-settings-group'); ?>
	<?php do_settings_sections('byw-settings-group'); ?>
	<table class="form-table">
	<tr valign="top">
		<th scope="row">
			Select Your Language
		</th>
		<td>
			<select name="byw_lang">
				<option value="<?php echo esc_attr(get_option('byw_lang')); ?>"><?php echo esc_attr(get_option('byw_lang')); ?>
				</option>
				<option value="your-description">your-description</option>
				<option value="persian">persian</option>
				<option value="english">english</option>
				<option value="arabic">arabic</option>
				<option value="bulgarian">bulgarian</option>
				<option value="catalan">catalan</option>
				<option value="chinese-simplified">chinese-simplified</option>
				<option value="chinese-traditional">chinese-traditional</option>
				<option value="danish">danish</option>
				<option value="dutch">dutch</option>
				<option value="estonian">estonian</option>
				<option value="finnish">finnish</option>
				<option value="german">german</option>
				<option value="french">french</option>
				<option value="greek">greek</option>
				<option value="haitian-creole">haitian-creole</option>
				<option value="hindi">hindi</option>
				<option value="indonesian">indonesian</option>
				<option value="italian">italian</option>
				<option value="japanese">japanese</option>
				<option value="korean">korean</option>
				<option value="latvian">latvian</option>
				<option value="maltese">maltese</option>
				<option value="romanian">romanian</option>
				<option value="russian">russian</option>
				<option value="spanish">spanish</option>
				<option value="swedish">swedish</option>
				<option value="turkish">turkish</option>
				<option value="ukrainian">ukrainian</option>
				<option value="vietnamese">vietnamese</option>
			</select>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Name Your City
		</th>
		<td>
			<input type="text" name="byw_name_city" value="<?php echo esc_attr(get_option('byw_name_city')); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
            City WOEID
		</th>
		<td>
			<input type="text" name="byw_woeid" value="<?php echo esc_attr(get_option('byw_woeid')); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Temperature Unit
		</th>
		<td>
			<select name="byw_unit">
				<option value="<?php echo esc_attr(get_option('byw_unit')); ?>"><?php echo esc_attr(get_option('byw_unit')); ?>
				</option>
				<option value="c">c</option>
				<option value="f">f</option>
			</select>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Select Weather Image
		</th>
		<td>
			<select name="byw_image_set">
				<option value="<?php echo esc_attr(get_option('byw_image_set')); ?>"><?php echo esc_attr(get_option('byw_image_set')); ?>
				</option>
				<option value="colorful">colorful</option>
				<option value="dark">dark</option>
				<option value="flat_black">flat_black</option>
				<option value="flat_colorful">flat_colorful</option>
				<option value="flat_white">flat_white</option>
				<option value="light">light</option>
			</select>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Rgba Background Color
		</th>
		<td>
			<input type="text" name="byw_bgcolor" value="<?php echo esc_attr(get_option('byw_bgcolor')); ?>" /><input type="color">
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Select RTL or LTR
		</th>
		<td>
			<select name="byw_rtlorltr">
				<option value="<?php echo esc_attr(get_option('byw_rtlorltr')); ?>"><?php echo esc_attr(get_option('byw_rtlorltr')); ?>
				</option>
				<option value="ltr">ltr</option>
				<option value="rtl">rtl</option>
			</select>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Shortcode
		</th>
		<td>
			 [beautiful-yahoo-weather]
		</td>
	</tr>
	</table>
	<div id="clasp_1" class="clasp">
		<a style="display:block; margin:5px 0;font-size: 15px; text-decoration: none; background: rgb(33, 180, 33); color: rgb(243, 243, 243); font-weight: bold; padding: 5px; border-radius: 5px;" href="javascript:lunchboxOpen('1');">Click to Open Table Your Description</a>
	</div>
	<div id="lunch_1" style="display:none;" class="lunchbox">
		<style>
				#lunch_1 td , #lunch_2 td{
					border: 1px solid #A5A5A5;
					padding:3px;
					}
				#lunch_1 tr ,#lunch_2 tr{
					display: table-row;
					vertical-align: inherit;
					}
				#lunch_1 th , #lunch_2 th{
					font-weight: bold;
					}
		</style>
		<?php $byw_mylang=get_option('byw_mylang'); $byw_smylang=get_option('byw_smylang'); ?>
		<table style="border-collapse: collapse; border-spacing: 0; width: 80%;" id="codetable" border="0">
		<tbody>
		<tr>
			<th>
				 Code
			</th>
			<th>
				 Description
			</th>
			<th>
				 Your Description
			</th>
		</tr>
		<tr>
			<td>
				 0
			</td>
			<td>
				 Wind speed
			</td>
			<td>
				<input type="text" name="byw_smylang[0]" value="<?php echo esc_attr($byw_smylang[0]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 1
			</td>
			<td>
				 Direction
			</td>
			<td>
				<input type="text" name="byw_smylang[1]" value="<?php echo esc_attr($byw_smylang[1]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 2
			</td>
			<td>
				 Today
			</td>
			<td>
				<input type="text" name="byw_smylang[2]" value="<?php echo esc_attr($byw_smylang[2]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 3
			</td>
			<td>
				 North
			</td>
			<td>
				<input type="text" name="byw_smylang[3]" value="<?php echo esc_attr($byw_smylang[3]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 4
			</td>
			<td>
				 East
			</td>
			<td>
				<input type="text" name="byw_smylang[4]" value="<?php echo esc_attr($byw_smylang[4]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 5
			</td>
			<td>
				 South
			</td>
			<td>
				<input type="text" name="byw_smylang[5]" value="<?php echo esc_attr($byw_smylang[5]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 6
			</td>
			<td>
				 West
			</td>
			<td>
				<input type="text" name="byw_smylang[6]" value="<?php echo esc_attr($byw_smylang[6]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 7
			</td>
			<td>
				 sunrise
			</td>
			<td>
				<input type="text" name="byw_smylang[7]" value="<?php echo esc_attr($byw_smylang[7]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 8
			</td>
			<td>
				 sunset
			</td>
			<td>
				<input type="text" name="byw_smylang[8]" value="<?php echo esc_attr($byw_smylang[8]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 9
			</td>
			<td>
				 humidity
			</td>
			<td>
				<input type="text" name="byw_smylang[9]" value="<?php echo esc_attr($byw_smylang[9]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 10
			</td>
			<td>
				 visibility
			</td>
			<td>
				<input type="text" name="byw_smylang[10]" value="<?php echo esc_attr($byw_smylang[10]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 11
			</td>
			<td>
				 pressure
			</td>
			<td>
				<input type="text" name="byw_smylang[11]" value="<?php echo esc_attr($byw_smylang[11]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 12
			</td>
			<td>
				 Sunday
			</td>
			<td>
				<input type="text" name="byw_smylang[12]" value="<?php echo esc_attr($byw_smylang[12]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 13
			</td>
			<td>
				 Monday
			</td>
			<td>
				<input type="text" name="byw_smylang[13]" value="<?php echo esc_attr($byw_smylang[13]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 14
			</td>
			<td>
				 Tuesday
			</td>
			<td>
				<input type="text" name="byw_smylang[14]" value="<?php echo esc_attr($byw_smylang[14]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 15
			</td>
			<td>
				 Wednesday
			</td>
			<td>
				<input type="text" name="byw_smylang[15]" value="<?php echo esc_attr($byw_smylang[15]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 16
			</td>
			<td>
				 Thursday
			</td>
			<td>
				<input type="text" name="byw_smylang[16]" value="<?php echo esc_attr($byw_smylang[16]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 17
			</td>
			<td>
				 Friday
			</td>
			<td>
				<input type="text" name="byw_smylang[17]" value="<?php echo esc_attr($byw_smylang[17]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 18
			</td>
			<td>
				 Saturday
			</td>
			<td>
				<input type="text" name="byw_smylang[18]" value="<?php echo esc_attr($byw_smylang[18]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 0
			</td>
			<td>
				 tornado
			</td>
			<td>
				<input type="text" name="byw_mylang[0]" value="<?php echo esc_attr($byw_mylang[0]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 1
			</td>
			<td>
				 tropical storm
			</td>
			<td>
				<input type="text" name="byw_mylang[1]" value="<?php echo esc_attr($byw_mylang[1]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 2
			</td>
			<td>
				 hurricane
			</td>
			<td>
				<input type="text" name="byw_mylang[2]" value="<?php echo esc_attr($byw_mylang[2]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 3
			</td>
			<td>
				 severe thunderstorms
			</td>
			<td>
				<input type="text" name="byw_mylang[3]" value="<?php echo esc_attr($byw_mylang[3]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 4
			</td>
			<td>
				 thunderstorms
			</td>
			<td>
				<input type="text" name="byw_mylang[4]" value="<?php echo esc_attr($byw_mylang[4]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 5
			</td>
			<td>
				 mixed rain and snow
			</td>
			<td>
				<input type="text" name="byw_mylang[5]" value="<?php echo esc_attr($byw_mylang[5]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 6
			</td>
			<td>
				 mixed rain and sleet
			</td>
			<td>
				<input type="text" name="byw_mylang[6]" value="<?php echo esc_attr($byw_mylang[6]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 7
			</td>
			<td>
				 mixed snow and sleet
			</td>
			<td>
				<input type="text" name="byw_mylang[7]" value="<?php echo esc_attr($byw_mylang[7]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 8
			</td>
			<td>
				 freezing drizzle
			</td>
			<td>
				<input type="text" name="byw_mylang[8]" value="<?php echo esc_attr($byw_mylang[8]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 9
			</td>
			<td>
				 drizzle
			</td>
			<td>
				<input type="text" name="byw_mylang[9]" value="<?php echo esc_attr($byw_mylang[9]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 10
			</td>
			<td>
				 freezing rain
			</td>
			<td>
				<input type="text" name="byw_mylang[10]" value="<?php echo esc_attr($byw_mylang[10]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 11
			</td>
			<td>
				 showers
			</td>
			<td>
				<input type="text" name="byw_mylang[11]" value="<?php echo esc_attr($byw_mylang[11]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 12
			</td>
			<td>
				 showers
			</td>
			<td>
				<input type="text" name="byw_mylang[12]" value="<?php echo esc_attr($byw_mylang[12]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 13
			</td>
			<td>
				 snow flurries
			</td>
			<td>
				<input type="text" name="byw_mylang[13]" value="<?php echo esc_attr($byw_mylang[13]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 14
			</td>
			<td>
				 light snow showers
			</td>
			<td>
				<input type="text" name="byw_mylang[14]" value="<?php echo esc_attr($byw_mylang[14]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 15
			</td>
			<td>
				 blowing snow
			</td>
			<td>
				<input type="text" name="byw_mylang[15]" value="<?php echo esc_attr($byw_mylang[15]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 16
			</td>
			<td>
				 snow
			</td>
			<td>
				<input type="text" name="byw_mylang[16]" value="<?php echo esc_attr($byw_mylang[16]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 17
			</td>
			<td>
				 hail
			</td>
			<td>
				<input type="text" name="byw_mylang[17]" value="<?php echo esc_attr($byw_mylang[17]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 18
			</td>
			<td>
				 sleet
			</td>
			<td>
				<input type="text" name="byw_mylang[18]" value="<?php echo esc_attr($byw_mylang[18]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 19
			</td>
			<td>
				 dust
			</td>
			<td>
				<input type="text" name="byw_mylang[19]" value="<?php echo esc_attr($byw_mylang[19]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 20
			</td>
			<td>
				 foggy
			</td>
			<td>
				<input type="text" name="byw_mylang[20]" value="<?php echo esc_attr($byw_mylang[20]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 21
			</td>
			<td>
				 haze
			</td>
			<td>
				<input type="text" name="byw_mylang[21]" value="<?php echo esc_attr($byw_mylang[21]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 22
			</td>
			<td>
				 smoky
			</td>
			<td>
				<input type="text" name="byw_mylang[22]" value="<?php echo esc_attr($byw_mylang[22]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 23
			</td>
			<td>
				 blustery
			</td>
			<td>
				<input type="text" name="byw_mylang[23]" value="<?php echo esc_attr($byw_mylang[23]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 24
			</td>
			<td>
				 windy
			</td>
			<td>
				<input type="text" name="byw_mylang[24]" value="<?php echo esc_attr($byw_mylang[24]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 25
			</td>
			<td>
				 cold
			</td>
			<td>
				<input type="text" name="byw_mylang[25]" value="<?php echo esc_attr($byw_mylang[25]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 26
			</td>
			<td>
				 cloudy
			</td>
			<td>
				<input type="text" name="byw_mylang[26]" value="<?php echo esc_attr($byw_mylang[26]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 27
			</td>
			<td>
				 mostly cloudy (night)
			</td>
			<td>
				<input type="text" name="byw_mylang[27]" value="<?php echo esc_attr($byw_mylang[27]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 28
			</td>
			<td>
				 mostly cloudy (day)
			</td>
			<td>
				<input type="text" name="byw_mylang[28]" value="<?php echo esc_attr($byw_mylang[28]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 29
			</td>
			<td>
				 partly cloudy (night)
			</td>
			<td>
				<input type="text" name="byw_mylang[29]" value="<?php echo esc_attr($byw_mylang[29]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 30
			</td>
			<td>
				 partly cloudy (day)
			</td>
			<td>
				<input type="text" name="byw_mylang[30]" value="<?php echo esc_attr($byw_mylang[30]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 31
			</td>
			<td>
				 clear (night)
			</td>
			<td>
				<input type="text" name="byw_mylang[31]" value="<?php echo esc_attr($byw_mylang[31]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 32
			</td>
			<td>
				 sunny
			</td>
			<td>
				<input type="text" name="byw_mylang[32]" value="<?php echo esc_attr($byw_mylang[32]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 33
			</td>
			<td>
				 fair (night)
			</td>
			<td>
				<input type="text" name="byw_mylang[33]" value="<?php echo esc_attr($byw_mylang[33]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 34
			</td>
			<td>
				 fair (day)
			</td>
			<td>
				<input type="text" name="byw_mylang[34]" value="<?php echo esc_attr($byw_mylang[34]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 35
			</td>
			<td>
				 mixed rain and hail
			</td>
			<td>
				<input type="text" name="byw_mylang[35]" value="<?php echo esc_attr($byw_mylang[35]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 36
			</td>
			<td>
				 hot
			</td>
			<td>
				<input type="text" name="byw_mylang[36]" value="<?php echo esc_attr($byw_mylang[36]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 37
			</td>
			<td>
				 isolated thunderstorms
			</td>
			<td>
				<input type="text" name="byw_mylang[37]" value="<?php echo esc_attr($byw_mylang[37]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 38
			</td>
			<td>
				 scattered thunderstorms
			</td>
			<td>
				<input type="text" name="byw_mylang[38]" value="<?php echo esc_attr($byw_mylang[38]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 39
			</td>
			<td>
				 scattered thunderstorms
			</td>
			<td>
				<input type="text" name="byw_mylang[39]" value="<?php echo esc_attr($byw_mylang[39]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 40
			</td>
			<td>
				 scattered showers
			</td>
			<td>
				<input type="text" name="byw_mylang[40]" value="<?php echo esc_attr($byw_mylang[40]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 41
			</td>
			<td>
				 heavy snow
			</td>
			<td>
				<input type="text" name="byw_mylang[41]" value="<?php echo esc_attr($byw_mylang[41]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 42
			</td>
			<td>
				 scattered snow showers
			</td>
			<td>
				<input type="text" name="byw_mylang[42]" value="<?php echo esc_attr($byw_mylang[42]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 43
			</td>
			<td>
				 heavy snow
			</td>
			<td>
				<input type="text" name="byw_mylang[43]" value="<?php echo esc_attr($byw_mylang[43]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 44
			</td>
			<td>
				 partly cloudy
			</td>
			<td>
				<input type="text" name="byw_mylang[44]" value="<?php echo esc_attr($byw_mylang[44]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 45
			</td>
			<td>
				 thundershowers
			</td>
			<td>
				<input type="text" name="byw_mylang[45]" value="<?php echo esc_attr($byw_mylang[45]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 46
			</td>
			<td>
				 snow showers
			</td>
			<td>
				<input type="text" name="byw_mylang[46]" value="<?php echo esc_attr($byw_mylang[46]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 47
			</td>
			<td>
				 isolated thundershowers
			</td>
			<td>
				<input type="text" name="byw_mylang[47]" value="<?php echo esc_attr($byw_mylang[47]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 3200
			</td>
			<td>
				 not available
			</td>
			<td>
				<input type="text" name="byw_mylang[3200]" value="<?php echo esc_attr($byw_mylang[3200]); ?>" />
			</td>
		</tr>
		</tbody>
		</table>
	</div>
	<div id="clasp_2" class="clasp">
		<a style="display:block; margin:5px 0;font-size: 15px; text-decoration: none; background: rgb(33, 180, 33); color: rgb(243, 243, 243); font-weight: bold; padding: 5px; border-radius: 5px;" href="javascript:lunchboxOpen('2');">Click to Open Table Your CSS</a>
	</div>
	<div id="lunch_2" style="display:none;" class="lunchbox">
		<?php $byw_css=get_option('byw_css'); ?>
		<table style="border-collapse: collapse; border-spacing: 0; width: 80%;" id="codetable" border="0">
		<tbody>
		<tr>
			<img src="<?php echo plugins_url('../images/screenshot-4.png', __file__); ?>">
		</tr>
		<tr>
			<td>
				 A
			</td>
			<td>
				 Image Height:
			</td>
			<td>
				<input type="text" name="byw_css[0]" value="<?php echo esc_attr($byw_css[0]); ?>" />
			</td>
			<td>
				 Image Width:
			</td>
			<td>
				<input type="text" name="byw_css[1]" value="<?php echo esc_attr($byw_css[1]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 B
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[2]" value="<?php echo esc_attr($byw_css[2]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[3]" value="<?php echo esc_attr($byw_css[3]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[4]" value="<?php echo esc_attr($byw_css[4]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 C
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[5]" value="<?php echo esc_attr($byw_css[5]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[6]" value="<?php echo esc_attr($byw_css[6]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[7]" value="<?php echo esc_attr($byw_css[7]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 D
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[8]" value="<?php echo esc_attr($byw_css[8]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[9]" value="<?php echo esc_attr($byw_css[9]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[10]" value="<?php echo esc_attr($byw_css[10]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 E
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[11]" value="<?php echo esc_attr($byw_css[11]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[12]" value="<?php echo esc_attr($byw_css[12]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[13]" value="<?php echo esc_attr($byw_css[13]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 F
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[14]" value="<?php echo esc_attr($byw_css[14]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[15]" value="<?php echo esc_attr($byw_css[15]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[16]" value="<?php echo esc_attr($byw_css[16]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 G
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[17]" value="<?php echo esc_attr($byw_css[17]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[18]" value="<?php echo esc_attr($byw_css[18]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[19]" value="<?php echo esc_attr($byw_css[19]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 H
			</td>
			<td>
				 Image Height:
			</td>
			<td>
				<input type="text" name="byw_css[20]" value="<?php echo esc_attr($byw_css[20]); ?>" />
			</td>
			<td>
				 Image Width:
			</td>
			<td>
				<input type="text" name="byw_css[21]" value="<?php echo esc_attr($byw_css[21]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 I
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[22]" value="<?php echo esc_attr($byw_css[22]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[23]" value="<?php echo esc_attr($byw_css[23]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[24]" value="<?php echo esc_attr($byw_css[24]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 J
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[25]" value="<?php echo esc_attr($byw_css[25]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[26]" value="<?php echo esc_attr($byw_css[26]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[27]" value="<?php echo esc_attr($byw_css[27]); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				 K
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[28]" value="<?php echo esc_attr($byw_css[28]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[29]" value="<?php echo esc_attr($byw_css[29]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[30]" value=" <?php echo esc_attr($byw_css[30]); ?> " />
			</td>
		</tr>
		<tr>
			<td>
				 L
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[31]" value="<?php echo esc_attr($byw_css[31]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[32]" value="<?php echo esc_attr($byw_css[32]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[33]" value=" <?php echo esc_attr($byw_css[33]); ?> " />
			</td>
		</tr>
		<tr>
			<td>
				 M
			</td>
			<td>
				 Font Size PX:
			</td>
			<td>
				<input type="text" name="byw_css[34]" value="<?php echo esc_attr($byw_css[34]); ?>" />
			</td>
			<td>
				 Font Color:
			</td>
			<td>
				<input type="text" name="byw_css[35]" value="<?php echo esc_attr($byw_css[35]); ?>" />
			</td>
			<td>
				 Font Family:
			</td>
			<td>
				<input type="text" name="byw_css[36]" value=" <?php echo esc_attr($byw_css[36]); ?> " />
			</td>
		</tr>
		</tbody>
		</table>
	</div>
	<script>
				function lunchboxOpen(lunchID) {
					document.getElementById('lunch_' + lunchID).style.display = "block";
					document.getElementById('clasp_' + lunchID).innerHTML="<a style='display:block; margin:5px 0;font-size: 15px; text-decoration: none; background: rgb(33, 180, 33); color: rgb(243, 243, 243); font-weight: bold; padding: 5px; border-radius: 5px;'  href=\"javascript:lunchboxClose('" + lunchID + "');\">Close Table</a>";
				}
				function lunchboxClose(lunchID) {
					document.getElementById('lunch_' + lunchID).style.display = "none";
					document.getElementById('clasp_' + lunchID).innerHTML="<a style='display:block; margin:5px 0;font-size: 15px; text-decoration: none; background: rgb(33, 180, 33); color: rgb(243, 243, 243); font-weight: bold; padding: 5px; border-radius: 5px;' href=\"javascript:lunchboxOpen('" + lunchID + "');\">Click to Open Table</a>";
				}
			</script>
	<?php submit_button(); ?>
</form>        
            <div dir="ltr" style="margin-top:10px; padding:10px; border:2px solid rgba(61, 87, 255, 0.69);">
                How can I find a city fips given a yahoo <b>WOEID</b>?
                <p>
                    Yahoo uses weather.com as it's weather provider, so using the same steps as the above should work. However. If you would like to find your weather code through weather.yahoo.com, follow these steps.<br />
                    1. Go to http://weather.yahoo.com<br />
                    2. Search for your city. You will now see page with weather information. There are two ways to go from here.<br />
                    3. Click <b>'Extended forecast'</b>.<br />
                    4. http://www.weather.com/weather/extended/<b>IRXX0018</b>?par=yahoo...<br />
                    5. <b>WOEID is:IRXX0018</b><br />
                    Plugin Created By <a href="http://www.wp-book.ir">Mohammad Pishdar</a><br />
                    Plain weather icons by <b>~MerlinTheRed</b><br />
                    Support E-Mail: pishdar@live.com
                </p>
            </div>
        </div>
    <?php } ?>