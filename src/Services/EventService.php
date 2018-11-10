<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.2
 * Time: 02.52
 */

namespace App\Services;


use App\Entity\Competition;
use App\Repository\EventRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use JMS\Serializer\SerializerBuilder;

final class EventService
{
    /**
     * @var EventRepository - Competition entity repozitorija, injektinama automatiskai per konstruktoriaus parametrus
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
     * @param Competition $event
     * @return Competition|null
     * Issaugo objekta i duombaze ir vel ji grazina (dabar jau su idEvent ir visom default reiksmem)
     */
    public function create(Competition $event):?Competition
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
     * @return Competition
     * Pagal paduota id suranba ir grazina Competition objekta. Jeigu neranda iraso pagal id - grazina null.
     */

    public function get(int $id): Competition
    {
        /**
         * @TODO
         * Pakeist return tipa i ?Competition, ir jeigu randa eventa pagal id grazina ji, jeigu neranda, grazina null
         */
        $this->logger->notice("Get from service called");
        $event = $this->eventRepository->find($id);
        return $event;
    }

    /**
     * @param Competition $event
     * @return null|\Symfony\Component\Validator\ConstraintViolationListInterface
     * Validatina paduota Competition objekta, jeigu klaidu nera, grazina null, jeigu randa klaidu - string masyva
     */
    public function validate(Competition $event):?array
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