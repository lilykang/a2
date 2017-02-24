<?php require('wbscore.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Well-Being Score</title>
		<meta charset='utf-8'>

	  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
		<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
		<link href='css/styles.css' rel='stylesheet'>

</head>
<body>

    <h1>Calculate a Score for Your Well-Being</h1>
		<h4>
		    How are you doing today? Track your well-being by entering daily information into the system. <br />
			  You will receive a score for your well-being based on your activities.
		</h4>
    <form method='POST' action='index.php'>

				<!-- Trick to makes it so that if no checkboxes are selected, we still receive $_POST data -->
	      <input type='hidden' name='alwaysPost' value='0'>

				<!-- Enter today's date -->
				<label for='todayDate'>Select today's date:</label>
				<h5>(required)</h5>
				<input type='date' name='todayDate' required id='todayDate' value='<?=$form->prefill('todayDate')?>'>

				<!-- Indicate how long the workout is using text box -->
        <label for='minWorkout'>How long (in minutes) did you work out today?</label>
				<h5>(enter a number greater than 0; number of minutes = number of points earned)</h5>
        <input type='number' name='minWorkout' id='minWorkout' value='<?=$form->prefill('minWorkout')?>'>

				<!-- Indicate whether journaled using radio button-->
				<fieldset class='radios'>
            <label for='journal'>Did you journal today?</label>
            <h5><input type='radio' name='journal' value='Yes' <?php if($journal == 'Yes') echo 'CHECKED'?>> Yes (+20 pts.)</h5>
            <h5><input type='radio' name='journal' value='No' <?php if($journal == 'No') echo 'CHECKED'?>> No</h5>
        </fieldset>

				<!-- Enter number of pages read using text box -->
				<label for='pagesRead'>How many pages did you read today?</label>
				<h5>(enter a number greater than 0; number of pages = number of points earned)</h5>
        <input type='number' name='pagesRead' id='pagesRead' value='<?=$form->prefill('pagesRead')?>'>

				<!-- Check bonus actions completed using checkbox-->
        <fieldset class='checkboxes'>
            <label>Which of the following did you do today? (Check all that apply)</label>
            <h5><input type='checkbox' name='bonus[]' value='thankyou' <?php if(strstr($results, 'thankyou')) echo 'CHECKED'?>> Writing a thank-you note (+20 pts.)</h5>
            <h5><input type='checkbox' name='bonus[]' value='kindness' <?php if(strstr($results, 'kindness')) echo 'CHECKED'?>> Doing something kind to others (+20 pts.)</h5>
            <h5><input type='checkbox' name='bonus[]' value='stranger' <?php if(strstr($results, 'stranger')) echo 'CHECKED'?>> Talking to a stranger (+20 pts.)</h5>
            <h5><input type='checkbox' name='bonus[]' value='diet' <?php if(strstr($results, 'diet')) echo 'CHECKED'?>> Eating a vegeterian diet (+20 pts.)</h5>
        </fieldset>

        <br>
        <input type='submit' class='btn btn-primary btn-small'>

    </form>

		<!-- Validating input before showing result-->
		<?php if($errors): ?>

		    <div class='alert alert-danger'>
			      <ul>
					      <?php foreach($errors as $error): ?>
								  <li><?=$error?></li>
							  <?php endforeach; ?>
						</ul>
		    </div>

		<!-- If no errors, perform calculation and display result based on input -->
		<?php elseif($form->isSubmitted()): ?>

	      <div class='alert alert-info'>Your Well-Being Score for <?=$form->sanitize($todayDate)?> is: <?=$form->sanitize($score)?></div>

		<?php endif; ?>

		<footer>
				<a href='/index.php'>&larr; Calculate Again</a>
		</footer>

</body>
</html>
