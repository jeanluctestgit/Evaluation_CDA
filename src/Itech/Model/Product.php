<?php

namespace Itech\Model;

class Product {

    private $id;
    private string $titre;
    private string $prix;
    private string $created_by;

     /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId( $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getPrix(): string
    {
        return $this->prix;
    }

    /**
     * @param string $titre
     */
    public function setPrix( $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getCreated_by(): string
    {
        return $this->created_by;
    }

    /**
     * @param string $titre
     */
    public function setCreated_by( $created_by): void
    {
        $this->created_by = $created_by;
    }

}