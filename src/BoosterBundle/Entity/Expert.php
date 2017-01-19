<?php

namespace BoosterBundle\Entity;

/**
 * Expert
 */
class Expert
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $expertText;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set expertText
     *
     * @param string $expertText
     *
     * @return Expert
     */
    public function setExpertText($expertText)
    {
        $this->expertText = $expertText;

        return $this;
    }

    /**
     * Get expertText
     *
     * @return string
     */
    public function getExpertText()
    {
        return $this->expertText;
    }
}

