<?php

namespace App\Controller;

use App\Entity\CallCenter;
use App\Form\CallCenterType;
use App\Repository\CallCenterRepository;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/call/center")
 */
class CallCenterController extends AbstractController
{
    /**
     * @Route("/slow_creation", name="call_center", methods={"POST"})
     */
    public function slow_creation(CallCenterRepository $callCenterRepository, Request $request): JsonResponse
    {
        $requestArray = $request->getContent();
        $requestArray = json_decode($requestArray, true);

        $entityManager = $this->getDoctrine()->getManager();
        
        $callcenter = new CallCenter();
        $callcenter
            ->setCcCallCenterId('AAAAAAAABAAAAAAA')
            ->setCcCallCenterSk(!!$requestArray['ccCallCenterSk'] ? $requestArray['ccCallCenterSk'] : null );


        $entityManager->persist($callcenter);

        $entityManager->flush();

        sleep(rand(10, 29));

        $responseArray = [
            "HTTP_CODE" => 200,
            "ENTITY" => $callcenter->getCcCallCenterSk()
        ];

        // return in json format
        return new JsonResponse($responseArray);
    }
}
