<?php

/**
 * Problem: Valid Anagram
 * Approach: Frequency Count
 * Time: O(n)
 * Space: O(1) (Since there are at most 26 lowercase English letters)
 */
function isAnagram(string $s, string $t): bool {
    // 1. Length check (Quick win!)
    if (strlen($s) !== strlen($t)) {
        return false;
    }

    // 2. Frequency array
    $freq = [];

    // 3. Count characters of s
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (!isset($freq[$char])) {
            $freq[$char] = 0;
        }
        $freq[$char]++;
    }

    // 4. Subtract characters of t
    for ($i = 0; $i < strlen($t); $i++) {
        $char = $t[$i];
        
        // Character doesn't exist or already used up
        if (!isset($freq[$char]) || $freq[$char] === 0) {
            return false;
        }
        $freq[$char]--;
    }

    // 5. Everything matched
    return true;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal Anagram" => ["anagram", "nagaram"],
    "Not Anagram" => ["rat", "car"],
    "Different Lengths" => ["a", "ab"],
    "Same characters, different counts" => ["aacc", "ccac"]
];

foreach ($testCases as $caseName => $data) {
    list($s, $t) = $data;
    echo "[$caseName]\n";
    echo "Input: s = \"$s\", t = \"$t\"\n";
    $result = isAnagram($s, $t) ? "true" : "false";
    echo "Output: $result\n\n";
}
?>
