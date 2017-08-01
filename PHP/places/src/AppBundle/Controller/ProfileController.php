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

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {

	$id = $this->getUser()->getId();

	$user = $this->getDoctrine()
			->getRepository('AppBundle:User')
			->findUserDetailByUserID($id);

	$user = $user[0];
	$user['address'] = $user['street'] . ' ' . $user['city'] . ' ' . $user['state'] . ' ' . $user['zip'] . ' ' . $user['country']; 
        return $this->render('profile/index.html.php', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
	    'user' => $user
        ]);
    }

    /**
     * @Route("/profile/beer", name="profile_beer")
     */
    public function beerAction(Request $request, EntityManagerInterface $em)
    {
	if ($request->getMethod() !== "POST") {
                $response = $this->forward('AppBundle:Dashboard:index', array(
                        'user' => $user,
                ));
                return $response;
	}

	$request = $request->request;
	$post = $request->get('post', null);

        // replace this example code with whatever you need
        return $this->render('profile/beer.html.php', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
	    'user_id' => $user->getID()
        ]);
    }

    /**
     * @Route("/profile/wine", name="profile_wine")
     */
    public function removeAction(Request $request, EntityManagerInterface $em)
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
