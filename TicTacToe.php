<?php

class TicTacToe {
    private $board;
    private $currentPlayer;
    private $moves;
    private $result;
    private $games; // Array to store game results

    public function __construct() {
        $this->board = array_fill(0, 3, array_fill(0, 3, '-'));
        $this->currentPlayer = 'X';
        $this->moves = [];
        $this->result = '';
        $this->games = [];
    }

    public function playMove($row, $col) {
        if ($this->isValidMove($row, $col)) {
            $this->board[$row][$col] = $this->currentPlayer;
            $this->moves[] = [$row, $col, $this->currentPlayer];
            if ($this->checkWinner()) {
                $this->result = 'Player ' .$this->currentPlayer . ' wins!';
            } else if ($this->isBoardFull()) {
                $this->result = 'It\'s a draw!';
            } else {
                $this->switchPlayer();
            }
            // Store game result
            $this->games[] = [
                'moves' => $this->moves,
                'outcome' => $this->result
            ];
            return true;
        } else {
            return false;
        }
    }

    private function isValidMove($row, $col) {
        return $row >= 0 && $row < 3 && $col >= 0 && $col < 3 && $this->board[$row][$col] == '-';
    }

    private function switchPlayer() {
        $this->currentPlayer = ($this->currentPlayer == 'X') ? 'O' : 'X';
    }

    private function checkWinner() {
        // Check rows
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[$i][0] != '-' && $this->board[$i][0] == $this->board[$i][1] && $this->board[$i][1] == $this->board[$i][2]) {
                return true;
            }
        }
        // Check columns
        for ($j = 0; $j < 3; $j++) {
            if ($this->board[0][$j] != '-' && $this->board[0][$j] == $this->board[1][$j] && $this->board[1][$j] == $this->board[2][$j]) {
                return true;
            }
        }
        // Check diagonals
        if ($this->board[0][0] != '-' && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2]) {
            return true;
        }
        if ($this->board[0][2] != '-' && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0]) {
            return true;
        }
        return false;
    }
    

    private function isBoardFull() {
        foreach ($this->board as $row) {
            if (in_array('-', $row)) {
                return false;
            }
        }
        return true;
    }

    public function displayBoard() {
        echo "  0 1 2\n";
        for ($i = 0; $i < 3; $i++) {
            echo $i . ' ';
            foreach ($this->board[$i] as $cell) {
                echo $cell . ' ';
            }
            echo "\n";
        }
    }

    public function getResult() {
        return $this->result;
    }

    public function getGames() {
        return $this->games;
    }
    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }
}

$game = new TicTacToe();

while (true) {
    echo "Player " . $game->getCurrentPlayer() . "'s turn.\n";
    echo "Enter row and column (0-2, space-separated): ";
    $input = explode(' ', trim(fgets(STDIN)));
    $row = intval($input[0]);
    $col = intval($input[1]);

    if ($game->playMove($row, $col)) {
        $game->displayBoard();
        $result = $game->getResult();
        if ($result != '') {
            echo $result . PHP_EOL;
            // Store game results to file, database, or process further...
            $games = $game->getGames();
            echo "Game Results:\n";
            foreach ($games as $index => $gameData) {
                echo "Game " . ($index + 1) . ":\n";
                echo "Moves:\n";
                foreach ($gameData['moves'] as $move) {
                    echo "Player " . $move[2] . " placed " . $move[2] . " at (" . $move[0] . ", " . $move[1] . ")\n";
                }
                echo "Outcome: " . $gameData['outcome'] . "\n";
                echo "\n";
            }
            break;
        }
    } else {
        echo "Invalid move! Try again.\n";
    }
}
