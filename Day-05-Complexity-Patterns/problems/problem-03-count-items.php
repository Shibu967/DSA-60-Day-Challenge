<?php

/**
 * Problem 03 — Count Items Matching a Rule
 *
 * Platform  : LeetCode
 * Difficulty: Easy
 * Pattern   : Single loop, index mapping
 *
 * Problem Statement:
 * Given a list of items where each item is [type, color, name],
 * and a ruleKey + ruleValue, count how many items match the rule.
 * ruleKey maps to: "type" → index 0, "color" → index 1, "name" → index 2.
 *
 * Time  : O(n) — one pass through all items
 * Space : O(1) — only a counter variable, no extra storage
 */

// ─────────────────────────────────────────────────────
// My Approach (Solved Independently)
// ─────────────────────────────────────────────────────
// Convert ruleKey to an array index using match expression.
// Then loop through items and check only that index.
// WHY O(n): Every item is checked exactly once.
// WHY O(1): Only one integer ($count) is stored — no extra arrays.

function countMatches(array $items, string $ruleKey, string $ruleValue): int
{
    $keyIndex = match ($ruleKey) {
        'type'  => 0,
        'color' => 1,
        'name'  => 2,
        default => -1,
    };

    $count = 0;

    foreach ($items as $item) {
        if ($item[$keyIndex] === $ruleValue) {
            $count++;
        }
    }

    return $count;
}

// ─────────────────────────────────────────────────────
// Test Cases
// ─────────────────────────────────────────────────────

echo "=== Problem 03: Count Items Matching a Rule ===" . PHP_EOL;
echo PHP_EOL;

$items = [
    ["phone",    "blue",   "pixel"],
    ["computer", "silver", "lenovo"],
    ["phone",    "gold",   "iphone"],
];

// Test 1: match by color
echo "Input : ruleKey = 'color', ruleValue = 'silver'" . PHP_EOL;
echo "Output: " . countMatches($items, "color", "silver") . PHP_EOL;   // Expected: 1
echo PHP_EOL;

// Test 2: match by type
echo "Input : ruleKey = 'type', ruleValue = 'phone'" . PHP_EOL;
echo "Output: " . countMatches($items, "type", "phone") . PHP_EOL;     // Expected: 2
echo PHP_EOL;

// Test 3: match by name
echo "Input : ruleKey = 'name', ruleValue = 'iphone'" . PHP_EOL;
echo "Output: " . countMatches($items, "name", "iphone") . PHP_EOL;    // Expected: 1
echo PHP_EOL;

echo "Time Complexity : O(n) — one loop through all items" . PHP_EOL;
echo "Space           : O(1) — only \$count variable" . PHP_EOL;
