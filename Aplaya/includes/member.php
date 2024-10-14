<?php


require_once(__DIR__ . '/database.php');

class User
{
	protected static $tbl_name = "useraccounts"; // Ensure the table name matches
	function db_fields()
	{
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}

	function listOfmembers()
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tbl_name);
		$cur = $mydb->loadResultList();
		return $cur;
	}

	function single_user($id = 0)
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tbl_name . " WHERE `id`= {$id} LIMIT 1"); // Changed to match 'id'
		$cur = $mydb->loadSingleResult();
		return $cur;
	}

	function find_all_user($name = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * 
                         FROM  " . self::$tbl_name . " 
                         WHERE  `first_name` LIKE '%{$name}%' OR `last_name` LIKE '%{$name}%'"); // Searching by first and last name
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}

	static function AuthenticateUser($email = "", $password = "")
	{
		global $mydb;

		// Prepare the query with the updated column names
		$query = "SELECT * FROM `useraccounts` WHERE `email` = ? AND `password` = ? LIMIT 1"; // Use the correct table name

		// Set the query
		$mydb->setQuery($query);

		// Bind parameters to the query
		$mydb->bind_param('ss', $email, $password);

		// Execute the query
		$cur = $mydb->executeQuery();

		// Check if a row was found
		$row_count = $mydb->num_rows($cur);

		if ($row_count == 1) {
			// Load the found user data
			$found_user = $mydb->loadSingleResult();

			// Set session variables based on updated fields
			$_SESSION['user_id'] = $found_user->id;
			$_SESSION['user_first_name'] = $found_user->first_name;
			$_SESSION['user_last_name'] = $found_user->last_name;
			$_SESSION['user_email'] = $found_user->email;
			$_SESSION['user_type'] = $found_user->user_type;
			$_SESSION['user_avatar'] = $found_user->avatar;

			return true;
		} else {
			return false;
		}
	}

	/*---Instantiation of Object dynamically---*/
	static function instantiate($record)
	{
		$object = new self;

		foreach ($record as $attribute => $value) {
			if ($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute)
	{
		return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes()
	{
		global $mydb;
		$attributes = array();
		foreach ($this->db_fields() as $field) {
			if (property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes()
	{
		global $mydb;
		$clean_attributes = array();
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $mydb->escape_value($value);
		}
		return $clean_attributes;
	}

	/*--Create, Update, and Delete methods--*/
	public function save()
	{
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create()
	{
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO " . self::$tbl_name . " (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		echo $mydb->setQuery($sql);

		if ($mydb->executeQuery()) {
			$this->id = $mydb->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update($id = 0)
	{
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . self::$tbl_name . " SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=" . $id; // Changed to 'id'
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}

	public function delete($id = 0)
	{
		global $mydb;
		$sql = "DELETE FROM " . self::$tbl_name;
		$sql .= " WHERE id=" . $id; // Changed to 'id'
		$sql .= " LIMIT 1 ";
		$mydb->setQuery($sql);

		if (!$mydb->executeQuery()) return false;
	}
}
