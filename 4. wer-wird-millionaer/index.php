<?php
    require_once("question.class.php");
    $rootpath = "http://localhost/php_kurs/werwirdmillionaer/";

    $question_array = array();

    //GET DATA FROM DATABASE
    $conn = new mysqli("localhost", "root", "", "phpkurs");
    if($conn->error){
        echo "DB-Connection Failed: ".$conn->error;
    }
    $sql = "SELECT * FROM questions";
    $qry = $conn->query($sql);
    while($result = $qry->fetch_assoc()){
        $tmp_answers = array();
        $sql2 = "SELECT * FROM answers WHERE FK_question=".$result['PK_question'].";";
        $qry2 = $conn->query($sql2);
        $count = 0;
        $correct;
        while($result2 = $qry2->fetch_assoc()){
            $tmp_answers[] = $result2["answertext"];
            if($result2['isCorrect']){
                $correct = $count;
            }
            $count++;
        }
        $question_array[] = new Question($result['questiontext'], $tmp_answers, $correct);
    }

    // $question_array[] = new Question('Ein zylindrisches Gefäß in dem Speisen gekocht werden', ['Ein Topf', 'gu Lasch', 'Auf Lauf', 'Ra Gout'], 0);
    // $question_array[] = new Question('Was hat man redensartlich, wenn man häufig das Klo aufsuchen muss?', ['Teenagerherz', 'Grundschülerlunge', 'Konfirmandenblasee', 'Abiturientenniere'], 3);

    if(isset($_POST['restart'])){
        header("Location: $rootpath");
    }

    function showQuestion($questionIndex){
        global $question_array;
        if(!isset($question_array[$questionIndex])){
            showEndScreen();
            return;
        }
        echo "<div class='question-header'><p class='question-header-content'><b>Frage ".($questionIndex+1).":</b> ".$question_array[$questionIndex]->question."</p></div>";
        echo "<div class='question-answers'>";
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='questionIndex' value='$questionIndex'>";
        echo "<div class='answers-container-only'>";
        foreach($question_array[$questionIndex]->answers as $answer){
            echo "<div class='answer-container'><input name='answer' type='radio' required value='".array_search($answer, $question_array[$questionIndex]->answers)."'>";
            echo "<label>".(array_search($answer, $question_array[$questionIndex]->answers) + 1).". $answer</label></div>";
        }
        echo "</div><button type='submit' name='question-answer' class='question-submit-btn'>OK</button>";
        echo "</form>";
        echo "</div>";
    }

    function showWinScreen($question){
        echo "<div class='lose-win-container' id='win-container'>
                <div class='win-icon'>
                    <i class='fas fa-check'></i>
                </div><p>Congrats! You won ".(($question + 1) * 50)."$.</p>
                <div class='win-btn-container'>
                    <script>
                        function showNextQuestion(){
                            document.getElementById('win-container').style.display = 'none';
                            document.getElementById('next-question').style.display = 'block';
                        }
                    </script>
                    <form action='' method='post'>
                        <button type='submit' class='dark-btn win-leave-button' name='restart'>LEAVE GAME</button>
                    </form>
                    <button onclick='showNextQuestion();' class='dark-btn win-next-button'>NEXT QUESTION</button>
                </div>
            </div>";
        
        echo "<div class='next-question-container' id='next-question'>";
        showQuestion($question+1);
        echo "</div>";
    }

    function showLoseScreen(){
        echo "<div class='lose-win-container'>
                <div class='lose-icon'>
                    <i class='fas fa-times'></i>
                </div>
                <p>Wrong Answer. Do you wanna try again?</p>
                <form action='' method='post'>
                    <button type='submit' class='dark-btn lose-restart-button' name='restart'>RESTART <i class='fas fa-redo-alt'></i></button>
                </form>
            </div>";
    }
    function showEndScreen(){

        echo "<div class='lose-win-container'>
                <div class='end-icon'>
                    <i class='fas fa-crown'></i>
                </div>
                <p>Congratulations! You finished the Quiz. Your Endprice is ".calcEndPrice()."$</p>
                <form action='' method='post'>
                    <button type='submit' class='dark-btn lose-restart-button' name='restart'>REPLAY <i class='fas fa-redo-alt'></i></button>
                </form>
            </div>";
    }

    function calcEndPrice(){
        global $question_array;
        $endprice = 0;
        for($i=0; $i < count($question_array); $i++){
            $endprice += ($i + 1) * 50;
        }
        return $endprice;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg></script>
    <link rel="stylesheet" href="style.css">
    <title>Wer wird Millionär?</title>
</head>
<body>
    <?php
        if(isset($_POST['quiz-start']) || isset($_POST['question-answer'])){
            ?>
                <div class="menu">
                    <form action="" method="post"><button type="submit" class="dark-btn" name="restart"><i class='fas fa-redo-alt'></i></button></form>
                </div>
            <?php
        }
    ?>
<div class="question-container">
    <?php
        if(isset($_POST['quiz-start']) && !isset($_POST['question-answer'])){
            showQuestion(0);
            unset($_POST['quiz-start']);
        }
        else if(isset($_POST['question-answer'])){
            if($question_array[$_POST['questionIndex']]->rightAnswerIndex == $_POST['answer']){
                showWinScreen($_POST['questionIndex']);
            }
            else{
                showLoseScreen();
            }
            unset($_POST['answer']);
            unset($_POST['questionIndex']);
            unset($_POST['question-answer']);
        }
        else{
            echo "<div class='start-quiz-container'><h1>Willkommen bei <br>WER WIRD MILLIONÄR!</h1>";
            echo "<form action='' method='post'><button name='quiz-start' class='start-quiz-button'>START QUIZ</button></form></div>";
        }
    ?>
</div>
</body>
</html>