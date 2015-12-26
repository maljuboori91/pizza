<?php

/* 
 * Mohammed Aljuboori
 * New page - 2015.11.22
 */

namespace Images\Service;

use Images\Model\PostInterface;

interface PostServiceInterface 
{
    /*
     * Should return a set of all blog posts that we can interate over.
     * implementing \Blog\Model\PostInterface
     * 
     * @return: array|PostInterface[]
     */
    public function findAllPosts();
    
    /*
     * Should return a single blog post
     * 
     * @param int $id Identifier of the Post that should be returned
     * @return PostInterface
     */
    public function findPost($id);
}