# Day 07 — Revision: Phase 1

> **Date:** 2026-09-09
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner
> **Status:** ✅ Revision Complete

---

## 1. 🎯 Learning Objective

Today is a revision day. No new topics. The goal is to test whether Phase 1 concepts are solid enough to use independently — without notes.

- [x] Rewrite the Big-O hierarchy from memory
- [x] State the complexity of common PHP operations from memory
- [x] Read any code block and classify its complexity
- [x] Identify the bottleneck in a multi-step algorithm
- [x] Use constraints to select an algorithm and justify with numbers
- [x] Trace a halving loop and apply the O(log n) formula
- [x] Recognize when a mathematical formula can replace a slow loop

---

## 2. 📚 Theory

### What is a Revision Day?

A revision day tests whether you can apply Phase 1 concepts **without looking at notes**. The skill being tested is not memorization — it is whether the thinking habits have become natural.

### Why revision days matter

Understanding a concept when it is explained is not the same as being able to use it independently. Revision reveals the gap between "I understood this" and "I can use this."

### What Phase 1 covered (Days 01–06)

| Day | Topic |
|-----|-------|
| 01 | What is algorithmic complexity |
| 02 | Big-O notation — best, average, worst case |
| 03 | Space complexity and auxiliary space |
| 04 | PHP built-in function complexity |
| 05 | Complexity pattern recognition |
| 06 | Constraint-driven complexity decision making |

---

## 3. 🧩 Core Concepts

### Big-O Hierarchy (from memory)

```text
O(1) < O(log n) < O(n) < O(n log n) < O(n²) < O(2ⁿ)
```

### PHP Built-in Complexity (from memory)

| Operation | Complexity | Reason |
|-----------|-----------|--------|
| `$arr[$key]` — key access | O(1) | Hash map lookup |
| `isset($arr[$key])` | O(1) | Hash map lookup |
| `array_push()` | O(1) amortized | Append to end |
| `array_pop()` | O(1) | Remove from end |
| `array_shift()` | O(n) | Reindexes entire array |
| `array_unshift()` | O(n) | Reindexes entire array |
| `in_array()` | O(n) | Scans every element |
| `array_search()` | O(n) | Scans every element |
| `sort()` | O(n log n) | Comparison sort |

### Constraint → Complexity guide

```text
n ≤ 20          → brute force acceptable
n ≤ 1,000       → O(n²) may be practical
n ≤ 100,000     → need O(n log n) or O(n)
n ≤ 1,000,000   → O(n) or O(log n) preferred
```

> These are guidelines, not absolute rules. Always verify against the actual problem and time limit.

---

## 4. 🧠 Mental Model / Intuition

**The Phase 1 thinking habit — apply this to every problem:**

```text
1. Read the constraint → what is n?
2. What complexity does n allow?
3. What approaches are possible at that complexity?
4. Find the bottleneck in the current approach
5. Can the bottleneck be removed or reduced?
6. Then write code
```

**Key Insight:**

> The question is never "write code that works." The question is "write code that works AND is efficient enough for the given constraint."

**Hidden O(n) traps in PHP:**

> Every time you write `in_array()` or `array_search()` inside a loop, you have a hidden nested loop. The outer loop is O(n). The function call is O(n). Together they are O(n²) — even though only one loop is visible.

---

## 5. 🔄 Dry Run

### Halving trace — O(log n)

```php
$n = 1024;
$count = 0;
while ($n > 1) {
    $n = intdiv($n, 2);
    $count++;
}
echo $count;
```

Step-by-step:

```text
Start: n = 1024, count = 0

Iteration 1 → n = 512,  count = 1
Iteration 2 → n = 256,  count = 2
Iteration 3 → n = 128,  count = 3
Iteration 4 → n = 64,   count = 4
Iteration 5 → n = 32,   count = 5
Iteration 6 → n = 16,   count = 6
Iteration 7 → n = 8,    count = 7
Iteration 8 → n = 4,    count = 8
Iteration 9 → n = 2,    count = 9
Iteration 10 → n = 1,   count = 10
              → n > 1 is false → loop stops

$count = 10
```

Formula: `log₂(1024) = log₂(2¹⁰) = 10` ✓

General rule: any halving loop on input n runs `log₂(n)` iterations → **O(log n)**

---

## 6. 💻 Basic Implementation

### The core Day 07 skill — read code, find complexity, fix the bottleneck

```php
<?php

/**
 * Day 07 — Revision: Phase 1
 * The main skill: identifying a hidden O(n) trap and fixing it
 *
 * Slow version (O(n²)) — in_array() inside a loop
 * Fast version (O(n))  — isset() with a seen array
 */

function hasDuplicateSlow(array $arr): bool
{
    for ($i = 0; $i < count($arr); $i++) {
        // in_array() scans the rest of the array — O(n) per call
        if (in_array($arr[$i], array_slice($arr, $i + 1))) {
            return true;
        }
    }
    return false;
    // Total: O(n) outer × O(n) in_array = O(n²)
}

function hasDuplicateFast(array $arr): bool
{
    $seen = [];
    foreach ($arr as $value) {
        if (isset($seen[$value])) {   // O(1) — key lookup
            return true;
        }
        $seen[$value] = true;         // O(1) — key insert
    }
    return false;
    // Total: O(n) × O(1) = O(n)
}

// Test
$arr = [4, 1, 7, 3, 7, 9];

var_dump(hasDuplicateSlow($arr));  // bool(true)
var_dump(hasDuplicateFast($arr));  // bool(true)
```

### What this shows:
- Both functions return the same correct answer
- `hasDuplicateSlow` is O(n²) — `in_array()` is a hidden loop
- `hasDuplicateFast` is O(n) — one pass, O(1) lookup per step
- The bottleneck was not the outer loop — it was the hidden inner scan

---

## 7. 🧩 Patterns Learned

> Revision day — no new patterns. These are the Phase 1 patterns confirmed today.

| Pattern | Signal | Complexity |
|---------|--------|------------|
| Single loop | `for`, `foreach` over n elements | O(n) |
| Nested loops (both over n) | inner loop runs proportional to n | O(n²) |
| Hidden nested loop | `in_array()` or `array_search()` inside a loop | O(n²) trap |
| Halving loop | `$i = intdiv($i, 2)` or `$i /= 2` | O(log n) |
| Doubling loop | `$i *= 2` | O(log n) |
| Sequential steps | step A then step B | Add → keep dominant |
| O(1) lookup replacing O(n) scan | `isset($seen[$x])` instead of `in_array()` | O(1) |
| Mathematical formula | replace loop with formula | O(1) |

---

## 8. 🔢 Problems Solved

> These are Phase 1 blind revision problems — solved without notes.

| # | Problem | Skill Tested | Status | My Complexity Answer |
|---|---------|-------------|--------|----------------------|
| 1 | Classify complexity of nested + sequential loops | Read and identify dominant term | ✅ Correct | O(n²) |
| 2 | Find bottleneck in `hasDuplicate`, rewrite to O(n) | Hidden O(n) trap + fix | ⚠️ Needed explanation | O(n²) → O(n) |
| 3 | Constraint n ≤ 10⁶ — which algorithms are acceptable? | Constraint → algorithm selection | ⚠️ Partially correct | O(n), O(n log n) ✓, O(n²) ✗ |
| 4 | Trace halving loop on n=1024, state formula | O(log n) recognition and trace | ⚠️ Initial slip, corrected | log₂(1024) = 10 |
| 5 | Rewrite O(n²) sum loop to O(1) formula | Mathematical optimization | ⚠️ Q2 needed explanation | n*(n+1)/2 |

---

## 9. ❌ Mistakes and Learnings

### Mistake 1 — Problem 2: missed the hidden loop

**What I thought:** Duplicate detection needs two visible loops.

**What was wrong:** `in_array()` is itself O(n) internally. It does not look like a loop but it scans the array. Placing it inside a `for` loop creates O(n) × O(n) = O(n²) — even with only one visible loop.

**Correct thinking:** Any time `in_array()` appears inside a loop — it is O(n²). Replace with a seen-array and `isset()` for O(n).

---

### Mistake 2 — Problem 3: incomplete answer

**What I said:** Only O(n) is acceptable for n ≤ 10⁶.

**What was missing:** O(n log n) is also acceptable. The answer must list all acceptable options and justify with operation counts.

```text
n = 1,000,000
O(n²)     → 10¹² operations → will time out          ❌
O(n log n) → ~20,000,000 operations → fast enough    ✅
O(n)       → 1,000,000 operations → fast              ✅
```

---

### Mistake 3 — Problem 4: initial slip on complexity label

**What I said first:** "O(n) mein chalega" (halving loop).

**What was wrong:** Halving = O(log n), not O(n). When you see the loop variable being divided or multiplied each step, the reflex must be O(log n) immediately.

**Correct reflex:** Loop variable halved → O(log n). No need to think further.

---

### What became clearer today:

- `in_array()` inside a loop is a silent O(n²) — always replace with `isset()`
- O(log n) must trigger immediately when seeing halving — no reconsideration
- Constraint analysis must include ALL acceptable options, not just one
- Mathematical formulas can eliminate loops entirely → O(1)

---

## 10. 📝 Revision Notes

- 📌 `in_array()` = O(n) — inside a loop = O(n²) trap
- 📌 `isset($arr[$key])` = O(1) — always prefer this over `in_array()`
- 📌 Halving loop → O(log n) immediately — no second-guessing
- 📌 Sequential steps → add → keep dominant term
- 📌 Constraint n ≤ 10⁶ → O(n²) is too slow → need O(n) or O(n log n)
- 📌 `1 + 2 + 3 + ... + n = n*(n+1)/2` — replace O(n) sum loop with O(1) formula
- 📌 Bottleneck = the most expensive step in a multi-step algorithm
- 📌 When giving constraint analysis, list ALL options with operation counts

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 5 |
| Solved Independently | 1 |
| Solved After Hint | 3 |
| Studied from Solution | 1 |
| New DSA Patterns Learned | 0 |
| Phase 1 Concepts Revised | 6 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
> `in_array()` inside a loop is O(n²) even though only one loop is visible. Replace with a seen-array and `isset()` to get O(n). The bottleneck is not always the code you can see.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Before Revision | After Revision |
|---------|----------------|----------------|
| Complexity classification | Level 2 | Level 3 |
| Hidden O(n) trap (`in_array`) | Level 1 | Level 2 |
| Constraint → algorithm selection | Level 2 | Level 2 |
| O(log n) recognition | Level 2 | Level 2 |
| Mathematical formula optimization | Level 1 | Level 2 |

```
Level 1 — Understand : I can explain the pattern
Level 2 — Implement  : I can implement from scratch
Level 3 — Easy       : I can solve Easy problems independently
Level 4 — Medium     : I can solve Medium problems independently
Level 5 — Variation  : I can handle variations with different problem statements
Level 6 — Blind      : I can identify the pattern in a new unseen problem
Level 7 — Explain    : I can explain WHY it works and why alternatives are worse
Level 8 — Interview  : I can solve and communicate under timed pressure
```

**Confidence Level:** 🟡 Medium — core concepts solid, need more practice on hidden traps and complete constraint analysis

**Revision Needed:** Yes — re-attempt Problem 2 independently after 2 days

**Tomorrow's Topic Preview:** Day 08 — Arrays: Fundamentals

---

> *"Understanding a concept when explained is not the same as being able to use it independently. Revision reveals that gap."*
