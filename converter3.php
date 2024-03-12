<?php
session_start();
$title = "Currency Converter";
$nav = "converter";
require "header2.php";

if (!is_connected()) {
    header("Location: /php/site_conversion/login.php");
    exit();
}

$currency_options = ['Euro', 'Dollar', 'Yen', 'Pound', 'RDC', 'Dirham', 'Grivna']; 

$exchange_rates = [
    // 'Euro' => $_SESSION['eur-dol'] ?? 0,
    'Dollar' => $_SESSION['eur-dol'] ?? 0,
    'Yen' => $_SESSION['eur-yen'] ?? 0,
    'Pound' => $_SESSION['eur-pou'] ?? 0,
    'RDC' => $_SESSION['eur-rdc'] ?? 0,
    'Dirham' => $_SESSION['eur-dir'] ?? 0,
    'Grivna' => $_SESSION['eur-gri'] ?? 0,
];

$selected_sell_currency = $_POST['sell_currency'] ?? 'Euro';
$selected_buy_currency = $_POST['buy_currency'] ?? 'Dollar';
$input_amount = $_POST['amount'] ?? 0;

if (isset($_POST['amount'])) {
    echo "Another try?";

    $sell_exchange_rate = $exchange_rates[$selected_sell_currency] ?? 0;
    $buy_exchange_rate = $exchange_rates[$selected_buy_currency] ?? 0;

    $_SESSION['result'] = $input_amount * ($buy_exchange_rate / $sell_exchange_rate);
    $result = number_format($_SESSION['result'], 2);

    $calculation = [
        'sell_currency' => $selected_sell_currency,
        'buy_currency' => $selected_buy_currency,
        'amount' => $input_amount,
        'result' => $result,
    ];

    if (!isset($_SESSION['additions'])) {
        $_SESSION['additions'] = [];
    }
    $_SESSION['additions'][] = $calculation;

} else {
    echo "Start";
}
?>

<div class="structure">
    <h1>Currency Converter</h1>

    <br><br><br>

    <!-- FORM -->
    <div class="backg_currencies">
        <div class="addition">
            <form action="/php/site_conversion/converter.php" method='POST'>

                <div class="conv_form4">
                    <div>
                        <label for="sell_currency">SELL: </label>
                        <select id="sell_currency" name="sell_currency">
                            <?php
                            foreach ($currency_options as $currency) {
                                echo "<option value='$currency' " . ($selected_sell_currency === $currency ? 'selected' : '') . ">$currency</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="buy_currency">BUY: </label>
                        <select id="buy_currency" name="buy_currency">
                            <?php
                            foreach ($currency_options as $currency) {
                                echo "<option value='$currency' " . ($selected_buy_currency === $currency ? 'selected' : '') . ">$currency</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="amount">SELL AMOUNT: </label>
                        <input type="number" name="amount" placeholder="Sell Big Today!" step="any">
                    </div>

                    <div id
