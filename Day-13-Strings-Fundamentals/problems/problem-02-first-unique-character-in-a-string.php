<?php

/**
 * Problem: First Unique Character in a String
 * Approach: Frequency Count (Two Passes)
 * Time: O(n)
 * Space: O(1) (At most 26 lowercase English letters)
 */
function firstUniqChar(string $s): int {
    // 1. Frequency array
    $freq = [];

    // 2. First pass: count each character
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (!isset($freq[$char])) {
            $freq[$char] = 0;
        }
        $freq[$char]++;
    }

    // 3. Second pass: find first character whose frequency is exactly 1
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if ($freq[$char] === 1) {
            return $i;
        }
    }

    // 4. No unique character found
    return -1;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "First char is unique" => "leetcode",
    "Middle char is unique" => "loveleetcode",
    "No unique char" => "aabb",
    "Single char string" => "z"
];

foreach ($testCases as $caseName => $s) {
    echo "[$caseName]\n";
    echo "Input: s = \"$s\"\n";
    $result = firstUniqChar($s);
    echo "Output: $result\n\n";
}
?>
