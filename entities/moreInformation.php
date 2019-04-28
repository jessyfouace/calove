<?php
class MoreInformation
{
    protected $idInformation;
    protected $description;
    protected $userIdInformation;

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
     * Get the value of idInformation
     */ 
    public function getIdInformation()
    {
        return $this->idInformation;
    }

    /**
     * set value of IdInformation
     *
     * @param [int] $idInformation
     * @return self
     */
    public function setIdInformation($idInformation)
    {
        $idInformation = (int) $idInformation;
        $this->idInformation = $idInformation;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * set value of Description
     *
     * @param [string] $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of userIdInformation
     */ 
    public function getUserIdInformation()
    {
        return $this->userIdInformation;
    }

    /**
     * Set the value of userIdInformation
     *
     * @param [int] $userIdInformation
     * @return self
     */
    public function setUserIdInformation($userIdInformation)
    {
        $userIdInformation = (int) $userIdInformation;
        $this->userIdInformation = $userIdInformation;

        return $this;
    }
}