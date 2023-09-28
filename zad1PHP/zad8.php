<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Box{
        public $name;
        public $color;
        public $material;
        function get_name() {return $this->name;}
        function set_name($name) {$this->name = $name;}
        function get_color() {return $this->color;}
        function set_color($color) {$this->color=$color;}
        function get_material() {return $this->material;}
        function set_material($material) {$this->material=$material;}
    }
    $BigBox = new Box();
    $BigBox->set_name("BIG");$BigBox->set_color("pink");$BigBox->set_material("plastic");
    echo $BigBox->get_name()." ".$BigBox->get_color()." ".$BigBox->get_material();
    ?>
</body>
</html>