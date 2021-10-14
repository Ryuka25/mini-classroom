<?php 
require_once('views/View.php');

class ControllerDiscussion {

    private $_view;
    private $_manager;

    public function __construct($url) {
        $data = array();

        if (count($url) == 1){
            $url = SERVER_URL.'?url=discussion/';
            header("location:$url");
        }

        if ($url[1] == null) {

            $url = SERVER_URL.'?url=discussion/1/message';
            header("location:$url");

        } elseif ($url[2] == 'message') {
            
            $this->_view = new View('Discussion');

            if ($url[1] == null) {

                throw new Exception("Select a discussion");

            } else {
                $attachedDiscussion = $url[1];

                $view = new View("viewDiscussion/discussion");

                $this->_manager = new DiscussionManager;
                $view->setValue("discussionList",$this->_manager->getAllDiscussion());

                /** @var Discussion $currentDiscussion */
                $currentDiscussion = $this->_manager->getDiscussionByID($attachedDiscussion);
                $view->setValue("currentDiscussion", $currentDiscussion);
                $this->_manager = new MessageManager;
                $view->setValue('messageInTheCurrentDiscussion',$this->_manager->getAllMessageByDiscussion($attachedDiscussion));

                // Setting Page
                $topNavBar = new View("static/topNavBar");
                if (isset($_SESSION['account'])) {
                    $currentUser = unserialize($_SESSION['account']);
                    $topNavBar->setValue('accountID',$currentUser->getAccountID());
                }
                $view->topNavBar = $topNavBar->output();

                $view->setValue("currentUser", $currentUser);

                $view->pageTitle = $currentDiscussion->getName();

                $view->render();
            }
        }
    }
}