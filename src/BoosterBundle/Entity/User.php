<?php

namespace BoosterBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
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

    // image identity

    public $fileIdentity;

    public function preUploadIdentity()
    {
        if (null !== $this->fileIdentity) {
            // do whatever you want to generate a unique name
            $this->imageIdentity = uniqid() . '.' . $this->fileIdentity->guessExtension();
        }
    }

    public function uploadIdentity()
    {
        if (null === $this->fileIdentity) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileIdentity->move($this->getUploadRootDir(), $this->imageIdentity);
        unset($this->fileIdentity);
    }

    public function removeUploadIdentity()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    //image description1

    public $fileDescription1;

    public function preUploadDescription1()
    {
        if (null !== $this->fileDescription1) {
            // do whatever you want to generate a unique name
            $this->imageDescription1 = uniqid() . '.' . $this->fileDescription1->guessExtension();
        }
    }

    public function uploadDescription1()
    {
        if (null === $this->fileDescription1) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileDescription1->move($this->getUploadRootDir(), $this->imageDescription1);
        unset($this->fileDescription1);
    }

    public function removeUploadDescription1()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    //image description2

    public $fileDescription2;

    public function preUploadDescription2()
    {
        if (null !== $this->fileDescription1) {
            // do whatever you want to generate a unique name
            $this->imageDescription1 = uniqid() . '.' . $this->fileDescription1->guessExtension();
        }
    }

    public function uploadDescription2()
    {
        if (null === $this->fileDescription2) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileDescription2->move($this->getUploadRootDir(), $this->imageDescription2);
        unset($this->fileDescription2);
    }

    public function removeUploadDescription2()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }


    //image description3

    public $fileDescription3;

    public function preUploadDescription3()
    {
        if (null !== $this->fileDescription3) {
            // do whatever you want to generate a unique name
            $this->imageDescription3 = uniqid() . '.' . $this->fileDescription3->guessExtension();
        }
    }

    public function uploadDescription3()
    {
        if (null === $this->fileDescription3) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileDescription3->move($this->getUploadRootDir(), $this->imageDescription3);
        unset($this->fileDescription3);
    }

    public function removeUploadDescription3()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }


    //image mayor

    public $fileMayor;

    public function preUploadMayor()
    {
        if (null !== $this->fileMayor) {
            // do whatever you want to generate a unique name
            $this->imageMayor = uniqid() . '.' . $this->fileMayor->guessExtension();
        }
    }

    public function uploadMayor()
    {
        if (null === $this->fileMayor) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileMayor->move($this->getUploadRootDir(), $this->imageMayor);
        unset($this->fileMayor);
    }

    public function removeUploadMayor()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    /* code généré */

    protected $id;


    /**
     * @var string
     */
    private $town;

    /**
     * @var integer
     */
    private $cp;

    /**
     * @var string
     */
    private $address;

    /**
     * @var integer
     */
    private $phone;

    /**
     * @var integer
     */
    private $resident;

    /**
     * @var string
     */
    private $website;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $message_mayor;

    /**
     * @var string
     */
    private $description;

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
    private $organization;

    /**
     * @var string
     */
    private $status_actor;

    /**
     * @var string
     */
    private $status_citizen;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $project;


    /**
     * Set town
     *
     * @param string $town
     * @return User
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
     * Set cp
     *
     * @param integer $cp
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set resident
     *
     * @param integer $resident
     * @return User
     */
    public function setResident($resident)
    {
        $this->resident = $resident;

        return $this;
    }

    /**
     * Get resident
     *
     * @return integer 
     */
    public function getResident()
    {
        return $this->resident;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set message_mayor
     *
     * @param string $messageMayor
     * @return User
     */
    public function setMessageMayor($messageMayor)
    {
        $this->message_mayor = $messageMayor;

        return $this;
    }

    /**
     * Get message_mayor
     *
     * @return string 
     */
    public function getMessageMayor()
    {
        return $this->message_mayor;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
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
     * @return User
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
     * @return User
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
     * Set organization
     *
     * @param string $organization
     * @return User
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return string 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set status_actor
     *
     * @param string $statusActor
     * @return User
     */
    public function setStatusActor($statusActor)
    {
        $this->status_actor = $statusActor;

        return $this;
    }

    /**
     * Get status_actor
     *
     * @return string 
     */
    public function getStatusActor()
    {
        return $this->status_actor;
    }

    /**
     * Set status_citizen
     *
     * @param string $statusCitizen
     * @return User
     */
    public function setStatusCitizen($statusCitizen)
    {
        $this->status_citizen = $statusCitizen;

        return $this;
    }

    /**
     * Get status_citizen
     *
     * @return string 
     */
    public function getStatusCitizen()
    {
        return $this->status_citizen;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return User
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set project
     *
     * @param string $project
     * @return User
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return string 
     */
    public function getProject()
    {
        return $this->project;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $offers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $needs;


    /**
     * Add offers
     *
     * @param \BoosterBundle\Entity\Offer $offers
     * @return User
     */
    public function addOffer(\BoosterBundle\Entity\Offer $offers)
    {
        $this->offers[] = $offers;

        return $this;
    }

    /**
     * Remove offers
     *
     * @param \BoosterBundle\Entity\Offer $offers
     */
    public function removeOffer(\BoosterBundle\Entity\Offer $offers)
    {
        $this->offers->removeElement($offers);
    }

    /**
     * Get offers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * Add needs
     *
     * @param \BoosterBundle\Entity\Needs $needs
     * @return User
     */
    public function addNeed(\BoosterBundle\Entity\Needs $needs)
    {
        $this->needs[] = $needs;

        return $this;
    }

    /**
     * Remove needs
     *
     * @param \BoosterBundle\Entity\Needs $needs
     */
    public function removeNeed(\BoosterBundle\Entity\Needs $needs)
    {
        $this->needs->removeElement($needs);
    }

    /**
     * Get needs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNeeds()
    {
        return $this->needs;
    }

    /**
     * Set imageIdentity
     *
     * @param string $imageIdentity
     * @return User
     */
    public function setImageIdentity($imageIdentity)
    {
        $this->ImageIdentity = $imageIdentity;
        return $this;
    }

    /**
     * Get imageIdentity
     *
     * @return string
     */
    public function getImageIdentity()
    {
        return $this->imageIdentity;
    }

    /**
     * Set imageDescription1
     *
     * @param string $imageDescription1
     * @return User
     */
    public function setImageDescription1($imageDescription1)
    {
        $this->ImageDescription1 = $imageDescription1;
        return $this;
    }

    /**
     * Get imageDescription1
     *
     * @return string
     */
    public function getImageDescription1()
    {
        return $this->imageDescription1;
    }

    /**
     * Set imageDescription2
     *
     * @param string $imageDescription2
     * @return User
     */
    public function setImageDescription2($imageDescription2)
    {
        $this->ImageDescription2 = $imageDescription2;
        return $this;
    }

    /**
     * Get imageDescription2
     *
     * @return string
     */
    public function getImageDescription2()
    {
        return $this->imageDescription2;
    }

    /**
     * Set imageDescription3
     *
     * @param string $imageDescription3
     * @return User
     */
    public function setImageDescription3($imageDescription3)
    {
        $this->ImageDescription3 = $imageDescription3;
        return $this;
    }

    /**
     * Get imageDescription3
     *
     * @return string
     */
    public function getImageDescription3()
    {
        return $this->imageDescription3;
    }

    /**
     * Set imageMayor
     *
     * @param string $imageMayor
     * @return User
     */
    public function setImageMayor($imageMayor)
    {
        $this->ImageMayor = $imageMayor;
        return $this;
    }

    /**
     * Get imageMayor
     *
     * @return string
     */
    public function getImageMayor()
    {
        return $this->imageMayor;
    }
    /**
     * @var string
     */
    private $imageIdentity;

    /**
     * @var string
     */
    private $imageDescription1;

    /**
     * @var string
     */
    private $imageDescription2;

    /**
     * @var string
     */
    private $imageDescription3;

    /**
     * @var string
     */
    private $imageMayor;


}
