<?php

namespace BoosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Needs
 */
class Needs
{
//*********************image2**********************/
    public $file2;


    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {

        return null === $this->image2 ? null : $this->getUploadDir().'/'.$this->image2;
    }

    public function getAbsolutePath()
    {

        return null === $this->image2 ? null : $this->getUploadRootDir().'/'.$this->image2;
    }
    public function preUpload2()
    {
        if (null !== $this->file2) {
            // do whatever you want to generate a unique name
            $this->image2 = uniqid().'.'.$this->file2->guessExtension();
        }
    }

    public function upload2()
    {
        if (null === $this->file2) {

            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error

        $this->file2->move($this->getUploadRootDir(), $this->image2);

        unset($this->file2);
    }

    public function removeUpload2()
    {
        if ($file2 = $this->getAbsolutePath()) {
            unlink($file2);

        }
    }

//**************image3*****************/

    public $file3;

    public function preUpload3()
    {
        if (null !== $this->file3) {
            // do whatever you want to generate a unique name
            $this->image3= uniqid().'.'.$this->file3->guessExtension();
        }
    }

    public function upload3()
    {
        if (null === $this->file3) {

            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error

        $this->file3->move($this->getUploadRootDir(), $this->image3);

        unset($this->file3);
    }

    public function removeUpload3()
    {
        if ($file3 = $this->getAbsolutePath()) {
            unlink($file3);

        }
    }

    /**
     * Generate code
    **/


    /**
     * @var integer
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
     * @var string
     */
    private $activity;

    /**
     * @var string
     */
    private $availability;

    /**
     * @var integer
     */
    private $lat;

    /**
     * @var integer
     */
    private $lgt;

    /**
     * @var string
     */
    private $image2;

    /**
     * @var \BoosterBundle\Entity\User
     */
    private $users;


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
     * @return Needs
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
     * @return Needs
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
     * @return Needs
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
     * @return Needs
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
     * Set activity
     *
     * @param string $activity
     * @return Needs
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
     * Set availability
     *
     * @param string $availability
     * @return Needs
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return string 
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set lat
     *
     * @param integer $lat
     * @return Needs
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
     * @return Needs
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
     * Set image2
     *
     * @param string $image2
     * @return Needs
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string 
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set users
     *
     * @param \BoosterBundle\Entity\User $users
     * @return Needs
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
     * @var string
     */
    private $image3;


    /**
     * Set image3
     *
     * @param string $image3
     *
     * @return Needs
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get image3
     *
     * @return string
     */
    public function getImage3()
    {
        return $this->image3;
    }


}
