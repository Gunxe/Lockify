<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class PasswordRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'password';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */

    public function create($title, $userName, $password, $email, $notes)
    {

        $password = openssl_encrypt($password,'cast5-cbc', '187');

        $query = "INSERT INTO $this->tableName (userID, title, username, password, email, notes) VALUES (?, ?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('isssss', $_SESSION['id'], $title, $userName, $password, $email, $notes);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
            echo new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function readByUserID($id)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE userID=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }


        $rows = array();
        while ($row = $result->fetch_object()) {
            $row->password = openssl_decrypt($row->password,'cast5-cbc', '187');
            $rows[] = $row;
        }

        

        $result->close();

        return $rows;
    }

    public function update()
    {
        $query = "UPDATE {$this->tableName} SET";
        if()

    }
}
?>