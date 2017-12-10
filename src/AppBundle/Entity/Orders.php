<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="client_name", type="string", length=255)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="client_email", type="string", length=255)
     */
    private $clientEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="client_phone", type="string", length=255)
     */
    private $clientPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="client_city", type="string", length=255)
     */
    private $clientCity;

    /**
     * @var float
     *
     * @ORM\Column(name="width", type="float")
     */
    private $width;

    /**
     * @var float
     *
     * @ORM\Column(name="height", type="float")
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="fixation", type="integer")
     */
    private $fixation;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="integer")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="purpose", type="integer")
     */
    private $purpose;

    /**
     * @var bool
     *
     * @ORM\Column(name="seen", type="boolean")
     */
    private $seen;

    /**
     * @var bool
     *
     * @ORM\Column(name="certificate", type="boolean")
     */
    private $certificate;

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
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Orders
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientEmail
     *
     * @param string $clientEmail
     *
     * @return Orders
     */
    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    /**
     * Get clientEmail
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    /**
     * Set clientPhone
     *
     * @param string $clientPhone
     *
     * @return Orders
     */
    public function setClientPhone($clientPhone)
    {
        $this->clientPhone = $clientPhone;

        return $this;
    }

    /**
     * Get clientPhone
     *
     * @return string
     */
    public function getClientPhone()
    {
        return $this->clientPhone;
    }

    /**
     * Set clientCity
     *
     * @param string $clientCity
     *
     * @return Orders
     */
    public function setClientCity($clientCity)
    {
        $this->clientCity = $clientCity;

        return $this;
    }

    /**
     * Get clientCity
     *
     * @return string
     */
    public function getClientCity()
    {
        return $this->clientCity;
    }

    /**
     * Set width
     *
     * @param float $width
     *
     * @return Orders
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return Orders
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set fixation
     *
     * @param string $fixation
     *
     * @return Orders
     */
    public function setFixation($fixation)
    {
        $this->fixation = $fixation;

        return $this;
    }

    /**
     * Get fixation
     *
     * @return string
     */
    public function getFixation()
    {
        return $this->fixation;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Orders
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set purpose
     *
     * @param string $purpose
     *
     * @return Orders
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set seen
     *
     * @param boolean $seen
     *
     * @return Orders
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }
    /**
     * Get seen
     *
     * @return bool
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * @return bool
     */
    public function isCertificate(): bool
    {
        return $this->certificate;
    }

    /**
     * @param bool $certificate
     */
    public function setCertificate(bool $certificate)
    {
        $this->certificate = $certificate;
    }
}
