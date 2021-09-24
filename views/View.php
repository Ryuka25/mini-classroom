<?php 

class View {
    
    /** File for the current view */
    private $_file;
    /** Handle the view title */
    private $_pageTitle;

    public function __construct($action) {
        $this->_file = 'view'.$action.'.php';
        $this->_pageTitle = strtoupper($action);
    }

    /**
     * Allow to generate $file with the specified $data
     */
    public function generateFile($file, $data) {

        // Extract data to acces them in the require function
        extract($data);

        // Begin temporisation
        ob_start();

        // Get the corresponding view to the tempo
        require($file);

        // Return the $file with the specified data filled in
        return ob_get_clean();

    }

    /**
     * Allow user to generate the complete webpage 
     * with the specified data for the current view
     */
    public function generate($data) {

        // Generate portion of template view
        $content = $this->generateFile($this->_file, $data);

        // Generate the complete webpage
        $view = $this->generateFile('views/template.php', 
            array(
                'pageTitle'=>$this->_pageTitle,
                'content'=>$content
            )
        );

        // Just echo the complete webpage
        echo $view;
    }
}