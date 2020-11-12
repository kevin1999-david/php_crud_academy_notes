<?php include_once('./view/partials/header.php') ?>

<?php

include './model/Note.php';
session_start();
?>



<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <!-- <form action="controller/controller.php">
                <input type="hidden" value="allBooks">
                <input type="submit" value="PHP CRUD" class="navbar-brand">
            </form> -->
        <a href="controller/controller.php?optionAcademy=allStudents" class="navbar-brand">PHP CRUD STUDENT BY KEVIN CATUCUAMBA</a>


        <div class="d-flex justify-content-end">

            <?php include_once('./view/partials/confirm_clean.php') ?>
            <?php include_once('./view/partials/see_average.php') ?>
            <button class="btn btn-warning" data-toggle="modal" data-target="#fm-modal-grid"> <i class="fas fa-broom mx-1"></i>Clean Notes</button>

            <button class="btn btn-success ml-1" data-toggle="modal" data-target="#fm-modal-grid-2"> <i class="fas fa-book-open"></i> See Average</button>

        </div>
    </div>
</nav>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <?php
            if (isset($_SESSION['msg_s'])) {
                include_once('./view/partials/message.php');
                unset($_SESSION['msg_s']);
                unset($_SESSION['msg_c']);
            }
            ?>
            <div class="card">
                <div class="card-header text-center">
                    STUDENT DATA
                </div>

                <div class="card-body">
                    <form action="controller/controller.php">
                        <input type="hidden" value="createStudent" name="optionAcademy">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id_student" required placeholder="Insert the id">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name_student" required placeholder="Insert the name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="note1_student" required placeholder="Insert the note 1">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="note2_student" required placeholder="Insert the note 2">
                        </div>
                        <button class="btn btn-success btn-block"> <i class="fas fa-arrow-alt-circle-right mr-1"></i>Create Student</button>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-md-8">

            <table class="table table-sm table-responsive-xx table-hover table-striped table-bordered">
                <thead>
                    <tr>

                        <!-- <th class="text-center"> <a class="text-dark d-block" href="#">ID</a></th> -->
                        <th class="text-center">ID</th>
                        <th class="text-center"> <a href="controller/controller.php?optionAcademy=orderByName" class="text-secondary d-block">NAME</a></th>
                        <th class="text-center">NOTE 1</th>
                        <th class="text-center">NOTE 2</th>
                        <th class="text-center">AVERAGE</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                </thead>


                <?php if (isset($_SESSION['listStudents'])) {
                    $students = unserialize($_SESSION['listStudents']);
                    foreach ($students as $student) {
                        include('./view/partials/confirm.php');
                ?>

                        <tr>
                            <td class="text-center"> <?= $student->getId(); ?> </td>
                            <td class="text-center"> <?= $student->getName(); ?> </td>
                            <td class="text-center"> <?= $student->getNote1(); ?> </td>
                            <td class="text-center"> <?= $student->getNote2(); ?> </td>
                            <td class="text-center"> <?= $student->getAverage(); ?> </td>
                            <td class="text-center">

                                <a data-toggle="tooltip" data-placement="top" title="Edit this student!" class="btn btn-primary" href="controller/controller.php?optionAcademy=loadUpdate&id_student=<?= $student->getId() ?>"> <i class="fas fa-pen-alt"></i></a>

                                <!-- <div class="d-inline-block" my-data-toggle="tool" data-placement="top" title="Remove this book!">

                                </div> -->
                                <button class="btn btn-danger" my-data-toggle="tool" data-placement="top" title="Remove this student!" data-toggle="modal" data-target="#fm-modal-grid<?= $student->getId(); ?>"> <i class="far fa-trash-alt"></i> </button>
                            </td>
                        </tr>


                <?php    }
                }  ?>


            </table>
        </div>
    </div>
</div>


<?php include_once('./view/partials/footer.php') ?>