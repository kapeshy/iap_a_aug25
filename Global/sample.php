
<?php
class Sample {
    public function greet() {
        return "Hello World!";
    }

    public function week_day() {
        return "Today is " . date('l');
    }
}

$sample = new Sample();
echo $sample->greet();
echo "<br>";
echo $sample->week_day();
?>
