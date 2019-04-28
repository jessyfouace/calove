<?php
class Contact
{
    protected $idMessageContact;
    protected $idSenderContact;
    protected $idAdmin;
    protected $messageContact;
    protected $sujet;
    protected $status;

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
     * Get the value of idMessageContact
     */ 
    public function getIdMessageContact()
    {
        return $this->idMessageContact;
    }

    /**
     * Set the value of idMessageContact
     *
     * @return  self
     */ 
    public function setIdMessageContact($idMessageContact)
    {
        $this->idMessageContact = $idMessageContact;

        return $this;
    }

    /**
     * Get the value of idSenderContact
     */ 
    public function getIdSenderContact()
    {
        return $this->idSenderContact;
    }

    /**
     * Set the value of idSenderContact
     *
     * @return  self
     */ 
    public function setIdSenderContact($idSenderContact)
    {
        $this->idSenderContact = $idSenderContact;

        return $this;
    }

    /**
     * Get the value of idAdmin
     */ 
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set the value of idAdmin
     *
     * @return  self
     */ 
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * Get the value of messageContact
     */ 
    public function getMessageContact()
    {
        return $this->messageContact;
    }

    /**
     * Set the value of messageContact
     *
     * @return  self
     */ 
    public function setMessageContact($messageContact)
    {
        $this->messageContact = $messageContact;

        return $this;
    }

    /**
     * Get the value of sujet
     */ 
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set the value of sujet
     *
     * @return  self
     */ 
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}