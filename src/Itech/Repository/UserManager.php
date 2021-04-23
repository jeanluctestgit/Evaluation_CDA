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
        SET firstName=:firstName, lastName=:lastName, email=:email, role_id=:role_id WHERE id=:id');
        $statement->bindValue('firstName', $user->getFirstName());
            $statement->bindValue('lastName', $user->getLastName());
            $statement->bindValue('email', $user->getEmail());
            $statement->bindValue('role_id', $user->getRole_id());
        $statement->bindValue(':id', $user->getId());
        $statement->execute();
    }

    public function deleteUser($id)
    {
        $sth =  $this->_db->prepare(
            'DELETE FROM user WHERE id=:id'
        );
        $sth->bindValue(':id', $id);
        $sth->execute();
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

    public function findUserById($id){
        try {
            $statement = $this->db->prepare(
                "SELECT * FROM `user` WHERE id=:id "
            );
            
            $statement->bindValue('id', $id);
            

            $statement->execute();
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            dd($exception);
        }
    }

    public function getUsers(){
        try {
            $statement = $this->db->prepare(
                "SELECT * FROM `user`"
            );
            
            
            

            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            dd($exception);
        }
    }

    public function isAdmin(User $user){
        try {
            $statement = $this->db->prepare(
                "SELECT * FROM `user` LEFT JOIN user_role ON user_role.id = user.role_id WHERE user.id =:id "
            );
            
            $statement->bindValue('id', $user->getId());
            

            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            
            return $result['role'] === 'admin';
        } catch (\PDOException $exception) {
            dd($exception);
        }
    }

    public function getRoles(){
        try {
            $statement = $this->db->prepare(
                "SELECT * FROM `user_role` "
            );
            
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
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
