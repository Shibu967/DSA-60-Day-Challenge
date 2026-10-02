<?php

/**
 * Problem: Valid Palindrome
 * Approach: Optimized Two Pointers (In-place)
 * Time: O(n)
 * Space: O(1)
 */
function isPalindrome(string $s): bool {
    $left = 0;
    $right = strlen($s) - 1;

    while ($left < $right) {
        // Agar left wala character alphanumeric nahi hai
        while ($left < $right && !ctype_alnum($s[$left])) {
            $left++;
        }
        
        // Agar right wala character alphanumeric nahi hai
        while ($left < $right && !ctype_alnum($s[$right])) {
            $right--;
        }

        // Dono valid hain, compare lowercase karke
        if (strtolower($s[$left]) !== strtolower($s[$right])) {
            return false;
        }

        // Agar same hain, toh dono pointers aage badhao
        $left++;
        $right--;
    }

    return true;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal with punctuation" => "A man, a plan, a canal: Panama",
    "Not a palindrome" => "race a car",
    "Empty string" => " ",
    "Symbols only" => ".,,!!  "
];

foreach ($testCases as $caseName => $str) {
    echo "[$caseName]\n";
    echo "Input: \"$str\"\n";
    $result = isPalindrome($str) ? "true" : "false";
    echo "Output: $result\n\n";
}
?>
