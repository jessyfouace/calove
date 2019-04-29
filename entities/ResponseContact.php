<?php
class ResponseContact
{
    protected $idResponse;
    protected $idMessageResponse;
    protected $messageResponse;
    protected $idUserResponse;
    
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
     * Get the value of idResponse
     */ 
    public function getIdResponse()
    {
        return $this->idResponse;
    }

    /**
     * Set the value of idResponse
     *
     * @return  self
     */ 
    public function setIdResponse($idResponse)
    {
        $this->idResponse = $idResponse;

        return $this;
    }

    /**
     * Get the value of idMessageResponse
     */ 
    public function getIdMessageResponse()
    {
        return $this->idMessageResponse;
    }

    /**
     * Set the value of idMessageResponse
     *
     * @return  self
     */ 
    public function setIdMessageResponse($idMessageResponse)
    {
        $this->idMessageResponse = $idMessageResponse;

        return $this;
    }

    /**
     * Get the value of messageResponse
     */ 
    public function getMessageResponse()
    {
        return $this->messageResponse;
    }

    /**
     * Set the value of messageResponse
     *
     * @return  self
     */ 
    public function setMessageResponse($messageResponse)
    {
        $this->messageResponse = $messageResponse;

        return $this;
    }

    /**
     * Get the value of idUserResponse
     */ 
    public function getIdUserResponse()
    {
        return $this->idUserResponse;
    }

    /**
     * Set the value of idUserResponse
     *
     * @return  self
     */ 
    public function setIdUserResponse($idUserResponse)
    {
        $this->idUserResponse = $idUserResponse;

        return $this;
    }
}