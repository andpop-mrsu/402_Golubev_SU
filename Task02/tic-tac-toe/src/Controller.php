<?php namespace SemkaHub\ticTacToe\Controller;
    use function SemkaHub\ticTacToe\View\showGame;
    
    function startGame() {
        echo "Game started".PHP_EOL;
        showGame();
    }
?>
