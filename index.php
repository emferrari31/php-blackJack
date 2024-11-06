<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP BlackJack Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Welcome to Blackjack!</h1>

<div class="both-button-container">
<!-- Modal Trigger -->
<div class="modal-container">
    <!-- Trigger/Open the Modal -->
    <span><button onclick="document.getElementById('id01').style.display='flex'" class="w3-button">About</button> </span>

    <!-- The Modal -->
    <div id="id01" class="modal" style="display:none;"> <!-- Initially hidden modal -->
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'"
                      class="w3-button w3-display-topright">&times;</span>
                <h3>Welcome to Blackjack!</h3>
                This is a simplified version of the classic Blackjack game, created with PHP, HTML, and CSS.
                    <br><br>Here's how to play:</p>
                <h3>Card Values:</h3>
                👉 Cards numbered 2 through 10 are worth their face value (e.g., a 2 is worth 2 points, a 3 is worth 3 points, and so on).<br>
                👉 Jacks (J), Queens (Q), and Kings (K) are each worth 10 points.<br>
                👉 Aces (A) are worth 11 points.
                <h3>How the Game Works:</h3>

                👉 Each player starts with two cards, and the total score is the sum of those cards.<br>
                👉 The aim is to have the highest score without going over 21.<br>
                👉 If a player goes over 21, the other player wins.<br>
                👉 If both players have the same score, or both go over 21, it’s a draw.<br>
                <h3>Special Rule:</h3>

                If a player's score is less than 14, they are automatically given a third card to try to improve their hand.<br><br>
                Good luck, and may the best player win!
            </div>
        </div>
    </div>
</div>
<div class="button-container">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit" class="play-again-btn">Deal the cards</button>
    </form>
</div>
</div>
<?php
// The deck of cards array
$deckOfCards = [
    ["suit" => "spades", "name" => '2', "points" => 2, "svg" => 'svgs/2_of_spades.svg'],
    ["suit" => "spades", "name" => '3', "points" => 3, "svg" => 'svgs/3_of_spades.svg'],
    ["suit" => "spades", "name" => '4', "points" => 4, "svg" => 'svgs/4_of_spades.svg'],
    ["suit" => "spades", "name" => '5', "points" => 5, "svg" => 'svgs/5_of_spades.svg'],
    ["suit" => "spades", "name" => '6', "points" => 6, "svg" => 'svgs/6_of_spades.svg'],
    ["suit" => "spades", "name" => '7', "points" => 7, "svg" => 'svgs/7_of_spades.svg'],
    ["suit" => "spades", "name" => '8', "points" => 8, "svg" => 'svgs/8_of_spades.svg'],
    ["suit" => "spades", "name" => '9', "points" => 9, "svg" => 'svgs/9_of_spades.svg'],
    ["suit" => "spades", "name" => '10', "points" => 10, "svg" => 'svgs/10_of_spades.svg'],
    ["suit" => "spades", "name" => 'J', "points" => 10, "svg" => 'svgs/j_of_spades.svg'],
    ["suit" => "spades", "name" => 'Q', "points" => 10, "svg" => 'svgs/q_of_spades.svg'],
    ["suit" => "spades", "name" => 'K', "points" => 10, "svg" => 'svgs/k_of_spades.svg'],
    ["suit" => "spades", "name" => 'A', "points" => 11, "svg" => 'svgs/1_of_spades.svg'],
    ["suit" => "clubs", "name" => '2', "points" => 2, "svg" => 'svgs/2_of_clubs.svg'],
    ["suit" => "clubs", "name" => '3', "points" => 3, "svg" => 'svgs/3_of_clubs.svg'],
    ["suit" => "clubs", "name" => '4', "points" => 4, "svg" => 'svgs/4_of_clubs.svg'],
    ["suit" => "clubs", "name" => '5', "points" => 5, "svg" => 'svgs/5_of_clubs.svg'],
    ["suit" => "clubs", "name" => '6', "points" => 6, "svg" => 'svgs/6_of_clubs.svg'],
    ["suit" => "clubs", "name" => '7', "points" => 7, "svg" => 'svgs/7_of_clubs.svg'],
    ["suit" => "clubs", "name" => '8', "points" => 8, "svg" => 'svgs/8_of_clubs.svg'],
    ["suit" => "clubs", "name" => '9', "points" => 9, "svg" => 'svgs/9_of_clubs.svg'],
    ["suit" => "clubs", "name" => '10', "points" => 10, "svg" => 'svgs/10_of_clubs.svg'],
    ["suit" => "clubs", "name" => 'J', "points" => 10, "svg" => 'svgs/j_of_clubs.svg'],
    ["suit" => "clubs", "name" => 'Q', "points" => 10, "svg" => 'svgs/q_of_clubs.svg'],
    ["suit" => "clubs", "name" => 'K', "points" => 10, "svg" => 'svgs/k_of_clubs.svg'],
    ["suit" => "clubs", "name" => 'A', "points" => 11, "svg" => 'svgs/1_of_clubs.svg'],
    ["suit" => "hearts", "name" => '2', "points" => 2, "svg" => 'svgs/2_of_hearts.svg'],
    ["suit" => "hearts", "name" => '3', "points" => 3, "svg" => 'svgs/3_of_hearts.svg'],
    ["suit" => "hearts", "name" => '4', "points" => 4, "svg" => 'svgs/4_of_hearts.svg'],
    ["suit" => "hearts", "name" => '5', "points" => 5, "svg" => 'svgs/5_of_hearts.svg'],
    ["suit" => "hearts", "name" => '6', "points" => 6, "svg" => 'svgs/6_of_hearts.svg'],
    ["suit" => "hearts", "name" => '7', "points" => 7, "svg" => 'svgs/7_of_hearts.svg'],
    ["suit" => "hearts", "name" => '8', "points" => 8, "svg" => 'svgs/8_of_hearts.svg'],
    ["suit" => "hearts", "name" => '9', "points" => 9, "svg" => 'svgs/9_of_hearts.svg'],
    ["suit" => "hearts", "name" => '10', "points" => 10, "svg" => 'svgs/10_of_hearts.svg'],
    ["suit" => "hearts", "name" => 'J', "points" => 10, "svg" => 'svgs/j_of_hearts.svg'],
    ["suit" => "hearts", "name" => 'Q', "points" => 10, "svg" => 'svgs/q_of_hearts.svg'],
    ["suit" => "hearts", "name" => 'K', "points" => 10, "svg" => 'svgs/k_of_hearts.svg'],
    ["suit" => "hearts", "name" => 'A', "points" => 11, "svg" => 'svgs/1_of_hearts.svg'],
    ["suit" => "diamonds", "name" => '2', "points" => 2, "svg" => 'svgs/2_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '3', "points" => 3, "svg" => 'svgs/3_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '4', "points" => 4, "svg" => 'svgs/4_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '5', "points" => 5, "svg" => 'svgs/5_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '6', "points" => 6, "svg" => 'svgs/6_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '7', "points" => 7, "svg" => 'svgs/7_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '8', "points" => 8, "svg" => 'svgs/8_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '9', "points" => 9, "svg" => 'svgs/9_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => '10', "points" => 10, "svg" => 'svgs/10_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => 'J', "points" => 10, "svg" => 'svgs/j_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => 'Q', "points" => 10, "svg" => 'svgs/q_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => 'K', "points" => 10, "svg" => 'svgs/k_of_diamonds.svg'],
    ["suit" => "diamonds", "name" => 'A', "points" => 11, "svg" => 'svgs/1_of_diamonds.svg'],
];

// Function to draw a card
function drawCard(&$deck) {
    shuffle($deck);            // Shuffle the deck
    return array_pop($deck);    // Pop and return the last card
}

// Deal cards to players
$player1Cards = [drawCard($deckOfCards), drawCard($deckOfCards)];
$player2Cards = [drawCard($deckOfCards), drawCard($deckOfCards)];

// Calculate scores
$player1Score = $player1Cards[0]['points'] + $player1Cards[1]['points'];
$player2Score = $player2Cards[0]['points'] + $player2Cards[1]['points'];

// Draw additional cards if necessary
if ($player1Score <= 14) {
    $player1Cards[] = drawCard($deckOfCards);
    $player1Score = array_sum(array_column($player1Cards, 'points'));
}

if ($player2Score <= 14) {
    $player2Cards[] = drawCard($deckOfCards);
    $player2Score = array_sum(array_column($player2Cards, 'points'));
}
?>

<div class="game-container">
    <!-- Player 1 Section -->
    <section class="player">
        <h2>Player 1</h2>
        <div class="cards-container">
            <?php foreach ($player1Cards as $card): ?>
                <div class="card">
                    <img src="<?= $card['svg'] ?>" alt="<?= $card['name'] ?> of <?= $card['suit'] ?>" class="card-image">
<!--                    <p class="card-value">--><?php //= $card['name'] ?><!--</p>-->
<!--                    <p class="card-suit">--><?php //= $card['suit'] ?><!--</p>-->
                </div>
            <?php endforeach; ?>
        </div>
        <p>Total Points: <?= $player1Score ?></p>
    </section>

    <!-- Player 2 Section -->
    <section class="player">
        <h2>Player 2</h2>
        <div class="cards-container">
            <?php foreach ($player2Cards as $card): ?>
                <div class="card">
                    <img src="<?= $card['svg'] ?>" alt="<?= $card['name'] ?> of <?= $card['suit'] ?>" class="card-image">
                </div>
            <?php endforeach; ?>
        </div>
        <p>Total Points: <?= $player2Score ?></p>
    </section>
</div>
<!-- Winner Announcement -->
<section class="result">
    <?php if ($player1Score > 21): ?>
        <h2>And the winner is... Player 2!</h2>
    <?php elseif ($player2Score > 21): ?>
        <h2>And the winner is... Player 1!</h2>
    <?php elseif ($player1Score > $player2Score): ?>
        <h2>And the winner is... Player 1!</h2>
    <?php elseif ($player2Score > $player1Score): ?>
        <h2>And the winner is... Player 2!</h2>
    <?php else: ?>
        <h2>It's a draw!</h2>
    <?php endif; ?>
</section>
</body>
</html>
