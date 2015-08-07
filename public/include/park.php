<?php
	require_once 'model.php';

	class park extends model
	{
		protected static $table = 'national_parks';

		public static function find($id)
		{
			self::dbConnect();
			$query = 'SELECT * from national_parks WHERE id = :id';
			$stmt = self::$dbc->prepare($query);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$instance = null;
	        if ($result)
	        {
	            $instance = new static;
	            $instance->attributes = $result;
	        }
	        return $instance;
		}

		public function save() 
		{
			if(isset($this->attributes)){
				if(isset($this->attributes['id'])){
					$this->update();
				} else {
					$this->insert();
				}
			}
		}

		public function update() 
		{
			self::dbConnect();
			$query = 'UPDATE national_parks SET name = :name,
											location = :location,
											date_established = :date_established,
											area_in_acres = :area_in_acres';
			$stmt = self::$dbc->prepare($query);
			$stmt->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
			$stmt->bindValue(':location', $this->attributes['location'], PDO::PARAM_STR);
			$stmt->bindValue(':date_established', $this->attributes['date_established'], PDO::PARAM_STR);
			$stmt->bindValue(':area_in_acres', $this->attributes['area_in_acres'], PDO::PARAM_INT);
			$stmt->execute();
		}

		public function insert()
		{
			$query = 'INSERT INTO national_parks (name, location , date_established , area_in_acres) VALUES (:name , :location , :date_established, :area_in_acres);';
			$stmt = self::$dbc->prepare($query);
			$stmt->bindValue(':name' , 'name' , PDO::PARAM_STR);
			$stmt->bindValue(':location' , 'location' , PDO::PARAM_STR);
			$stmt->bindValue(':date_established' , 'date_established' , PDO::PARAM_STR);
			$stmt->bindValue(':area_in_acres' , 'area_in_acres' , PDO::PARAM_INT);
			$stmt->execute();
		}

		public function delete ()
		{
			$query = 'DELETE * from national_parks WHERE id = :id';
			$stmt = self::$dbc->prepare($query);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();			
		}

		public static function all()
		{
			self::dbConnect();
			$stmt = self::$dbc->query('SELECT * from national_parks');
			
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$instance = null;
	        if ($result)
	        {
	            $instance = new static;
	            $instance->attributes = $result;
	        }
	        return $instance;
		}

	}


?>