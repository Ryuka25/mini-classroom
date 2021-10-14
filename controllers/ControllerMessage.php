<?php 
require_once('views/View.php');

class ControllerMessage {

    private $_view;
    private $_manager;

    public function __construct($url) {
        $data = array();

        if ($url[1] == 'add') {
            $addData = array(
                'attachedDiscussion'=>$_POST['attachedDiscussion'],
                'sendByStudent' => $_POST['sendByStudent'],
                'legend' => $_POST['legend']
            );

            $this->_manager = new MessageManager;

            $this->_manager->addNewMessage($addData);

            $url = SERVER_URL.'/?url=discussion/'.$addData['attachedDiscussion'].'/message/';
            header("location:$url");
        } elseif ($url[1] == 'delete') {
            echo "Delete a message";
        }
    }
}