<?php
class Filme{

    private $nome;
    private $categoria;
    private $classificacao;

    private $descricao;

    private $duração;
  public function getNameFilme(){
    return $this->name;
  }
    function __construct($nome, $categoria, $classificacao, $descricao){
        $this->name = $nome ;
        $this->categoria = $categoria ;
        $this->classificacao = $classificacao ;
        $this->descricao = $descricao ;
    }
}
class Sala{
    private $num;
    private $capacidade;
    private $filme;
  public function getNum(){
    return $this->num;
  }
    public function __construct($num, $capacidade, $filme){
      $this->num = $num ;
      $this->capacidade = $capacidade ;
      $this->filme = $filme ;
    }
  public function buySeat(){
    if($this->capacidade > 0){
      $this->capacidade = $this->capacidade - 1;
    return true;   
    }
    
    return false;
  }
}

class Ingresso{
    private $filme;
    private $sala;
    private $horario;
    public function getSala(){
      return $this->sala->getNum();
    }
    public function __construct($filme, $sala, $horario) {
        
      if(isset($filme) && isset($sala) && isset($horario)){
        if(!$sala->buySeat()){
          echo "Sala Lotada!";
          return;
        }
        $this->filme = $filme ;
        $this->sala = $sala ;
        $this->horario = $horario ;
      }
      

    }
  public function getFilme(){
    return $this->filme->getNameFilme();
  }
}

class Cliente{
private $nome;
private $ingresso;

    public function __construct($nome, $ingreso){
        $this->nome = $nome ;
        $this->ingresso = $ingreso ;
    }
  public function getData(){
    echo "nome: " . $this->nome . "; ingresso: " . $this->ingresso->getSala() . "; Filme: " . $this->ingresso->getFilme() . ";";
    
  }
}

$filme1 = new Filme("O Poderoso Chefão", "Ação", "16", "Mafia");
$sala1 = new Sala(1, 50, $filme1);
$ingresso = new Ingresso($filme1, $sala1, "20:00");
$cliente = new Cliente("João", $ingresso);


$cliente->getData();