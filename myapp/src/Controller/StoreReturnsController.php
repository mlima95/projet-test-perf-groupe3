<?php


namespace App\Controller;

use App\Repository\CustomerRepository;
use App\Repository\StoreReturnsRepository;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/store_returns")
 */
class StoreReturnsController extends AbstractController
{
    /**
     * @Route("/", name="store_returns_index", methods={"GET"})
     */
    public function index(CustomerRepository $customerRepository, StoreReturnsRepository $storeReturnsRepository)
    {
        ini_set('memory_limit', '-1');
        $response = array();
        $listCustomers = $customerRepository->findAllLimit(20000);
        foreach ($listCustomers as $customer) {
            $customerId = $customer->getCCustomerSk();
            $listStoreReturn = $storeReturnsRepository->findByCustomerSk($customerId);
            foreach ($listStoreReturn as $storeReturns) {
                array_push($response,
                    [
                        'SrReturnAmt' => $storeReturns->getSrReturnAmt(),
                        'SrStoreCredit' => $storeReturns->getSrStoreCredit()
                    ]);
            }
        }
        $responseArray = [
            "HTTP_CODE" => 200,
            "ENTITY" => $response
        ];

        // return in json format
        return new JsonResponse($responseArray);
    }
}