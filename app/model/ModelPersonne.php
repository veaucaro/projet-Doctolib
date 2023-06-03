
<?php

require_once 'Model.php';

class ModelPersonne {

  const ADMINISTRATEUR = 0;
  const PRATICIEN = 1;
  const PATIENT = 2;

  private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id;

  public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $statut = NULL, $specialite_id = NULL) {
    // valeurs nulles si pas de passage de parametres
    if (!is_null($id)) {
      $this->id = $id;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->adresse = $adresse;
      $this->login = $login;
      $this->password = $password;
      $this->statut = $statut;
      $this->specialite_id = $specialite_id;
    }
  }

  function setId($id) {
    $this->id = $id;
  }

  function setNom($nom) {
    $this->nom = $nom;
  }

  function setPrenom($prenom) {
    $this->prenom = $prenom;
  }

  function setAdresse($adresse) {
    $this->adresse = $adresse;
  }

  function setLogin($login) {
    $this->login = $login;
  }

  function setPassword($password) {
    $this->password = $password;
  }

  function setStatut($statut) {
    $this->statut = $statut;
  }

  function setSpecialiteId($specialite_id) {
    $this->specialite_id = $specialite_id;
  }

  function getId() {
    return $this->id;
  }

  function getNom() {
    return $this->nom;
  }

  function getPrenom() {
    return $this->prenom;
  }

  function getAdresse() {
    return $this->adresse;
  }

  function getLogin() {
    return $this->login;
  }

  function getPassword() {
    return $this->password;
  }

  function getStatut() {
    return $this->statut;
  }

  function getSpecialiteId() {
    return $this->specialite_id;
  }

  public static function getOne($id) {
    try {
      $database = Model::getInstance();
      $query = "select * from doctolib_base where id = :id";
      $statement = $database->prepare($query);
      $statement->execute([
          'id' => $id
      ]);
      $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  public static function getNombrePraticien() {
    try {
      $database = Model::getInstance();
      $query = "SELECT p.nom, p.prenom, COUNT(DISTINCT r.praticien_id) AS Nombre_Praticiens FROM rendezvous r, personne p WHERE r.patient_id = p.id AND p.nom !='?' GROUP BY r.patient_id;";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  // Liste des praticiens
  public static function getPra() {
    try {
      $database = Model::getInstance();
      $query = "SELECT p.nom, p.prenom FROM personne p WHERE p.statut= 1 ;";
      $statement = $database->prepare($query);
      $statement->execute();
      $results2 = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results2;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  // Liste des patients
  public static function getPatients() {
    try {
      $database = Model::getInstance();
      $query = "SELECT p.nom, p.prenom FROM personne p WHERE p.statut= 2 AND p.nom != '?';";
      $statement = $database->prepare($query);
      $statement->execute();
      $results3 = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results3;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  // Liste des administrateurs
  public static function getAdmin() {
    try {
      $database = Model::getInstance();
      $query = "SELECT p.nom, p.prenom FROM personne p WHERE p.statut= 0 ;";
      $statement = $database->prepare($query);
      $statement->execute();
      $results4 = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results4;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  // Liste des praticiens avec leurs spécialités
  public static function getPraSpe() {
    try {
      $database = Model::getInstance();
      $query = "SELECT p.id, p.nom, p.prenom, p.adresse, s.label FROM personne p, specialite s WHERE p.specialite_id = s.id AND statut = 1;";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

  public function utilisateurExiste($login, $password) {
    try {
      // Récupérer les données de la session
      $login = $_SESSION['login'];
      $password = $_SESSION['password'];

      $database = Model::getInstance();
      $query = "SELECT * FROM personne WHERE login = :login AND password = :password";
      $statement = $database->prepare($query);
      $statement->execute([
          'login' => $login,
          'password' => $password
      ]);
      
      if ($statement->rowCount() > 0) {
        // Les informations d'identification sont valides puisques renvoie un résultat
       $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
       
       // récupérer les noms et prénoms dans des sessions pour pouvoir les mettre dans le menu

        exit;
      } else {
        // Les informations d'identification sont invalides
        // Affichez un message d'erreur ou effectuez d'autres actions appropriées.
        echo "Identifiants invalides";
      }

      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }

}

?>