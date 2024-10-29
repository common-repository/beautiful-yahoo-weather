<?php // [beautiful-yahoo-weather]
function beautifulyahooweather_func()
	{
	$location = get_option('byw_woeid');
	$unit = get_option('byw_unit');
	$imgset = plugins_url('../images/', __FILE__) . get_option('byw_image_set') . "/png/";
	$lang = get_option('byw_lang');
	$name_city = get_option('byw_name_city');
	$bgcolor = get_option('byw_bgcolor');
	$css = get_option('byw_css');
	$mylang = get_option('byw_mylang');
	$smylang = get_option('byw_smylang');
	$byw_rtlorltr=get_option('byw_rtlorltr');
	$byw_fontsize=get_option('byw_fontsize');
	// Get database cache
	$byw_feed = get_transient('weather_feed');
	if (empty($byw_feed))
		{
		$query = "select * from weather.forecast where location = '" . $location . "' and u = '" . $unit . "'";
		$url = 'http://query.yahooapis.com/v1/public/yql?q=' . urlencode($query) . '&rnd=' . date('Y') . (date('n') - 1) . date('w') . date('G') . '&format=json';
		$jsonStr = file_get_contents($url);
		$phpobj = json_decode($jsonStr);
		$byw_feed = $phpobj->query->results->channel;

		// Set database cache
		set_transient('weather_feed', $byw_feed, 5*60);
		}

	$wd = $byw_feed->wind->direction;
	$wf = $byw_feed->item->forecast[0]; //today
	$wf_1 = $byw_feed->item->forecast[1]; // after 1 day
	$wf_2 = $byw_feed->item->forecast[2]; // after 2 day
	if ("315" <= $wd or $wd < "45")
		{
		$wind_jahat = 3; // 3=North
		}
	elseif ("45" <= $wd and $wd < "135")
		{
		$wind_jahat = 4; // 4=East
		}
	elseif ("135" <= $wd and $wd < "225")
		{
		$wind_jahat = 5; // 5=South
		}
	  else
		{
		$wind_jahat = 6; //6=West
		}
    include('lang.php');
    if (!empty($wd)) { ?>
            <div class="weather-wid" style="font-family: inherit; direction:<?php print $byw_rtlorltr ?>; background-color:<?php print $bgcolor; ?>; overflow:hidden; padding: 5px;">
                <div class="now-weather">
                    <div class="t-now-weather" style="float:left; width: 100%; <?php if ( $byw_rtlorltr=="rtl" ){ print 'text-align: right;';}else{print 'text-align: left;';} ?>">
                     <img style="margin-bottom: -10px; float:<?php if($byw_rtlorltr=="rtl") { print 'left';} else { print 'right';} ?>;max-width: 50%; <?php print "height: $css[0]px; width: $css[1]px;" ?>" src="<?php print $imgset; ?><?php print $byw_feed->item->condition->code; ?>.png">                       
                        <div class="c-now-weather" style="margin: 0px; font-size: 22px; color: rgba(81, 81, 81, 1); margin: 0 0 4px 0; <?php print "font-size: $css[2]px; color: $css[3]; font-family:$css[4];" ?> "><?php print $name_city; ?><img style="margin-top:-20px;margin-left:6px; float: none;" src="<?php print plugins_url( '../images/i1.png' , __FILE__ ) ?>"></div>
                        <span style=" <?php print "font-size: $css[5]px; color: $css[6]; font-family:$css[7];" ?> "><?php print $byw_feed->item->condition->temp; ?></span>
                        <sup class="c-t-now-weather" style="color:rgba(131, 131, 131, 0.43); <?php print "font-size: $css[8]px; color: $css[9]; font-family:$css[10];" ?> ">
                            °<?php print strtoupper($unit); ?>
                        </sup>
                        <span class="w-c-t-now-weather" style=" <?php print "font-size: $css[11]px; color: $css[12]; font-family:$css[13];" ?> ">
                            <?php print " ".$condition_text[$lang][$byw_feed->item->condition->code]; ?>
                        </span>
                        <br />
                        <span class="b-now-weather" style="font-size: 12px; <?php print "font-size: $css[14]px; color: $css[15]; font-family:$css[16];" ?> ">
                            <?php print $transl[$lang][0]; ?>: <?php print round($byw_feed->wind->speed,1); ?> k/h 
                        </span>
                        <br />
                        <span style=" <?php print "font-size: $css[17]px; color: $css[18]; font-family:$css[19];" ?> ">
                            <?php print $transl[$lang][1]; ?> : <?php print $transl[$lang][$wind_jahat]; ?>
                        </span>
                    </div>
                    <div style="float:left; width:100%;font-size:11px;<?php print "font-size: $css[31]px; color: $css[32]; font-family:$css[33];" ?> ">
                        <?php print $transl[$lang][7] . " : " . $byw_feed->astronomy->sunrise . " | " . $transl[$lang][8] . " : " . $byw_feed->astronomy->sunset;  ?>
                    </div>
                    <div style="float:left; width:100%; margin-bottom:5px;font-size:9px;<?php print "font-size: $css[34]px; color: $css[35]; font-family:$css[36];" ?> ">
                        <?php print $transl[$lang][9] . " : " . $byw_feed->atmosphere->humidity ." %  | " . $transl[$lang][10] . " : " . $byw_feed->atmosphere->visibility . " km | " . $transl[$lang][11] . " : " . round($byw_feed->atmosphere->pressure/1000, 2) . " bar"; ?>
                    </div>
                </div>
                <div style="font-size:14px; overflow:hidden; width:100%; float:left;">
                    <div style="font-size:14px; float:left; width:32%; text-align:center;  <?php print "font-size: $css[22]px; color: $css[23]; font-family:$css[24];" ?> " class="today">
                        <img style="max-width:100%;<?php print "height: $css[20]px; width: $css[21]px;" ?>" src="<?php print $imgset.$wf->code; ?>.png">
                        <br />
                        <?php print $transl[$lang][2]; ?>
                        <br />
                        <span class="ht-today" style="color:rgba(81, 81, 81, 1); <?php print "font-size: $css[25]px; color: $css[26]; font-family:$css[27];" ?>"><?php print $wf->high; ?><sup class="s-today">°</sup></span> <span style="color:#aeb2ae; <?php print "font-size: $css[28]px; color: $css[29]; font-family:$css[30];" ?> " class="lt-today"><?php print $wf->low; ?><sup class="s-today">°</sup></span>
                    </div>
                    <div class="today" style="font-size:14px; text-align:center; border-right:2px solid rgba(240, 240, 240, 0.66); border-left:2px solid rgba(240, 240, 240, 0.66);float:left; width:33%; <?php print "font-size: $css[22]px; color: $css[23]; font-family:$css[24];" ?> ">
                        <img style="max-width:100%; <?php print "height: $css[20]px; width: $css[21]px;" ?> " src="<?php print $imgset.$wf_1->code; ?>.png">
                        <br />
                        <?php print esc_attr($transl[$lang][$condition_day[$wf_1->day]]); ?>                  
                        <br />
                        <span class="ht-today" style="color:rgba(81, 81, 81, 1); <?php print "font-size: $css[25]px; color: $css[26]; font-family:$css[27];" ?>"><?php print $wf_1->high; ?><sup class="s-today">°</sup></span> <span style="color:#aeb2ae; <?php print "font-size: $css[28]px; color: $css[29]; font-family:$css[30];" ?>" class="lt-today"> <?php print $wf_1->low; ?><sup class="s-today">°</sup></span>
                    </div>
                    <div style=" font-size:14px; float:left; width:32%; text-align:center; <?php print "font-size: $css[22]px; color: $css[23]; font-family:$css[24];" ?> " class="today">
                        <img style="max-width:100%; <?php print "height: $css[20]px; width: $css[21]px;" ?> " src="<?php print $imgset.$wf_2->code; ?>.png">
                        <br />
                        <?php print esc_attr($transl[$lang][$condition_day[$wf_2->day]]); ?>
                        <br />
                        <span class="ht-today" style="color:rgba(81, 81, 81, 1); <?php print "font-size: $css[25]px; color: $css[26]; font-family:$css[27];" ?> "><?php print $wf_2->high; ?><sup class="s-today">°</sup></span> <span style="color:#aeb2ae; <?php print "font-size: $css[28]px; color: $css[29]; font-family:$css[30];" ?> " class="lt-today"> <?php print $wf_2->low; ?><sup class="s-today">°</sup></span>
                    </div> 
                </div>                   
            </div>
        <?php } } add_shortcode('beautiful-yahoo-weather', 'beautifulyahooweather_func'); ?>
