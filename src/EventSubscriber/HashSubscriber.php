<?php

namespace App\EventSubscriber;

use App\Controller\HomeController;
use App\Controller\IAuthorizedController;
use App\Services\HashService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class HashSubscriber implements EventSubscriberInterface
{

    private $hashService;

    /**
     * HashSubscriber constructor.
     */
    public function __construct(HashService $hashService)
    {
        $this->hashService = $hashService;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();
        if(!is_array($controller))
            return;

        if($controller[0] instanceof IAuthorizedController)
        {

            $hash = $event->getRequest()->attributes->get('hash');
            if(!$this->hashService->findByHash($hash))
            {
                /*$session = new Session();
                $session->start();
                $session->getFlashBag()->add('error', "Varzybos neegzistuoja, arba prieigos nuoroda buvo panaikinta administratoriaus.");*/
                throw new AccessDeniedHttpException("Varzybos neegzistuoja, arba prieigos nuoroda buvo panaikinta administratoriaus.");
            }
        }

    }

    public static function getSubscribedEvents()
    {
        return [
           'kernel.controller' => 'onKernelController',
        ];
    }
}
