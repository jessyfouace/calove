<?php
class Favorites
{
    protected $idFavorites;
    protected $idUserFavorites;
    protected $idFavoritesOther;

    public function __construct(array $array)
    {
    	$this->hydrate($array);
    }

    public function hydrate(array $donnees)
    {
    	foreach ($donnees as $key => $value) {
    		$method = 'set' . ucfirst($key);
    		if (method_exists($this, $method)) {
    			$this->$method($value);
    		}
    	}
    }

    /**
     * Get the value of idFavorites
     */ 
    public function getIdFavorites()
    {
        return $this->idFavorites;
    }

    /**
     * set value of idFavorites
     *
     * @param [int] $idFavorites
     * @return self
     */
    public function setIdFavorites($idFavorites)
    {
        $idFavorites = (int) $idFavorites;
        $this->idFavorites = $idFavorites;

        return $this;
    }

    /**
     * Get the value of idUserFavorites
     */ 
    public function getIdUserFavorites()
    {
        return $this->idUserFavorites;
    }

    /**
     * set value of idUserFavorites
     *
     * @param [int] $idUserFavorites
     * @return self
     */
    public function setIdUserFavorites($idUserFavorites)
    {
        $idUserFavorites = (int) $idUserFavorites;
        $this->idUserFavorites = $idUserFavorites;

        return $this;
    }

    /**
     * Get the value of idFavoritesOther
     */ 
    public function getIdFavoritesOther()
    {
        return $this->idFavoritesOther;
    }

    /**
     * set value of idFavoritesOther
     *
     * @param [string] $idFavoritesOther
     * @return self
     */ 
    public function setIdFavoritesOther($idFavoritesOther)
    {
        $this->idFavoritesOther = $idFavoritesOther;

        return $this;
    }
}