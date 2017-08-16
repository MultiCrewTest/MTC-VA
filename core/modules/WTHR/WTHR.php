<?php
class WTHR extends CodonModule
	{
		public function index() 
			{
				$revision = trim(file_get_contents(CORE_PATH.'/version'));
			if($revision != 'simpilot 5.5.2')
				{
					echo '<center>phpVMS Version Installed Is Not Compatible With This Module!</center><br />';
					echo '<center>phpVMS Version Installed: '.$revision.'</center>';
				}
			else
				{
					$this->show('weather/weather.php');
				}
			}
	
		public function metar()
			{
				//METAR Info
				$icao = DB::escape($_POST['icao']);
				$urlmet = 'https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&stationString='.$icao.'&hoursBeforeNow=1';
				$xmlmet = simplexml_load_file($urlmet); 
				$metar = $xmlmet->data->METAR->raw_text;
				$altimeter = $xmlmet->data->METAR->altim_in_hg;
				$dewpoint = $xmlmet->data->METAR->dewpoint_c;
				$flightrules = $xmlmet->data->METAR->flight_category;
				$temperature = $xmlmet->data->METAR->temp_c;
				$time = $xmlmet->data->METAR->observation_time;
				$visibility = $xmlmet->data->METAR->visibility_statute_mi;
				$winddir = $xmlmet->data->METAR->wind_dir_degrees;
				$windspd = $xmlmet->data->METAR->wind_speed_kt;
				$skycondition0 = $xmlmet->data->METAR->sky_condition[0]['sky_cover'];
				$skycondition1 = $xmlmet->data->METAR->sky_condition[0]['cloud_base_ft_agl'];
				$skycondition3 = $xmlmet->data->METAR->sky_condition[1]['sky_cover'];
				$skycondition4 = $xmlmet->data->METAR->sky_condition[1]['cloud_base_ft_agl'];
				
				
				//Station Info
				$urlinf = 'https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=stations&requestType=retrieve&format=xml&stationString='.$icao;
				$xmlinf = simplexml_load_file($urlinf);
				$stationid = $xmlinf->data->Station->station_id;
				$lat = $xmlinf->data->Station->latitude;
				$lng = $xmlinf->data->Station->longitude;
				$elevation = $xmlinf->data->Station->elevation_m;
				$stationname = $xmlinf->data->Station->site;
				$stationcountry = $xmlinf->data->Station->country;
				
				//Variables For Metar
				$this->set('metar', $metar);
				$this->set('altimeter', $altimeter);
				$this->set('dewpoint', $dewpoint);
				$this->set('flightrules', $flightrules);
				$this->set('temperature', $temperature);
				$this->set('time', $time);
				$this->set('visibility', $visibility);
				$this->set('winddir', $winddir);
				$this->set('windspd', $windspd);
				$this->set('skycondition0', $skycondition0);
				$this->set('skycondition1', $skycondition1);
				$this->set('skycondition3', $skycondition3);
				$this->set('skycondition4', $skycondition4);
				
				//Variables For Info
				$this->set('lat', $lat);
				$this->set('lng', $lng);
				$this->set('elevation', $elevation);
				$this->set('stationid', $stationid);
				$this->set('stationname', $stationname);
				$this->set('stationcountry', $stationcountry);
				
				//Charts Section
				$url = 'http://api.aircharts.org/Airport/'.$icao.'.xml';
				$xml = simplexml_load_file($url);
				$charts = $xml->airport;
				$count = $xml->airport->chart;
				$this->set('charts', $charts);
				$this->set('count', $count);
				$this->render('weather/weather.php');
				
			}
		
	}
?>
