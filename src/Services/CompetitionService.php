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
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use JMS\Serializer\SerializerBuilder;

final class CompetitionService
{

    /**
     * Array for competition status: event name -> state value in database
     */
    private const STATUS = array(
        'CREATED' => 'unconfirmed',
        'CONFIRMED' => 'confirmed',
        'STARTED' => 'started',
        'FINISHED' => 'finished'
    );
    /**
     * @var CompetitionRepository - Competition entity repozitorija, injektinama automatiskai per konstruktoriaus parametrus
     */
    private $competitionRepository;

    private $entityManager;

    /**
     * CompetitionService constructor.
     * @param CompetitionRepository $competitionRepository
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     */
    public function __construct(CompetitionRepository $competitionRepository)
    {
        $this->competitionRepository = $competitionRepository;
    }


    public function create(Competition $competition):?Competition
    {
        $this->competitionRepository->save($competition);
        $this->competitionRepository->flush();
        return $competition;
    }

    public function get(int $id): Competition
    {
        $competition = $this->competitionRepository->find($id);
        return $competition;
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