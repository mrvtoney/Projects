<?php $view->extend('base.html.php');?>
<?php $view['slots']->start('body');?>
<style>
.post_footer .icon-stack {
	margin-top:8px !important;
	margin-left: 9px !important;
}
.post_footer .dislike_count {
	margin-top:2px;
}
.icon-stack {
	margin-left: 9px !important;
}
.first-icon {
	margin-left: 30px !important;
}
.comment_actions {
	height: 40px;
}
.post_footer,
#create_post_footer,
#create_post_header {
	border: 1px solid lightgray;
	width: 100%;
}

.broken {
	margin: -2px 0px 0px 0px !important;
}

.fa-beer,
.fa-comment {
	color: #ff9933;
	text-shadow: 1px 1px 1px #cc6600;
	margin-left: -1px;
	margin-top: -1px;
}
.dislike_count,
.like_count {
	margin: -4px 0px 0px 27px;
	font-size: 9px;
	color: #cc6600;;
	float:left;
}
.fa-stack {
	margin: 8px -2px !important;
}
.fa-comment {
	margin: -2px 0px;
}

.comment {
	margin-left: 11px !important;
}
.comment_wrapper {
	width: 100%;
	min-height: 45px;
}
.comment_wrapper button {
	margin: 7px 0px;
	float:left;
	height: 25px;
}
.comment_wrapper textarea {
	width: 87%;
	overflow: hidden;
	height: 25px;
	margin: 7px 0px 7px 5px;
	float:left;
}

.comment_wrapper textarea::placeholder {
	margin: 2px 4px !important;
	vertical-align: top !important;
	line-height: normal;
	padding: 2px !important;
}
.comment .fa-stack {
	margin-top: 0px !important;
	margin-right: 10px !important;
}
.fa-square-o {
	color: #663300;
}

.post_footer {
	height: 30px;
	padding: 1px 4px;
}

#create_post,
.post {
	width: 80%;
	border: 1px solid black;
	border-radius: 3px !important;
	box-shadow: 3px 5px 14px;
}
#create_post {
	min-height: 271px;
}
.post {
	min-height: 150px;
}

#posts {
	margin-top: 20px;
}

.post {
	margin-top: 15px;
}
.post p {
	margin: 10px;
}

#create_post_wrapper {
	height: 220px;
}
#create_post_post {
	height: 220px !important;
	width: 100% !important;
}

textarea::placeholder {
	color: lightgray;
	padding: 10px !important;
	vertical-align: top;
	margin: 10px !important;
	line-height: normal;
}

.comment_wrapper textarea::placeholder {
	margin: 2px 4px !important;
	vertical-align: top !important;
	line-height: normal;
}
input::placeholder,
#create_post_post::placeholder,
#create_post_post::-webkit-input-placeholder,
#create_post_post:-moz-placeholder,
#create_post_post::-moz-placeholder,
#create_post_post:-ms-input-placeholder, 
#create_post_post::-ms-input-placeholder { 
	margin: 10px;
	padding: 10px;
	color: green !important;
}
</style>
<script type="text/javascript">
jQuery(document).on('click', '.comment .cheers, .comment .broken', function() {
		var obj = this;
		var id = jQuery(this).attr('data-id');
		if (id == null) {
			return false;
		}
		var approval = 1;
			console.log(jQuery(this).hasClass('broken'));
		if (jQuery(this).hasClass('broken')) {
			approval = 0;
		}

		var dataObj = {};
		dataObj['id'] = id;
		dataObj['type'] = 'comment';
		dataObj['approval'] = approval;
		jQuery.ajax({
                        url: 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/app_dev.php/post/like',
                        type: 'POST',
                        data: dataObj,
                        success: function(data) {
                                var data = jQuery.parseJSON(data);
                                var code = data['response'];
				if (code == 'success') {
					var parent = jQuery(obj).parent().parent();
					jQuery(parent).find('.like_count').html(data['likes']);			
					jQuery(parent).find('.dislike_count').html(data['dislikes']);			
				}
                        }
                });
		
	});	

jQuery(document).on('click, '.comment fa-comment', function() {


});
jQuery(document).ready(function() {
	jQuery('.post_footer .cheers, .post_footer .broken').click(function() {
		var obj = this;
		var id = jQuery(this).attr('data-id');
		if (id == null) {
			return false;
		}

		var approval = 1;
			console.log(jQuery(this).attr('class'));
		if (jQuery(this).hasClass('broken')) {
			approval = 0;
		}

		var dataObj = {};
		dataObj['id'] = id;
		dataObj['type'] = 'post';
		dataObj['approval'] = approval;
		jQuery.ajax({
                        url: 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/app_dev.php/post/like',
                        type: 'POST',
                        data: dataObj,
                        success: function(data) {
                                var data = jQuery.parseJSON(data);
                                var code = data['response'];
				console.log(data);
				console.log(code);
				if (code == 'success') {
					jQuery(obj).parent().find('.like_count').html(data['likes']);			
					jQuery(obj).parent().find('.dislike_count').html(data['dislikes']);			
				}
                        }
                });
		
	});	

	jQuery('.comment_button').click(function() {
		var obj = this;
		var id = jQuery(this).attr('data-id');
		var comment = jQuery(this).parent().find('.comment_area').val();
console.log(jQuery(this).parent().find('.comment_area'));
		var parent = jQuery(this).attr('data-parent');
		if (id == null) {
			return false;
		}

		var dataObj = {};
		dataObj['id'] = id;
		dataObj['parentId'] = parent;
		dataObj['comment'] = comment;
		dataObj['approval'] = approval;
		jQuery.ajax({
                        url: 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/app_dev.php/post/comment',
                        type: 'POST',
                        data: dataObj,
                        success: function(data) {
                                var data = jQuery.parseJSON(data);
                                var code = data['response'];
console.log(data);
				if (code == 'success') {
					var pObj = jQuery(
						"<div class='comment'>" +
							"<p class='comment_p' data-id='" + data['comment']['id'] + "' data-parent='" + data['comment']['parent'] + "'>" + data['comment']['text'] + "</p>" +
							"<span class='fa-stack fa-m'>" +
								"<i class='fa fa-square-o fa-stack-2x'></i>" +
								"<i class='fa fa-beer fa-stack-1x cheers' aria-hidden='true' data-id='" + data['comment']['id'] + "'></i>" +
								"<i class='like_count' aria-hidden='true' >0</i>" +
							"</span>" +
							
							"<span class='fa-stack fa-m comment'>" +
								"<i class='fa fa-square-o fa-stack-2x'></i>" +
								"<i class='fa fa-comment fa-stack-1x cheers' aria-hidden='true' data-id='" + data['comment']['id'] + "'></i>" +
							"</span>" +
						"</div>");//.css('min-height', '55px');
					var objHeight = jQuery(obj).parent().parent().find('.comment_wrapper').height();
console.log(jQuery(obj).parent().parent().find('.comment_wrapper'));
console.log(objHeight);
					
					console.log(jQuery(pObj));
					console.log(jQuery(pObj).height());
					var newObj = jQuery(obj).parent().height();
console.log( (newObj + objHeight) + 50);
					//jQuery(obj).parent().parent().find('.comment_wrapper').css('height', ((newObj +objHeight) + 10) + 'px');
					jQuery(obj).parent().parent().parent().find('.comments_wrapper').append(pObj);			
						console.log(jQuery(pObj).height());
					var height = jQuery(pObj).height();
					jQuery(obj).parent().parent().find('.comment_wrapper').css('height', ((height + objHeight) + 10 ) + 'px');
					console.log(jQuery(obj).parent().height());
					jQuery(obj).parent().find('textarea').val('');
					console.log(jQuery(obj).parent().find('.comment_p').height());
				}
                        }
                });

	});

	jQuery('#posts').resize(function() {
		if (jQuery(this).height() > 400) {
			jQuery(this).css('height', 'auto');
		}
	});
});
</script>
<form action="<?php echo $view['router']->path('post') ?>" method="post">
<div id="create_post">
	<div id="create_post_header">
		<button id="create_post_button" type="submit">Create Post</button>
	</div>
	<div id="create_post_wrapper">
		<textarea type="text"  name="post" placeholder="Post here" value="" id="create_post_post" ></textarea>
	</div>
	<div id="create_post_footer">
		<p id="create_post_footer_tag"></p>
	</div>
</div>
</form>
<div id="posts">
	<?php if (!empty($posts)) :
		foreach ($posts as $id => $post) : ?>
		<div class="post">
			<div class="post_header">
			</div>
			<div class="post_wrapper">
				<p id="post_post"><?php echo $post['post']; ?></p>
			</div>
			<div class="post_footer" >
				<span class="fa-stack fa-m">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-beer fa-stack-1x cheers" aria-hidden="true" data-id="<?php echo $post['id']; ?>"></i>
					<i class="like_count" aria-hidden="true" ><?php echo $post['likes']; ?></i>
				</span>
				<span class="fa-stack fa-m icon-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-beer fa-stack-1x broken fa-rotate-90" aria-hidden="true" data-id="<?php echo $post['id']; ?>"></i>
					<i class="dislike_count" aria-hidden="true" ><?php echo $post['dislikes']; ?></i>
				</span>
				<p id="post_footer_tag"></p>
			</div>
			<?php echo $view->render('Comment/index.html.php',
						array('comments' => (isset($post['comments']) ? $post['comments'] : array()),
						      'id' => $post['id'])
			);?>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
<?php $view['slots']->stop();?>
