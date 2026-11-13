<?php
require __DIR__ . "/RestauranteLegal/Config/Database.php";
require __DIR__ . "/RestauranteLegal/Models/Prato.php";
use RestauranteLegal\Config\Database;
use RestauranteLegal\Models\Prato;
$meuBancoDeDados = new Database();
$minhaConexao = $meuBancoDeDados->conectar();
if ($minhaConexao) {
    echo $minhaConexao;
} else {
    echo "Conectou!!!";
}

$meuPrato = new Prato(1, "Feijoada", "Maravilha de Feijoada", 25.00);
var_dump($meuPrato);
echo "==========PRATO CRIADO==========<br>
    Nome do Prato: " . $this->getNomePrato() . "<br>
    Descrição: " . $this->getDescricao() . "<br>
    Preço: " . $this->getPrecoFormatado() . "<br>

    echo $meuprato->getPratoHTML();