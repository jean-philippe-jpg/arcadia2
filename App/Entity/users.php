<?php
namespace App\Entity;
class Users
{
    private int $id;
    private string $email;
    private string $password;
    // Tableau de rôles
    private array $roles = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

   

    public function addRoles(string $role): void
    {
        $this->roles[] = $role;
    }

    public function getRoles(): array
    {
        
       

        return $this->roles;
    }


  
}