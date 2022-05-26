<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function search(Request $request, \SearchHotel $searchHotel): Response
    {
        $q = $request->query->get('q');
        $hotels = $searchHotel->searchHotel($q);
        return $this->render('search/index.html.twig', [
            'query' => $q,
            'hotel' => $hotels
        ]);
    }
}
