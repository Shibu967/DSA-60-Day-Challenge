<?php

/**
 * Day 06 — Problem 05
 * Topic:   Complexity Before Coding — Duplicate Detection
 * Concept: Constraint → Expected Complexity → Approach → Code
 *
 * This problem is NOT a HashMap lesson.
 * It demonstrates HOW to use constraint-driven thinking to arrive at an approach.
 * The PHP associative array is used purely as a lookup tool — no HashMap theory.
 *
 * Run: php problem-05-complexity-before-coding.php
 */

// ─────────────────────────────────────────────────────────────
// THE SETUP
// ─────────────────────────────────────────────────────────────
//
// Input: [4, 1, 7, 3, 7, 9]
// Task:  Does this array contain any duplicate value?
//
// STEP 1: Read the constraint
//   Assume n can be up to 100,000.
//
// STEP 2: Decide required complexity
//   n = 100,000 → O(n²) will time out → need O(n) or O(n log n)
//
// STEP 3: Evaluate brute force
//   For every pair (i, j), check if arr[i] == arr[j]
//   That is O(n²) → ruled out by constraint.
//
// STEP 4: Identify the bottleneck in brute force
//   The repeated scanning. For each element, we look at all others.
//   If we could check "have I seen this before?" in O(1),
//   we could solve this in a single O(n) pass.
//
// STEP 5: Design the O(n) approach
//   Keep track of elements seen so far.
//   For each element, check if it was seen before — O(1) check.
//   If yes, we found a duplicate.
//
// ─────────────────────────────────────────────────────────────

echo "=== Problem 05: Complexity Before Coding — Duplicate Detection ===" . PHP_EOL;
echo PHP_EOL;

$arr = [4, 1, 7, 3, 7, 9];
$n   = count($arr);

echo "Input: [" . implode(', ', $arr) . "]" . PHP_EOL;
echo "n = " . $n . " (in a real problem, n could be up to 100,000)" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// APPROACH A — Brute Force: O(n²)
// Check every pair — ruled out at large n, shown for comparison
// ─────────────────────────────────────────────────────────────

$foundBrute = false;
$countBrute = 0;

for ($i = 0; $i < $n; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $countBrute++;
        if ($arr[$i] === $arr[$j]) {
            $foundBrute = true;
            break 2;
        }
    }
}

echo "--- Approach A: Brute Force O(n²) ---" . PHP_EOL;
echo "Duplicate found: " . ($foundBrute ? 'YES' : 'NO') . PHP_EOL;
echo "Iterations:      " . $countBrute . PHP_EOL;
echo "Complexity:      O(n²) — checks every pair" . PHP_EOL;
echo "At n = 100,000:  ~10 billion iterations → NOT acceptable" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// APPROACH B — Constraint-Driven: O(n)
//
// Use a PHP associative array as a lookup structure.
// This is NOT a HashMap lesson — it is a demonstration that
// "have I seen this value before?" can be answered in O(1)
// using the language's built-in key lookup.
//
// Time:  O(n) — one pass through the array
// Space: O(n) — we store up to n distinct values
// ─────────────────────────────────────────────────────────────

$seen      = [];    // tracks values we have seen so far
$foundFast = false;
$countFast = 0;
$duplicate = null;

foreach ($arr as $value) {
    $countFast++;

    if (isset($seen[$value])) {
        // We saw this value before → duplicate found
        $foundFast = true;
        $duplicate = $value;
        break;
    }

    // Mark this value as seen
    $seen[$value] = true;
}

echo "--- Approach B: Constraint-Driven O(n) ---" . PHP_EOL;
echo "Duplicate found: " . ($foundFast ? 'YES — value ' . $duplicate : 'NO') . PHP_EOL;
echo "Iterations:      " . $countFast . PHP_EOL;
echo "Complexity:      O(n) time, O(n) space" . PHP_EOL;
echo "At n = 100,000:  ~100,000 iterations → FAST and acceptable" . PHP_EOL;
echo PHP_EOL;

// ─────────────────────────────────────────────────────────────
// SHOW THE MENTAL MODEL
// ─────────────────────────────────────────────────────────────

echo "--- Mental model that led to Approach B ---" . PHP_EOL;
echo PHP_EOL;
echo "1. Read the problem" . PHP_EOL;
echo "   → Task: detect if any value appears more than once" . PHP_EOL;
echo PHP_EOL;
echo "2. Read the constraint" . PHP_EOL;
echo "   → n can be up to 100,000" . PHP_EOL;
echo PHP_EOL;
echo "3. Decide required complexity" . PHP_EOL;
echo "   → n = 100,000 → O(n²) = 10^10 ops → too slow" . PHP_EOL;
echo "   → Need O(n) or O(n log n)" . PHP_EOL;
echo PHP_EOL;
echo "4. Evaluate brute force" . PHP_EOL;
echo "   → Check all pairs → O(n²) → ruled out" . PHP_EOL;
echo PHP_EOL;
echo "5. Identify the bottleneck" . PHP_EOL;
echo "   → For each element, we re-scan everything already seen" . PHP_EOL;
echo "   → If we could check 'seen before?' in O(1), one pass = O(n)" . PHP_EOL;
echo PHP_EOL;
echo "6. Design the O(n) approach" . PHP_EOL;
echo "   → Keep a record of seen values" . PHP_EOL;
echo "   → O(1) check per element → O(n) total" . PHP_EOL;
echo PHP_EOL;
echo "7. Code it → the solution above" . PHP_EOL;
echo PHP_EOL;
echo "8. Final complexity: O(n) time, O(n) space" . PHP_EOL;
echo PHP_EOL;
echo "Key principle: The constraint determined the approach." . PHP_EOL;
echo "               Code followed thinking — not the other way around." . PHP_EOL;
