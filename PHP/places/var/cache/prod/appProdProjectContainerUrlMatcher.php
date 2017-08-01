<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        if (0 === strpos($pathinfo, '/contact')) {
            // contact
            if ('/contact' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\ContactController::indexAction',  '_route' => 'contact',);
            }

            // contact_add
            if ('/contact/add' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\ContactController::addAction',  '_route' => 'contact_add',);
            }

            // contact_remove
            if ('/contact/remove' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\ContactController::removeAction',  '_route' => 'contact_remove',);
            }

        }

        // dashboard
        if ('/dashboard' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\DashboardController::indexAction',  '_route' => 'dashboard',);
        }

        // homepage
        if ('' === $trimmedPathinfo) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\IndecisionController::indexAction',  '_route' => 'homepage',);
        }

        // addplace
        if ('/add_place' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\IndecisionController::addplaceAction',  '_route' => 'addplace',);
        }

        // removeplace
        if ('/remove_place' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\IndecisionController::removeplaceAction',  '_route' => 'removeplace',);
        }

        // register
        if ('/register' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::registerAction',  '_route' => 'register',);
        }

        if (0 === strpos($pathinfo, '/post')) {
            // post
            if ('/post' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\PostController::indexAction',  '_route' => 'post',);
            }

            // post_like
            if ('/post/like' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\PostController::likeAction',  '_route' => 'post_like',);
            }

            // post_comment
            if ('/post/comment' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\PostController::commentAction',  '_route' => 'post_comment',);
            }

        }

        // login
        if ('/login' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
