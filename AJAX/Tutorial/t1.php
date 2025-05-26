<?php
//error_reporting(E_ALL);                 In case an error occured uncomment it and open this directly
//ini_set('display_errors', 1);

//OOP with Plain text data pass to fetch api
class Conection{
    private $db,$user,$pass,$server;

    public function ConnctDB(){
       $this->db = "Bank";
       $this->user = "root";
       $this->pass = "";
       $this->server = "localhost";

       $conn = mysqli_connect($this->server,$this->user,$this->pass,$this->db);
       return $conn;
    }
}

class Data_Fetch{
    public function RetriveProfit($con){
        $sql_statement1 = "select SUM(profit) as Profit from Expense where Year_ > 2023 and Expense = 0";
        $q1 = mysqli_query($con,$sql_statement1);
        $er = "No Data";

        if($q1){
            $result = mysqli_fetch_assoc($q1);
            return $result["Profit"];
        }

        return $er;    
    }

    public function RetriveExpense($con){
        $sql_statement1 = "select SUM(Expense) as Expense from Expense where Year_ > 2023 and Profit = 0";
        $q1 = mysqli_query($con,$sql_statement1);
        $er = "No Data";
         
        if($q1){
            $result = mysqli_fetch_assoc($q1);
            return $result["Expense"];
        }

        return $er;  
    }
}


$CONNECTION = new Conection;
$Connection_var = $CONNECTION->ConnctDB();


$DATA = new Data_Fetch;
$Income = $DATA->RetriveProfit($Connection_var);
$Expense = $DATA->RetriveExpense($Connection_var);

echo $Income."|".$Expense;
