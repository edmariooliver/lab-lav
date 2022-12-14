<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    
    /**
     * @var App\Models\Task $entity
     */
    protected  User $entity;

    /**
     * 
     */
    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    /**
     * 
     */
    public function findByIdWithTasks($id)
    {
        return $this->entity->where("id", $id)->with("tasks")->get();
    }

    /**
     * 
     */
    public function findAllWithTasks()
    {
        return $this->entity->select("*")->with("tasks")->get();
    }

        /**
     * 
     */
    public function findById($id)
    {
        return $this->entity->where("id", $id)->first();
    }

    /**
     * 
     */
    public function findAll()
    {
        return $this->entity->select("*")->get();
    }
    /**
     * 
     */
    public function destroy(int $id)
    {
        return $this->entity->destroy($id);
    }

    /**
     * 
     */
    public function update(int $id, Array $user)
    {
        if($this->entity->find($id) == NULl) {
            return false;
        }
        return $this->entity->where("id", $id)->update($user);
    }

    /**
     * 
     */
    public function create(array $user)    
    {
        return $this->entity->create($user);
    }

    /**
     * 
    */
    public function findByEmail(String $email)
    {
        return $this->entity->where("email", $email)->first();
    }
}