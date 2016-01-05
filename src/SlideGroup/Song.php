<?php

namespace OpenSongSetCreator\SlideGroup;

class Song extends SlideGroup
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $presentation;

    public function __construct($name, $path, $presentation)
    {
        parent::__construct($name, "song");

        $this->path = (string)$path;
        $this->presentation = (string)$presentation;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }
}