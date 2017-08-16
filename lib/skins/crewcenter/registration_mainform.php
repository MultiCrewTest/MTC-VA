<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<body class="hold-transition login-page" style="background-color: #222222;">
<div class="login-box">
         <div class="login-logo">
                 <a href="" style="color: white;">Crew<b>Center</b></a>
         </div>
         <!-- /.login-logo -->
         <div class="login-box-body">
                 <p class="login-box-msg" style="font-size: 13px;">Please complete this form to create your account.</p>
                 <form method="post" action="<?php echo url('/registration');?>">
                     <div class="form-group">
                     <input type="text" name="firstname" class="form-control" value="<?php echo Vars::POST('firstname');?>" placeholder="First Name">
                     <?php
                     if($firstname_error == true)
                     echo '<p class="error">Please enter your first name</p>';
                     ?>
                     </div>
                     <div class="form-group">
                         <input type="text" name="lastname" class="form-control" value="<?php echo Vars::POST('lastname');?>" placeholder="Last Name">
                         <?php
                         if($lastname_error == true)
                         echo '<p class="error">Please enter your last name</p>';
                         ?>
                     </div>
                     <div class="form-group">
                         <input type="text" name="email" class="form-control" value="<?php echo Vars::POST('email');?>" placeholder="Email">
                         <?php
                         if($email_error == true)
                         echo '<p class="error">Please enter your email address</p>';
                         ?>
                     </div>
                     <div class="form-group">
                     	<input type="password" name="password1" id="password" class="form-control" placeholder="Password">
                     </div>
                     <div class="form-group">
                         <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                         <?php
                         if($password_error == true)
                         echo '<p class="error">'.$password_error.'</p>';
                         ?>
                     </div>
                     <div class="form-group">
                             <select name="location" class="form-control">
								 <?php
                                     foreach($countries as $countryCode=>$countryName)
                                     {
                                     if(Vars::POST('location') == $countryCode)
                                             $sel = 'selected="selected"';
                                     else
                                             $sel = '';
    
                                             echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
                                     }
                                 ?>
                             </select>
                             <?php
								 if($location_error == true)
								 echo '<p class="error">Please enter your location</p>';
                             ?>
                     </div>
            
                     <div class="form-group">
                         <select name="code" id="code" class="form-control">
						 <?php
                         foreach($allairlines as $airline)
                         {
                                 echo '<option value="'.$airline->code.'">'.$airline->code.' - '.$airline->name.'</option>';
                         }
                         ?>
                         </select>
                     </div>
                     <div class="form-group">
                     <select name="hub" id="hub" class="form-control">
                             <?php
                             foreach($allhubs as $hub)
                             {
                                     echo '<option value="'.$hub->icao.'">'.$hub->icao.' - ' . $hub->name .'</option>';
                             }
                             ?>
                     </select>
                     </div>
            
                     <?php
            
                     //Put this in a seperate template. Shows the Custom Fields for registration
                     Template::Show('registration_customfields.tpl');
            
                     ?>
                    
                     <div class="form-group">
                             <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                             <div class="g-recaptcha" data-sitekey="6LdnBSwUAAAAAFXzaXSBg-wLj6Kk6uI5W1YDqyrw"></div>
                             <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                     </div>
            
                     <div class="row">
                         <div class="col-xs-8">
                                 <a href="<?php echo url('/login'); ?>">Already have an account</a>
                         </div>
                         <div class="col-xs-4">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Register" />
                         </div>
                         <!-- /.col -->
                     </div>
                 </form>
                 <center style="margin-top: 30px;">
                         <p class="text-muted">CrewCenter by Mark Swan</p>
                 </center>
         </div>
         <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- iCheck -->
<script src="<?php echo SITE_URL?>/lib/skins/crewcenter/plugins/iCheck/icheck.min.js"></script>
<script>
         $(function () {
         $('input').iCheck({
                 checkboxClass: 'icheckbox_square-blue',
                 radioClass: 'iradio_square-blue',
                 increaseArea: '20%' // optional
         });
         });
</script>