<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\UserType;
use AppBundle\Entity\User;

class UsersController extends Controller{
    public function userAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("admin_homepage"));
        $breadcrumbs->addItem("User management", $this->get("router")->generate("admin_user"));
        $users = $this->get('admin.user.services')->getUser(array('isActive'=>'1'));
        
        return $this->render('AdminBundle:Users:index.html.twig', 
                array('users' => $users));
    }
    public function removeUserAction(Request $request, $userId)
    {
        $userServices = $this->get('admin.user.services');
        if($userId){
            $user = $userServices->getUser(array('id'=>$userId));
            if(!$user){
                throw $this->createNotFoundException('Error occurred');
            }
            $userServices->remove($user);
            return $this->redirect($this->generateUrl('admin_user'));
        }
    }
    public function editUserAction(Request $request, $userId)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("admin_homepage"));
        $breadcrumbs->addItem("User management", $this->get("router")->generate("admin_user"));
        $userServices = $this->get('admin.user.services');
        if($userId){
            $user = $userServices->getUser(array('id'=>$userId));
            
            if(!$user){
                throw $this->createNotFoundException('Error occurred');
            }
            $breadcrumbs->addItem("Edit user", $this->get("router")->generate("admin_user_edit"));
            $operationType = 'editOp';
        }else{
            $breadcrumbs->addItem("Add user", $this->get("router")->generate("admin_user_edit"));
            $user = new User();
            $operationType = 'newOp';
        }  
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($user->getPlainPassword() != 'TempPassword#9'){
                $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
            }
            
            $roles[] = $user->getDummyRoles();
            $user->setRoles($roles);
            $save = $userServices->save($user);
            
            return $this->redirectToRoute('admin_user_edit', array('userId' => $save));
        }
        return $this->render('AdminBundle:Users:crud.html.twig', 
                array('form' => $form->createView(), 'opType'=>$operationType));
         
    }
    public function addAction(Request $request)
    {
        $user = new User();
        $operationType = 'newOp';
        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $roles[] = $user->getDummyRoles();
            $user->setRoles($roles);
            $userServices = $this->get('admin.user.services');
            $save = $userServices->save($user);
            return $this->redirectToRoute('admin_user');
        }
        return $this->render('AdminBundle:Users:crud.html.twig', 
                array('form' => $form->createView(), 'opType'=>$operationType));
    }
}
