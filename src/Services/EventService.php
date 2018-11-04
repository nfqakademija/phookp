<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.2
 * Time: 02.52
 */

namespace App\Services;


use App\Entity\Event;
use App\Repository\EventRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use JMS\Serializer\SerializerBuilder;

final class EventService
{
    /**
     * @var EventRepository - Event entity repozitorija, injektinama automatiskai per konstruktoriaus parametrus
     */
    private $eventRepository;
    /**
     * @var LoggerInterface - Logeris, naudojau debuginimui. Isveda zinutes i var/log/dev.log
     */
    private $logger;
    /**
     * @var ValidatorInterface - Entity objekto validatorius, injektinamas per konstruktoriaus parametrus
     */
    private $validator;

    /**
     * EventService constructor.
     * @param EventRepository $eventRepository
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     */
    public function __construct(EventRepository $eventRepository, ValidatorInterface $validator, LoggerInterface $logger)
    {

        $this->eventRepository = $eventRepository;
        $this->validator = $validator;
        $this->logger = $logger;
        $this->logger->notice("Service constructor called.");
    }

    /**
     * @param Event $event
     * @return Event|null
     * Issaugo objekta i duombaze ir vel ji grazina (dabar jau su idEvent ir visom default reiksmem)
     */
    public function create(Event $event):?Event
    {
        /**
         * @TODO
         * Padaryti success checka, jei tarkim failina prisijungt prie db, grazina null
         */
        $this->eventRepository->save($event);
        return $event;
    }

    /**
     * @param int $id
     * @return Event
     * Pagal paduota id suranba ir grazina Event objekta. Jeigu neranda iraso pagal id - grazina null.
     */

    public function get(int $id): Event
    {
        /**
         * @TODO
         * Pakeist return tipa i ?Event, ir jeigu randa eventa pagal id grazina ji, jeigu neranda, grazina null
         */
        $this->logger->notice("Get from service called");
        $event = $this->eventRepository->find($id);
        return $event;
    }

    /**
     * @param Event $event
     * @return null|\Symfony\Component\Validator\ConstraintViolationListInterface
     * Validatina paduota Event objekta, jeigu klaidu nera, grazina null, jeigu randa klaidu - string masyva
     */
    public function validate(Event $event):?array
    {
        $errors  = $this->validator->validate($event);

        if(count($errors) > 0){

            dump($errors);
            return $errors;
        }

        else return null;
    }

    public function getFutureEvents():?array
    {
        /*
         * TODO imti tik busimus eventus
         * */

        $events = $this->eventRepository->findAll();
        $array  = array();
        foreach($events as $event){
            $serializer = SerializerBuilder::create()->build();
            $a = $serializer->toArray($event);
            array_push($array, $a);

        }
        return $array;
    }
}