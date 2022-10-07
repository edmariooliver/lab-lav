<?php

namespace App\Services\User;

use App\Exceptions\UserNotFoundException;
use App\Repositories\UserRepository;

class GetUserService
{
    protected UserRepository $repository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * 
     */
    public function execute(int $id = null)
    {
        $task = ($id == null) ? $this->findAll() : $this->findById(($id)); 

        if($task == null) {
            throw new UserNotFoundException();
        }
        return $task;
    }
    
    /**
     * get all users
     * @return 
     */
    public function findAll()
    {
        $users = $this->repository->findAll();
        
        return $users;
    }
    
    /**
     * get user by id 
     * @return User
     */
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
