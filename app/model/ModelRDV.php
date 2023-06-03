<!-- ----- debut ModelRDV -->

<?php
require_once 'Model.php';

class ModelRDV {

    private $id, $patient_id, $praticien_id, $rdv_date;

    public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->patient_id = $patient_id;
            $this->praticien_id = $praticien_id;
            $this->rdv_date = $rdv_date;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPatient($patient_id) {
        $this->patient_id = $patient_id;
    }

    function setPraticien($praticien_id) {
        $this->praticien_id = $praticien_id;
    }

    function setDate($rdv_date) {
        $this->rdv_date = $rdv_date;
    }

    function getId() {
        return $this->id;
    }

    function getPatient() {
        return $this->patient_id;
    }

    function getPraticien() {
        return $this->praticien_id;
    }

    function getDate() {
        return $this->rdv_date;
    }

// Retourne tous les RDV
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des RDV
    public static function getRDV() {
        try {
            $database = Model::getInstance();
            $query = "select patient_id, praticien_id, rdv_date from rendezvous WHERE patient_id != 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results5 = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results5;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des dispos du praticien connecté
    public static function getDisposPra($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select rdv_date from rendezvous WHERE patient_id = 0 AND praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'praticien_id' => $praticien_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste des RDV pris par les patients
    public static function getRDVpris($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select p.nom, p.prenom, r.rdv_date from rendezvous r, personne p WHERE r.patient_id=p.id AND r.patient_id != 0 AND r.praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'praticien_id' => $praticien_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // RDV d'un patient donné
    public static function getmesRDV($patient_id) {
        try {
            $database = Model::getInstance();
            $query = "select p.nom, p.prenom, rdv_date from rendezvous r, personne p WHERE r.praticien_id=p.id AND r.patient_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $patient_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelRDV -->
