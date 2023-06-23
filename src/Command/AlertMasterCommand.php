<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use App\Repository\MasterRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Master;

class AlertMasterCommand extends Command
{
    
    protected static $defaultName = 'app:alert-master';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))

        $em = $this->entityManager;

        //$master = $em->getRepository(Master::class)->findAll();
        //$master = $em->getRepository(Master::class)->findByName('HT');

        $master = $em->getRepository(Master::class)->findByNameComplex('H');

        //$now = new \DateTime();
        dump($master);die;

        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}