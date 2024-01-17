<?php

declare(strict_types=1);

namespace GSchurkin\GsRf4note\Domain\Model;


/**
 * This file is part of the "Rf4note" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Georg Schurkin <gschurkin@gmail.com>
 */

/**
 * Lure
 */
class Lure extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * weight
     *
     * @var int
     */
    protected $weight = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * types
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\FishingType>
     */
    protected $types = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->types = $this->types ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Sets the weight
     *
     * @param int $weight
     * @return void
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Adds a FishingType
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\FishingType $type
     * @return void
     */
    public function addType(\GSchurkin\GsRf4note\Domain\Model\FishingType $type)
    {
        $this->types->attach($type);
    }

    /**
     * Removes a FishingType
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\FishingType $typeToRemove The FishingType to be removed
     * @return void
     */
    public function removeType(\GSchurkin\GsRf4note\Domain\Model\FishingType $typeToRemove)
    {
        $this->types->detach($typeToRemove);
    }

    /**
     * Returns the types
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\FishingType>
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Sets the types
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\FishingType> $types
     * @return void
     */
    public function setTypes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $types)
    {
        $this->types = $types;
    }
}
