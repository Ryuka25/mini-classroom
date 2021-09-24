<div class="jumbotron text-center">
    <h1 class="display-3">Module Category</h1>
    <p class="lead">See all Module category here !</p>
</div>
<?= $changeSuccess ?>
<div class="container border col-sm-6">
    <h1 class="text-center"> ADD NEW MODULE CATEGORY </h1>
    <form method="POST" action="<?= SERVER_URL.'?url=ModuleCategory/add/'?>">
        <div class="form-group row">
            <label for="moduleCategoryCode" class="col-sm-5 col-form-label text-center">Module Category Code : </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="moduleCategoryCode" placeholder="(*) Module Category Code">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-5 col-form-label text-center">Name : </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="name" placeholder="(*) Module Category Name">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-10">
                <button type="submit" class="btn btn-success">ADD MODULE_CATEGORY</button>
            </div>
        </div>
    </form>
</div>

<table class="table mt-2">
    <thead>
        <tr class="text-center">
            <th> Module Category Code</th>
            <th> Name </th>
            <th> ACTION </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allModuleCategory as $key=>$moduleCategory) {

            include('viewModuleCategory/showCurrentModuleCategory.php');

        }?>
    </tbody>
</table>