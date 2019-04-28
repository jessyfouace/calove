<?php
class ContactManager
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
    * create Contact
    *
    * @param [Contact] $contact
    * @return self
    */
    public function createContact(Contact $contact)
    {
    	$query = $this->getBdd()->prepare('INSERT INTO contact(idSenderContact, sujet, messageContact) VALUES(:idSenderContact, :sujet, :messageContact)');
        $query->bindValue('idSenderContact', $contact->getIdSenderContact(), PDO::PARAM_INT);
        $query->bindValue('sujet', $contact->getSujet(), PDO::PARAM_STR);
        $query->bindValue('messageContact', $contact->getMessageContact(), PDO::PARAM_STR);
    	$query->execute();
    }

    /**
    * get TABLENAME
    *
    * @return self
    */
    public function getContact()
    {
    	$query = $this->getBdd()->prepare('SELECT * FROM contact');
    	$query->execute();
    	$allContact = $query->fetchAll(PDO::FETCH_ASSOC);

    	$arrayOfContact = [];
    	foreach ($allContact as $contact)
    	{
    		$arrayOfContact[] = new Contact($contact);
    	}
    	return $arrayOfContact;
    }

    /**
     * get TABLENAME
     *
     * @return self
     */
    public function getContactById($id)
    {
        $id = (int) $id;
        $query = $this->getBdd()->prepare('SELECT * FROM contact WHERE idSenderContact = :id ORDER BY idMessageContact DESC');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $allContact = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfContact = [];
        foreach ($allContact as $contact) {
                $arrayOfContact[] = new Contact($contact);
            }
        return $arrayOfContact;
    }

    /**
     * get ContactByIdMessage
     *
     * @param [int] $id
     * @return self
     */
    public function getContactByIdMessageContact($id)
    {
        $id = (int)$id;
        $query = $this->getBdd()->prepare('SELECT * FROM contact WHERE idMessageContact = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $allContact = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayOfContact = [];
        foreach ($allContact as $contact) {
            $arrayOfContact[] = new Contact($contact);
        }
        return $arrayOfContact;
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