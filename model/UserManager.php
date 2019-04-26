<?php
class UserManager
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
    * create TABLENAME
    *
    * @param [ENTITYNAME] $ENTITY
    * @return self
    */
    public function createTABLENAME(ENTITYNAME $ENTITY)
    {
    	$query = $this->getBdd()->prepare('INSERT INTO TABLENAME(TABLECOLUMN) VALUES(:TABLECOLUMN)');
    	$query->bindValue('TABLECOLUMN', $ENTITY->getTABLECOLUMN(), PDO::PARAM_STR);
    	$query->execute();
    }

    /**
     * get User
     *
     * @return self
     */
    public function getMyFavorits($table)
    {
        $query = $this->getBdd()->prepare('SELECT * FROM user LEFT JOIN image ON user.idUser = image.userId LEFT JOIN moreInformation ON user.idUser = moreInformation.userIdInformation WHERE user.idUser IN (' . implode(",", $table) . ') ORDER BY user.idUser DESC');
        $query->execute();
        $allUser = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfUser = [];
        $arrayOfImage = [];
        $arrayOfDescription = [];
        $arrayOfAll = [];
        foreach ($allUser as $user) {
            $arrayOfUser[] = new User($user);
            $arrayOfImage[] = new Image($user);
            $arrayOfDescription[] = new moreInformation($user);
        }
        $arrayOfAll[] = $arrayOfUser;
        $arrayOfAll[] = $arrayOfImage;
        $arrayOfAll[] = $arrayOfDescription;
        return $arrayOfAll;
    }

    /**
    * get User
    *
    * @return self
    */
    public function getUser()
    {
    	$query = $this->getBdd()->prepare('SELECT * FROM user LEFT JOIN image ON user.idUser = image.userId LEFT JOIN moreInformation ON user.idUser = moreInformation.userIdInformation ORDER BY user.idUser DESC LIMIT 12');
    	$query->execute();
    	$allUser = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfUser = [];
        $arrayOfImage = [];
        $arrayOfDescription = [];
        $arrayOfAll = [];
    	foreach ($allUser as $user)
    	{
            $arrayOfUser[] = new User($user);
            $arrayOfImage[] = new Image($user);
            $arrayOfDescription[] = new moreInformation($user);
        }
        $arrayOfAll[] = $arrayOfUser;
        $arrayOfAll[] = $arrayOfImage;
        $arrayOfAll[] = $arrayOfDescription;
    	return $arrayOfAll;
    }

    /**
     * get User
     *
     * @return self
     */
    public function getUserById($id)
    {
        $id = (int) $id;
        $query = $this->getBdd()->prepare('SELECT idUser FROM user WHERE idUser = :idUser');
        $query->bindValue('idUser', $id, PDO::PARAM_INT);
        $query->execute();
        $idUser = $query->fetch();
        return $idUser;
    }

    public function countUsers()
    {
        $query = $this->getBdd()->prepare('SELECT COUNT(*) FROM user');
        $query->execute();
        $allCount = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allCount as $count) {
            return $count;
        }

    }

    public function countUsersSexe($sexe)
    {
        $query = $this->getBdd()->prepare('SELECT COUNT(*) FROM user WHERE sexe = :searchSexe');
        $query->bindValue('searchSexe', $sexe, PDO::PARAM_STR);
        $query->execute();
        $allCount = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allCount as $count) {
            return $count;
        }
    }

    /**
     * get User
     *
     * @return self
     */
    public function getUsers($firstEntry, $messagePearPage)
    {
        $query = $this->getBdd()->prepare( 'SELECT * FROM user LEFT JOIN image ON user.idUser = image.userId LEFT JOIN moreInformation ON user.idUser = moreInformation.userIdInformation ORDER BY user.idUser DESC LIMIT :firstEntry, :messagePearPage');
        $query->bindValue('firstEntry', $firstEntry, PDO::PARAM_INT);
        $query->bindValue('messagePearPage', $messagePearPage, PDO::PARAM_INT);
        $query->execute();
        $allUser = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfUser = [];
        $arrayOfImage = [];
        $arrayOfDescription = [];
        $arrayOfAll = [];
        foreach ($allUser as $user) {
                $arrayOfUser[] = new User($user);
                $arrayOfImage[] = new Image($user);
                $arrayOfDescription[] = new moreInformation($user);
            }
        $arrayOfAll[] = $arrayOfUser;
        $arrayOfAll[] = $arrayOfImage;
        $arrayOfAll[] = $arrayOfDescription;
        return $arrayOfAll;
    }

    /**
     * get User
     *
     * @return self
     */
    public function getUsersBySexe($firstEntry, $messagePearPage, $sexe)
    {
        $query = $this->getBdd()->prepare('SELECT * FROM user LEFT JOIN image ON user.idUser = image.userId LEFT JOIN moreInformation ON user.idUser = moreInformation.userIdInformation WHERE sexe = :searchSexe ORDER BY user.idUser DESC LIMIT :firstEntry, :messagePearPage');
        $query->bindValue('firstEntry', $firstEntry, PDO::PARAM_INT);
        $query->bindValue('messagePearPage', $messagePearPage, PDO::PARAM_INT);
        $query->bindValue('searchSexe', $sexe, PDO::PARAM_STR);
        $query->execute();
        $allUser = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfUser = [];
        $arrayOfImage = [];
        $arrayOfDescription = [];
        $arrayOfAll = [];
        foreach ($allUser as $user) {
            $arrayOfUser[] = new User($user);
            $arrayOfImage[] = new Image($user);
            $arrayOfDescription[] = new moreInformation($user);
        }
        $arrayOfAll[] = $arrayOfUser;
        $arrayOfAll[] = $arrayOfImage;
        $arrayOfAll[] = $arrayOfDescription;
        return $arrayOfAll;
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
    * update TABLENAME
    *
    * @param [ENTITYNAME] $ENTITY
    * @return self
    */
    public function updateTABLENAME(ENTITYNAME $ENTITY)
    {
    	$query = $this->getBdd()->prepare('UPDATE TABLENAME SET TABLECOLUMN = :TABLECOLUMN WHERE id = :id');
    	$query->bindValue('TABLECOLUMN', $ENTITY->getTABLECOLUMN(), PDO::PARAM_STR);
    	$query->bindValue('id', $ENTITY->getId(), PDO::PARAM_INT);
    	$query->execute();
    }
}
