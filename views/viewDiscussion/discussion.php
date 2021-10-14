<div class="row justify-content-center m-5">
    <div class="col-sm-3 bg-primary text-light p-2">

        <div class="search-bar bg-light">
            <form class="search-form d-flex justify-content-between" method="GET" action="<?= SERVER_URL.'/?url=discussion/search/'?>">
                <input class="p-2" type="text" name="discussionName" placeholder="Search" title="Enter search keyword">
                <button class="btn col-2" type="submit" title="Search"><i class="fas fa-search" title="Search"></i></button>
            </form>
        </div>
    
        <?php
            foreach ($discussionList as $key => $discussion) {
                include('showDiscussionOverview.php');
            }
        ?>
        
    </div>
    <div class="col-sm-8 bg-secondary text-light">
        <h2 class="text-center"><?= $currentDiscussion->getName() ?></h2>
        <div class="rounded bg-white text-dark m-2">
            <?php 
                foreach ($messageInTheCurrentDiscussion as $key=>$message) {
                    include('showOneMessage.php');
                }
            ?>
        </div>
        <div class="rounded bg-white text-dark ">
            <div class="container">
                <form method="POST" action="<?= SERVER_URL.'/?url=message/add/'?>">
                    <div class="form-group row">
                        <input type="hidden" name="attachedDiscussion" value="<?= $currentDiscussion->getDiscussionID()?>">
                        <input type="hidden" name="sendByStudent" value="<?= $currentUser->getAccountID() ?>">
                        <input class="col-sm-10" type="text" name="legend" placeholder=" Enter message here ...">
                        <button type="submit" class="btn btn-primary col-sm-2">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


