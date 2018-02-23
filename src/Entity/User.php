<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    public function __construct() {
        $this->trainings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscribedAt = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="La saisie {{ value }} n'est pas un type valide.")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="La saisie {{ value }} n'est pas un type valide.")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Email(message = "L'email '{{ value }}' saisi n'est pas valide.", checkMX = true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Type("numeric", message="La saisie {{ value }} n'est pas un type valide.")
     */
    private $phone;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="La saisie {{ value }} n'est pas un type valide.")
     */
    private $street;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Type("numeric", message="La saisie {{ value }} n'est pas un type valide.")
     */
    private $postCode;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="La saisie {{ value }} n'est pas un type valide.")
     */
    private $city;

    /** @ORM\Column(type="datetime", name="date_subscription") */
    private $subscribedAt;

    /**
     * Etat de santé de la personne: "antécédents cardiaques, problèmes respiratoires ou tout autre pathologie lourde"
     * @ORM\Column(type="text", nullable=true)
     */
    private $healthStatus;

    /**
     * Many Users have Many Trainings.
     * @ORM\ManyToMany(targetEntity="Training", inversedBy="users")
     * @ORM\JoinTable(name="users_trainings")
     */
    private $trainings;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param mixed $postCode
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getSubscribedAt()
    {
        return $this->subscribedAt;
    }

    /**
     * @param mixed $subscribedAt
     */
    public function setSubscribedAt($subscribedAt)
    {
        $this->subscribedAt = $subscribedAt;
    }

    /**
     * @return mixed
     */
    public function getHealthStatus()
    {
        return $this->healthStatus;
    }

    /**
     * @param mixed $healthStatus
     */
    public function setHealthStatus($healthStatus)
    {
        $this->healthStatus = $healthStatus;
    }

    /**
     * @return mixed
     */
    public function getTrainings()
    {
        return $this->trainings;
    }

    /**
     * @param mixed $trainings
     */
    public function setTrainings($trainings)
    {
        $this->trainings = $trainings;
    }

    /**
     * @param Training $training
     */
    public function addTraining($training)
    {
        $this->trainings->add($training);
    }

}
