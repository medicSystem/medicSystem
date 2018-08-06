<?php

namespace App\Classes\Authorization;

use Dlnsk\HierarchicalRBAC\Authorization;


/**
 *  This is example of hierarchical RBAC authorization configiration.
 */
class AuthorizationClass extends Authorization
{
    public function getPermissions()
    {
        return [
            'deleteUsers' => [
                'description' => 'delete users to ban-list',   // optional property
                'next' => 'returnUsers',            // used for making chain (hierarchy) of permissions
            ],
            'returnUsers' => [
                'description' => 'return users from ban-list',
            ],
            'validateDoctors' => [
                'description' => 'validate doctors',
            ],
            'sendMessage' => [
                'description' => 'send message',
            ],
            'addNews' => [
                'description' => 'add news',
                'next' => 'deleteNews',
            ],
            'deleteNews' => [
                'description' => 'delete news',
                'next' => 'updateNews',
            ],
            'updateNews' => [
                'description' => 'update news',
            ],
        ];
    }

    public function getRoles()
    {
        return [
            'admin' => [
                'deleteUsers',
                'validateDoctors',
                'addNews',
            ],
            'patient' => [
                'sendMessage',
            ],
            'doctor' => [
                'sendMessage',
            ],
        ];
    }


    /**
     * Methods which checking permissions.
     * Methods should be present only if additional checking needs.
     */

    public function editOwnPost($user, $post)
    {
        $post = $this->getModel(\App\Post::class, $post);  // helper method for geting model

        return $user->id === $post->user_id;
    }

}
