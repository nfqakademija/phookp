<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.11.2
 * Time: 02.52
 */

namespace App\Services;


use App\Entity\Competition;
use App\Entity\Hash;
use App\Repository\CompetitionRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use JMS\Serializer\SerializerBuilder;

final class CompetitionService
{
    /**
     * @var CompetitionRepository - Competition entity repozitorija, injektinama automatiskai per konstruktoriaus parametrus
     */
    private $competitionRepository;
    /**
     * @var LoggerInterface - Logeris, naudojau debuginimui. Isveda zinutes i var/log/dev.log
     */
    private $logger;
    /**
     * @var ValidatorInterface - Entity objekto validatorius, injektinamas per konstruktoriaus parametrus
     */
    private $validator;

    /**
     * CompetitionService constructor.
     * @param CompetitionRepository $competitionRepository
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     */
    public function __construct(CompetitionRepository $competitionRepository, ValidatorInterface $validator, LoggerInterface $logger)
    {

        $this->competitionRepository = $competitionRepository;
        $this->validator = $validator;
        $this->logger = $logger;
        $this->logger->notice("Service constructor called.");
    }

    /**
     * @param Competition $competition
     * @return Competition|null
     * Issaugo objekta i duombaze ir vel ji grazina (dabar jau su idCompetition ir visom default reiksmem)
     */
    public function create(Competition $competition):?Competition
    {
        /**
         * @TODO
         * Padaryti success checka, jei tarkim failina prisijungt prie db, grazina null
         */
        $this->competitionRepository->save($competition);
        $this->competitionRepository->flush();
        return $competition;
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
         * Pakeist return tipa i ?Competition, ir jeigu randa competitiona pagal id grazina ji, jeigu neranda, grazina null
         */
        $this->logger->notice("Get from service called");
        $competition = $this->competitionRepository->find($id);
        return $competition;
    }

    /**
     * @param Competition $competition
     * @return null|\Symfony\Component\Validator\ConstraintViolationListInterface
     * Validatina paduota Competition objekta, jeigu klaidu nera, grazina null, jeigu randa klaidu - string masyva
     */
    public function validate(Competition $competition):?array
    {
        $errors  = $this->validator->validate($competition);

        if(count($errors) > 0){

            dump($errors);
            return $errors;
        }

        else return null;
    }

    public function getFutureCompetitions():?array
    {
        /*
         * TODO imti tik busimus competitionus
         * */
        $competitions = $this->competitionRepository->findAll();
        $array  = array();
        foreach($competitions as $competition){
            $serializer = SerializerBuilder::create()->build();
            $a = $serializer->toArray($competition);
            array_push($array, $a);

        }
        return $array;
    }
}