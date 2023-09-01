<?php
function isPalindrome($word) {
    $reversed = strrev($word);
    return $word === $reversed;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $words = $_POST["words"];
    $wordList = explode(",", $words);

    $palindromes = array_filter($wordList, function ($word) {
        return isPalindrome(trim($word));
    });

    //respuesta JSON para los palíndromos encontrados
    header("Content-Type: application/json");
    echo json_encode($palindromes);
}
?>