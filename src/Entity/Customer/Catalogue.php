<?php

namespace App\Entity\Customer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue")
 * @ORM\Entity
 */
class Catalogue
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
     * @var string
     *
     * @ORM\Column(name="identifier", type="string", length=255, nullable=false)
     */
    private $identifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="repository", type="string", length=255, nullable=true)
     */
    private $repository;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shelfmark", type="string", length=255, nullable=true)
     */
    private $shelfmark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="text", length=0, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="digital_resource", type="string", length=255, nullable=true)
     */
    private $digitalResource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="autograph", type="string", length=255, nullable=true)
     */
    private $autograph;

    /**
     * @var string|null
     *
     * @ORM\Column(name="incipit_diplomatic", type="text", length=0, nullable=true)
     */
    private $incipitDiplomatic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="incipit_modernised", type="text", length=0, nullable=true)
     */
    private $incipitModernised;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_language", type="string", length=255, nullable=true)
     */
    private $textLanguage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brief_summary", type="text", length=0, nullable=true)
     */
    private $briefSummary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="detailed_summary", type="text", length=0, nullable=true)
     */
    private $detailedSummary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inclusions", type="text", length=0, nullable=true)
     */
    private $inclusions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bibliography", type="text", length=0, nullable=true)
     */
    private $bibliography;

    /**
     * @var string|null
     *
     * @ORM\Column(name="material", type="string", length=255, nullable=true)
     */
    private $material;

    /**
     * @var string|null
     *
     * @ORM\Column(name="extent", type="string", length=255, nullable=true)
     */
    private $extent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=255, nullable=true)
     */
    private $format;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dimensions", type="string", length=255, nullable=true)
     */
    private $dimensions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="watermark", type="text", length=0, nullable=true)
     */
    private $watermark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="additional_comments", type="text", length=0, nullable=true)
     */
    private $additionalComments;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hands", type="string", length=255, nullable=true)
     */
    private $hands;

    /**
     * @var string|null
     *
     * @ORM\Column(name="additions", type="text", length=0, nullable=true)
     */
    private $additions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="decorations", type="string", length=255, nullable=true)
     */
    private $decorations;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="origin", type="string", length=255, nullable=true)
     */
    private $origin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ownership", type="string", length=255, nullable=true)
     */
    private $ownership;

    /**
     * @var string|null
     *
     * @ORM\Column(name="provenance", type="text", length=0, nullable=true)
     */
    private $provenance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocv_volume", type="string", length=255, nullable=true)
     */
    private $ocvVolume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocv_chapter", type="string", length=255, nullable=true)
     */
    private $ocvChapter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_chapter", type="string", length=255, nullable=true)
     */
    private $textChapter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_reference", type="string", length=255, nullable=true)
     */
    private $textReference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manuscript_details", type="string", length=255, nullable=true)
     */
    private $manuscriptDetails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_archive_catalogue", type="string", length=255, nullable=true)
     */
    private $linkArchiveCatalogue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_digital_voltaire", type="string", length=255, nullable=true)
     */
    private $linkDigitalVoltaire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrimaryCreator", inversedBy="catalogue")
     * @ORM\JoinTable(name="catalogue_primary_creator",
     *   joinColumns={
     *     @ORM\JoinColumn(name="catalogue_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="primary_creator_id", referencedColumnName="id")
     *   }
     * )
     */
    private $primaryCreator = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SecondaryCreator", inversedBy="catalogue")
     * @ORM\JoinTable(name="catalogue_secondary_creator",
     *   joinColumns={
     *     @ORM\JoinColumn(name="catalogue_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="secondary_creator_id", referencedColumnName="id")
     *   }
     * )
     */
    private $secondaryCreator = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->primaryCreator = new \Doctrine\Common\Collections\ArrayCollection();
        $this->secondaryCreator = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getRepository(): ?string
    {
        return $this->repository;
    }

    public function setRepository(?string $repository): self
    {
        $this->repository = $repository;

        return $this;
    }

    public function getShelfmark(): ?string
    {
        return $this->shelfmark;
    }

    public function setShelfmark(?string $shelfmark): self
    {
        $this->shelfmark = $shelfmark;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDigitalResource(): ?string
    {
        return $this->digitalResource;
    }

    public function setDigitalResource(?string $digitalResource): self
    {
        $this->digitalResource = $digitalResource;

        return $this;
    }

    public function getAutograph(): ?string
    {
        return $this->autograph;
    }

    public function setAutograph(?string $autograph): self
    {
        $this->autograph = $autograph;

        return $this;
    }

    public function getIncipitDiplomatic(): ?string
    {
        return $this->incipitDiplomatic;
    }

    public function setIncipitDiplomatic(?string $incipitDiplomatic): self
    {
        $this->incipitDiplomatic = $incipitDiplomatic;

        return $this;
    }

    public function getIncipitModernised(): ?string
    {
        return $this->incipitModernised;
    }

    public function setIncipitModernised(?string $incipitModernised): self
    {
        $this->incipitModernised = $incipitModernised;

        return $this;
    }

    public function getTextLanguage(): ?string
    {
        return $this->textLanguage;
    }

    public function setTextLanguage(?string $textLanguage): self
    {
        $this->textLanguage = $textLanguage;

        return $this;
    }

    public function getBriefSummary(): ?string
    {
        return $this->briefSummary;
    }

    public function setBriefSummary(?string $briefSummary): self
    {
        $this->briefSummary = $briefSummary;

        return $this;
    }

    public function getDetailedSummary(): ?string
    {
        return $this->detailedSummary;
    }

    public function setDetailedSummary(?string $detailedSummary): self
    {
        $this->detailedSummary = $detailedSummary;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

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

    public function getInclusions(): ?string
    {
        return $this->inclusions;
    }

    public function setInclusions(?string $inclusions): self
    {
        $this->inclusions = $inclusions;

        return $this;
    }

    public function getBibliography(): ?string
    {
        return $this->bibliography;
    }

    public function setBibliography(?string $bibliography): self
    {
        $this->bibliography = $bibliography;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getExtent(): ?string
    {
        return $this->extent;
    }

    public function setExtent(?string $extent): self
    {
        $this->extent = $extent;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(?string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getWatermark(): ?string
    {
        return $this->watermark;
    }

    public function setWatermark(?string $watermark): self
    {
        $this->watermark = $watermark;

        return $this;
    }

    public function getAdditionalComments(): ?string
    {
        return $this->additionalComments;
    }

    public function setAdditionalComments(?string $additionalComments): self
    {
        $this->additionalComments = $additionalComments;

        return $this;
    }

    public function getHands(): ?string
    {
        return $this->hands;
    }

    public function setHands(?string $hands): self
    {
        $this->hands = $hands;

        return $this;
    }

    public function getAdditions(): ?string
    {
        return $this->additions;
    }

    public function setAdditions(?string $additions): self
    {
        $this->additions = $additions;

        return $this;
    }

    public function getDecorations(): ?string
    {
        return $this->decorations;
    }

    public function setDecorations(?string $decorations): self
    {
        $this->decorations = $decorations;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getOwnership(): ?string
    {
        return $this->ownership;
    }

    public function setOwnership(?string $ownership): self
    {
        $this->ownership = $ownership;

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

    public function getOcvVolume(): ?string
    {
        return $this->ocvVolume;
    }

    public function setOcvVolume(?string $ocvVolume): self
    {
        $this->ocvVolume = $ocvVolume;

        return $this;
    }

    public function getOcvChapter(): ?string
    {
        return $this->ocvChapter;
    }

    public function setOcvChapter(?string $ocvChapter): self
    {
        $this->ocvChapter = $ocvChapter;

        return $this;
    }

    public function getTextChapter(): ?string
    {
        return $this->textChapter;
    }

    public function setTextChapter(?string $textChapter): self
    {
        $this->textChapter = $textChapter;

        return $this;
    }

    public function getTextReference(): ?string
    {
        return $this->textReference;
    }

    public function setTextReference(?string $textReference): self
    {
        $this->textReference = $textReference;

        return $this;
    }

    public function getManuscriptDetails(): ?string
    {
        return $this->manuscriptDetails;
    }

    public function setManuscriptDetails(?string $manuscriptDetails): self
    {
        $this->manuscriptDetails = $manuscriptDetails;

        return $this;
    }

    public function getLinkArchiveCatalogue(): ?string
    {
        return $this->linkArchiveCatalogue;
    }

    public function setLinkArchiveCatalogue(?string $linkArchiveCatalogue): self
    {
        $this->linkArchiveCatalogue = $linkArchiveCatalogue;

        return $this;
    }

    public function getLinkDigitalVoltaire(): ?string
    {
        return $this->linkDigitalVoltaire;
    }

    public function setLinkDigitalVoltaire(?string $linkDigitalVoltaire): self
    {
        $this->linkDigitalVoltaire = $linkDigitalVoltaire;

        return $this;
    }

    /**
     * @return Collection<int, PrimaryCreator>
     */
    public function getPrimaryCreator(): Collection
    {
        return $this->primaryCreator;
    }

    public function addPrimaryCreator(PrimaryCreator $primaryCreator): self
    {
        if (!$this->primaryCreator->contains($primaryCreator)) {
            $this->primaryCreator->add($primaryCreator);
        }

        return $this;
    }

    public function removePrimaryCreator(PrimaryCreator $primaryCreator): self
    {
        $this->primaryCreator->removeElement($primaryCreator);

        return $this;
    }

    /**
     * @return Collection<int, SecondaryCreator>
     */
    public function getSecondaryCreator(): Collection
    {
        return $this->secondaryCreator;
    }

    public function addSecondaryCreator(SecondaryCreator $secondaryCreator): self
    {
        if (!$this->secondaryCreator->contains($secondaryCreator)) {
            $this->secondaryCreator->add($secondaryCreator);
        }

        return $this;
    }

    public function removeSecondaryCreator(SecondaryCreator $secondaryCreator): self
    {
        $this->secondaryCreator->removeElement($secondaryCreator);

        return $this;
    }

}
