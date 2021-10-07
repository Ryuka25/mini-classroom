<div class="row mt-3">
    <div class="col-sm-4 bg-primary text-light p-2">
        <h2 class="border mt-2 text-center">Liste des discussions</h2>
        <?php
            foreach ($discussionList as $key => $discussion) {
                include('viewDiscussion/showDiscussionOverview.php');
            }
        ?>
        
    </div>
    <div class="col-sm-8 bg-secondary text-light">
        <h2 class="text-center"><?= $currentDiscussion->getName() ?></h2>
        <div class="rounded bg-white text-dark m-2">
            <?php 
                foreach ($messageInTheCurrentDiscussion as $key=>$message) {
                    include('viewDiscussion/showOneMessage.php');
                }
            ?>
        </div>
        <div class="rounded bg-white text-dark ">
            <div class="container">
                <form method="POST" action="<?= SERVER_URL.'?url=message/add/'?>">
                    <div class="form-group row">
                        <input type="hidden" name="attachedDiscussion" value="<?= $currentDiscussion->getDiscussionID()?>">
                        <input type="hidden" name="sendByStudent" value="<?= $accountID ?>">
                        <input class="col-sm-10" type="text" name="legend" placeholder=" Enter message here ...">
                        <button type="submit" class="btn btn-primary col-sm-2">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


