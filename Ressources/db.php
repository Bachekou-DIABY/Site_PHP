<?php
  class DB extends SQLite3
  {
      public function __construct()
      {
          $this->open('../Ressources/ECF-Banque.db');
      }
  }
