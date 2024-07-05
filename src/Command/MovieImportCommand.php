<?php

namespace App\Command;

use App\Amdb\MovieImporter;
use App\Repository\MovieRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:movie:import',
    description: 'Add a short description for your command',
)]
class MovieImportCommand extends Command
{
    public function __construct(
        private readonly MovieRepository $movieRepository,
        private readonly MovieImporter $movieImporter
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('title', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $title = $input->getArgument('title');

        $this->movieImporter->importMovie($title);

        $lastMovie = $this->movieRepository->findTenLastMovies();

        $movieMap = [];
        foreach ($lastMovie as $movie) {
            $movieMap[] = [
                'title' => $movie->getTitle(),
                'author' => $movie->getAuthor(),
            ];
        }

        $io->table(['title', 'author'], $movieMap);

        return Command::SUCCESS;
    }
}
