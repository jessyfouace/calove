<?php
class Message
{
    protected $idMessage;
    protected $idSender;
    protected $idTaker;
    protected $message;
    protected $date;

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
     * Get the value of idMessage
     */ 
    public function getIdMessage()
    {
        return $this->idMessage;
    }

    /**
     * Set the value of idMessage
     *
     * @return  self
     */ 
    public function setIdMessage($idMessage)
    {
        $this->idMessage = $idMessage;

        return $this;
    }

    /**
     * Get the value of idSender
     */ 
    public function getIdSender()
    {
        return $this->idSender;
    }

    /**
     * Set the value of idSender
     *
     * @return  self
     */ 
    public function setIdSender($idSender)
    {
        $this->idSender = $idSender;

        return $this;
    }

    /**
     * Get the value of idTaker
     */ 
    public function getIdTaker()
    {
        return $this->idTaker;
    }

    /**
     * Set the value of idTaker
     *
     * @return  self
     */ 
    public function setIdTaker($idTaker)
    {
        $this->idTaker = $idTaker;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}