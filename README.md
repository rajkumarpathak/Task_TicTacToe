Tic Tac Toe Game

This is a simple text-based implementation of the Tic Tac Toe game in PHP.
Features

    Two players taking turns (Player X and Player O).
    Display the current state of the board after each move.
    Detect and announce the winner or a draw.
    Handle invalid moves gracefully.
    Stores the results of each game, including the moves played and the outcome.
    Unit tests for validating game functionality.

Getting Started

Prerequisites

    PHP 7.0 or higher

Installation

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/...
    ```

2. Navigate to the project directory:

    cd Task_TicTacToe

Running the Game

    To start the game, run the following command in your terminal:

    bash

    php TicTacToe.php

    Follow the on-screen instructions to play the game:
        Player X and Player O take turns to enter their moves.
        Enter the row and column numbers (0-2) separated by a space to place your symbol.

Example Gameplay


Player X's turn.
Enter row and column (0-2, space-separated): 0 0 X
  0 1 2
0 X - -
1 - - -
2 - - -
Player O's turn.
Enter row and column (0-2, space-separated): 1 1 0
  0 1 2
0 X - -
1 - O -
2 - - -

Viewing Game Results

After the game ends (either with a win, draw, or invalid move), the script prints the result to the user. Additionally, it prints the history of all games played, including the moves and outcomes.