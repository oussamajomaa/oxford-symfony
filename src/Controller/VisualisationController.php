<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\ClassificationRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class VisualisationController extends AbstractController
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    #[Route('/visualisation', name: 'app_visualisation')]
    public function index(ChartBuilderInterface $chartBuilder, ClassificationRepository $repo, BookRepository $repo1): Response
    {
        // $category = [];
        // $descriptions = [];
        // $classifications = [];
        // $classifications = $repo->findAll();
        // foreach ($classifications as $classification) {
        //     $descriptions[] = $classification->getDescription();
        //     // $category [] = $repo1->findOneBy(['classification'=>$classification->getBook()]);
        //     if ($repo1->findByClassification($classification)){

        //         dd($repo1->findByClassification($classification));
        //     }
        // }
        
        $sql = "SELECT count(*) as sum, description FROM `book` INNER join book_classification on id = book_classification.book_id
                INNER JOIN classification on classification.id = book_classification.classification_id
                GROUP by book_classification.classification_id order by sum;";

        $statment = $this->connection->executeQuery($sql);
        $results = $statment->fetchAllAssociative();
        $data = [];
        $labels = [];
        $dataPie = [];
        foreach($results as $res) {
            array_push($data, $res['sum']);
            array_push($labels, $res['description']);
            $obj = (object) [
                'name' => $res['description'],
                'value' => $res['sum']
            ];
            array_push($dataPie, $obj);
            
        }
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Classifications',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $data,
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);
        return $this->render('visualisation/index.html.twig', [
            'chart' => $chart,
            'data' => json_encode($data),
            'labels' => json_encode($labels),
            'dataPie' => json_encode($dataPie)
        ]);
    }
}
