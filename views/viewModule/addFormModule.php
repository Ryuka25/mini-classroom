<div class="jumbotron mt-sm-3 text-center">
    <h1 class="display-3">Modules</h1>
    <p class="lead">Add new module here</p>
    <div class="text-center">
        <a class="btn btn-success m-2" href="<?= SERVER_URL.'?url=module/add/' ?>" role="button">ADD A NEW MODULES </a>
        <a class="btn btn-primary m-2" href="<?= SERVER_URL.'?url=module/' ?>" role="button"> SHOW ALL MODULES </a>
    </div>
</div>

<div class="container">
    <form>
        <div class="form-group row">
            <label for="moduleId" class="col-sm-3 col-form-label"> MODULE ID :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="moduleId" placeholder="(*) Module ID">
            </div>
        </div>
        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-12">Modules Data</legend>
            <div class="col-sm-12">
                AJOUT DE MODULES ICI !!!!
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-success">Add modules</button>
            </div>
        </div>
    </form>
</div>