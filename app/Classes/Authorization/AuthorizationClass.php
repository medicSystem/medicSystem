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
            'addDisease' => [
                'description' => 'add new information to directory',
                'next' => 'deleteDisease',
            ],
            'deleteDisease' => [
                'description' => 'delete information from directory',
                'next' => 'updateDisease',
            ],
            'updateDisease' => [
                'description' => 'update information from directory',
            ],
            'putNotifications' => [
                'description' => 'put notifications to users',
            ],
            'updateCoupon' => [
                'description' => 'update coupon before date of register',
                'next' => 'addCoupon',
            ],
            'addCoupon' => [
                'description' => 'add coupon before now date',
                'next' => 'deleteCoupon',
            ],
            'deleteCoupon' => [
                'description' => 'delete coupon',
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
                'addDisease',
                'putNotifications',
                'updateCoupon',
            ],
            'patient' => [
                'sendMessage',
                'addCoupon',
                'deleteCoupon',
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

/*    public function editOwnPost($user, $post)
    {
        $post = $this->getModel(\App\Post::class, $post);  // helper method for geting model

        return $user->id === $post->user_id;
    }*/

}
