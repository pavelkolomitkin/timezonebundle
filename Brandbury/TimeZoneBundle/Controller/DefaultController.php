<?php

namespace Brandbury\TimeZoneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrandburyTimeZoneBundle:Default:index.html.twig', array());
    }
    
    public function detectAction($timeOffset)
    {
        $timeZone = $this->get('timezone')->getTimeZone();
        $timeZoneLabel = $this->get('timezone')->getTimeZoneLabel();
        
        return $this->render('BrandburyTimeZoneBundle:Default:info.html.twig', array(
            'timeZoneId' => $timeZone->getName(),
            'timeZoneTitle' => $timeZoneLabel,
            //'dateFormat' => 'EEEE, dd MMMM',
            'dateFormat' => 'EEEE, dd MMMM H:m:s',
            'timeZone' => $timeZone,
            'date' => new \DateTime()
        ));
    }
}
