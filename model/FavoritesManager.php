<?php
class FavoritesManager
{
    protected $_bdd;

    public function __construct(PDO $bdd)
    {
    	$this->setBdd($bdd);
    }

    /**
    * get value of Bdd
    *
    * @return self
    */
    public function getBdd()
    {
    	return $this->_bdd;
    }

    /**
    * set value of Bdd
    *
    * @param [PDO] $bdd
    * @return self
    */
    public function setBdd(PDO $bdd)
    {
    	$this->_bdd = $bdd;
    	return $this;
    }

    /**
    * create Favorites
    *
    * @param [int] $favorites
    * @return self
    */
    public function createFavorites($id)
    {
        $id = (int) $id;
    	$query = $this->getBdd()->prepare('INSERT INTO favorites(idUserFavorites) VALUES(:idUserFavorites)');
        $query->bindValue('idUserFavorites', $id, PDO::PARAM_INT);
    	$query->execute();
    }

    /**
    * get Favorites
    *
    * @return self
    */
    public function getFavorites($id)
    {
        $id = (int) $id;
        $query = $this->getBdd()->prepare('SELECT * FROM favorites WHERE idUserFavorites = :idUserFavorites');
        $query->bindValue('idUserFavorites', $id, PDO::PARAM_INT);
    	$query->execute();
    	$allTABLENAME = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfFavorites = [];
    	foreach ($allTABLENAME as $TABLENAME)
    	{
            $arrayOfFavorites[] = new Favorites($TABLENAME);
    	}
    	return $arrayOfFavorites;
    }

    /**
    * get TABLENAME By Id
    *
    * @param [int] $id
    * @return self
    */
    public function getTABLENAMEById($id)
    {
    	$id = (int) $id;
    	$query = $this->getBdd()->prepare('SELECT * FROM TABLENAME WHERE id = :id');
    	$query->bindValue('id', $id, PDO::PARAM_INT);
    	$query->execute();
    }

    /**
    * delete TABLENAMEById
    *
    * @param [int] $id
    * @return self
    */
    public function deleteTABLENAMEById($id)
    {
    	$id = (int) $id;
    	$query = $this->getBdd()->prepare('DELETE FROM TABLENAME WHERE id = :id');
    	$query->bindValue('id', $id, PDO::PARAM_INT);
    	$query->execute();
    }

    /**
    * update favorites
    *
    * @param [favorites] $favorites
    * @return self
    */
    public function updateFavorites(Favorites $favorites)
    {
    	$query = $this->getBdd()->prepare('UPDATE favorites SET idFavoritesOther = :idFavoritesOther WHERE idUserFavorites = :idUserFavorites');
    	$query->bindValue('idFavoritesOther', $favorites->getIdFavoritesOther(), PDO::PARAM_STR);
    	$query->bindValue('idUserFavorites', $favorites->getIdUserFavorites(), PDO::PARAM_INT);
        $query->execute();
    }
}