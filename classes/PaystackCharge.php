<?php

class PaystackCharge{
    public $percentage;
    public $additional_charge;
    public $crossover_total;
    public $cap;

    public $charge_divider;
    public $crossover;
    public $flatline_plus_charge;
    public $flatline;

    public function __construct($percentage = 0.015, $additional_charge = 10000, $crossover_total = 250000, $cap = 200000){
        $this->percentage = $percentage;
        $this->additional_charge = $additional_charge;
        $this->crossover_total = $crossover_total;
        $this->cap = $cap;
        $this->__setup();
    }

    private function __setup(){
        $this->charge_divider = $this->__charge_divider();
        $this->crossover = $this->__crossover();
        $this->flatline_plus_charge = $this->__flatline_plus_charge();
        $this->flatline = $this->__flatline();
    }

    private function __charge_divider(){
        return floatval(1 - $this->percentage);
    }

    private function __crossover(){
        return ceil(($this->crossover_total * $this->charge_divider) - $this->additional_charge);
    }

    private function __flatline_plus_charge(){
        return floor(($this->cap - $this->additional_charge) / $this->percentage);
    }

    private function __flatline(){
        return $this->flatline_plus_charge - $this->cap;
    }

    public function add_for_kobo($amountinkobo){
        if ($amountinkobo > $this->flatline)
            return $amountinkobo + $this->cap;
        elseif ($amountinkobo > $this->crossover)
            return ceil(($amountinkobo + $this->additional_charge) / $this->charge_divider);
        else
            return ceil($amountinkobo / $this->charge_divider);
    }

    public function add_for_ngn($amountinngn){
        return $this->add_for_kobo(ceil($amountinngn * 100)) / 100;
    }
}
