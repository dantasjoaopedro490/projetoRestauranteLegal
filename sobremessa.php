<?php
namespace RestauranteLegal\Models;
 
use Exception;
 
class Sobremesa { // Propriedades da classe Sobremesa
    private int $idSobremesa;
    private string $nomeSobremesa;
    private string $descricao;
    private float $preco;
    private string $tabela = "sobremesa"; // Nome da tabela no banco de dados
 
    public function __construct(int $idSobremesa, string $nomeSobremesa, string $descricao, float $preco) {
        //$this->idSobremesa = $idSobremesa;
        $this->setIdSobremesa($idSobremesa);
        //$this->nomeSobremesa = $nomeSobremesa;
        $this->setNomeSobremesa($nomeSobremesa);
        //$this->descricao = $descricao;
        $this->setDescricao($descricao);
        //$this->preco = $preco;
        $this->setPreco($preco);
    }
 
    //Setters
    public function setIdSobremesa(int $idSobremesa): void {
        $this->idSobremesa = $idSobremesa;
    }
 
    public function setNomeSobremesa(string $nomeSobremesa): void {
        //O nome não pode ser vazio e deve possuir ao menos 3 caracteres
        if (trim($nomeSobremesa) == "") {
        throw new Exception("O nome da sobremesa não pode ser vazio.");
        } else if (strlen($nomeSobremesa) < 3) {
        throw new Exception("O nome da sobremesa deve ter ao menos 3 caracteres.");
        }
        $this->nomeSobremesa = $nomeSobremesa;
    }
 
    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }
 
    //public function setPreco(float $preco): void {
      //  //O preço não pode ser menor do que 0 (a tipagem float já protege contra textos inválidos)
        //if ($preco < 0) {
        //    throw new Exception("O preço da sobremesa não pode ser menor do que zero.");
        //}
        //$this->preco = $preco;
    //}
 
    public function setPreco($preco): void {
        //Impede que o usuário insira um texto como parâmetro do preço
        if (!is_numeric($preco)) {
            throw new Exception("O preço deve ser um valor numérico válido. Textos não são permitidos.");
        }
 
        //O preço não pode ser menor do que 0
        if ($preco < 0) {
            throw new Exception("O preço da sobremesa não pode ser menor do que zero.");
        }
        $this->preco = (float) $preco;
    }
 
    //Método para aplicar desconto em porcentagem
    public function aplicarDesconto(float $porcentagemDesconto): void {
        if ($porcentagemDesconto < 0 || $porcentagemDesconto > 100) {
        throw new Exception("O valor do desconto deve ser entre 0 e 100 porcento.");
        }
        $desconto = ($this->preco * $porcentagemDesconto) / 100;
        $this->preco -= $desconto;
    }
 
    //Getters
    public function getIdSobremesa(): int {
        return $this->idSobremesa;
    }
 
    public function getNomeSobremesa(): string {
        return $this->nomeSobremesa;
    }
 
    public function getDescricao(): string {
        return $this->descricao;
    }
 
    public function getPrecoFormatado(): string {
        return "R$ " . number_format($this->preco, 2);
    }
 
    public function getSobremesaHTML(): string {
        return "======SOBREMESA CRIADA COM SUCESSO====== <br>
                id: " . $this->getIdSobremesa() . " <br>
                Nome da Sobremesa: " . $this->getNomeSobremesa() . " <br>
                Descrição: " . $this->getDescricao() . " <br>
                Preço: " . $this->getPrecoFormatado() . " <br><br>";
    }
}aaaa