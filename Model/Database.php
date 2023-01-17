<?php

Class Database
{
    protected $conn = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    	
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
    }

    public function select($query = "", $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query, $params);
            $result =$stmt->get_result()->fetch_all(MYSQLI_ASSOC);;
            $stmt->close();

            return $result;

        } catch (Exception $e) {
            throw New Exception( $e->getMessage() );;
        }
        return false;
    }

    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {

                foreach ($params as $key => $value) {
                    # code...
                    $stmt->bind_param($key, $value);
                }  
            }
            $stmt->execute();
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }

    public function getAllTableNames()
    {
        $query = "show tables";
        
        return $this->select($query);
    }
}