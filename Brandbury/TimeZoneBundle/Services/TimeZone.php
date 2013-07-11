<?php

namespace Brandbury\TimeZoneBundle\Services;

interface TimeZone
{
    /**
     * Returns user's timezone
     *
     * @return \DateTimeZone
     */
    public function getTimeZone();

    /**
     * Returns russian name of user's timezone
     *
     * @return string
     */
    public function getTimeZoneLabel();
}