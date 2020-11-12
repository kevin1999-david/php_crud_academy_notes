<?php
require_once '../model/NoteModel.php';
session_start();

$noteModel = new NoteModel();

$optionAcademy = $_REQUEST['optionAcademy'];

switch ($optionAcademy) {
    case 'allStudents':
        $listStudents = $noteModel->getAllStudents();
        $_SESSION['listStudents'] = serialize($listStudents);
        header('Location: ../index.php');
        break;
    case 'loadUpdate':
        $id = $_REQUEST['id_student'];
        $student = $noteModel->getStudentById($id);
        $_SESSION['student'] = $student;
        header('Location: ../view/update.php');
        break;
    case 'updateStudent':
        $id = $_REQUEST['id_student'];
        $name = $_REQUEST['name_student'];
        $note1 = $_REQUEST['note1_student'];
        $note2 = $_REQUEST['note2_student'];

        $noteModel->updateStudent($id, $name, $note1, $note2);
        $listStudents = $noteModel->getAllStudents();
        $_SESSION['listStudents'] = serialize($listStudents);
        $_SESSION['msg_s'] = "Updated Student!";
        $_SESSION['msg_c'] = "info";

        header('Location: ../index.php');
        break;
    case 'removeStudent':

        $id = $_REQUEST['id_student'];
        $noteModel->deleteStudentById($id);
        $listStudents = $noteModel->getAllStudents();
        $_SESSION['listStudents'] = serialize($listStudents);
        $_SESSION['msg_s'] = "Deleted Student!";
        $_SESSION['msg_c'] = "danger";
        header('Location: ../index.php');
        break;
    case 'createStudent':
        $id = $_REQUEST['id_student'];
        $name = $_REQUEST['name_student'];
        $note1 = $_REQUEST['note1_student'];
        $note2 = $_REQUEST['note2_student'];
        try {
            $noteModel->createStudent($id, $name, $note1, $note2);
        } catch (Exception $e) {
            $_SESSION['msg_s'] = $e->getMessage();
            $_SESSION['msg_c'] = "danger";
            header('Location: ../index.php');
            break;
        }
        $listStudents = $noteModel->getAllStudents();
        $_SESSION['listStudents'] = serialize($listStudents);
        $_SESSION['msg_s'] = "New Student Registered";
        $_SESSION['msg_c'] = "success";
        header('Location: ../index.php');
        break;
    case 'orderByName':
        if (!isset($_SESSION['orderForm'])) {
            $_SESSION['orderForm']  = true;
            $listStudents = $noteModel->getAllStudentsOrderByName($_SESSION['orderFrom']);

            header('Location: ../index.php');
        } else {
            if ($_SESSION['orderForm']) {
                $_SESSION['orderForm']  = false;
                $listStudents = $noteModel->getAllStudentsOrderByName($_SESSION['orderForm']);
            } else {
                $_SESSION['orderForm']  = true;
                $listStudents = $noteModel->getAllStudentsOrderByName($_SESSION['orderForm']);
            }
        }
        $_SESSION['listStudents'] = serialize($listStudents);
        header('Location: ../index.php');
        break;

    case 'cleanNotes':
        $noteModel->cleanAllNotes(0);
        $listStudents = $noteModel->getAllStudents();
        $_SESSION['listStudents'] = serialize($listStudents);
        header('Location: ../index.php');
        break;
    default:
        $listStudents = $noteModel->getAllStudents();
        $_SESSION['listStudents'] = serialize($listStudents);
        header('Location: ../index.php');
        break;
}
$_SESSION['average_students'] = $noteModel->getAverageOfStudents();
