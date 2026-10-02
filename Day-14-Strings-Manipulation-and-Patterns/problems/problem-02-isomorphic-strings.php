<?php

/**
 * Problem: Isomorphic Strings
 * Approach: Two Hash Maps
 * Time: O(n)
 * Space: O(1) (Since there are at most 256 ASCII characters)
 */
function isIsomorphic(string $s, string $t): bool
{
    // Length check
    if (strlen($s) !== strlen($t)) {
        return false;
    }

    $mapST = [];
    $mapTS = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $charS = $s[$i];
        $charT = $t[$i];

        // Check s -> t mapping
        if (isset($mapST[$charS]) && $mapST[$charS] !== $charT) {
            return false;
        }

        // Check t -> s mapping
        if (isset($mapTS[$charT]) && $mapTS[$charT] !== $charS) {
            return false;
        }

        // Create mapping
        $mapST[$charS] = $charT;
        $mapTS[$charT] = $charS;
    }

    return true;
}

// -------------------------------------------------
// Test Cases
// -------------------------------------------------
$testCases = [
    "Normal Isomorphic" => ["egg", "add"],
    "Not Isomorphic (one to many)" => ["foo", "bar"],
    "Not Isomorphic (many to one)" => ["badc", "baba"],
    "Empty strings" => ["", ""]
];

foreach ($testCases as $caseName => $data) {
    list($s, $t) = $data;
    echo "[$caseName]\n";
    echo "Input: s = \"$s\", t = \"$t\"\n";
    $result = isIsomorphic($s, $t) ? "true" : "false";
    echo "Output: $result\n\n";
}
?>
