<?php


namespace App\Controller;

use App\Repository\InventoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/inventory")
 */
class InventoryController extends AbstractController
{

    /**
     * @param InventoryRepository $inventoryRepository
     * @return JsonResponse
     * @Route("/", name="inventory_index", methods={"GET"})
     */
    public function index(InventoryRepository $inventoryRepository){
        ini_set('memory_limit', '-1');
        $listInventory = $inventoryRepository->findAllLimit();
        $response = [];

        foreach ($listInventory as $inventory) {
            array_push($response,
                [
                    "InvDateSk" => $inventory->getInvQuantityOnHand(),
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

}