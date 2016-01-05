<?php

namespace OpenSongSetCreator\SlideGroup;

class Custom extends SlideGroup
{
    /**
     * @var string
     */
    private $body;

    /**
     * Custom constructor.
     * @param string $name
     * @param string $body
     */
    public function __construct($name, $body)
    {
        parent::__construct($name, "custom");

        $this->body = (string)$body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

}