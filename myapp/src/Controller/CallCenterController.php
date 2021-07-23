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
     * @Route("/normal", name="call_center_normal_get", methods={"GET"})
     */
    public function normal_get(CallCenterRepository $callCenterRepository): JsonResponse
    {


        $listCC = $callCenterRepository->findAll();

        $response = [];

        foreach ($listCC as $cc) {
            array_push($response,
                [
                    "ccCallCenterSk" => $cc->getCcCallCenterSk(),
                    "ccCallCenterId" => $cc->getCcCallCenterId()
                ]
            );
        }

        $responseArray = [
            "HTTP_CODE" => 200,
            "ENTITY" => $response
        ];

        // return in json format
        return new JsonResponse($responseArray);
    }

    /**
     * @Route("/delete/{ccCallCenterSk}", name="call_center_normal_delete", methods={"DELETE"})
     */
    public function delete_get(CallCenter$callCenter, CallCenterRepository $callCenterRepository): JsonResponse
    {

        $em = $this->getDoctrine()->getManager();

        $em->remove($callCenter);

        $em->flush();

        $responseArray = [
            "HTTP_CODE" => 200,
        ];

        // return in json format
        return new JsonResponse($responseArray);
    }


    /**
     * @Route("/slow-creation", name="call_center_normal_slow", methods={"POST"})
     */
    public function slow_creation(CallCenterRepository $callCenterRepository, Request $request): JsonResponse
    {
        $requestArray = $request->getContent();
        $requestArray = json_decode($requestArray, true);

        $entityManager = $this->getDoctrine()->getManager();

        $callcenter = new CallCenter();
        $callcenter
            ->setCcCallCenterId('AAAAAAAABAAAAAAA')
            ->setCcCallCenterSk(!!$requestArray['ccCallCenterSk'] ? $requestArray['ccCallCenterSk'] : null);


        $entityManager->persist($callcenter);

        $entityManager->flush();

        sleep(rand(1, 29));

        $responseArray = [
            "HTTP_CODE" => 200,
            "ENTITY" => $callcenter->getCcCallCenterSk()
        ];

        // return in json format
        return new JsonResponse($responseArray);
    }

}
