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

    private $hashService;
    /**
     * CompetitionService constructor.
     * @param CompetitionRepository $competitionRepository
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     */
    public function __construct(CompetitionRepository $competitionRepository, ValidatorInterface $validator, LoggerInterface $logger,HashService $hashService)
    {

        $this->competitionRepository = $competitionRepository;
        $this->validator = $validator;
        $this->hashService=$hashService;
        $this->logger = $logger;
    }

    /**
     * @param Competition $competition
     * @return Competition|null
     */
    public function create(Competition $competition):?Competition
    {
        $this->competitionRepository->save($competition);
        $this->hashService->create($competition);
        $this->competitionRepository->flush();
        return $competition;
    }

    /**
     * @param Competition $competition
     * @return Competition
     */
    public function get(Competition $competition): Competition
    {
        /**
         * @TODO
         * Pakeist return tipa i ?Competition, ir jeigu randa competitiona pagal id grazina ji, jeigu neranda, grazina null
         */
        $competition = $this->competitionRepository->find($competition);
        return $competition;
    }

    /**
     * @param Competition $competition
     * @return null|\Symfony\Component\Validator\ConstraintViolationListInterface
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