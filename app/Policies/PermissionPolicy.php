<?php
namespace App\Policies;
use App\Models\User;
class PermissionPolicy
{
    public function view(User $user){
        $entities = ['user', 'role', 'permission','setting','banner','service','review','faqs','gallery','page','menu','package'];
        foreach ($entities as $entity) {
            if ($this->canViewEntity($user, $entity)) {
                return true;
            }
        }
        return false;
    }

    private function canViewEntity(User $user, $entity){
        return $user->can("view-{$entity}");
    }
    
}
