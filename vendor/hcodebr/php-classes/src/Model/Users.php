<?php 
	class Users implements ClassInterface
	{
		//attributes
		private $idusers; 
		private $deslogin;
		private $despassword;
		private $inadmin;
		private $dtregister;

		//objects
		private $idperson;
		
		/**
		 * Get the value of idusers
		 */ 
		public function getIdusers()
		{
			return $this->idusers;
		}

		/**
		 * Set the value of idusers
		 *
		 * @return  self
		 */ 
		public function setIdusers($idusers)
		{
			$this->idusers = $idusers;

			return $this;
		}

		/**
		 * Get the value of idperson
		 */ 
		public function getIdperson()
		{
			return $this->idperson;
		}

		/**
		 * Set the value of idperson
		 *
		 * @return  self
		 */ 
		public function setIdperson($idperson)
		{
			$this->idperson = $idperson;

			return $this;
		}

		/**
		 * Get the value of deslogin
		 */ 
		public function getDeslogin()
		{
			return $this->deslogin;
		}

		/**
		 * Set the value of deslogin
		 *
		 * @return  self
		 */ 
		public function setDeslogin($deslogin)
		{
			$this->deslogin = $deslogin;

			return $this;
		}

		/**
		 * Get the value of despassword
		 */ 
		public function getDespassword()
		{
			return $this->despassword;
		}

		/**
		 * Set the value of despassword
		 *
		 * @return  self
		 */ 
		public function setDespassword($despassword)
		{
			$this->despassword = $despassword;

			return $this;
		}

		/**
		 * Get the value of inadmin
		 */ 
		public function getInadmin()
		{
			return $this->inadmin;
		}

		/**
		 * Set the value of inadmin
		 *
		 * @return  self
		 */ 
		public function setInadmin($inadmin)
		{
			$this->inadmin = $inadmin;

			return $this;
		}

		/**
		 * Get the value of dtregister
		 */ 
		public function getDtregister()
		{
			return $this->dtregister;
		}

		/**
		 * Set the value of dtregister
		 *
		 * @return  self
		 */ 
		public function setDtregister($dtregister)
		{
			$this->dtregister = $dtregister;

			return $this;
		}
	}//fim classe
?>
