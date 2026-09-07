<?php

/**
 * Problem   : Two Sum
 * Link      : https://leetcode.com/problems/two-sum/
 * Difficulty: Easy
 * Day       : 05 — Complexity Pattern Recognition
 *
 * ─────────────────────────────────────────
 * DESCRIPTION:
 * Array और target दिया जाता है।
 * ऐसे दो numbers के indices return करो जिनका sum = target
 *
 * Input : nums = [2, 7, 11, 15], target = 9
 * Output: [0, 1]   (2 + 7 = 9)
 *
 * Constraints:
 * → Exactly one valid answer exists
 * → Same element दो बार use नहीं कर सकते
 *
 * ─────────────────────────────────────────
 * APPROACH 1 — Brute Force
 * हर pair (i, j) check करो अगर nums[i] + nums[j] == target
 * Time: O(n²), Space: O(1)
 *
 * APPROACH 2 — HashMap (Optimal) ← CLASSIC PATTERN
 * Loop में हर number के लिए:
 *   complement = target - current
 *   अगर complement HashMap में है → answer मिला!
 *   नहीं है → current को HashMap में store करो
 *
 * Time: O(n), Space: O(n)
 *
 * ─────────────────────────────────────────
 * KEY INSIGHT:
 * अगर nums[i] + nums[j] = target
 * तो nums[j] = target - nums[i]
 *
 * यानी हमें nums[j] (complement) चाहिए।
 * HashMap से complement को O(1) में check करो!
 *
 * ─────────────────────────────────────────
 * COMPLEXITY COMPARISON:
 *
 *               Time    Space
 * Brute Force:  O(n²)   O(1)
 * HashMap:      O(n)    O(n)   ← OPTIMAL
 *
 * ─────────────────────────────────────────
 * PATTERN LEARNED:
 * "Two Sum" = most classic HashMap interview problem
 * complement = target - current → O(1) HashMap lookup
 * O(n²) → O(n) with HashMap
 * ─────────────────────────────────────────
 */

// ─── Approach 1: Brute Force — O(n²) ─────────────────────────
function twoSumBrute(array $nums, int $target): array
{
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] + $nums[$j] === $target) {
                return [$i, $j];
            }
        }
    }

    // Time: O(n²) — check every pair
    // Space: O(1) — no extra storage
    return [];
}

// ─── Approach 2: HashMap — O(n) OPTIMAL ──────────────────────
function twoSumOptimal(array $nums, int $target): array
{
    // HashMap: value → index
    $map = [];

    foreach ($nums as $i => $num) {
        $complement = $target - $num;   // jo number chahiye

        if (isset($map[$complement])) {
            // complement pehle se HashMap mein hai!
            return [$map[$complement], $i];
        }

        // abhi nahi mila → current ko store karo future ke liye
        $map[$num] = $i;
    }

    // Time: O(n)  — single loop with O(1) HashMap ops
    // Space: O(n) — HashMap stores up to n elements
    return [];
}

// ─── Test Cases ───────────────────────────────────────────────
echo "=== Problem 7: Two Sum ===" . PHP_EOL . PHP_EOL;

// Test 1
$nums = [2, 7, 11, 15];
$target = 9;
echo "Input: [2, 7, 11, 15], target = 9" . PHP_EOL;
echo "Brute:   [" . implode(", ", twoSumBrute($nums, $target))   . "]" . PHP_EOL;
echo "Optimal: [" . implode(", ", twoSumOptimal($nums, $target)) . "]" . PHP_EOL;
echo "Expected: [0, 1]" . PHP_EOL . PHP_EOL;

// Test 2
$nums2 = [3, 2, 4];
$target2 = 6;
echo "Input: [3, 2, 4], target = 6" . PHP_EOL;
echo "Brute:   [" . implode(", ", twoSumBrute($nums2, $target2))   . "]" . PHP_EOL;
echo "Optimal: [" . implode(", ", twoSumOptimal($nums2, $target2)) . "]" . PHP_EOL;
echo "Expected: [1, 2]" . PHP_EOL . PHP_EOL;

// Test 3
$nums3 = [3, 3];
$target3 = 6;
echo "Input: [3, 3], target = 6 (same value, different index)" . PHP_EOL;
echo "Brute:   [" . implode(", ", twoSumBrute($nums3, $target3))   . "]" . PHP_EOL;
echo "Optimal: [" . implode(", ", twoSumOptimal($nums3, $target3)) . "]" . PHP_EOL;
echo "Expected: [0, 1]" . PHP_EOL . PHP_EOL;

// Walkthrough — how HashMap works
echo "--- HashMap Walkthrough (Test 1: target=9) ---" . PHP_EOL;
$nums4 = [2, 7, 11, 15];
$map4  = [];
foreach ($nums4 as $i => $num) {
    $complement = 9 - $num;
    $found = isset($map4[$complement]) ? "YES → return [{$map4[$complement]}, $i]" : "NO";
    echo "i=$i, num=$num, complement=$complement → in map? $found" . PHP_EOL;
    $map4[$num] = $i;
}

echo PHP_EOL;
echo "--- Complexity Comparison ---" . PHP_EOL;
echo "Brute:   O(n²) time | O(1) space" . PHP_EOL;
echo "Optimal: O(n) time  | O(n) space  ← Best for time" . PHP_EOL;
