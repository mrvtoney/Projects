
<div class="comment_wrapper">
                                <div class="comments_wrapper">
                                        <?php if (isset($comments))  :
                                                foreach($comments as $id => $comment) : ?>
                                                        <div class="comment" >
                                                                <p class="comment_p"><?php echo $comment['comment']; ?>
                                                                </p>
                                                                <div class="comment_footer">
                                                                        <span class="fa-stack fa-m first-icon">
                                                                                <i class="fa fa-square-o fa-stack-2x"></i>
                                                                                <i class="fa fa-beer fa-stack-1x cheers" aria-hidden="true" data-id="<?php echo $comment['id']; ?>"></i>
                                                                                <i class="like_count" aria-hidden="true" ><?php echo $comment['likes']; ?></i>
                                                                        </span>
                                                                        <span class="fa-stack fa-m">
                                                                                <i class="fa fa-square-o fa-stack-2x"></i>
                                                                                <i class="fa fa-beer fa-stack-1x broken fa-rotate-90" aria-hidden="true" data-id="<?php echo $comment['id']; ?>"></i>
                                                                                <i class="dislike_count" aria-hidden="true" ><?php echo $comment['dislikes']; ?></i>
                                                                        </span>

                                                                        <span class="fa-stack fa-m">
                                                                                <i class="fa fa-square-o fa-stack-2x"></i>
                                                                                <i class="fa fa-comment fa-stack-1x" aria-hidden="true" data-id="<?php echo $comment['id']; ?>"></i>
                                                                        </span>
                                                                </div>
                                                        </div>
                                                <?php endforeach; ?>
                                        <?php endif; ?>
                                </div>
                                <div class="comment_actions">
                                <textarea type="text" name="comment" placeholder="Write a comment..." class="comment_area" wrap="hard">
                                </textarea>
                                <button type="button" class="comment_button" data-id="<?php echo $id; ?>" data-parent="<?php echo  0 ?>" >Submit</button>
                                </div>
                        </div>
