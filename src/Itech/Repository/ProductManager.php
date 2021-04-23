<?php

namespace Itech\Repository;
use Itech\Model\Product;

class ProductManager {
    private \PDO $_db;

    public function __construct(\PDO $db) {
        $this->setDb($db);
    }

    public function setDb(\PDO $db) {
        $this->_db = $db;
    }

    public function getProducts(): array
    {
        $sth =  $this->_db->prepare(
            'SELECT * FROM produits'
        );

        $sth->execute();
        return $sth->fetchAll();
    }

    public function findProductsByAuthor($id): array
    {
        $sth =  $this->_db->prepare(
            'SELECT * FROM produits WHERE created_by=:created_by'
        );
        $sth->bindValue(':created_by', $id);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function findProductById($id): array
    {
        $sth =  $this->_db->prepare(
            'SELECT * FROM produits WHERE id=:id'
        );
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetch();
    }

    public function delete($id)
    {
        $sth =  $this->_db->prepare(
            'DELETE FROM produits WHERE id=:id'
        );
        $sth->bindValue(':id', $id);
        $sth->execute();
    }

    public function addProduct(Product $product)
    {
        $ADD_ARTICLE = $this->_db->prepare('
            INSERT INTO produits 
            SET titre=:titre, prix=:prix, created_by=:created_by');

        $ADD_ARTICLE->bindValue(':titre', $product->getTitre());
        $ADD_ARTICLE->bindValue(':prix', $product->getPrix());
        $ADD_ARTICLE->bindValue(':created_by', $product->getCreated_by());
        

        $ADD_ARTICLE->execute();
    }

    public function updateProduct(Product $product)
    {
        $UPDATE_ARTICLE = $this->_db->prepare('
            UPDATE produits 
            SET titre=:titre, prix=:prix WHERE id=:id');

        $UPDATE_ARTICLE->bindValue(':titre', $product->getTitre());
        $UPDATE_ARTICLE->bindValue(':prix', $product->getPrix());
        $UPDATE_ARTICLE->bindValue(':id', $product->getId());
        

        $UPDATE_ARTICLE->execute();
    }

}