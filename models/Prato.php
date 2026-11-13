<?php

namespace RestauranteLegal\Models;
class Prato{
    private int $idPrato;
    private string $nomePrato;
    private string $descricao;
    private float $preco;
    private string $tabela = "pratos";

    public function __construct(int $id,
        string $nomePrato,
        string $descricao,
        float $preco
        ) {
        $this->idPrato = $id;
        $this->nomePrato = $nomePrato;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }
    public function getNomePrato(): string
    {
        return $this->nomePrato;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function getPrecoFormatado(): string
    {
        return "R$ " . number_format($this->preco, 2, ',', '.');
    }
}