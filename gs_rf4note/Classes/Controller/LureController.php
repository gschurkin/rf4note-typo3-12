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
 * LureController
 */
class LureController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * lureRepository
     *
     * @var \GSchurkin\GsRf4note\Domain\Repository\LureRepository
     */
    protected $lureRepository = null;

    /**
     * @param \GSchurkin\GsRf4note\Domain\Repository\LureRepository $lureRepository
     */
    public function injectLureRepository(\GSchurkin\GsRf4note\Domain\Repository\LureRepository $lureRepository)
    {
        $this->lureRepository = $lureRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $lures = $this->lureRepository->findAll();
        $this->view->assign('lures', $lures);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Lure $lure
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\GSchurkin\GsRf4note\Domain\Model\Lure $lure): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('lure', $lure);
        return $this->htmlResponse();
    }
}
