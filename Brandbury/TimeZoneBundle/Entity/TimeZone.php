<?php

namespace Brandbury\TimeZoneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeZone
 *
 * @ORM\Table(name="timezone")
 * @ORM\Entity
 */
class TimeZone
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="timeOffset", type="smallint")
     */
    private $timeOffset;

    /**
     * @var string
     *
     * @ORM\Column(name="russianTitle", type="string", length=255)
     */
    private $russianTitle;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TimeZone
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set timeOffset
     *
     * @param integer $timeOffset
     * @return TimeZone
     */
    public function setTimeOffset($timeOffset)
    {
        $this->timeOffset = $timeOffset;
    
        return $this;
    }

    /**
     * Get timeOffset
     *
     * @return integer 
     */
    public function getTimeOffset()
    {
        return $this->timeOffset;
    }

    /**
     * Set russianTitle
     *
     * @param string $russianTitle
     * @return TimeZone
     */
    public function setRussianTitle($russianTitle)
    {
        $this->russianTitle = $russianTitle;
    
        return $this;
    }

    /**
     * Get russianTitle
     *
     * @return string 
     */
    public function getRussianTitle()
    {
        return $this->russianTitle;
    }
}