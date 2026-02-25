<?php
class Calculator{
    public function calc($operator=null, $num1=null, $num2=null){
        if($num1 === null or $num2 === null){
            return "<p>Cannot perform operation. You must have three arguments. A string for the operator 
                (+,-,*,/) and two integers or floats for the numbers.<p>";
        }
        elseif(!(is_int($num1) or is_float($num1)) or !(is_int($num2) or is_float($num2))){
            return "<p>Cannot perform operation. You must have three arguments. A string for the operator 
                (+,-,*,/) and two integers or floats for the numbers.<p>";
        }
        else{
            switch($operator){
                case "+":
                    $result = $num1 + $num2;
                    return "<p>The calculation is $num1 + $num2. The answer is $result</p>";  
                case "-":
                    $result = $num1 - $num2;
                    return "<p>The calculation is $num1 - $num2. The answer is $result</p>";  
                case "*":
                    $result = $num1 * $num2;
                    return "<p>The calculation is $num1 * $num2. The answer is $result</p>";  
                case "/":
                    if($num2 == 0){
                        return "<p>The calculation is $num1 / $num2. the answer is cannot divide a number by zero!</p>";
                    }
                    $result = $num1 / $num2;
                    return "<p>The calculation is $num1 / $num2. The answer is $result</p>"; 
                default:
                    return "<p>Cannot perform operation. You must have three arguments. A string for the operator 
                        (+,-,*,/) and two integers or floats for the numbers.<p>";
            }           
        }
    }

}