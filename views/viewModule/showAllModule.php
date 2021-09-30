<div>
    <div class="jumbotron mt-sm-3 text-center">
        <h1 class="display-3">Modules</h1>
        <p class="lead">See our avalaible modules here</p>
        <div class="text-center">
            <a class="btn btn-success m-2" href="<?= SERVER_URL.'?url=module/add/' ?>" role="button">ADD A NEW MODULES </a>
            <a class="btn btn-primary m-2" href="<?= SERVER_URL.'?url=module/' ?>" role="button"> SHOW ALL MODULES </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th> Module ID </th>
                <th> Name </th>
                <th> Description </th>
                <th> ACTION </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allModule as $key=>$module) {

                include('showCurrentModule.php');

            }?>
        </tbody>
    </table>
</div>