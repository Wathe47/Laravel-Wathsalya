<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;


class DatabaseConnector{
   protected static $instance = null;

   private function __construct(){
      // Laravel does the coneection using .env
   }

   public static function getInstance(): DatabaseConnector
   {
      if(self::$instance === null) {
         self::$instance = new DatabaseConnector();
      }

      return self::$instance;
   }

   public function getUsersAboveAge($age){
      return DB::select("SELECT * FROM users WHERE age>?", [$age]);
   }

   public function insertUsers($name,$email,$age){
      return DB::insert("INSERT INTO users (name,email,age) VALUES (?,?,?)",[$name,$email,$age]);
   }
}