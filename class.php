<?php
//create a class
class Sample{
    public function greet() {
        return "Hello from Sample Class!<br>";
    }
    public function week_day(){
        return "Today is ".date("l");
    }
}
//call the class

//create an instance
$sample = new Sample();


//call the greet method
echo $sample->greet();
echo $sample->week_day();

?>