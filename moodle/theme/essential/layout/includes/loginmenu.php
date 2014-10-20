<script >
	 <!--
	  
	   $(window).load(function() {
    
	 
	 
	 	$('#password-clear').show();
	$('#password-password').hide();
 
	$('#password-clear').focus(function() {
		$('#password-clear').hide();
		$('#password-password').show();
		$('#password-password').focus();
	});
	$('#password-password').blur(function() {
		if($('#password-password').val() == '') {
			$('#password-clear').show();
			$('#password-password').hide();
		}
	});
 
	$('.default-value').each(function() {
		var default_value = this.value;
		$(this).focus(function() {
			if(this.value == default_value) {
				this.value = '';
			}
		});
		$(this).blur(function() {
			if(this.value == '') {
				this.value = default_value;
			}
		});
	});
	 
});
		 -->
	 </script>

<?php
if (isloggedin()) {
                        echo '<table id="userinfo"><tbody><tr><td>
								<div class="name shadow big">'.$USER->firstname.' '.$USER->lastname.' </div>
								</td><td rowspan="2">'; 
								echo html_writer::tag('div', $OUTPUT->user_picture($USER, array('size'=>45)), array('class'=>'userimg'));
								
								echo '</td>
								</tr>
								<tr>
								<td>
									<div class="name">
										
										<a href="'.$CFG->wwwroot.'/user/profile.php?userid='.$USER->id.'"><span >'.get_string('myprofile', 'moodle').'</span></a>  &nbsp; 
										&nbsp; &nbsp;
										<a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='.sesskey().'" class="logout"><span >'.get_string('logout', 'moodle').'</span></a>
										
										&nbsp; 
										&nbsp; &nbsp;
										
									  ';	
						
						 	if(IsSet($USER->editing) && $USER->editing==1){
								echo '[ <a href="'.$CFG->wwwroot.'/course/view.php?id=1&sesskey='.sesskey().'&edit=off">Wyłącz tryb edycji</a> ]';
							}
							else {
						 		if(is_siteadmin()){
									echo '[ <a href="'.$CFG->wwwroot.'/course/view.php?id=1&sesskey='.sesskey().'&edit=on">Włącz tryb edycji</a> ]';
								}	
							} 
						
							  echo '			
										
									</div>
								</td>
								</tr>
								
								</tbody>
								</table>';
                        
                    }  else {
                        echo '<table id="userinfo"><tbody>
								
								<tr><td>
								<div class="name shadow big">'.get_string('loggedinnot', 'moodle').'</div>
								</td>
								</tr>
								
								<tr>
								<td>
									
								  
										';
														
	echo '<div ><form id="form1" name="form1" class="login"  method="post" action="'.$CFG->wwwroot.'/login/index.php">

	 
	 <div style="float: left;">

    <input class="default-value input login" type="text" name="username" value="'.get_string('username').'" />

</div>

<div style="float: left; margin-left: 5px; margin-right: 5px;">

    <input id="password-clear" type="text" value="'.get_string('password').'" autocomplete="off" class="input pass"  />

    <input id="password-password" type="password" name="password" value="" autocomplete="off" class="input pass" style="display: none;"  />

</div>

	 
  
    <input  type="submit" name="button" id="button" class="submit" value="'.get_string('login').'" />
  
  <input type="hidden" name="sesskey"  value="'.sesskey().'">	
</form>
</div>

<div class="lite">


									
<a href="'.$CFG->wwwroot.'/login/forgot_password.php">&raquo; '.get_string('passwordforgotten').'</a>


<a href="'.$CFG->wwwroot.'/login/signup.php">&raquo; '.get_string('newaccount').'</a>

<div style="clear: both;"></div>
</div>';
										 echo "
										
										<script>
										<!--
										function switchto(q){
										    if (q){
										        document.getElementById('passwordtext').style.display=\"none\";
										        document.getElementById('password').style.display=\"inline\";
										        document.getElementById('password').focus();
										    } else {
										        document.getElementById('password').style.display=\"none\";
										        document.getElementById('passwordtext').style.display=\"inline\";
										    }
										}
										function clear_field(field,text){
										if(field.value==text){
										    field.value = '';
										    }
										}
										function revert_field(field,text){
										if(field.value==''){
										    field.value = text;
										    }
										} 
										// -->
										</script>
										
										";
										echo '
									
								</td>
								</tr>
								</tbody>
								</table>';
                    } ?>