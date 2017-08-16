<?php
///////////////////////////////////////////////
///  Pilot Career Page v1.2 by php-mods.eu  ///
///            Author php-mods.eu           ///
///           Packed at 25/05/2016          ///
///     Copyright (c) 2016, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Pilot Ranks</h3>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Rank Title</th>
    <th>Minimum Hours</th>
    <th>Pay Rate/Hour</th>
	<th>Can Fly</th>
	<th>Rank Image</th>
</tr>
</thead>
<tbody>
<?php foreach($ranks as $rank) { ?>
<tr>
	<td align="center" width="30%"><?php echo $rank->rank; ?></td>
    <td align="center" width="15%"><?php echo $rank->minhours; ?></td>
    <td align="center" width="20%">$<?php echo $rank->payrate; ?>/hr</td>
	<td align="center" width="20%"> 
    <?php $rankai = CareerData::getaircrafts($rank->rankid); 
		if(!$rankai) {echo 'All the aircraft';}
		else {
			foreach($rankai as $ran) {echo $ran->icao;} 
		} ?></td>
	<td align="center" width="25%"><img src="<?php echo $rank->rankimage; ?>" title="<?php echo $rank->rank; ?>" /></td>
</tr>
<?php } ?>
</tbody>
</table>
<h3>Awards</h3>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Award</th>
    	<th>Description</th>
	<th>Image</th>
	</tr>
</thead>
<tbody>
<?php if(!$generaward) {echo '<tr><td align="center" colspan="3">There are no awards at this time!</td></tr>';} 
else {
foreach($generaward as $gen) { ?>
<tr>
	<td align="center" width="20%"><?php echo $gen->name; ?></td>
    	<td align="center" width="60%"><?php echo $gen->descrip; ?></td>
	<td align="center" width="20%"><img src="<?php echo $gen->image; ?>" title="<?php echo $gen->name; ?>" /></td>
</tr>
<?php } } ?>
</tbody>
</table>
