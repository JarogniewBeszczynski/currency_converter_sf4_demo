<?php


namespace App\Controller;


use App\Service\NbpRates;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends AbstractController
{
    public function homepage()
    {
        return $this->render('currency/demo.html.twig');
    }


    public function convert(Request $request, NbpRates $nbpRates)
    {
            if (!$request->isXmlHttpRequest()) {
                return new JsonResponse(array(
                    'status' => 'Error',
                    'message' => 'Error'),
                    400);
            }
            if ($request->isXmlHttpRequest()) {
                $amountPln = $request->get('amountPln');
                $eurRate = $nbpRates->fetch();
                $eurResult = ($amountPln/$eurRate);
                return new JsonResponse([
                    'eurResult' => $eurResult
                ]);
            }


    }

}