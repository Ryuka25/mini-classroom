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

            /* $this->_manager = new DiscussionManager;
            $this->_view = new View('Discussion');

            $data['discussionList'] = $this->_manager->getAllDiscussion();
            $data['messageInTheCurrentDiscussion'] = $this->_view->generateFile('statics/noRecord.php',[]);

            $this->_view->generate($data); */

            $url = SERVER_URL.'?url=discussion/1/message';
            header("location:$url");

        } elseif ($url[2] == 'message') {
            
            $this->_view = new View('Discussion');

            if ($url[1] == null) {
                throw new Exception("Select a discussion");
            } else {
                $attachedDiscussion = $url[1];
                $data['accountID'] = $_SESSION['accountID'];

                $this->_manager = new DiscussionManager;
                $data['discussionList'] = $this->_manager->getAllDiscussion();
                $data['currentDiscussion'] = $this->_manager->getDiscussionByID($attachedDiscussion);

                $this->_manager = new MessageManager;
                $data['messageInTheCurrentDiscussion'] = $this->_manager->getAllMessageByDiscussion($attachedDiscussion);

                $this->_view->generate($data);
            }
        }
    }
}