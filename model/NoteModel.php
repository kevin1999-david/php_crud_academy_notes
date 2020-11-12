<?php
include 'Database.php';
include 'Note.php';

class NoteModel
{
    public function getAllStudents()
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM note";
        $res = $pdo->query($sql);
        $students = array();

        foreach ($res as $student) {
            $note = new Note(
                $student['id'],
                $student['name'],
                $student['note1'],
                $student['note2'],
                $student['average']
            );
            array_push($students, $note);
        }
        Database::disconnect();
        return $students;
    }


    public function getAllStudentsOrderByName($orderForm)
    {
        $pdo = Database::connect();
        if ($orderForm) { #asc
            $sql = "SELECT * FROM note ORDER BY name";
        } else { #desc
            $sql = "SELECT * FROM note ORDER BY name DESC";
        }
        $res = $pdo->query($sql);
        $students = array();

        foreach ($res as $student) {
            $note = new Note(
                $student['id'],
                $student['name'],
                $student['note1'],
                $student['note2'],
                $student['average']
            );
            array_push($students, $note);
        }
        Database::disconnect();
        return $students;
    }


    public function getStudentById($id)
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM note WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $note = new Note($data['id'], $data['name'], $data['note1'], $data['note2'], $data['average']);
        Database::disconnect();
        return $note;
    }

    public function createStudent($id, $name, $note1, $note2)
    {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO note (id, name, note1, note2, average) VALUES(?, ?, ?, ?, ?)";
        $query = $pdo->prepare($sql);

        try {
            $query->execute(array(
                $id,
                $name,
                $note1,
                $note2,
                $this->getAverage($note1, $note2)
            ));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function deleteStudentById($id)
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM note WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($id));
        Database::disconnect();
    }
    public function updateStudent($id, $name, $note1, $note2)
    {
        $pdo = Database::connect();
        $sql = "UPDATE note SET name=?, note1=?, note2=?, average=? where id=?";
        $query = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $query->execute(array(
            $name,
            $note1,
            $note2,
            $this->getAverage($note1, $note2),
            $id
        ));
        Database::disconnect();
    }

    private function getAverage($note1, $note2)
    {
        return ($note1 + $note2) / 2;
    }



    public function cleanAllNotes($value)
    {
        //
        $pdo = Database::connect();
        $sql = "UPDATE note SET note1=?, note2=?, average=?;";
        $query = $pdo->prepare($sql);
        $query->execute(array(
            $value,
            $value,
            $this->getAverage($value, $value)
        ));
        Database::disconnect();
    }

    public function getAverageOfStudents()
    {
        $allS = $this->getAllStudents();
        $account = 0;
        foreach ($allS as $student) {
            $account = $account + $student->getAverage();
        }
        return $account / count($allS);
    }
}
