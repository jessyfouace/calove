<?php
class Image
{
    protected $idImage;
    protected $userId;
    protected $link;

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
     * Get the value of idImage
     */ 
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * set value of IdImage
     *
     * @param [int] $idImage
     * @return self
     */
    public function setIdImage($idImage)
    {
        $idImage = (int) $idImage;
        $this->idImage = $idImage;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * set value of UserId
     *
     * @param [int] $userId
     * @return self
     */
    public function setUserId($userId)
    {
        $userId = (int) $userId;
        $this->userId = $userId;

        return $this;
    }
    
    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * set value of Link
     *
     * @param [string] $link
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }
}