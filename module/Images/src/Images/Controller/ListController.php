<?php

/* 
 * Mohammed Aljuboori
 * New page - 2015.11.19
 */
 namespace Images\Controller;

use Images\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 class ListController extends AbstractActionController
 {
     /*
      * @var \Blog\Service\PostServiceInterface
      */
     protected $postService;
     
     public function __construct(PostServiceInterface $postService) 
     {
         $this->postService = $postService;
     }

     public function indexAction() {
         return new ViewModel(array(
             'posts' => $this->postService->findAllPosts()
         ));
     }
 }