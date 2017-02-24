<?php
require('Form.php');
require('Tools.php');
require('Calc.php');

# Instantiate the objects we need
$form = new DWA\Form($_POST);
$calc = new Calc();

$errors = [];
$score = 0;

if($form->isSubmitted()) {

    # create variables to take user input from the form
    $todayDate = $form->get('todayDate',$default = '');
    $minWorkout = $form->get('minWorkout',$default = 0); # minutes workout
    $journal = $form->get('journal',$default = ''); # whether or not journaled
    $pagesRead = $form->get('pagesRead',$default = 0); # number of pages read

    $bonus = $form->get('bonus',$default = null); # append each bonus to the array
    foreach($bonus as $bo) {
        $results .= $bo.', ';
    }
    $countBonus = count($bonus); # count total number of bonus in the array

    # calcuate the final score using the $score method from "Calc" class

    $score = $calc->calculate($minWorkout, $journal, $pagesRead, $countBonus);

    # user input validation
    $errors = $form->validate(
        [
            'todayDate' => 'required',
            'minWorkout' => 'required|min:0',
            'pagesRead' => 'required|min:0',
            'journal' => 'required'

        ]
    );

}
