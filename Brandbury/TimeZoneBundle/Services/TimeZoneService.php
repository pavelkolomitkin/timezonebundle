<?php

namespace Brandbury\TimeZoneBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use \Brandbury\TimeZoneBundle\Entity\TimeZone;

class TimeZoneService implements \Brandbury\TimeZoneBundle\Services\TimeZone
{
    const DEFAULT_TIME_ZONE_ID = 'Europe/Moscow';
    
    /**
     * @var ContainerInterface
     */
    private $container;
    
    /**     
     * @var TimeZone
     */
    private $currentTimeZone;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * Returns TimeZone by http request
     * @return \Brandbury\TimeZoneBundle\Entity\TimeZone
     */
    private function getHttpRequestTimeZone()
    {
        if (!$this->currentTimeZone)
        {
            $timeZoneRepository = $this
                    ->container
                    ->get('doctrine')
                    ->getManager()
                    ->getRepository('BrandburyTimeZoneBundle:TimeZone');
            
            $request = $this
                    ->container
                    ->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE);
            
            if ($request !== null)
            {
                $timeOffset = $request->get('timeOffset', false);

                if ($timeOffset !== false)
                {
                    $this->currentTimeZone = $timeZoneRepository->findOneBy(array('timeOffset' => $timeOffset));
                }
            }

            if (!$this->currentTimeZone)
            {
                $this->currentTimeZone = $timeZoneRepository
                        ->findOneBy(array('title' => self::DEFAULT_TIME_ZONE_ID));
            }
        }
        
        return $this->currentTimeZone;
    }

    public function getTimeZone()
    {
        $timeZone = $this->getHttpRequestTimeZone();
        
        $result = new \DateTimeZone($timeZone->getTitle());        
        return $result;
    }
    
    public function getTimeZoneLabel()
    {
        $timeZone = $this->getHttpRequestTimeZone();
        return $timeZone->getRussianTitle();
    }
}