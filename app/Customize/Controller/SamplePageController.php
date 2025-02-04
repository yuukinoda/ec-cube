<?php

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Eccube\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class SamplePageController extends AbstractController
{

    /** @var \Eccube\Entity\BaseInfo */
    protected $BaseInfo;

    /**
     * SamplePageController constructor.
     * @param \Eccube\Repository\BaseInfoRepository $baseInfoRepository
     */
    public function __construct(\Eccube\Repository\BaseInfoRepository $baseInfoRepository)
    {
        $this->BaseInfo = $baseInfoRepository->get();
    }

    /**
     * @Route("/sample", name="sample_index", methods={"GET"})
     */
    public function testMethod()
    {
        return new Response('Shop name is '.$this->BaseInfo->getShopName());
    }

    // /**
    //  * @Route("/sample", name="sample_index", methods={"GET"})
    //  * @Template("Sample/index.twig")
    //  */
    // public function index()
    // {
    //     return [
    //         'name' => 'EC-CUBE'
    //     ];
    // }

    /**
     * @Route("/sample/{id}", name="sample_page", methods={"GET"})
     * @Template("Sample/index.twig")
     */
    public function page($id)
    {
        return new Response('Parameter is '.$id);
    }

     /**
    * @Route("/", name="homepage", methods={"GET"})
     */
    // public function testMethod()
    // {
    //  /** @var Product $product */
    //  $product = $this->entityManager->getRepository('Eccube\Entity\Product')->find(1);

    //  return new Response('Product is '.$product->getName());
    // }
}