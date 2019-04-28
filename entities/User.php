<?php
class User
{
    protected $idUser;
    protected $pseudo;
    protected $firstnameUser;
    protected $lastnameUser;
    protected $password;
    protected $emailUser;
    protected $ip;
    protected $forgetPassword;
    protected $sexe;
    protected $searchSexe;
    protected $role;

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
     * set value of IdUser
     *
     * @param [int] $idUser
     * @return self
     */
    public function setIdUser($idUser)
    {
        $idUser = (int)$idUser;
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * set value of pseudo
     *
     * @param [string] $pseudo
     * @return self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * set value of firstnameUser
     *
     * @param [string] $firstnameUser
     * @return self
     */
    public function setFirstnameUser($firstnameUser)
    {
        $this->firstnameUser = $firstnameUser;

        return $this;
    }

    /**
     * set value of LastnameUser
     *
     * @param [string] $lastnameUser
     * @return self
     */
    public function setLastnameUser($lastnameUser)
    {
        $this->lastnameUser = $lastnameUser;

        return $this;
    }

    /**
     * set value of password
     *
     * @param [string] $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * set value of emailUser
     *
     * @param [string] $emailUser
     * @return self
     */
    public function setEmailUser($emailUser)
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    /**
     * set value of ip
     *
     * @param [string] $ip
     * @return self
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * set value of forgetPassword
     *
     * @param [string] $forgetPassword
     * @return self
     */
    public function setForgetPassword($forgetPassword)
    {
        $this->forgetPassword = $forgetPassword;

        return $this;
    }

    /**
     * get value of IdUser
     *
     * @return self
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Get the value of pseudo
     * 
     * @return self
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Get the value of firstname
     * 
     * @return self
     */
    public function getFirstname()
    {
        return $this->firstnameUser;
    }

    /**
     * Get the value of lastname
     * 
     * @return self
     */
    public function getLastname()
    {
        return $this->lastnameUser;
    }

    /**
     * Get the value of password
     * 
     * @return self
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of mail
     * 
     * @return self
     */
    public function getMail()
    {
        return $this->emailUser;
    }

    /**
     * Get the value of ip
     * 
     * @return self
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the value of forgetPassword
     * 
     * @return self
     */
    public function getForgetPassword()
    {
        return $this->forgetPassword;
    }

    /**
     * Get the value of sexe
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * set value of Sexe
     *
     * @param [string] $sexe
     * @return self
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of searchSexe
     */
    public function getSearchSexe()
    {
        return $this->searchSexe;
    }

    /**
     * set value of SearchSexe
     *
     * @param [string] $searchSexe
     * @return self
     */
    public function setSearchSexe($searchSexe)
    {
        $this->searchSexe = $searchSexe;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * set value of role
     *
     * @param [string] $role
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}
