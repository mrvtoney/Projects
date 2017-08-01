<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Entity\User;
use AppBundle\Entity\Post;
use AppBundle\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {

	$id = $this->getUser()->getId();

	$posts = $this->getDoctrine()
			->getRepository('AppBundle:Post')
			->findFullPostsByUserID($id);

        // replace this example code with whatever you need
        return $this->render('dashboard/index.html.php', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
	    'user_id' => $id,
	    'posts' => $posts
        ]);
    }

    /**
     * @Route("/post", name="post")
     */
    public function postAction(Request $request, EntityManagerInterface $em)
    {
	if ($request->getMethod() !== "POST") {
                $response = $this->forward('AppBundle:Dashboard:index', array(
                        'user' => $user,
                ));
                return $response;
	}

	$request = $request->request;
	$post = $request->get('post', null);
	
	/*if (!isset($post)) {
		return false;
	}*/

	$user = $this->getUser();

	$newPost = new Post();
	$newPost->setUserID($user->getId());
	$newPost->setPost($post);
	$date = new \DateTime();
	$newPost->setCreatedDate($date);
	$newPost->setUpdatedDate($date);
	
	$em->persist($newPost);
	$em->flush();	

        // replace this example code with whatever you need
        return $this->render('dashboard/index.html.php', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
	    'user_id' => $user->getID()
        ]);
    }
}
