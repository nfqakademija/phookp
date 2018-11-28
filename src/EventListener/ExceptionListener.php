<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.25
 * Time: 09.21
 */

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\RouterInterface;

class ExceptionListener
{

    private $router;

    /**
     * ExceptionListener constructor.
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();


        if ($exception instanceof AccessDeniedHttpException) {
            $session = new Session();
            $session->start();
            $session->getFlashBag()->add('error', "Varzybos neegzistuoja, arba prieigos nuoroda buvo panaikinta administratoriaus.");

            $response = new RedirectResponse($this->router->generate('home'));

        }
        else
        {
            return;
        }

        $event->setResponse($response);
    }
}