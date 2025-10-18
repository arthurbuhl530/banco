<?php

/**
 * Classe que representa a conta bancária.
 * Contém as regras de negócio para manipular o saldo.
 */
class ContaBancaria {
    
    private $saldo;



    /**
     * Construtor da classe.
     * Define o saldo inicial quando um novo objeto é criado.
     */
    public function __construct(float $saldoInicial = 0.0) {
        $this->saldo = $saldoInicial;
    }

    /**
     * Método Getter para obter o saldo atual de forma segura.
     */
    public function getSaldo(): float {
        return $this->saldo;
    }

    /**
     * Implementar a lógica para adicionar um valor ao saldo.
     * Lembre-se de validar se o valor do depósito é positivo.
     */
    public function depositar($valor): void {
       $this->saldo += $valor;
    
    }

    /**
     * Implementar a lógica para subtrair um valor do saldo.
     * Deve retornar 'true' se o saque foi bem-sucedido, e 'false' se não foi.
     * Lembre-se de validar se o valor é positivo E se há saldo suficiente na conta.
     */
    public function sacar(float $valor): bool {
        if ($valor > 0){
            if($valor <= $this->saldo){
                $this->saldo -= $valor;
                return true;
            }
        }
             return false;
            
            }
        
        
    }
