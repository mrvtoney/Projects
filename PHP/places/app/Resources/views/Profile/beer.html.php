<style>
#user_profile_header {
	width: 100%;
	border: 1px solid black;
	border-radius: 12px;
}
#user_profile_picture {
	float:left;
	position: relative;
	height:40px;
	width: 40px;
	border: 1px solid light gray;
	border-radius: 12px;
	margin: 6px
}

#user_profile_picture img {
	height: 40px;
	width: 40px;
}
</style>
<div id="user_profile">
	<div id="user_profile_header">
		<div id="user_profile_picture">
			<img src="<?php echo (isset($user['img_src']) ? $user['img_src'] : 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'); ?>/>
		</div>
		<div id="user_profile_header_data">
			<p id="user_profile_name"><?php echo $user['name']; ?></p>
			<p id="user_profile_username"><?php echo $user['username']; ?></p>
		</div>
	</div>
	<div id="user_profile_statistics">
		<p id="user_profile_statistics_friends"><?php echo $user['contact_count']; ?></p>
		<p id="user_profile_statistics_total_drinks"><?php echo $user['total_drinks']; ?></p>
		<p id="user_profile_statistics_unique_drinks"><?php echo $user['unique_drinks']; ?></p>
	</div>
	<div id="user_profile_details">
		<div id="user_profile_details_address">
			<p><?php echo $user['address']; ?></div>
		</div>
	</div>
</div>
