<h3 style="margin-left: 80px; margin-top: 75px;">Aviation weather</h3>
<div style="border: solid 3px; margin-bottom: 35px; padding: 25px; border-radius: 5px;" class="container">
	<h4 style="margin-left: 0px; margin-top: 0px;">Enter ICAO</h4>
	<div style="border: solid 1px; margin-bottom: 35px; padding: 25px; border-radius: 5px;">
		<form action="<?php echo url('/WTHR/metar');?>" method="post">
			<table style="margin-bottom: 0px;">
				<tr>
					<td style="vertical-align: middle;">ICAO:</td>
					<td style="vertical-align: middle;"><input type="text" name="icao" style="text-transform: uppercase; vertical-align: middle;" required="required"></td>
					<td style="vertical-align: middle;"><input type="submit" value="send" class="button alt" style="text-transform: uppercase; vertical-align: middle;" class="button alt"></td>
				</tr>
			</table>
		</form>

	</div>
	<h4 style="margin-left: 0px; margin-top: 0px;">Results</h4>
	<div style="border: solid 1px; margin-bottom: 35px; padding: 25px; border-radius: 5px;" id="wr">
			<table style="margin-bottom: 0px;">
				<tr>
					<td style="vertical-align: top;" colspan="2"><img src="<?php echo fileurl('lib/images/radar.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $metar;?></td>
				</tr>
				<tr>
					<td style="vertical-align: middle;"><img src="<?php echo fileurl('lib/images/alt.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Altimeter <?php echo $altimeter;?> inHg</td>
					<td style="vertical-align: middle;"><img src="<?php echo fileurl('lib/images/meter.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temperature <?php echo $temperature.$sky1;?>&deg; C / Dew Point <?php echo $dewpoint;?>&deg; C</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;"><img src="<?php echo fileurl('lib/images/law.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flight Rule <?php echo $flightrules;?></td>
					<td style="vertical-align: middle;"><img src="<?php echo fileurl('lib/images/plane.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Station 
					<?php echo $stationid;?> (<?php echo $stationname;?>/<?php echo $stationcountry ;?>) Lat/Lng : <?php echo $lat;?>/<?php echo $lng;?> Elevation: <?php echo $elevation;?> M
					</td>
					
				</tr>
				<tr>
					<td style="vertical-align: middle;"><img src="<?php echo fileurl('lib/images/time.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time;?></td>
					<td style="vertical-align: middle;"><img src="<?php echo fileurl('lib/images/visible.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Visibility <?php echo $visibility.$sky1;?> Miles</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;" colspan="2"><img src="<?php echo fileurl('lib/images/compass.png') ;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wind Direction From <?php echo $winddir;?> &deg; At Speed Of <?php echo $windspd;?> kt</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;" colspan="2">
						<img src="<?php echo fileurl('lib/images/clouds.png') ;?>"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php 
							if(!$skycondition3 OR !$skycondition4)
							{
								echo $skycondition0.' Clouds At '.$skycondition1.' Feet'; 
							}
							else
							{
								echo $skycondition0.' Clouds At '.$skycondition1.' Feet / '.$skycondition3.' Clouds At '.$skycondition4.' Feet';
							}
						?>
					
							
					</strong>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;" colspan="2">
					<ul>
						<li>SKC = No cloud/Sky clear</li>
						<li>CLR = No clouds below 12,000 ft (3,700 m) (U.S.) or 25,000 ft (7,600 m) (Canada)</li>
						<li>NSC = No (nil) significant cloud</li>
						<li>FEW = "Few" = 1 to 2 oktas</li>
						<li>SCT = "Scattered" = 3 to 4 oktas</li>
						<li>BKN = "Broken" = 5 to 7 oktas</li>
						<li>OVC = "Overcast" = 8 oktas, i.e., full cloud coverage</li>
						<li>VV = Clouds cannot be seen because of fog or heavy precipitation, so vertical visibility is given instead.</li>
						<li>CAVOK = Ceiling And Visibility OKay.</li>
					</ul>
					</td>
				</tr>
			</table>
	</div>
	<h4 style="margin-left: 0px; margin-top: 0px;">Charts</h4>
	<div style="border: solid 1px; margin-bottom: 35px; padding: 5px; border-radius: 5px;overflow-y: scroll;overflow-x: hidden;height:250px;">
		<table>
			<tr>
				<td>
					<ul>
						<li>
							
							<?php
								
								if(!$charts)
									{
										echo 'No Charts';
									}
								else
									{
										$count = count($count);
										for($i = 0; $i <= $count; $i++)
											{
												$chart = $charts->chart[$i];
												$type = $charts->chart[$i][type];
												$name = $charts->chart[$i][name];
												if($i < $count)
												{
													echo ($i+1).'. <a href='.$chart.' target="blank" style="text-decoration: none;">'.$name.' - '.$type.'</a><br>';
												}
												else
												{
													break;
												}
											}
												
									}
							?>
							
						</li>
					</ul>
				</td>
			</tr>
		</table>
	</div>
</div>




