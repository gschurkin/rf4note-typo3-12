<?php

declare(strict_types=1);

namespace GSchurkin\GsRf4note\Controller;

use GSchurkin\GsRf4note\Domain\Model\Fish;
use GSchurkin\GsRf4note\Domain\Repository\FishRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


/**
 * This file is part of the "Rf4note" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Georg Schurkin <gschurkin@gmail.com>
 */

/**
 * FishController
 */
class FishController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var PersistenceManager
     */
    protected $persistenceManager = null;

    /**
     * fishRepository
     *
     * @var FishRepository
     */
    protected $fishRepository;

    /**
     * @param FishRepository $fishRepository
     */
    public function injectFishRepository(FishRepository $fishRepository)
    {
        $this->fishRepository = $fishRepository;
    }

    /**
     * @param PersistenceManager $persistenceManager
     */
    public function injectPersistenceManager(PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * action list
     *
     */
    public function listAction()
    {
        $fish = $this->fishRepository->findAll();

        $this->view->assign('fishes', $fish);
    }
}
