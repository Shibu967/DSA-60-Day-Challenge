<?php

/**
 * Problem: Count Vowels
 * Approach: Iteration with Lookup
 * Time: O(n) where n is the length of the string
 * Space: O(1)
 */
function countVowels(string $s): int {
    $count = 0;
    // Lowercase karke check karna aasan ho jata hai
    $s = strtolower($s);
    $vowels = "aeiou";

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        
        // Agar character vowels string ke andar maujood hai
        if (strpos($vowels, $char) !== false) {
            $count++;
        }
    }

    return $count;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal case" => "Hello World",
    "Mixed case vowels" => "aAaA",
    "No vowels" => "bcdfgh",
    "Empty string" => ""
];

foreach ($testCases as $caseName => $str) {
    echo "[$caseName]\n";
    echo "Input: \"$str\"\n";
    $result = countVowels($str);
    echo "Output: $result\n\n";
}
?>
