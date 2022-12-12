 <?php

 class DbConnection{
    private $host = 'localhost';
    private $username='root';
    private $password = '1234';
    private $database='pinterest_php';

    protected $connection;

    public function __construct(){
        if(!isset($this->connection)){
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database",$this->username,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(!$this->connection){
                print_r('Could not connect to database server');
                exit;
            }    
        }
        return $this->connection;
    }
 }

