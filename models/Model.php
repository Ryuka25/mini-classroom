<?php
/**
 * Universal Class
 */
abstract class Model {

    /**
     * Constructor method for all class inherited from universe class
     */
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    /**
     * Hydrate method to set data
     */
    protected function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set';

            if (method_exists($this, $method)) {
                $this->$method($key, $value);
            }
        }
    }
}