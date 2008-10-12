<?php
/*
Template Name: ArtistInfo
*/
?>
<?php

$params = explode("/", $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//echo($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//print_r($params);
$key = $params[3];
//$key = str_replace("-","_",$key);


//$sql = "SELECT * FROM  $wpdb->users  WHERE user_nicename='$key'";
global $gnrb_table_artist;
$sql = "Select id,name from $gnrb_table_artist where nicename='$key'";
$res = $wpdb->get_results($sql);
//print_r($key);
$userid=0;
foreach( $res as $row ) {
//echo $row->id;
$content = gnrvp_get_band_info($row->id,$name);
$player_code= get_player_code($row->id);
$events = gnrvp_get_artist_events($row->id);
}

if($key == "")
{ $content = ""; $band_name = ""; }
?>
<?php get_header(); ?>

	
	<!--	<div id="shoutbox" class="sidebarBox">-->
	<!--		xx-->
	<!--	</div>-->
	<!--<div id="sidebar" style="border: 1px solid red;margin: 95px 5px 0 5px;width: 200px;height: 200px;float: right;">-->
	<!--	<strong>You will like these as well</strong>-->
	<!--	<?php wp_related_posts(); ?>-->
	<!--</div>-->
	
	
						
	<div id="content">		
		<div id="contentleft">
			<h1 class="artistTitle"><?php the_title(); ?></h1>
			<p>
				<?php if($content["Band-Icon"]) ?>
					<div class="profile_photo"><img src="<?php echo($content["Band-Icon"]); ?>" alt="Artist Icon" /></div>
			</p>
			<p style="clear:both;padding-top:5px;">
				<?php echo $player_code; ?>
			</p>
			<div>
				<h3>Bio</h3>
				<?php echo(str_replace("\n", "<br />", $content["Bio"]));?>
			</div>
			
			<p>
				<?php	if($content["Pictures"]){ ?>
					<h3>Photos</h3>
					<?php foreach($content["Pictures"] as $picture){ ?>
						<div class="profile_photo artist_pictures"><img  src="<?php echo get_option("gnrb_band_pics_path") . $picture->field_value;?>" alt="Artist Image" /></div>
					<?php }?>
				<?php } ?>
			</p>
			<p class="postmetadata alt">
				<small>						
					<div style="margin:10px 10px 20px;">
						<?php comments_template(); ?>
					</div>							
				</small>
			</p>
			
		</div>
		
		<div id="sidebar">
			<!--Sidebar:shoutbox START-->
			<div class="shoutbox">
				<div class="widgetarea">
					<h3> Upcoming Events</h3>
					
					<?php
						if($events){
							echo("<ul>");
							foreach($events as $result){
							       echo("<li><b>$result->show_title</b><div>$result->show_venue, $result->show_date, $result->show_time<div><div>$result->show_locale</div></li>");
							}
							echo("</ul>");
						}else{
							echo("<b>No Upcoming Shows</b>");
						}
						
					?>
				</div>
				<?php if($content["Band-Members"]){ ?>
				<div class="widgetarea">
					<h3>Members</h3>
					<ul>
					<?php foreach($content["Band-Members"] as $members){?>
						<li><b><?php echo($members->member_name);?></b><div><small><?php echo $members->member_type; ?></small></div></li>
					<?php }?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>	
	</div>
	
<?php get_footer(); ?>

