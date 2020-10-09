<?php
    require "Database.php";
    
    class General{

    public $db;
    protected $table;

    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * Get all informations
     *
     */
    public function getAll()
    {
      $this->db->query("SELECT * FROM $this->table");
    }

        
    }