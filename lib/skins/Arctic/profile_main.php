<style>
#bodytext{
padding:0px;
}
.bodytext{
padding:5px;
}
</style>

<img src="<?php echo SITE_URL; ?>/lib/skins/Arctic/images/profile_banner.png" style="border-bottom:1px solid #CCC;"/>
<div class="row">
<div class="col-md-3">


<div class="btn-group btn-group-vertical" >
  <a  class="btn btn-default" href="<?php echo url('/profile/editprofile'); ?>">Edit Profile</a>
  <a href="<?php echo url('/profile/changepassword'); ?>" class="btn btn-default">Change Password</a>
  <a href="<?php echo url('/profile/badge'); ?>" class="btn btn-default">View Signature</a>
  <a href="<?php echo url('/profile/stats'); ?>" class="btn btn-default">My Stats</a>
  <a href="<?php echo url('/downloads'); ?>" class="btn btn-default">View Downloads</a>
  <a class="btn btn-default" href="<?php echo url('/pireps/mine');?>">View my PIREPs</a>
  <a class="btn btn-default" href="<?php echo url('/pireps/routesmap');?>">View a map of all my flights</a>
  <a class="btn btn-default" href="<?php echo url('/pireps/filepirep');?>">File a Pilot Report</a>
  <a class="btn btn-default" href="<?php echo url('/schedules/view');?>">View Flight Schedules</a>
  <a class="btn btn-default" href="<?php echo url('/schedules/bids');?>">View my flight bids</a>
   <a class="btn btn-default" href="<?php echo url('/finances');?>">View VA Finances</a>
</div>
</div>
<div class="col-md-9">
<div class="bodytext">
<h3>My Information</h3>

<table width="98%" cellspacing="5" border="0" align="center">
<tr>

</tr>
  <tr>
    <td width="12%" rowspan="6" align="left"><img src="<?php echo PilotData::getPilotAvatar($pilotcode);?>"  width="100px;" height="104px;" /></td>
  </tr>
  <tr>
    <td valign="top" width="20%" align="left"><strong>Pilot ID:</strong></td>
    <td valign="top" width="30%" align="left"><?php echo $pilotcode; ?></td>
    <td valign="top" width="20%" align="left"><strong>Location:</strong></td>
    <td valign="top" width="30%" align="left"><?php echo Countries::getCountryName($userinfo->location);?></td>
  </tr>
  <tr>
    <td align="left"><strong>E-Mail:</strong></td>
    <td align="left"><?php echo $userinfo->email; ?></td>
    <td align="left"><strong>Flights:</strong></td>
    <td align="left"><?php echo $userinfo->totalflights; ?></td>
  </tr>
  <tr>
    <td align="left"><strong>Rank:</strong></td>
    <td align="left"><?php echo $userinfo->rank; ?></td>
    <td align="left"><strong>Hours:</strong></td>
    <td align="left"><?php echo $userinfo->totalhours; ?></td>
  </tr>
  <tr>
    <td align="left"><strong>Member Since:</strong></td>
    <td align="left"><?php echo date('jS F Y', strtotime($userinfo->joindate)); ?></td>
    <td align="left"><strong>Transfer Hours:</strong></td>
    <td align="left"><?php echo $userinfo->transferhours?></td>
  </tr>
  <tr>
    <td align="left"><strong>Hub:</strong></td>
    <td align="left"><?php echo $userinfo->hub?></td>
    <td align="left"><strong>Earnings:</strong></td>
    <td align="left">v<?php echo FinanceData::formatMoney((floatval($userinfo->totalpay) + floatval($userinfo->payadjust))) ?></td>
  </tr>
</table>



<h3>Awards</h3>

<table width="98%" align="center"><br>
<tr>
<td colspan="5" class="roster_header" align="left"></td>
  </tr>
  <tr>
    <td align="center" width="90%"><strong><?php
   if(!$allawards)
   {
    echo 'No awards Yet<br /><br />';
   }
   else
   {   
   ?>
              <ul>
                <?php foreach($allawards as $award){ ?>
                <img src="<?php echo $award->image?>" alt="<?php echo $award->descrip?>" title="<?php echo $award->name?>" alt="awards" />
                <?php } ?>
              </ul>
              <?php
   }
   ?></p></td>
  </tr>
 
</tr>
</table>
</div>
</div>
</div>