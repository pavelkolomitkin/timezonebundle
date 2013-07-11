<?php

namespace Brandbury\TimeZoneBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;


class TimeZoneExtention extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('format_date', array($this, 'formatDateFilter'))
        );
    }

    public function formatDateFilter(\DateTime $date, $format, $timeZone)
    {   
        $timeZoneId = '';
        
        if (is_object($timeZone))
        {
            $timeZoneId = $timeZone->getName();
        }
        else
        {
            $timeZoneId = $timeZone;
        }
        
        $formatter = new \IntlDateFormatter(
            $this->container->getParameter('locale'),
            \IntlDateFormatter::FULL,
            \IntlDateFormatter::FULL,
            $timeZoneId,
            \IntlDateFormatter::GREGORIAN,
            $format);
        
        return $formatter->format($date);
        
        
    }
    
    public function getName()
    {
        return 'timeZoneExtention';
    }
}