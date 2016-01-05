<?php

namespace OpenSongSetCreator;

use OpenSongSetCreator\Collection\SlideGroupCollection;

class Creator
{
    /**
     * @param $setName
     * @param SlideGroupCollection $slideGroupCollection
     * @return string
     */
    public function createSet($setName, SlideGroupCollection $slideGroupCollection)
    {
        $xml = new \SimpleXMLElement('<set/>');
        $xml->addAttribute("name", $setName);
        $slideGroups = $xml->addChild("slide_groups");

        foreach ($slideGroupCollection as $slideGroup) {
            $slide = $slideGroups->addChild("slide_group");
            $slide->addAttribute("name", $slideGroup->getName());
            $slide->addAttribute("type", $slideGroup->getType());

            switch ($slideGroup->getType()) {
                case "song":
                    $slide->addAttribute("path", $slideGroup->getPath());
                    $slide->addAttribute("presentation", $slideGroup->getPresentation());
                    break;
                case "custom":
                    $slide->addAttribute("print", "true");
                    $slide->addAttribute("seconds", "0");
                    $slide->addAttribute("loop", "false");
                    $slide->addAttribute("transition", "0");
                    $slide->addChild("title", $slideGroup->getName());
                    $slide->addChild("subtitle");
                    $slide->addChild("notes");
                    $slide->addChild("slides")
                          ->addChild("slide")
                          ->addChild("body", $slideGroup->getBody());
            }
        }

        return $xml->asXML();
    }
}