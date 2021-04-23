<?php
/**
 * Created by iKNSA.
 * User: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 21/04/2021
 * Time: 14:19
 */


namespace Itech\Repository;


use Itech\Model\User;
use Simplex\Service\Hydrator;

class UserManager
{
    private ?\PDO $db;

    public function __construct()
    {
        $this->db = (new DBA())->getPDO();
    }

    public function create(User $user)
    {
        try {
            $statement = $this->db->prepare(
                "INSERT INTO `user` (firstName, lastName, email, encryptedPassword) VALUES " .
                " (:firstName, :lastName, :email, :encryptedPassword) "
            );
            $statement->bindValue('firstName', $user->getFirstName());
            $statement->bindValue('lastName', $user->getLastName());
            $statement->bindValue('email', $user->getEmail());
            $statement->bindValue('encryptedPassword', $user->getEncryptedPassword());

            $statement->execute();
        } catch (\PDOException $exception) {
            dd($exception);
        }
    }

    public function updateUser(User $user)
    {
        $statement = $this->db->prepare('
        UPDATE user 
        SET firstName=:firstName, lastName=:lastName, email=:email, encryptedPassword=:encryptedPassword WHERE id=:id');
        $statement->bindValue('firstName', $user->getFirstName());
            $statement->bindValue('lastName', $user->getLastName());
            $statement->bindValue('email', $user->getEmail());
            $statement->bindValue('encryptedPassword', $user->getEncryptedPassword());
        $statement->bindValue(':id', $user->getId());
        $statement->execute();
    }

    public function getUser(User $user){
        try {
            $statement = $this->db->prepare(
                "SELECT * FROM `user` WHERE email=:email "
            );
            
            $statement->bindValue('email', $user->getEmail());
            

            $statement->execute();
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            dd($exception);
        }
    }

    public function findByEmail(string $email)
    {
        $statement = $this->db->prepare(
            "SELECT * FROM user WHERE email=:email LIMIT 1"
        );
        $statement->bindValue('email', $email);
        $statement->execute();
        $userData = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$userData) return false;

        return Hydrator::hydrate(User::class, $userData);
    }
}
