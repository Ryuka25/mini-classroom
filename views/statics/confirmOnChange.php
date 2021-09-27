<div class="alert alert-warning" role="alert">
    <div class="row">
        <div class="col-sm-12 text-center">
            <strong>Warning! You are about to "<?= $updateAction ?>" "<?= $elementName ?>" from "<?= $elementUpdated ?>" where the REF is: { <?= $elementRef ?> } ? </strong>
            <div>
                <a href="<?= SERVER_URL.'?url=schoolClass/delete/'.$elementRef?>" class="btn btn-danger">CONFIRM</a> or <a href="<?= SERVER_URL.'?url=schoolClass'?>" class="btn btn-success">CANCEL</a>
            </div>
        </div>
        
    </div>
</div>