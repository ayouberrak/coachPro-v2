<?php




class Test {

    public function __call($nom, $arguments) {
        echo "La méthode '$nom' n'existe pas <br>";
    }
}
$t = new Test();
$t->bonjour();
$t->salut();
