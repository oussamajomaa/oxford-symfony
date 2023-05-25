<?php

namespace App\Entity\Customer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SecondaryCreator
 *
 * @ORM\Table(name="secondary_creator")
 * @ORM\Entity
 */
class SecondaryCreator
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="authority_link", type="string", length=255, nullable=true)
     */
    private $authorityLink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Catalogue", mappedBy="secondaryCreator")
     */
    private $catalogue = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogue = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAuthorityLink(): ?string
    {
        return $this->authorityLink;
    }

    public function setAuthorityLink(?string $authorityLink): self
    {
        $this->authorityLink = $authorityLink;

        return $this;
    }

    /**
     * @return Collection<int, Catalogue>
     */
    public function getCatalogue(): Collection
    {
        return $this->catalogue;
    }

    public function addCatalogue(Catalogue $catalogue): self
    {
        if (!$this->catalogue->contains($catalogue)) {
            $this->catalogue->add($catalogue);
            $catalogue->addSecondaryCreator($this);
        }

        return $this;
    }

    public function removeCatalogue(Catalogue $catalogue): self
    {
        if ($this->catalogue->removeElement($catalogue)) {
            $catalogue->removeSecondaryCreator($this);
        }

        return $this;
    }

}
