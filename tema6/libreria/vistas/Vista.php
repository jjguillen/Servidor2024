<?php

    abstract class Vista {

        protected $html;

        public function __construct()
        {
            $html = "";
        }

        public abstract function render($elementos);

    }




?>