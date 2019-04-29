<?php
class ResponseContactManager
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
    public function createResponse(ResponseContact $response)
    {
    	$query = $this->getBdd()->prepare('INSERT INTO responsecontact(idMessageResponse, messageResponse, idUserResponse) VALUES(:idMessageResponse, :messageResponse, :idUserResponse)');
        $query->bindValue('idMessageResponse', $response->getIdMessageResponse(), PDO::PARAM_INT);
        $query->bindValue('messageResponse', $response->getMessageResponse(), PDO::PARAM_STR);
        $query->bindValue('idUserResponse', $response->getIdUserResponse(), PDO::PARAM_INT);
    	$query->execute();
    }

    /**
    * get TABLENAME
    *
    * @return self
    */
    public function getResponse($id)
    {
        $id = (int) $id;
        $query = $this->getBdd()->prepare('SELECT * FROM responsecontact LEFT JOIN user ON responsecontact.idUserResponse = user.idUser WHERE idMessageResponse = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    	$query->execute();
    	$allResponse = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfResponse = [];
        $arrayOfUser = [];
        $arrayOfAll = [];
    	foreach ($allResponse as $response)
    	{
            $arrayOfUser[] = new User($response);
    		$arrayOfResponse[] = new ResponseContact($response);
        }
        $arrayOfAll[] = $arrayOfUser;
        $arrayOfAll[] = $arrayOfResponse;
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