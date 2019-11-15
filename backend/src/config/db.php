<?php


class db{

  private $host = 'db';
  private $user = 'root';
  private $password = '';
  private $dbname = 'rise_up';


  /**
   * Uses PDP to connect to the database
   * @return object $db The database object
   */
  public function connect(){
  try
  {
    $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch (Exception $e)
  {
      die('Erreur : ' . $e->getMessage());
  }

  return $db;
  }
}
