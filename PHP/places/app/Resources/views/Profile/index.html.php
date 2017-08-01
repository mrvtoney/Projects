
<style>
#user_profile_header,
#user_profile_details {
	width: 100%;
	border: 1px solid black;
	border-radius: 12px;
	height: 89px;
}

#user_profile_details {
	margin-top: 10px;
}
#user_profile_picture {
	float:left;
	position: relative;
	height:75px;
	width: 75px;
	border: 1px solid lightgray;
	border-radius: 9px;
	margin: 6px 10px 5px 4px;
}

#user_profile_picture img {
	height: 70px;
	width: 70px;
	margin: 2px;
}

#user_profile_name {
	text-transform: capitalize;
	font-size: 36px;
	
}

#user_profile_header_data {
	float: left;
	clear: right;
	min-width: 300px;
	
}
#user_profile_header_data p  {
	margin: 10px;
}
#user_profile_statistics {
	clear: right;
}

#user_profile_statistics div {
	border-right: 1px solid lightgray;
	border-radius: 19px;
	width: 60px;
	height: 63px;
	padding: 25px 10px 8px 10px;
	float: left;
	margin-top: -4px;
}
#user_profile_statistics h5 {
	margin: 7px 2px;
}
#user_profile_statistics p {
	margin: 4px 27px;

}
</style>
<div id="user_profile">
	<div id="user_profile_header">
		<div id="user_profile_picture">
			<img src="<?php echo (isset($user['img_src']) ? $user['img_src'] : 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'); ?>">
		</div>
		<div id="user_profile_header_data">
			<div id="user_profile_name">
				<p><?php echo $user['fullname']; ?></p>
			</div>
			<div id="user_profile_username">
				<p><?php echo $user['username']; ?></p>
			</div>
		</div>
	<div id="user_profile_statistics">
		<div id="user_profile_statistics_friends">
			<h5>Alcoholics</h5>
			<p><?php echo $user['contact_count']; ?></p>
		</div>
		<div id="user_profile_statistics_total_drinks">
			<h5>Consumed</h5>
			<p><?php echo $user['total_drinks']; ?></p>
		</div>
		<div id="user_profile_statistics_unique_drinks">
			<h5>Consumed</h5>
			<p><?php echo $user['unique_drinks']; ?></p>
		</div>
	</div>
	</div>
	<div id="user_profile_details">
		<div id="user_profile_details_address">
			<p><?php echo $user['address']; ?></div>
		</div>
	</div>
</div>
