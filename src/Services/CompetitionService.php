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
     * Array for competition status: event name -> state value in database
     */
    private const STATUS = array(
        'CREATED' => 'unconfirmed',
        'CONFIRMED' => 'confirmed',
        'STARTED' => 'started',
        'FINISHED' => 'finished'
    );
    /**
     * @var CompetitionRepository
     */
    private $competitionRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var HashService
     */

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
        $competition = $this->competitionRepository->find($competition);
        return $competition;
    }

    public function getFutureCompetitions():?array
    {
        $competitions = $this->competitionRepository->findAll();
        $array  = array();
        foreach($competitions as $competition){
            $serializer = SerializerBuilder::create()->build();
            $a = $serializer->toArray($competition);
            array_push($array, $a);
        }
        return $array;
    }

    public function competitionStatus($competition, $status){
        $competitionStatus=$competition->getCompetitionStatus();
        if ($competitionStatus===$status){
           return true;
        }
        return false;
    }

    public function changeStatus(string $status,Competition $competition){
        $competition->setCompetitionStatus($status);
        $this->competitionRepository->save($competition);
        $this->competitionRepository->flush();
    }
}