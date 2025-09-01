<?php
//create a class
class Sample{
    public function greet() {
        return "Hello from Sample Class!";
    }
}
//call the class

//create an instance
$sample = new Sample();

//call the greet method
echo $sample->greet();
?>