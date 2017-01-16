<?php

namespace BoosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 */
class Offer
{
    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }

    public $fileOffer;

    public function preUploadOffer()
    {
        if (null !== $this->fileOffer) {
            // do whatever you want to generate a unique name
            $this->imageOffer = uniqid() . '.' . $this->fileOffer->guessExtension();
        }
    }

    public function uploadOffer()
    {
        if (null === $this->fileOffer) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileOffer->move($this->getUploadRootDir(), $this->imageOffer);
        unset($this->fileOffer);
    }

    public function removeUploadOffer()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }


    // code généré
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $cp;

    /**
     * @var string
     */
    private $town;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $lat;

    /**
     * @var int
     */
    private $lgt;


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
     * Set title
     *
     * @param string $title
     * @return Offer
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Offer
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return Offer
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Offer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lat
     *
     * @param integer $lat
     * @return Offer
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return integer 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lgt
     *
     * @param integer $lgt
     * @return Offer
     */
    public function setLgt($lgt)
    {
        $this->lgt = $lgt;

        return $this;
    }

    /**
     * Get lgt
     *
     * @return integer 
     */
    public function getLgt()
    {
        return $this->lgt;
    }
    /**
     * @var string
     */
    private $activity;

    /**
     * @var string
     */
    private $wish;


    /**
     * Set activity
     *
     * @param string $activity
     * @return Offer
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string 
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set wish
     *
     * @param string $wish
     * @return Offer
     */
    public function setWish($wish)
    {
        $this->wish = $wish;

        return $this;
    }

    /**
     * Get wish
     *
     * @return string 
     */
    public function getWish()
    {
        return $this->wish;
    }
    /**
     * @var \BoosterBundle\Entity\User
     */
    private $users;


    /**
     * Set users
     *
     * @param \BoosterBundle\Entity\User $users
     * @return Offer
     */
    public function setUsers(\BoosterBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \BoosterBundle\Entity\User 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set imageOffer
     *
     * @param string $imageOffer
     * @return Offer
     */
    public function setImageOffer($imageOffer)
    {
        $this->ImageOffer = $imageOffer;
        return $this;
    }

    /**
     * Get imageOffer
     *
     * @return string
     */
    public function getImageOffer()
    {
        return $this->imageOffer;
    }

    /**
     * @var string
     */
    private $imageOffer;


}
