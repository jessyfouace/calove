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
    	$allFavorits = $query->fetchAll(PDO::FETCH_ASSOC);

        $allFavoritsTable = [];
    	foreach ($allFavorits as $favoris)
    	{
            $allFavoritsTable[] = new Favorites($favoris);
        }
        return $allFavoritsTable;
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
     * get personAddMe
     *
     * @return self
     */
    public function getPersonAddMe($id)
    {
        $id = '%'.$id.',%';
        $query = $this->getBdd()->prepare('SELECT * FROM favorites RIGHT JOIN user ON user.idUser = favorites.IdUserFavorites LEFT JOIN image ON user.idUser = image.userId WHERE idFavoritesOther LIKE :id');
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $allAdd = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfUser = [];
        $arrayOfFavorites = [];
        $arrayOfImage = [];
        $arrayOfAll = [];
        foreach ($allAdd as $oneAdd) {
            $arrayOfUser[] = new User($oneAdd);
            $arrayOfImage[] = new Image($oneAdd);
            $arrayOfFavorites[] = new Favorites($oneAdd);
        }
        $arrayOfAll[] = $arrayOfUser;
        $arrayOfAll[] = $arrayOfImage;
        $arrayOfAll[] = $arrayOfFavorites;
        return $arrayOfAll;
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