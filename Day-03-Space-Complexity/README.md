# Day 03 — Space Complexity and Recursion Cost

> **Date:** 2026-09-05
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner

---

## 1. 🎯 Learning Objective

- [x] Understand what auxiliary space means
- [x] Understand how to calculate space complexity
- [x] Understand how recursive calls use stack space
- [x] Understand in-place vs extra-space algorithms
- [x] Understand the time vs space trade-off

---

## 2. 📚 Theory

> **Reference:** [GeeksforGeeks — Space Complexity](https://www.geeksforgeeks.org/g-fact-86/)

### What is Space Complexity?

Space complexity is the **total amount of memory** an algorithm uses relative to the input size `n`.

It has two parts:

```
Space Complexity = Input Space + Auxiliary Space
```

| Part | Meaning | Example |
|------|---------|--------|
| **Input Space** | Memory used to store the input itself | The array `[1,2,3,4,5]` passed to a function |
| **Auxiliary Space** | Extra memory the algorithm creates while running | A new array, extra variables, call stack |

> **Difference:**
> - **Space Complexity** = total memory = Input Space + Auxiliary Space
> - **Auxiliary Space** = only the extra memory (not counting the input)
>
> In practice, when analyzing algorithms, we often report **auxiliary space** separately because the input size is given — we want to know how much *additional* memory the algorithm needs.

---

### What is Auxiliary Space?

Auxiliary space is the **extra memory** your algorithm needs — things like:
- Extra variables (`$max`, `$sum`, `$count`)
- Extra arrays or data structures created inside the function
- The call stack used by recursive functions

**Example:**

```php
// O(1) auxiliary space — only $max is extra
function findMax(array $arr): int {
    $max = $arr[0];           // 1 extra variable
    foreach ($arr as $val) {
        if ($val > $max) $max = $val;
    }
    return $max;
}

// O(n) auxiliary space — creates a new array of size n
function doubleAll(array $arr): array {
    $result = [];             // grows with n
    foreach ($arr as $val) {
        $result[] = $val * 2;
    }
    return $result;
}
```

---

### Common Space Complexities

| Space | Name | Example |
|-------|------|---------|
| O(1) | Constant | A few extra variables, no new arrays |
| O(log n) | Logarithmic | Recursive call stack for binary search |
| O(n) | Linear | Creating a new array of size n |
| O(n²) | Quadratic | Creating a 2D grid of size n × n |

---

### What is Stack Space in Recursion?

Every time a function calls itself (recursion), the computer saves the current state in a structure called the **call stack**. Each call takes up memory.

**Example — Recursive Sum:**

```php
function recursiveSum(int $n): int {
    if ($n === 0) return 0;
    return $n + recursiveSum($n - 1);
}
```

For `n = 5`, the call stack looks like:

```
recursiveSum(5)
  → recursiveSum(4)
      → recursiveSum(3)
          → recursiveSum(2)
              → recursiveSum(1)
                  → recursiveSum(0) ← base case
```

**Calls: recursiveSum(5) down to recursiveSum(0) = 6 frames on the stack.**

> *(The exact count — 5 or 6 — is a constant difference. Big O ignores constants, so the complexity is still **O(n)**.)*

> **Key insight:** If the maximum recursion depth is O(n), then the function uses **O(n) stack space**, even if it uses no extra variables.

---

### A Loop Running n Times Does NOT Always Mean O(n) Space

This is a very common beginner mistake. Time complexity and space complexity are separate.

```php
// Time: O(n) — loop runs n times
// Space: O(1) — no values are stored, only printed
for ($i = 0; $i < $n; $i++) {
    echo $i;  // process and discard — no storage
}
```

> `n` iterations happen, but **no n values are stored in memory**. Space = O(1).

Now compare:

```php
// Time: O(n)
// Space: O(n) — n values are stored in the array
$arr = [];
for ($i = 0; $i < $n; $i++) {
    $arr[] = $i;  // storing each value — array grows with n
}
```

> Here the array `$arr` holds n values → Auxiliary Space = O(n).

**Key rule:** Space complexity depends on **what is stored**, not how many iterations run.

---

### Multiple Arrays and 2D Arrays

**Multiple arrays of size n:**

```php
$arr1 = [];  // n values
$arr2 = [];  // n values
```

O(n) + O(n) = O(2n) = **O(n)** ← constant factor dropped

> Having a fixed number of arrays, each of size n, is still O(n).

**2D array (matrix):**

```php
$matrix = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $matrix[$i][$j] = 0;  // n × n values stored
    }
}
```

n rows × n columns = n² values → Space = **O(n²)**

| Structure | Space |
|-----------|-------|
| One array of size n | O(n) |
| Two separate arrays of size n | O(n) |
| 2D matrix of n × n | O(n²) |

---

### In-Place vs Extra Space

| Approach | Space | Meaning |
|----------|-------|---------|
| **In-place** | O(1) | Usually means O(1) auxiliary space — modifies the input directly, no new data structure created |
| **Extra space** | O(n) | Creates a new array to store results |

**Example — Array Reversal:**

```php
// In-place: O(1) auxiliary space — modifies the original array directly
// PHP NOTE: We use array &$arr (pass by reference) so the ORIGINAL array
// is modified. Without &, PHP creates an internal copy → NOT truly in-place.
function reverseInPlace(array &$arr): void {
    $left = 0;
    $right = count($arr) - 1;
    while ($left < $right) {
        [$arr[$left], $arr[$right]] = [$arr[$right], $arr[$left]];
        $left++;
        $right--;
    }
    // No return needed — original array is modified via reference
}

// Extra space: O(n) auxiliary space — builds a new array
function reverseWithExtraSpace(array $arr): array {
    $result = [];  // new array — grows to size n
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $result[] = $arr[$i];
    }
    return $result;
}
```

Both produce the same result. `reverseInPlace` uses O(1) auxiliary space — only `$left` and `$right` pointer variables, original array is modified via reference. `reverseWithExtraSpace` uses O(n) auxiliary space — the `$result` array holds n elements.

> **PHP Note:** In PHP, arrays use copy-on-write — a copy is only made when the array is modified. Without `&`, modifying `$arr` inside the function may trigger a copy, making it O(n) space rather than O(1). To truly modify the original array without extra memory, we use `&$arr` (pass by reference).

---

### Time vs Space Trade-Off

Some algorithms use **extra memory to reduce computation time**. Others save memory but require more computation. This is the time-space trade-off — there is no universally "best" choice.

| Approach | Time | Space | Example |
|----------|------|-------|---------|
| Brute force | O(n²) | O(1) | Check every pair — no extra memory needed |
| HashMap approach | O(n) | O(n) | Store values in a map — faster but uses extra space |

> **Note:** Which approach is better depends on the constraint. If memory is limited, prefer lower space. If speed is critical, prefer lower time.

---

## 3. 🧩 Core Concepts

1. **Space Complexity = Input + Auxiliary** — Auxiliary space is the extra memory beyond the input.
2. **O(1) auxiliary space** — Only a fixed number of extra variables. Does not grow with n.
3. **O(n) auxiliary space** — Extra memory grows proportionally with input size (e.g., new array of size n).
4. **Recursive stack space** — If recursion depth is O(n), stack space is O(n), even with no extra variables.
5. **Loop ≠ O(n) space** — A loop running n times is O(1) space if it does not store n values.
6. **In-place** — Usually O(1) auxiliary space — modifies input directly without new data structures.
7. **Trade-off** — Some algorithms use more memory to run faster. Choose based on the constraint.

---

## 4. 🧠 Mental Model / Intuition

**Auxiliary Space Analogy — Workspace:**
Imagine you are solving a puzzle.
- The puzzle pieces are the input — you always need them.
- The **extra table space** you need to rearrange pieces = auxiliary space.
- In-place = rearranging pieces without needing any extra table.
- O(n) space = needing a second table the same size as the first.

**Recursion Stack Analogy — Stack of Plates:**
Every recursive call is like putting a new plate on a stack.
When the base case is reached, plates are removed one by one.
More recursion depth = taller stack = more memory used.

**Key Insight:**
> A function can have O(1) work in its body but still use O(n) auxiliary space if the recursion depth is O(n).

---

## 5. 🔄 Dry Run

### Example: Recursive Sum — Stack Trace

```
Input: recursiveSum(4)
Expected Output: 10  (4+3+2+1+0)
```

| Call | State Saved on Stack |
|------|----------------------|
| recursiveSum(4) | waiting for recursiveSum(3) |
| recursiveSum(3) | waiting for recursiveSum(2) |
| recursiveSum(2) | waiting for recursiveSum(1) |
| recursiveSum(1) | waiting for recursiveSum(0) |
| recursiveSum(0) | returns 0 ← base case |

**Total frames on stack: recursiveSum(4), (3), (2), (1), (0) = 5 frames.**
Big O ignores the exact constant count, so complexity = **O(n)**.

**Unwinding:**
```
0 → 0+1=1 → 1+2=3 → 3+3=6 → 6+4=10
```

**Maximum stack depth ≈ n+1 frames → O(n) auxiliary space** ✅

---

### Example: In-Place vs Extra Space — Reversal

```
Input: [1, 2, 3, 4, 5]
Expected: [5, 4, 3, 2, 1]
```

**In-place (O(1) space):**
```
Step 1: swap index 0 and 4 → [5, 2, 3, 4, 1]
Step 2: swap index 1 and 3 → [5, 4, 3, 2, 1]
Step 3: left >= right → STOP
```
Extra memory used: 2 pointer variables only → O(1) ✅

**Extra space (O(n) space):**
```
Walk from end to start, push to new array:
[5] → [5,4] → [5,4,3] → [5,4,3,2] → [5,4,3,2,1]
```
Extra memory used: new array of size n → O(n) ✅

---

## 6. 💻 Basic Implementation

```php
<?php

/**
 * Day 03 — Space Complexity and Recursion Cost
 * Demonstrating O(1) space, O(n) space, and recursive stack space
 */

// ─────────────────────────────────────────────────────
// O(1) Auxiliary Space — In-Place Reversal
// ─────────────────────────────────────────────────────

/**
 * Reverse array in-place using two pointers.
 *
 * WHY O(1) space: Only two pointer variables ($left, $right).
 * No new array is created. Memory usage does not grow with n.
 *
 * PHP: &$arr means pass by reference — original array is modified.
 * Without &, PHP uses copy-on-write; modifying the array may create
 * a separate copy, resulting in O(n) additional memory.
 *
 * Time:  O(n)
 * Space: O(1) auxiliary
 */
function reverseInPlace(array &$arr): void
{
    $left  = 0;
    $right = count($arr) - 1;

    while ($left < $right) {
        [$arr[$left], $arr[$right]] = [$arr[$right], $arr[$left]];
        $left++;
        $right--;
    }
    // No return — original array is modified directly via reference
}

// ─────────────────────────────────────────────────────
// O(n) Auxiliary Space — Extra Array
// ─────────────────────────────────────────────────────

/**
 * Reverse array by creating a new array.
 *
 * WHY O(n) space: A new array $result grows to size n.
 * For n=100 → 100 extra slots. For n=1000 → 1000 extra slots.
 *
 * Time:  O(n)
 * Space: O(n)
 */
function reverseWithExtraSpace(array $arr): array
{
    $result = [];

    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $result[] = $arr[$i];
    }

    return $result;
}

// ─────────────────────────────────────────────────────
// O(n) Stack Space — Recursion
// ─────────────────────────────────────────────────────

/**
 * Calculate sum of 1 to n using recursion.
 *
 * WHY O(n) space: Each recursive call adds one frame to the call stack.
 * For n=5 → 6 frames on the stack (calls 5,4,3,2,1 + base case 0).
 *
 * Time:  O(n)
 * Space: O(n) ← stack space, even though no extra array is created
 */
function recursiveSum(int $n): int
{
    if ($n === 0) return 0;           // base case — stops recursion
    return $n + recursiveSum($n - 1); // adds one stack frame per call
}

/**
 * Calculate sum of 1 to n iteratively.
 *
 * WHY O(1) space: Only $sum variable. No stack frames accumulate.
 *
 * Time:  O(n)
 * Space: O(1)
 */
function iterativeSum(int $n): int
{
    $sum = 0;

    for ($i = 1; $i <= $n; $i++) {
        $sum += $i;
    }

    return $sum;
}

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

$arr = [1, 2, 3, 4, 5];

echo "=== Day 03: Space Complexity Demonstrations ===" . PHP_EOL;
echo PHP_EOL;

echo "Original array   : [" . implode(', ', $arr) . "]" . PHP_EOL;

// In-place: pass by reference — original $arr is modified
$inPlaceArr = [1, 2, 3, 4, 5];
reverseInPlace($inPlaceArr);
echo "In-place O(1)    : [" . implode(', ', $inPlaceArr) . "]" . PHP_EOL;

// Extra space: original $arr is unchanged — new array returned
echo "Extra space O(n) : [" . implode(', ', reverseWithExtraSpace($arr)) . "]" . PHP_EOL;
echo PHP_EOL;

echo "Sum 1..5 recursive O(n) space : " . recursiveSum(5) . PHP_EOL;
echo "Sum 1..5 iterative O(1) space : " . iterativeSum(5) . PHP_EOL;
```

---

## 7. 🧩 Patterns Learned

| Pattern | Time | Auxiliary Space | Note |
|---------|------|-----------------|------|
| Fixed variables only | O(n) | O(1) | Loop runs n times but stores nothing |
| New array of size n | O(n) | O(n) | Array grows with input |
| Two arrays of size n | O(n) | O(n) | O(n)+O(n) = O(2n) = O(n) |
| 2D matrix n×n | O(n²) | O(n²) | n rows × n columns |
| Simple recursion (depth n) | O(n) | O(n) | Stack frames accumulate |
| In-place two pointers | O(n) | O(1) | Modifies input, no new structure |
| Time-Space trade-off | Varies | Varies | HashMap: O(n) time + O(n) space |

---

### 🔎 How to Find Space Complexity — Step by Step

| Step | Question to Ask |
|------|-----------------|
| 1 | Is any extra data created beyond the input? |
| 2 | Are extra variables fixed in number, or do they grow with n? |
| 3 | How many elements are stored in arrays, maps, or lists? |
| 4 | Is there a 2D structure? If yes, multiply the dimensions. |
| 5 | Is there recursion? If yes, check the maximum call-stack depth. |
| 6 | Are there multiple extra structures? Add their complexities, then keep the dominant term. |

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time | Space |
|---|---------|----------|------------|--------------|--------|------|-------|
| 1 | Sum of Array | Custom | Easy | O(1) space — single variable | 💡 Solved After Hint (correction) | O(n) | O(1) |
| 2 | Get Unique Values | Custom | Easy | O(n) space — two extra structures | ✅ Solved Independently | O(n) | O(n) |
| 3 | Recursive Factorial | Custom | Easy | O(n) stack space — recursion depth | ✅ Solved Independently | O(n) | O(n) |
| 4 | Double Elements — In-Place vs Extra | Custom | Easy | In-place O(1) vs Extra O(n) | ✅ Solved Independently | O(n) | O(1)/O(n) |

---

## 9. ❌ Mistakes and Learnings

### What confused me today:

- Thought recursion with no extra array = O(1) space → **WRONG** — stack frames also count!
- Auxiliary space and space complexity sound the same — but input space is separate
- Initially thought a loop running n times means O(n) space → **WRONG** — if values are only processed and not stored, space is still O(1)

### What became clearer today:

- If maximum recursion depth is O(n), the function uses O(n) stack space — even with no extra variables
- In-place means we modify the input directly — usually O(1) auxiliary space
- Same time complexity (O(n)) but very different auxiliary space complexity (O(1) vs O(n))
- A loop's space complexity depends on what is **stored**, not how many times it runs

---

## 10. 📝 Revision Notes

- 📌 Space Complexity = Input Space + Auxiliary Space (total)
- 📌 Auxiliary Space = extra memory only (input not counted)
- 📌 O(1) auxiliary space = fixed variables, no new arrays, does not grow with n
- 📌 O(n) auxiliary space = new array/map holds n elements
- 📌 Two arrays of size n → O(n)+O(n) = O(n) (constant factor dropped)
- 📌 2D matrix n×n → O(n²)
- 📌 Recursion: if max depth is O(n) → O(n) stack space (even without extra arrays)
- 📌 Loop running n times ≠ O(n) space — depends on what is stored
- 📌 In-place = usually O(1) auxiliary space — modifies input directly
- 📌 Time-Space trade-off: some algorithms use more memory to run faster; choice depends on constraint

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 4 |
| Solved Independently | 3 |
| Solved After Hint | 1 |
| Studied from Solution | 0 |
| New Patterns Learned | 7 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
> If the maximum recursion depth is O(n), recursion uses O(n) stack space even with no extra variables. In-place algorithms use O(1) space by modifying input directly.

**Confidence Level:** 🟢 High

**Revision Needed:** No

**Tomorrow's Topic Preview:** Day 04 — PHP Complexity in Built-in Functions

---

> *"Understanding one concept deeply is more valuable than skimming five concepts."*
