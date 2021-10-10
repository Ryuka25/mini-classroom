<?php 

class View {
    
    public string $topNavBar;
    public string $pageTitle;
    /** File for the current view */
    private string $__file;
    /** Handle the current view value */
    private array $__value = array();
    /**
     * @param string filename : The name of the view
     */
    public function __construct($filePath) {
        $this->__file = $filePath.'.php';
    }
    /**
     * Set the value in the file.php
     */
    public function setValue($key, $value) {
        $this->__value[$key] = $value;
    }
    /**
     * Allow to generate $file with the specified $data
     */
    public function output() {
        // Extract data to acces them in the require function
        extract($this->__value);
        // Begin temporisation
        ob_start();
        // Get the corresponding view to the tempo
        require($this->__file);
        // Return the $file with the specified data filled in
        return ob_get_clean();
    }
    /**
     * Generate the current view
     */
    public function render() {
        $template = new View("static/template");
        $template->setValue("content" ,$this->output());
        $template->setValue("topNavBar",$this->topNavBar);
        $template->setValue("pageTitle",$this->pageTitle);

        echo $template->output();
    }
}