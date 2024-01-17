<?php

declare(strict_types=1);

namespace GSchurkin\GsRf4note\Controller;


/**
 * This file is part of the "Rf4note" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Georg Schurkin <gschurkin@gmail.com>
 */

/**
 * FishingTypeController
 */
class FishingTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * fishingTypeRepository
     *
     * @var \GSchurkin\GsRf4note\Domain\Repository\FishingTypeRepository
     */
    protected $fishingTypeRepository = null;

    /**
     * @param \GSchurkin\GsRf4note\Domain\Repository\FishingTypeRepository $fishingTypeRepository
     */
    public function injectFishingTypeRepository(\GSchurkin\GsRf4note\Domain\Repository\FishingTypeRepository $fishingTypeRepository)
    {
        $this->fishingTypeRepository = $fishingTypeRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $fishingTypes = $this->fishingTypeRepository->findAll();
        $this->view->assign('fishingTypes', $fishingTypes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\FishingType $fishingType
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\GSchurkin\GsRf4note\Domain\Model\FishingType $fishingType): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('fishingType', $fishingType);
        return $this->htmlResponse();
    }
}
