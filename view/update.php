<?php include_once('./partials/header.php') ?>


<?php

include '../model/Note.php';
session_start();
$student = $_SESSION['student'];
?>


<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <!-- <form action="controller/controller.php">
                <input type="hidden" value="allBooks">
                <input type="submit" value="PHP CRUD" class="navbar-brand">
            </form> -->
        <a href="controller/controller.php?optionAcademy=allStudents" class="navbar-brand">PHP CRUD STUDENT BY KEVIN CATUCUAMBA</a>
    </div>
</nav>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    UPDATE STUDENT
                </div>
                <div class="card-body">
                    <form action="../controller/controller.php">
                        <input type="hidden" value="updateStudent" name="optionAcademy">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id_student" required placeholder="Insert the id" value="<?= $student->getId() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name_student" required placeholder="Insert the name" value="<?= $student->getName() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="note1_student" required placeholder="Insert the note 1" value="<?= $student->getNote1() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="note2_student" required placeholder="Insert the note 2" value="<?= $student->getNote2() ?>">
                        </div>

                        <button class="btn btn-success btn-block"> <i class="fas fa-arrow-alt-circle-right mr-1"></i>Update Student</button>
                    </form>
                    <a href="../controller/controller.php?optionAcademy=allStudents" class="btn btn-warning btn-block mt-1"> <i class="fas fa-user-times mr-1"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('./partials/footer.php') ?>