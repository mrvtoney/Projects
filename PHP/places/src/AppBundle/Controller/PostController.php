<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Entity\User;
use AppBundle\Entity\Post;
use AppBundle\Entity\Likes;
use AppBundle\Entity\Comment;
use AppBundle\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * @Route("/post/index", name="post_index")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {

	$id = $this->getUser()->getId();

	$posts = $this->getDoctrine()
			->getRepository('AppBundle:Post')
			->findPostsByUserID($id);

        // replace this example code with whatever you need
        return $this->render('dashboard/index.html.php', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
	    'user_id' => $id,
	    'posts' => $posts
        ]);
    }

    /**
     * @Route("/post/like", name="post_like")
     */
    public function likeAction(Request $request, EntityManagerInterface $em)
    {
//	if ($request->getMethod() !== "POST") {
//		return new Response(json_encode(array('response' => 'failed')));
//	}

	$request = $request->request;
	$id = $request->get('id', null);
	$type = $request->get('type', null);
	$approval = $request->get('approval', null);
	$approval = (($approval == 1) ? TRUE : FALSE);

	$user = $this->getUser();
	$userId = $user->getId();

	
	//Check if place already exists
	$likesRepo = $em->getRepository('AppBundle:Likes');
	$likes = $likesRepo->findOneBy(
			array('userid' => $userId,
			      'associatedid' => $id,
			      'approval' => $approval,
			      'type' => $type)
	);

	if (!$likes) {
		// check if it exists for the opposite rating
		$otherLikes = $likesRepo->findOneBy(
					array('userid' => $userId,
					      'associatedid' => $id,
					      'approval' => (($approval == TRUE) ? FALSE : TRUE), //checking if the opposite rating exist for user
					      'type' => $type)
		);
		if ($otherLikes) {
			$em->remove($otherLikes);
			$em->flush();
		}
	
		$like = new Likes();
		$like->setUserID($userId);
		$like->setType($type);
		$like->setAssociatedID($id);
		$like->setApproval($approval);
		$date = new \DateTime();
		$like->setCreatedDate($date);
		$em->persist($like);
		$em->flush();	
	} else {
		$em->remove($likes);
		$em->flush();
	}

	$repo = $em->getRepository('AppBundle:Likes');
	switch ($type) {
		case 'comment' :
			$likes = $repo->findTotalLikesByCommentId($id);
			break;
		case 'post' :
			$likes = $repo->findTotalLikesByPostId($id);
			break;
		case 'event' :
			$likes = $repo->findTotalLikesByPostId($id);
			break;
		default :
			$likes = null;
			break;
	}

	$likeCount = 0;
	if (!empty($likes)) {
		$likeCount = $likes[0]['likes'];	
		$dislikeCount = $likes[0]['dislikes'];	
	}

	return new Response(json_encode(array('response' => 'success', 'likes' => $likeCount, 'dislikes' => $dislikeCount)));
    }

    /**
     * @Route("/post/comment", name="post_comment")
     */
    public function commentAction(Request $request, EntityManagerInterface $em)
    {
	if ($request->getMethod() !== "POST") {
		return new Response(json_encode(array('response' => 'failed')));
	}

	$request = $request->request;
	
	$user = $this->getUser();
	$userId = $user->getId();
	$postId = $request->get('id', null);
	$text = $request->get('comment', null);
	if (!isset($text, $postId, $userId)) {
		return new Response(json_encode(array('response' => 'failed')));
	}

	$parentId = $request->get('parentId', 0);
	
	$comment = new Comment();
	$comment->setUserID($userId);
	$comment->setType('post');
	$comment->setAssociatedID($postId);
	$comment->setParentID($parentId);
	$comment->setComment($text);

	$date = new \DateTime();
	$comment->setCreatedDate($date);

	$em->persist($comment);
	$em->flush();	

	return new Response(json_encode(
				array('response' => 'success', 
				      'comment' => 
						array('id' => $comment->getId(),
						      'parent' => $comment->getParentID(),
						      'assoc' => $comment->getAssociatedID(),
						      'text' => $comment->getComment())
					)
	));
    }
}
