<?php

/**
 * Problem 01 — in_array() vs Key Lookup Map
 *
 * Platform  : Custom
 * Difficulty: Easy
 * Pattern   : O(n) value scan vs O(1) key lookup
 *
 * Problem Statement:
 * Given an array of values ($haystack) and a list of targets ($targets),
 * return true if ALL targets exist in the haystack, false otherwise.
 *
 * Solve two ways and compare time complexity:
 *   Version A — use in_array() for each target
 *   Version B — build a lookup map once, then use isset()
 *
 * Expected Complexity:
 *   Version A — Time: O(n × m), Space: O(1)   (n = haystack size, m = targets count)
 *   Version B — Time: O(n + m), Space: O(n)    (one-time map build + O(1) checks)
 */

// ─────────────────────────────────────────────────────
// My Approach
// ─────────────────────────────────────────────────────
//
// Version A analysis:
//
// Version B analysis:
//
// Which approach is better when m (number of checks) is large?

// ─────────────────────────────────────────────────────
// Version A — in_array() per target (O(n × m))
// ─────────────────────────────────────────────────────

function allExistWithInArray(array $haystack, array $targets): bool
{
    foreach ($targets as $target) {
        if (!in_array($target, $haystack)) {  // O(n) scan per target
            return false;
        }
    }

    return true;
}

// ─────────────────────────────────────────────────────
// Version B — Lookup map + isset() (O(n + m))
// ─────────────────────────────────────────────────────

function allExistWithMap(array $haystack, array $targets): bool
{
    $lookup = [];
    foreach ($haystack as $value) {
        $lookup[$value] = true;               // O(n) — build map once
    }

    foreach ($targets as $target) {
        if (!isset($lookup[$target])) {       // O(1) avg per target
            return false;
        }
    }

    return true;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 01: in_array() vs Map Lookup ===" . PHP_EOL;
echo PHP_EOL;

$haystack = ['apple', 'banana', 'cherry', 'date'];
$targets  = ['banana', 'date'];

echo "Haystack: [" . implode(', ', $haystack) . "]" . PHP_EOL;
echo "Targets : [" . implode(', ', $targets) . "]" . PHP_EOL;
echo PHP_EOL;

echo "Version A (in_array) : " . (allExistWithInArray($haystack, $targets) ? 'true' : 'false') . PHP_EOL;
echo "Version B (map)      : " . (allExistWithMap($haystack, $targets) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;

$missing = ['banana', 'grape'];
echo "Targets (missing grape): [" . implode(', ', $missing) . "]" . PHP_EOL;
echo "Version A (in_array) : " . (allExistWithInArray($haystack, $missing) ? 'true' : 'false') . PHP_EOL;
echo "Version B (map)      : " . (allExistWithMap($haystack, $missing) ? 'true' : 'false') . PHP_EOL;
echo PHP_EOL;

echo "Version A — Time: O(n × m) | Space: O(1)" . PHP_EOL;
echo "Version B — Time: O(n + m) | Space: O(n)" . PHP_EOL;
echo "Use Version B when you need many repeated existence checks." . PHP_EOL;
