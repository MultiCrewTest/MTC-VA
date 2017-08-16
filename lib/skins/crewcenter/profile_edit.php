<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content-header">
    <h1>My Profile</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-md-4 col-md-offset-1 connected">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Profile</h3>
                </div>
                <div class="box-body">
                    <form action="<?php echo url('/profile');?>" method="post" enctype="multipart/form-data">
                        <dl>
<label>Name</label>
<dd><input type="text" class="form-control" disabled placeholder="<?php echo $pilot->firstname . ' ' . $pilot->lastname;?>"></dd>

<label>Airline</label>
<dd><input type="text" class="form-control" disabled placeholder="<?php echo $pilot->code?>">
<p>To request a change, contact your admin</p>
</dd>

<label>Email Address</label>

<dd><input type="text" class="form-control" name="email" value="<?php echo $pilot->email;?>" />
<?php
if(isset($email_error) && $email_error == true)
echo '<p class="error">Please enter your email address</p>';
?>
</dd>

<label>Location</label>
<dd><select name="location" class="form-control">
<?php
foreach($countries as $countryCode=>$countryName)
{
if($pilot->location == $countryCode)
$sel = 'selected="selected"';
else
$sel = '';

echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
}
?>
</select>
<?php
if(isset($location_error) && $location_error == true)
echo '<p class="error">Please enter your location</p>';
?>
</dd>

<label>Signature Background</label>
<dd><select name="bgimage" class="form-control">
<?php
foreach($bgimages as $image)
{
if($pilot->bgimage == $image)
$sel = 'selected="selected"';
else
$sel = '';

echo '<option value="'.$image.'" '.$sel.'>'.$image.'</option>';
}
?>
</select>
</dd>


<?php
if($customfields) {
foreach($customfields as $field) {
echo '<dt>'.$field->title.'</dt>
 <dd>';

if($field->type == 'dropdown') {
$field_values = SettingsData::GetField($field->fieldid);
$values = explode(',', $field_values->value);


echo "<select name=\"{$field->fieldname}\">";

if(is_array($values)) {

 foreach($values as $val) {
 $val = trim($val);

 if($val == $field->value)
 $sel = " selected ";
 else
 $sel = '';

 echo "<option value=\"{$val}\" {$sel}>{$val}</option>";
 }
}

echo '</select>';
} elseif($field->type == 'textarea') {
echo '<textarea name="'.$field->fieldname.'" class="customfield_textarea">'.$field->value.'</textarea>';
} else {
echo '<input type="text" name="'.$field->fieldname.'" value="'.$field->value.'" />';
}

echo '</dd>';
}
}
?>
                        
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo Config::Get('AVATAR_FILE_SIZE');?>" />
                            <input type="file" name="avatar" size="40" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Current Avatar</label>
                            <?php	
                                if(!file_exists(SITE_ROOT.AVATAR_PATH.'/'.$pilotcode.'.png'))
                                {
                                    echo 'None selected';
                                }
                                else
                                {
                            ?>
                            <img src="<?php	echo SITE_URL.AVATAR_PATH.'/'.$pilotcode.'.png';?>" /></dd>
                            <?php
                                }
                            ?>
                        </div>
                        <input type="hidden" name="action" value="saveprofile" />
		                <input type="submit" name="submit" class="btn btn-primary btn-flat pull-right" value="Save Changes" />
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- Middle col -->
        <section class="col-md-4 col-md-offset-1 connected">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <div class="box-body">
                    <form action="<?php echo url('/profile');?>" method="post">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="oldpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="password" name="password1" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="password2" class="form-control" value="">
                        </div>
                        <input type="hidden" name="action" value="changepassword" />
		                <input type="submit" name="submit" class="btn btn-primary btn-flat pull-right" value="Save Password" />
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.Middle col -->
    </div>
    <!-- /.row (main row) -->

</section>
<!-- /.content -->