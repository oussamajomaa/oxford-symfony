<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\ClassificationRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
// use Symfony\UX\Chartjs\Model\Chart;

class VisualisationController extends AbstractController
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    #[Route('/visualisation', name: 'app_visualisation')]
    public function index(ClassificationRepository $repo): Response
    {

        $classifications = $repo->findAll();
        
        $data = [];
        $values = [];
        $labels = [];
        // Create data set
        foreach ($classifications as $classification){
            $data[] = (object) [
                'name' => $classification->getDescription(),
                'value' => count($classification->getBook())
            ];
            
        }

        // Sort data by value
        usort($data, function ($a, $b) {
            return $a->value - $b->value;
        });

        foreach ($data as $item) {
            $labels[] = $item->name;
            $values[] = $item->value;
        }
        return $this->render('visualisation/chart.html.twig', [
            'values' => json_encode($values),
            'labels' => json_encode($labels),
            'data' => json_encode($data)
        ]);
    }
}
