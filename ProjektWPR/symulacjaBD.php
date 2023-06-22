<?php
class User{
    private $username;
    private $password;
    private $points;
    private $accType;

    /**
     * @param $username
     * @param $password
     * @param $points
     * @param $accType
     */
    public function __construct($username, $password, $points, $accType)
    {
        $this->username = $username;
        $this->password = $password;
        $this->points = $points;
        $this->accType = $accType;
    }

    public function dupa($line)
    {
        $dupa = explode(" ", $line);
        $u = $dupa[0];
        $p = $dupa[1];
        $po = intval($dupa[2]);
        $a = $dupa[3];
        $this->username = $u;
        $this->password = $p;
        $this->points = $po;
        $this->accType = $a;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return mixed
     */
    public function getAccType()
    {
        return $this->accType;
    }

    function toString()
    {
        return "Username: " . $this->username . " Password: " . $this->getPassword() .
        " Points: " . $this->getPoints() . " Acc type: " . $this->accType;
    }
}
class Db
{
    private $USERDB;

    /**
     * @param $USERDB
     */
    public function __construct()
    {
        $this->USERDB = $this->getFromFile();
    }

    function getFromFile()
    {
        $accArr = [];
        $pliczek = fopen("Daily/baza", 'r');
        if ($pliczek) {
            $ite = 0;
            while (($linia = fgets($pliczek)) !== false) {
                $accArr[$ite] = new User($linia);
                $ite++;
            }
        }
        fclose($pliczek);
        return $accArr;
    }

    function findUsername($username)
    {
        foreach ($this->USERDB as $u) {
            if ($u->getUsername() == $username) return $u;
        }
        return 0;
    }

    function newAccount($username, $password, $points, $acctype)
    {
        $this->USERDB[count($this->USERDB)] = new User($username . " " . $password . " ". $points . " " . $acctype);
    }
    function clear(){
        file_put_contents("Daily/baza", "");
    }

    function destruct(){
        $this->clear();
        $plik = fopen('Daily/baza', 'w');
        if ($plik) {
            foreach ($this->USERDB as $u){
                fwrite($plik, $u->getUsername() . " " . $u->getPassword() . " ".$u->getPoints()." ".$u->getAccType() ."\n");
            }
            fclose($plik);
        }
    }
}