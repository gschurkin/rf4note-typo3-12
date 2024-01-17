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
 * FishingType
 */
class FishingType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * lures
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Lure>
     */
    protected $lures = null;

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
        $this->lures = $this->lures ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Adds a Lure
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Lure $lure
     * @return void
     */
    public function addLure(\GSchurkin\GsRf4note\Domain\Model\Lure $lure)
    {
        $this->lures->attach($lure);
    }

    /**
     * Removes a Lure
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Lure $lureToRemove The Lure to be removed
     * @return void
     */
    public function removeLure(\GSchurkin\GsRf4note\Domain\Model\Lure $lureToRemove)
    {
        $this->lures->detach($lureToRemove);
    }

    /**
     * Returns the lures
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Lure>
     */
    public function getLures()
    {
        return $this->lures;
    }

    /**
     * Sets the lures
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Lure> $lures
     * @return void
     */
    public function setLures(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $lures)
    {
        $this->lures = $lures;
    }
}
