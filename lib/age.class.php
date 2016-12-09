<?php

	class Age 
	{
		public $age;
		
		public function setage($age){
			$this->age = $age;
		}
		
		public function getage(){
			$age = $this->age;
			return $age;
		}
				
		public function hitungAge($age)
		{
			
			$bday = new DateTime($age);
			$today = new DateTime();
			
			$diff = $today->diff($bday);
			return $diff;
		}
	}

?>