<?php 

class RollD20 {
    private $weightedValues;

    public function __construct($weightedValues = null) {
        $this->weightedValues = $weightedValues;
    }

    public function roll() {
        if ($this->weightedValues) {
            return $this->weightedRoll();
        } else {
            return mt_rand(1, 20);
        }
    }

    private function weightedRoll() {
        $weights = [];
        foreach ($this->weightedValues as $value => $weight) {
            $weights = array_merge($weights, array_fill(0, $weight, $value));
        }
        return $weights[array_rand($weights)];
    }
}