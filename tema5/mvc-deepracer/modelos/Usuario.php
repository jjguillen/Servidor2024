<?php

namespace DeepRacer\modelos;

    class Usuario {

        private $id;
        private $email;
        private $password;
        private $nick;

        public function __construct($id="", $email="", $password="", $nick="") {
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->nick = $nick;
        }

        


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of nick
         */ 
        public function getNick()
        {
                return $this->nick;
        }

        /**
         * Set the value of nick
         *
         * @return  self
         */ 
        public function setNick($nick)
        {
                $this->nick = $nick;

                return $this;
        }
    }