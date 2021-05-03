<?php
    class Question{
        public $question;
        public $answers = array();
        public $rightAnswerIndex;

        function __construct($question, $answers, $rightAnswerIndex){
            $this->question = $question;
            $this->answers = $answers;
            $this->rightAnswerIndex = $rightAnswerIndex;
        }
    }
?>