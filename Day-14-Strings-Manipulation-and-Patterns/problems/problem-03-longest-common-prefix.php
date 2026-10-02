<?php

/**
 * Problem: Longest Common Prefix
 * Approach: Horizontal Scanning
 * Time: O(S) where S is the sum of all characters in all strings
 * Space: O(1)
 */
function longestCommonPrefix(array $strs): string {
    if (empty($strs)) {
        return "";
    }

    // 1️⃣ First string ko prefix banao
    $prefix = $strs[0];

    // 2️⃣ Next strings ke saath check karo
    for ($i = 1; $i < count($strs); $i++) {
        
        // 3️⃣ Jab tak prefix current string ke shuru mein na mile
        while (strpos($strs[$i], $prefix) !== 0) {
            
            // NO → prefix ko ek letter chota karo
            $prefix = substr($prefix, 0, -1);
            
            // Agar prefix empty ho jaye, toh koi common nahi hai
            if ($prefix === "") {
                return "";
            }
        }
    }

    // 5️⃣ End mein prefix return
    return $prefix;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal Match" => ["flower", "flow", "flight"],
    "No Match" => ["dog", "racecar", "car"],
    "One String" => ["a"],
    "Exact Same Strings" => ["apple", "apple", "apple"]
];

foreach ($testCases as $caseName => $strs) {
    echo "[$caseName]\n";
    echo "Input: [" . implode(", ", $strs) . "]\n";
    $result = longestCommonPrefix($strs);
    echo "Output: \"$result\"\n\n";
}
?>
