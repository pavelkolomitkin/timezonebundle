<?php

namespace Brandbury\TimeZoneBundle\DataFixtures\ORM;

use Brandbury\TimeZoneBundle\Entity\TimeZone;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRussianTimeZones implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $timeZoneInfos = array(
            array('title' => 'Europe/Kaliningrad', 'russianTitle' => 'Калининградское время', 'timeOffset' => 3),
            array('title' => 'Europe/Moscow', 'russianTitle' => 'Московское время', 'timeOffset' => 4),
            array('title' => 'Asia/Yekaterinburg', 'russianTitle' => 'Екатеринбургское время', 'timeOffset' => 6),
            array('title' => 'Asia/Omsk', 'russianTitle' => 'Омское время', 'timeOffset' => 7),
            array('title' => 'Asia/Krasnoyarsk', 'russianTitle' => 'Красноярское время', 'timeOffset' => 8),
            array('title' => 'Asia/Irkutsk', 'russianTitle' => 'Иркутское время', 'timeOffset' => 9),
            array('title' => 'Asia/Yakutsk', 'russianTitle' => 'Якутское время', 'timeOffset' => 10),
            array('title' => 'Asia/Vladivostok', 'russianTitle' => 'Владивостокское время', 'timeOffset' => 11),
            array('title' => 'Asia/Magadan', 'russianTitle' => 'Магаданское время', 'timeOffset' => 12)
        );

        foreach ($timeZoneInfos as $timeZoneInfo)
        {
            $timeZone = new TimeZone();
            $timeZone->setTitle($timeZoneInfo['title']);
            $timeZone->setRussianTitle($timeZoneInfo['russianTitle']);
            $timeZone->setTimeOffset($timeZoneInfo['timeOffset']);

            $manager->persist($timeZone);
        }

        $manager->flush();
    }
}