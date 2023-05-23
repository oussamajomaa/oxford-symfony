<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity
 */
class Book
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
     * @ORM\Column(name="type_document", type="string", length=255, nullable=true)
     */
    private $typeDocument;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=1000, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publication_place", type="string", length=255, nullable=true)
     */
    private $publicationPlace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publication_date", type="string", length=255, nullable=true)
     */
    private $publicationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher", type="string", length=255, nullable=true)
     */
    private $publisher;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publisher_stated", type="string", length=255, nullable=true)
     */
    private $publisherStated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publication_place_stated", type="string", length=255, nullable=true)
     */
    private $publicationPlaceStated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="publication_date_stated", type="string", length=255, nullable=true)
     */
    private $publicationDateStated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="multivolume", type="string", length=255, nullable=true)
     */
    private $multivolume;

    /**
     * @var int|null
     *
     * @ORM\Column(name="volume", type="integer", nullable=true)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marginalia", type="string", length=255, nullable=true)
     */
    private $marginalia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="library", type="string", length=255, nullable=true)
     */
    private $library;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cote", type="string", length=255, nullable=true)
     */
    private $cote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="provenance", type="string", length=255, nullable=true)
     */
    private $provenance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ferney", type="string", length=255, nullable=true)
     */
    private $ferney;

    /**
     * @var string|null
     *
     * @ORM\Column(name="digital_voltaire", type="text", length=0, nullable=true)
     */
    private $digitalVoltaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="external_resource", type="string", length=255, nullable=true)
     */
    private $externalResource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=0, nullable=true)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_update", type="integer", nullable=true)
     */
    private $userUpdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_date", type="string", length=255, nullable=true)
     */
    private $updateDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pot_pourri", type="integer", nullable=true)
     */
    private $potPourri;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vol_number", type="integer", nullable=true)
     */
    private $volNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Author", inversedBy="book")
     * @ORM\JoinTable(name="book_author",
     *   joinColumns={
     *     @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     *   }
     * )
     */
    private $author = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classification", inversedBy="book")
     * @ORM\JoinTable(name="book_classification",
     *   joinColumns={
     *     @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="classification_id", referencedColumnName="id")
     *   }
     * )
     */
    private $classification = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Copyst", inversedBy="book")
     * @ORM\JoinTable(name="book_copyst",
     *   joinColumns={
     *     @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="copyst_id", referencedColumnName="id")
     *   }
     * )
     */
    private $copyst = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Editor", inversedBy="book")
     * @ORM\JoinTable(name="book_editor",
     *   joinColumns={
     *     @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="editor_id", referencedColumnName="id")
     *   }
     * )
     */
    private $editor = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Translator", inversedBy="book")
     * @ORM\JoinTable(name="book_translator",
     *   joinColumns={
     *     @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="translator_id", referencedColumnName="id")
     *   }
     * )
     */
    private $translator = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->author = new \Doctrine\Common\Collections\ArrayCollection();
        $this->classification = new \Doctrine\Common\Collections\ArrayCollection();
        $this->copyst = new \Doctrine\Common\Collections\ArrayCollection();
        $this->editor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->translator = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDocument(): ?string
    {
        return $this->typeDocument;
    }

    public function setTypeDocument(?string $typeDocument): self
    {
        $this->typeDocument = $typeDocument;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPublicationPlace(): ?string
    {
        return $this->publicationPlace;
    }

    public function setPublicationPlace(?string $publicationPlace): self
    {
        $this->publicationPlace = $publicationPlace;

        return $this;
    }

    public function getPublicationDate(): ?string
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?string $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPublisherStated(): ?string
    {
        return $this->publisherStated;
    }

    public function setPublisherStated(?string $publisherStated): self
    {
        $this->publisherStated = $publisherStated;

        return $this;
    }

    public function getPublicationPlaceStated(): ?string
    {
        return $this->publicationPlaceStated;
    }

    public function setPublicationPlaceStated(?string $publicationPlaceStated): self
    {
        $this->publicationPlaceStated = $publicationPlaceStated;

        return $this;
    }

    public function getPublicationDateStated(): ?string
    {
        return $this->publicationDateStated;
    }

    public function setPublicationDateStated(?string $publicationDateStated): self
    {
        $this->publicationDateStated = $publicationDateStated;

        return $this;
    }

    public function getMultivolume(): ?string
    {
        return $this->multivolume;
    }

    public function setMultivolume(?string $multivolume): self
    {
        $this->multivolume = $multivolume;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getMarginalia(): ?string
    {
        return $this->marginalia;
    }

    public function setMarginalia(?string $marginalia): self
    {
        $this->marginalia = $marginalia;

        return $this;
    }

    public function getLibrary(): ?string
    {
        return $this->library;
    }

    public function setLibrary(?string $library): self
    {
        $this->library = $library;

        return $this;
    }

    public function getCote(): ?string
    {
        return $this->cote;
    }

    public function setCote(?string $cote): self
    {
        $this->cote = $cote;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->provenance;
    }

    public function setProvenance(?string $provenance): self
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getFerney(): ?string
    {
        return $this->ferney;
    }

    public function setFerney(?string $ferney): self
    {
        $this->ferney = $ferney;

        return $this;
    }

    public function getDigitalVoltaire(): ?string
    {
        return $this->digitalVoltaire;
    }

    public function setDigitalVoltaire(?string $digitalVoltaire): self
    {
        $this->digitalVoltaire = $digitalVoltaire;

        return $this;
    }

    public function getExternalResource(): ?string
    {
        return $this->externalResource;
    }

    public function setExternalResource(?string $externalResource): self
    {
        $this->externalResource = $externalResource;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserUpdate(): ?int
    {
        return $this->userUpdate;
    }

    public function setUserUpdate(?int $userUpdate): self
    {
        $this->userUpdate = $userUpdate;

        return $this;
    }

    public function getUpdateDate(): ?string
    {
        return $this->updateDate;
    }

    public function setUpdateDate(?string $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getPotPourri(): ?int
    {
        return $this->potPourri;
    }

    public function setPotPourri(?int $potPourri): self
    {
        $this->potPourri = $potPourri;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getVolNumber(): ?int
    {
        return $this->volNumber;
    }

    public function setVolNumber(?int $volNumber): self
    {
        $this->volNumber = $volNumber;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(Author $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author->add($author);
        }

        return $this;
    }

    public function removeAuthor(Author $author): self
    {
        $this->author->removeElement($author);

        return $this;
    }

    /**
     * @return Collection<int, Classification>
     */
    public function getClassification(): Collection
    {
        return $this->classification;
    }

    public function addClassification(Classification $classification): self
    {
        if (!$this->classification->contains($classification)) {
            $this->classification->add($classification);
        }

        return $this;
    }

    public function removeClassification(Classification $classification): self
    {
        $this->classification->removeElement($classification);

        return $this;
    }

    /**
     * @return Collection<int, Copyst>
     */
    public function getCopyst(): Collection
    {
        return $this->copyst;
    }

    public function addCopyst(Copyst $copyst): self
    {
        if (!$this->copyst->contains($copyst)) {
            $this->copyst->add($copyst);
        }

        return $this;
    }

    public function removeCopyst(Copyst $copyst): self
    {
        $this->copyst->removeElement($copyst);

        return $this;
    }

    /**
     * @return Collection<int, Editor>
     */
    public function getEditor(): Collection
    {
        return $this->editor;
    }

    public function addEditor(Editor $editor): self
    {
        if (!$this->editor->contains($editor)) {
            $this->editor->add($editor);
        }

        return $this;
    }

    public function removeEditor(Editor $editor): self
    {
        $this->editor->removeElement($editor);

        return $this;
    }

    /**
     * @return Collection<int, Translator>
     */
    public function getTranslator(): Collection
    {
        return $this->translator;
    }

    public function addTranslator(Translator $translator): self
    {
        if (!$this->translator->contains($translator)) {
            $this->translator->add($translator);
        }

        return $this;
    }

    public function removeTranslator(Translator $translator): self
    {
        $this->translator->removeElement($translator);

        return $this;
    }

    public function __toString(){
        return $this->title;
    }
 

}
