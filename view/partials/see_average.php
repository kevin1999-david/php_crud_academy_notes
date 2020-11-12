<div class="modal fade" id="fm-modal-grid-2" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">The average is:</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid text-center d-block">


                    <?php $average =  $_SESSION['average_students']  ?>
                    <h2> <strong> <?= round($average, 2) ?> </strong> </h2>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal">Accept!</button>
            </div>
        </div>
    </div>
</div>