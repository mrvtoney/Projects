<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Entity\Place;

class IndecisionController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {

	if ($this->isGranted('ROLE_USER') == false) {
	$this->redirectToRoute('login');
	}

	//Grab all existing places
	$places = $em->getRepository('AppBundle:Place')
		->findAll();
	
        // replace this example code with whatever you need
        return $this->render('indecision/index.html.php', array(
	    'places' => $places
        ));
    }

    /**
     * @Route("/add_place", name="addplace")
     */
    public function addplaceAction(Request $request, EntityManagerInterface $em)
    {
	$name = $request->request->get('name', null);
	$address = $request->request->get('address', null);
	if (!isset($name, $address)) {
		return new Response(json_encode(array('code' => 500)));
	}

	//Check if place already exists
	$placeRepo = $em->getRepository('AppBundle:Place');
	$place = $placeRepo->findBy(
			array('name' => $name,
			      'address' => $address)
	);

	//Place does exist so return add error
	if ($place) {
		return new Response(json_encode(array('code' => 300)));
	}
	
        //Place does not exist so create it
	$place = new Place();
	$place->setName($name);
	$place->setAddress($address);
	
	$em->persist($place);
	$em->flush();

	return new Response(json_encode(array('code' => 200)));
    }


    /**
     * @Route("/remove_place", name="removeplace")
     */
    public function removeplaceAction(Request $request, EntityManagerInterface $em)
    {
	$name = $request->request->get('name', null);
	$address = $request->request->get('address', null);
	if (!isset($name, $address)) {
		$response = new Response(json_encode(array('code' => 500)));
		$response = $response->headers->set('Content-Type', 'application/json');
		return $response;
	}

	$placeRepo = $em->getRepository('AppBundle:Place');
	$place = $placeRepo->findOneBy(
			array('name' => $name,
			      'address' => $address)
	);

	if ($place) {
		$em->remove($place);
		$em->flush();
		$response = new Response(json_encode(array('code' => 200)));
		$response = $response->headers->set('Content-Type', 'application/json');
		return new Response(json_encode(array('code' => 200)));
	}
	
	$response = new Response(json_encode(array('code' => 500)));
	$response = $response->headers->set('Content-Type', 'application/json');
	return new Response(json_encode(array('code' => 200)));
    }
}
