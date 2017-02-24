<?php

class Calc {


	  # Set properties

    private $score = 0;
    private $countBonus;

    # Set the method to calcuate the well-being score
    public function calculate(int $minWorkout, string $journal, int $pagesRead, int $countBonus) {

        if(isset($minWorkout)){
            $score = $score + $minWorkout;
        }

        if(isset($journal)){
            if ($journal == 'Yes'){
                $score = $score + 20;
            }
            else {
                $score = $score;
            }
        }

        if(isset($pagesRead)){
            $score = $score + $pagesRead;
        }

        if(isset($countBonus)){
            $score = $score + $countBonus*20;
        }

        return $score;

    }

} # end of class
