<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public function customer(){
        /* Automaticamente cria a relação entre Customer e Order, Sabendo que Dentro da tabela
        Order existe uma coluna de customer_id */
        return $this->belongsTo('App\Customer');
    }

}


