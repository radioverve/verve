<?php
/*                                                                                                                                                                                 
Template Name: UploadMusic
*/
//wp_enqueue_script('jqmodal','/new/wp-includes/js/jquery/jqModal.js',array('jquery-latest'));
if(!is_user_logged_in()){
wp_enqueue_script('thickbox','/new/wp-includes/js/jquery/thickbox-compressed.js',array('jquery-latest'));
}
?>

<script>
function clicked_checkbox(){
    //alert("What is happening?");
    document.getElementById("regsubbutton").disabled=!document.getElementById("regsubbutton").disabled;
}
</script>

<?
get_header();
?>

<?
if(!is_user_logged_in()){
    echo("<link rel=\"stylesheet\" href=\"/new/wp-content/themes/verve/thickbox.css\" type=\"text/css\" media=\"screen\" />");
    get_modal_login();
}
?>
        <div id="content">
	    <div id="plainContentTop"></div>
	    <div id="plainContentMiddle">
                <? if(!is_user_logged_in()) { ?>
                    <h2> Please Log In or Register to upload your music.</h2>
		    <a href="/new/login?height=200&width=300" title="Login" class="thickbox">Login or Register now</a>  
                    <!-- <div class="jqmWindow" id="ex2">
                        Please wait... <img src="/images/rotatingclock-slow.gif" alt="loading" />
                    </div>-->
                <? }else{ ?>
                <div id="pagecontent">
                    <?
                        global $userdata;
                        get_currentuserinfo();
                        $errors=NULL;
                        if(isset($_POST["artistname"])||isset($_POST["firstname"])||isset($_POST["lastname"])||isset($_POST["email"])||isset($_POST["phonenumber"])||isset($_POST["address"])){
                            if(!isset($_POST["artistname"])||$_POST["artistname"]==''){
                                $errors = new WP_Error();
                                $errors->add('empty_username', __('<strong>ERROR</strong>: Please enter a username.'));
                            }
                            if(!isset($_POST["firstname"])||$_POST["firstname"]==''){
                                if(!$errors)
                                    $errors = new WP_Error();
                                $errors->add('empty_firstname', __('<strong>ERROR</strong>: Please enter a First Name.'));
                            }
                            if(!isset($_POST["lastname"])||$_POST["lastname"]==''){
                                if(!$errors)
                                    $errors = new WP_Error();
                                $errors->add('empty_lastname', __('<strong>ERROR</strong>: Please enter a Last Name.'));
                            }
                            if(!isset($_POST["email"])||$_POST["email"]==''||!is_email($_POST["email"])){
                                if(!$errors)
                                    $errors = new WP_Error();
                                
                                $errors->add('empty_email', __('<strong>ERROR</strong>: Please enter a valid email.'));
                            }
                            if(!isset($_POST["phonenumber"])||$_POST["phonenumber"]==''){
                                if(!$errors)
                                    $errors = new WP_Error();
                                
                                $errors->add('empty_firstname', __('<strong>ERROR</strong>: Please enter a phone number.'));
                            }
                            if(!isset($_POST["address"])||$_POST["address"]==''){
                                if(!$errors)
                                    $errors = new WP_Error();
                                
                                $errors->add('empty_firstname', __('<strong>ERROR</strong>: Please enter a phone number.'));
                            }
                            
                            if(is_wp_error($errors)){
                                echo("<div class=\"error\">" . $errors->get_error_message() . "</div>");
                            }else{
                                //cho("What the fuck is happening?");
                                //$wpdb->show_errors();
                                insert_artist($userdata->ID);
                                //$wpd
                            }
                        }
                        
                        
                        //echo($userdata->ID);
                        if(is_not_registered_artist($userdata->ID)){
                            show_first_artist_reg_page($userdata->ID,TRUE);
                            //echo(get_option("site_url"));
                        }else {
                            show_registered_artists($userdata->ID);
                            show_first_artist_reg_page($userdata->ID,FALSE);
                        }
                    ?>
                    <? } ?>
                </div>
            </div>
            <div id="plainContentBottom"></div>
	</div>	
									
    </div>		
</div>

<!--Middle section END-->
<?php get_footer(); ?>