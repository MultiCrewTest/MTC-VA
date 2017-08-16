<?php

if(!Auth::LoggedIn())

{

	// Show these if they haven't logged in yet

?>
<table align="center" border="0" cellpadding="1" cellspacing="1" width="96%">
		<tbody>
			<tr>
				<td>
					<center>
						<p align="left" class="error">
							You Must be logged in to view this page</p>
					</center>
				</td>
			</tr>
		</tbody>
	</table>
<form name="loginform" action="<?php echo url('/login');?>" method="post">
<?php echo "<?xml version='1.0'?>"; ?>
<?php
if(isset($message))
	echo '<p class="error">'.$message.'</p>';
?>
<table width="400" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #EBEBEB;">
      <tr>
        <td width="150" align="right" bgcolor="#F5F5F5" class="fieldarea" style="border-bottom:1px solid #EBEBEB;">Callsign:</td>
        <td style="border-bottom:1px solid #EBEBEB;"><input type="text" name="email" value="VAU" /></td>
      </tr>
      <tr>
        <td width="150" align="right" bgcolor="#F5F5F5" class="fieldarea" style="border-bottom:1px solid #EBEBEB;">Password:</td>
        <td style="border-bottom:1px solid #EBEBEB;"><input type="password" name="password" value="" /></td>
      </tr>

      <tr>
        <td width="150" align="right" bgcolor="#F5F5F5" class="fieldarea">&nbsp;</td>
        <td><input type="hidden" name="redir" value="index.php/profile" />
		<input type="hidden" name="action" value="login" />
		<input type="submit" name="submit" value="Log In" />
</td>
      </tr>
    </table>
  <p align="center"><strong>Forgotten Your Password?</strong> <a href="<?php echo url('Login/forgotpassword'); ?>">Request a Password Reset</a></p>
</form>


<?php

}

else

{

	// Show these items only if they are logged in

?>


<?php
if(!$allroutes)
{
	echo '<p align="center">No routes have been found!</p>';
	return;
}
?>

<table width="98%" align="center" cellpadding="4" cellspacing="0" border="0" class="table table-hover"> 
<thead>
<tr>
	<td align="center" class="roster_header"><strong>Flight No</strong></td>
        <td align="center" class="roster_header"><strong>Depart Time</strong></td>
        <td align="center" class="roster_header"><strong>Departure</strong></td>
        
        <td align="center" class="roster_header"><strong>Arrive Time</strong></td>
        <td align="center" class="roster_header"><strong>Arrival</strong></td>
        <td align="center" class="roster_header"><strong>Duration</strong></td>
        
        <td align="center" class="roster_header"><strong>Aircraft</strong></td>
        <td align="center" class="roster_header"></td>
</tr>
</thead>
<tbody>
<?php
foreach($allroutes as $route)
{



	/* Uncomment this code if you want only schedules which are from the last PIREP that
		pilot filed */
	/*if(Auth::LoggedIn())
	{
		$search = array(
			'p.pilotid' => Auth::$userinfo->pilotid,
			'p.accepted' => PIREP_ACCEPTED
		);
		
		$reports = PIREPData::findPIREPS($search, 1); // return only one
		
		if(is_object($reports))
		{
			# IF the arrival airport doesn't match the departure airport
			if($reports->arricao != $route->depicao)
			{
				continue;
			}
		}
	}*/
	
	/*
	Skip over a route if it's not for this day of week
	Left this here, so it can be omitted if your VA
	 doesn't use this. 
	 
/*	Check if a 7 is being used for Sunday, since PHP
		thinks 0 is Sunday */
	// $route->daysofweek = str_replace('7', '0', $route->daysofweek);
	
	// if(strpos($route->daysofweek, date('w')) === false)
	//	continue;
		
	/* END DAY OF WEEK CHECK */
	
	
		
	
	/*
	This will skip over a schedule if it's been bid on
	This only runs if the below setting is enabled
	
	If you don't want it to skip, then comment out
	this code below by adding // in front of each 
	line until the END DISABLE SCHEDULE comment below
	
	If you do that, and want to show some text when
	it's been bid on, see the comment below
	*/
	if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0)
	{
		continue;
	}
	/* END DISABLE SCHEDULE ON BID */
	
	
	/*	Skip any schedules which have aircraft that the pilot
		is not rated to fly (according to RANK), only skip them if
		they are logged in. */
	if(Config::Get('RESTRICT_AIRCRAFT_RANKS') === true && Auth::LoggedIn())
	{
		/*	This means the aircraft rank level is higher than
			what the pilot's ranklevel, so just do "continue"
			and move onto the next route in the list 
		 */
		if($route->aircraftlevel > Auth::$userinfo->ranklevel)
		{
			
                             continue;
		}
	}
	
	/* THIS BEGINS ONE TABLE ROW */

?>
<?php
$sunday = 0;
$monday = 0;
$tuesday = 0;
$wednesday = 0;
$thursday = 0;
$friday = 0;
$saturday = 0;
?>
   <tr class="profile_data" onclick="location.href='<?php echo url('/schedules/details/'.$route->id);?>'"> 
    <td align="center"><?php echo $route->code . $route->flightnum?></td> 
    <td align="center"><?php echo $route->deptime;?></td> 
    <td align="center"><?php echo ''.$route->depicao;?></td> 
    
    <td align="center"><?php echo $route->arrtime;?></td> 
    <td align="center"><?php echo ''.$route->arricao;?></td> 
    <td align="center"><?php echo ''.$route->flighttime;?>hrs</td> 
    
    <td align="center"><?php echo $route->aircraft; ?></td> 
    <td align="center"><button class="btn btn-danger btn-xs" type="button" onclick="location.href='<?php echo url('/schedules/details/'.$route->id);?>'">View &#8594;</button>
<?php if(Auth::LoggedIn())
			{
			 ?>
				<a id="<?php echo $route->id; ?>" class="addbid btn btn-sucess btn-xs" 
					href="<?php echo url('/schedules/addbid');?>">Add to Bid</a>
			<?php			 
			} ?>
</td> 
</tr>


   <?php
	$rowclass = 1 - $rowclass;
    }
?>
</tbody>
</table>
<?php



?>
<?php

}

?>