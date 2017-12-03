<?php

namespace Websolutio\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/* 
 * Main application controller triggerd when user enter home page
 */ 
class MainController extends Controller
{
	
	/*
	 * Homepage switcher. Detects user locale and add it as parameter to url (e.g. /en) which is ready by controllers from request
	 */ 
	public function startAction(Request $request)
    {
		$request = $this->getRequest();
		$locale = $request->getLocale();

		if ($locale == 'en') {
			return $this->redirect($this->generateUrl('websolutio_demo_homepage', array('_locale' => 'en')));
		} elseif ($locale == 'pl') {
			return $this->redirect($this->generateUrl('websolutio_demo_homepage', array('_locale' => 'pl')));
		} elseif ($locale == 'ro') {
			return $this->redirect($this->generateUrl('websolutio_demo_homepage', array('_locale' => 'ro')));
		} elseif ($locale == 'cz') {
			return $this->redirect($this->generateUrl('websolutio_demo_homepage', array('_locale' => 'cz')));
		} else {
			return $this->redirect($this->generateUrl('websolutio_demo_homepage', array('_locale' => 'en')));
		}
		
        return $this->redirect($this->generateUrl('websolutio_demo_homepage'));
    }  
        
    /**
     * Display layout.
     *
     */
       
    public function indexAction()
    {
        return $this->render('WebsolutioDemoBundle:Main:index.html.twig');
    }
}
