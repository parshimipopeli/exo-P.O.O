<?php

class users
{
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $password;
    private $error = [];
    public function __construct($valeurs = array())
    {
        if (!empty($valeurs))
            $this->hydrate($valeurs);
    }
    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $methode))) {
                $this->$methode($valeur);
            }
        }
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        if (!empty($nom)){
            $this->nom = $nom;
        }else{
            $this->error[] = 'Le champ nom n\'est pas rempli !';
        }
    }
    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        if (!empty($prenom)){
            $this->prenom = $prenom;
        }else{
            $this->error[] = 'Le champ prenom n\'est pas rempli !';
        }
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        if (!empty($email) && preg_match('#^[a-z0-9][a-z0-9._-]*@[a-z0-9_-]{2,}(\.[a-z]{2,4}){1,2}$#', $email)){
            $this->email = $email;
        }else{
            $this->error[] = 'votre email n\' est pas valide';
        }
    }
    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }
    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        if (!empty($tel) && preg_match('#^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$#', $tel)) {
            $this->tel = $tel;
        }else{
            $this->error[] = 'le numéro de telephonne n\' est pas valide';
        }
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        if (!empty($password) && strlen($password) >= 8) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->password = $password;
        }else{
            $this->error[] = 'votre mot de passe n\' est pas valide';
        }
    }
    /**
     * @return array
     */
    public function getError()
    {

        return $this->error;
    }
    public function save()
    {
      $jsonOrigin = file_get_contents('json/usersJson');
        $donneesJson = json_decode($jsonOrigin, true);

        $array['nom'] = $this->getNom();
        $array['prenom'] = $this->getPrenom();
        $array['email'] = $this->getEmail();
        $array['tel'] = $this->getTel();
        $array['password'] = $this->getPassword();

        file_put_contents('json/usersJson', json_encode($array, JSON_PRETTY_PRINT), FILE_APPEND);
    }
    /**
     * @return bool
     */
    public function isValid(){
        if (count($this->error) == 0){
            return true;
        }else{
            return false;
        }
    }
}