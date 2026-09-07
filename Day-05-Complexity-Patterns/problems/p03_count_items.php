<?php

/**
 * Problem   : Count Items Matching a Rule
 * Link      : https://leetcode.com/problems/count-items-matching-a-rule/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * Items की list दी जाती है — हर item में [type, color, name] होता है।
 * ruleKey बताता है कि किस field को check करना है।
 * ruleValue बताता है कि कौन-सी value match होनी चाहिए।
 *
 * Input:
 *   items = [["phone","blue","pixel"],["computer","silver","lenovo"],["phone","gold","iphone"]]
 *   ruleKey = "color", ruleValue = "silver"
 *
 * Output: 1
 *
 * ─────────────────────────────────────────
 * APPROACH:
 * ruleKey को index में convert करो:
 *   "type"  → 0
 *   "color" → 1
 *   "name"  → 2
 *
 * फिर single loop में हर item का वो index check करो।
 *
 * ─────────────────────────────────────────
 * COMPLEXITY:
 * Time  : O(n) — single loop, n = items count
 * Space : O(1) — sirf counter variable
 *
 * ─────────────────────────────────────────
 * PATTERN LEARNED:
 * Single pass, O(1) space — jab sirf count karna ho
 * ─────────────────────────────────────────
 */

function countMatches(array $items, string $ruleKey, string $ruleValue): int
{
    // ruleKey ko index mein convert karo
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

    // Time: O(n) — har item ek baar check hota hai
    // Space: O(1) — sirf $count variable
    return $count;
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 3: Count Items Matching a Rule ===" . PHP_EOL . PHP_EOL;

$items = [
    ["phone",    "blue",   "pixel"],
    ["computer", "silver", "lenovo"],
    ["phone",    "gold",   "iphone"],
];

echo "Test 1: ruleKey='color', ruleValue='silver'" . PHP_EOL;
echo "Output:   " . countMatches($items, "color", "silver") . PHP_EOL;
echo "Expected: 1" . PHP_EOL . PHP_EOL;

echo "Test 2: ruleKey='type', ruleValue='phone'" . PHP_EOL;
echo "Output:   " . countMatches($items, "type", "phone") . PHP_EOL;
echo "Expected: 2" . PHP_EOL . PHP_EOL;

$items2 = [
    ["phone",    "blue",   "pixel"],
    ["computer", "silver", "phone"],
    ["phone",    "gold",   "iphone"],
];

echo "Test 3: ruleKey='name', ruleValue='phone'" . PHP_EOL;
echo "Output:   " . countMatches($items2, "name", "phone") . PHP_EOL;
echo "Expected: 1" . PHP_EOL;
