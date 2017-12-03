<?php

namespace Websolutio\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Websolutio\DemoBundle\Entity\Tracks;
use Websolutio\DemoBundle\Form\TracksType;

/**
 * Tracks controller - display all tracks
 */
class TracksController extends Controller
{

    /**
     * Lists all Tracks entities by locale from request
     */
    public function indexAction(Request $request)
    {
		$request = $this->getRequest()->getLocale();
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT t FROM WebsolutioDemoBundle:Tracks t WHERE t.language = ?1 ORDER BY t.id DESC");
        $query->setParameter(1, $request); 
        $query->setMaxResults(10);
		$entities = $query->getResult();

        return $this->render('WebsolutioDemoBundle:Tracks:index.html.twig', array(
            'entities' => $entities,
        ));
    }

}
