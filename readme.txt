=== Beautiful Yahoo Weather ===
Contributors: Mohammad Pishdar
Donate link: http://www.wp-book.ir
Tags: Yahoo , Weather , Beautiful
Requires at least: 3.0.1
Tested up to: 3.9
Stable tag: 1.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Weather plugin enables you to get up-to-date weather information for your location.The Weather plugin is a dynamically-generated based on WOEID

== Description ==

The Weather plugin enables you to get up-to-date weather information for your location.The Weather plugin is a dynamically-generated based on WOEID

= Languages =

persian english arabic bulgarian catalan chinese-simplified chinese-traditional danish dutch estonian finnish german french greek haitian-creole hindi indonesian italian japanese korean latvian maltese romanian russian spanish swedish turkish ukrainian vietnamese

== Installation ==

= You can either install it automatically from the WordPress admin, or do it manually: =

1. Unzip the archive and put the `beautiful-yahoo-weather` folder into your plugins folder (/wp-content/plugins/).
2. Activate the plugin from the Plugins menu.

== Frequently Asked Questions ==

= How can I find a county/city fips given a yahoo WOEID? =


<b>weather.yahoo.com</b>
Yahoo uses weather.com as it's weather provider, so using the same steps as the above should work. However. If you would like to find your weather code through weather.yahoo.com, follow these steps.<br />
1. Go to http://weather.yahoo.com<br />
2. Search for your city. You will now see page with weather information. There are two ways to go from here.<br />
3. Click <b>'Extended forecast'</b>.<br />
4. http://www.weather.com/weather/extended/<b>IRXX0018</b>?par=yahoo...<br />
5. <b>WOEID is:IRXX0018</b><br />

<hr />
Weather.com
1. Go to http://www.weather.com
2. Search for your town and country (ie London, United Kingdom or New york, NY, United States) - When your search has given you the right location you will be taken to the page where the weather is displayed. You should now look at the URL (the address bar).
3. The URL should now look something like this:
http://www.weather.com/weather/today/UKXX0085
or
http://www.weather.com/weather/today/USNY0996
4. The weather code is now in the URL. The part we are looking for is: UKXX0085 ( / USNY0996 )
5. Take the weather code and paste in in your skin at the appropriate place. Save. Refresh.

Yahoo-Weather
Yahoo uses weather.com as it's weather provider, so using the same steps as the above should work. However. If you would like to find your weather code through weather.yahoo.com, follow these steps.

1. Go to http://weather.yahoo.com
2. Search for your town and country (ie. London, United Kingdom or New york, NY, United States) - You will now see page with weather information. There are two ways to go from here.
3a. Click on the RSS-button which is to the right under the big bar.
4a. Look at the URL, it should be something like:
http://weather.yahooapis.com/forecastrss?p=UKXX0085&u=f
or
http://weather.yahooapis.com/forecastrss?p=USNY0996&u=f - The weather code is then UKXX0085 ( / USNY0996 )

3b. Click 'Extended forecast' in one of the columns that hold weather for each day.
4b. The URL should now look something like this:
http://www.weather.com/outlook/travel/businesstraveler/extended/UKXX0085
or
http://www.weather.com/outlook/travel/businesstraveler/extended/USNY0996
- The weather code is then UKXX0085 ( / USNY0996 )

5. Take the weather code and paste in in your skin at the appropriate place. Save. Refresh.

Note:
Yahoo is in the process of an upgrade. It is removing the p= part and replacing it with w= to use the more powerful new WOEID codes.
So if you find that your weather stops working, try to change that. Some skins use p= and some use w=, so far p= is still the main and supports more locations but it will soon change.

To get the weather-code if you use w=, do this:
1-2. Same as above.
3. Look at the URL. Should be something like:
http://weather.yahoo.com/england/greater-london/london-44418
or
http://weather.yahoo.com/united-states/new-york/new-york-2459115
4. The weather-code is then 44418 ( / 2459115 )

MSN-Weather
1. Go to http://weather.msn.com
2. Search for your location (ie. Lodon, United Kingdom or New york, NY, United States)
3. Look at the URL, it should look something like this:
http://weather.msn.com/local.aspx?wealocations=wc:UKXX0085&q=London%2c+GBR
or
http://weather.msn.com/local.aspx?wealocations=wc:USNY0996&q=New+York%2c+NY - The Weather code is UKXX0085 ( / USNY0996 )
4. Take the weather code and paste in in your skin at the appropriate place. Save. Refresh.
Other random weather page

1. Look at the page.
2. Search for your town and country.
3. Search for some other town.
4. See if you get similar results with only a small portion of the URL changed.
5. Hope for the best.
There is a big possibility that it will not be possible.

== Screenshots ==

1. Easy Control Panel
2. Easy Widget Builder 
3. Simple Widget Beautiful Yahoo Weather
4. Simple Widget Beautiful Yahoo Weather
5. Simple Widget Beautiful Yahoo Weather
6. Simple Widget Beautiful Yahoo Weather
7. Simple Widget Beautiful Yahoo Weather
8. Simple Widget Beautiful Yahoo Weather
9. Easy control css

== Changelog ==

= 1.4 =
Bugs fixed and better css

= 1.4.1 =
Bugs fixed and better css
