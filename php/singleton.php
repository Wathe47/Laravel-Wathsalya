<?php
 
 class Singleton{
   public static $instance = null;

   private function __construct(){
      
   }

   public function getInstance(){
      if (self::$instance === null){
         self::$instance = new Singleton();
      }

      return self::$instance;
   }
 }

 $singletonInstance = Singleton::getInstance();