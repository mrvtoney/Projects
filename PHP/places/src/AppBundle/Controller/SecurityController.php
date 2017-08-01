<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Entity\User;
/*use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\User\User;
*/
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request,  EntityManagerInterface $em, AuthenticationUtils $authUtils)
    {
/*	    if ($request->getMethod() == "POST") {
		$response = $this->forward('AppBundle:Dashboard:index', array(
			'user' => $user,
		));
	    	return $response;
	    }

	    $username = $request->request->get('username', null);
	    $userRepo= $em->getRepository('AppBundle:User');
	    $user = $userRepo->findBy(
				array('username' => $username)
	    );

	    if(!$user) {
		$error = "Invalid username and password";
	    }

	    $defaultEncoder = new MessageDigestPasswordEncoder('bcrypt', true, 5000);

	    $encoders = array(
		User::class => $defaultEncoder
	    );

	    $encoderFactory = new EncoderFactory($encoders);
	    $validPassword = $encoder->isPasswordValid(
		$user->getPassword(),
		$password,
		$user->getSalt()
	    );

	    if ($validPassword == FALSE) {
	    }
		
    	    $this->getUser() = $user();

*/
	    // get the login error if there is one
	    $error = $authUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authUtils->getLastUsername();

	    return $this->render('security/login.html.php', array(
		'last_username' => $lastUsername,
		'error'         => $error,
	    ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request, AuthenticationUtils $authUtils, EntityManagerInterface $em)
    {
	    //If it is not a post redirect the user to register
	    if ($request->getMethod() !== "POST") {
	    	return $this->render('security/register.html.php');
	    }

	    $firstname = $request->request->get('firstname', null);
	    $lastname = $request->request->get('lastname', null);
	    $email = $request->request->get('email', null);
	    $username = $request->request->get('username', null);
	    $password = $request->request->get('password', null);
	    if (!isset($username, $password)) {
		$error = "Please enter a username and password";
		return $this->render('security/register.html.php', array(
		      'error'         => $error,
		));

	    }

            //Check if the user exists
	    $userRepo = $em->getRepository('AppBundle:User');
	    $user = $userRepo->findBy(
				array('username' => $username)
	    );

	    //If User exists then return exists error
	    if ($user) {
		$error = "User already exists";
		return $this->render('security/register.html.php', array(
		      'error'         => $error,
		));
            }

	    //Create new user
	    $user = new User();
            $user->setUsername($username);
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
	    $user->setIsActive(true);

	    $password = $this->get('security.password_encoder')
			     ->encodePassword($user, $password);
	    $user->setPassword($password);
	    
	    $roles = $user->getDummyRoles();
		$roles = array();
	    $user->setRoles($roles);

            $em->persist($user);
		    $em->flush();
	    //Redirect to the main app
	    return $this->redirect($this->generateUrl('dashboard'));
    }
}
