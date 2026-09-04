# Day 02 — Big O Notation Deep Dive

> **Date:** 2026-09-04
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner

---

## 1. 🎯 Learning Objective

- [x] Understand O(log n) — when and why it appears
- [ ] Understand O(n log n) — what it means (preview only, deep dive on Day 25)
- [ ] Understand O(2ⁿ) — exponential growth (preview only, deep dive on recursion days)
- [x] Apply drop constants rule: O(2n) → O(n)
- [x] Apply dominant term rule: O(n² + n) → O(n²)
- [ ] Understand best, average, and worst case analysis (partially previewed)
- [x] Read code and estimate complexity without running it

---

## 2. 📚 Theory

### What is Big O Notation?

Big O tells us **how an algorithm grows** as the input size `n` grows.
It is not about speed in seconds — it is about the **shape of growth**.
By convention, when no specific case is mentioned, we assume **worst case**.

### Why do we need it?

Because two algorithms can both "work" but one fails at scale.
Big O helps us **compare algorithms before writing them** and predict which one will survive large inputs.

### The Big O Hierarchy (slowest to fastest growing)

```
O(1) < O(log n) < O(n) < O(n log n) < O(n²) < O(2ⁿ)
```

> Growth rate: slowest → fastest

---

## 3. 🧩 Core Concepts

### 1. O(log n) — Logarithmic Time

**What it means:** O(log n) commonly appears when the problem size is repeatedly **reduced** by a constant factor (such as ÷2 or ÷3), or when a variable **grows multiplicatively** (such as ×2 or ×3).
**When it appears:** Loops where `i *= 2`, `i *= 3`, `n /= 2`, etc.

```
n = 8  → steps: 8 → 4 → 2 → 1 = 3 steps = log₂(8)
n = 16 → steps: 16 → 8 → 4 → 2 → 1 = 4 steps = log₂(16)
```

> **Simple rule:** If problem size reduces by a constant factor each step → O(log n).
> The base of the log changes (log₂, log₃) but Big O ignores bases — all are O(log n).

---

### 2. O(n log n) — Linearithmic Time

**What it means:** For each of the `n` elements, we do `log n` work.
**When it appears:** Merge Sort is always O(n log n). Quick Sort is O(n log n) on average, but O(n²) in the worst case.

> **Simple rule:** O(n) loop + O(log n) work inside = O(n log n).
> *(Preview only — full understanding comes on sorting days.)*

---

### 3. O(2ⁿ) — Exponential Time

**What it means:** Every new input element **doubles** the total work.
**When it appears:** Naive recursion (e.g., calculating Fibonacci without caching).

```
n=1  → 2¹  = 2
n=2  → 2²  = 4
n=3  → 2³  = 8
n=10 → 2¹⁰ = 1,024
n=20 → 2²⁰ ≈ 1 million
n=30 → 2³⁰ ≈ 1.07 billion
```

> *(This illustrates exponential growth. Not every O(2ⁿ) algorithm performs exactly 2ⁿ operations — the actual count depends on the implementation.)*
> **Simple rule:** O(2ⁿ) grows very fast and becomes impractical for large `n`. In practice, optimizations like memoization are used to reduce it.
> *(Preview only — full understanding comes on recursion days.)*

---

### 4. Drop Constants Rule

**Rule:** Constants in Big O are always dropped.

```
O(2n)    → O(n)
O(100n)  → O(n)
O(3n²)   → O(n²)
O(500)   → O(1)
```

> **Why:** For very large `n`, the constant becomes irrelevant.
> O(2n) and O(n) have the same growth shape.

---

### 5. Dominant Term Rule

**Rule:** When two terms are added, keep only the bigger (dominant) one.

```
O(n² + n)       → O(n²)
O(n + log n)    → O(n)
O(n³ + n² + n)  → O(n³)
```

> **Why:** For large `n`, the smaller term becomes insignificant.

---

### 6. Consecutive Loops — Add Complexities

```php
for ($i = 0; $i < $n; $i++) {}  // O(n)
for ($j = 0; $j < $n; $j++) {}  // O(n)
// Total: O(n) + O(n) = O(2n) → O(n)

for ($i = 0; $i < $n; $i++) {}        // O(n)
for ($j = 0; $j < $n * $n; $j++) {}   // O(n²)
// Total: O(n) + O(n²) → O(n²)  ← dominant term wins
```

---

### 7. Nested Loops — Multiply Complexities

```php
for ($i = 0; $i < $n; $i++) {      // O(n)
    for ($j = 0; $j < $n; $j++) {  // O(n)
        // ...
    }
}
// Total: O(n) × O(n) = O(n²)
```

---

### 8. Variable-Dependent Inner Loop

```php
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $i; $j++) {  // inner runs 0,1,2,...,n-1 times
        // ...
    }
}
// Total steps = 0+1+2+...+(n-1) = n(n-1)/2 → O(n²)
```

---

### 9. Best / Average / Worst Case

| Case | Meaning | Big O uses? |
|------|---------|-------------|
| Best Case | Most favorable input (e.g., target at index 0) | No |
| Average Case | Typical real-world input | Sometimes |
| Worst Case | Most unfavorable input (e.g., target not found) | ✅ By convention |

> **By convention**, when we say Big O without specifying a case, we mean worst case.
> Big O notation itself can technically describe any case — worst-case is simply the standard assumption.
> *(This topic is partially previewed — deeper understanding comes with practice.)*

---

## 4. 🧠 Mental Model / Intuition

**O(log n) Analogy — Dictionary Search:**
Imagine finding a word in a dictionary.
- You open the **middle** page.
- The word is before it → throw away the right half.
- Open the **middle** of the left half.
- Repeat until found.
- 1000 pages → only ~10 steps. That is O(log n).

**O(2ⁿ) Analogy — Chain Reaction:**
Imagine one person tells 2 people, each of those tells 2 more.
After 10 rounds → 1024 people. After 30 rounds → 1 billion people.
That is exponential growth.

**Key Insight:**
> Whenever problem size reduces by a **constant factor** each step (÷2, ÷3, etc.) → O(log n).
> Whenever each step **doubles the work** → O(2ⁿ).

---

## 5. 🔄 Dry Run

### Example: O(log n) — Halving Loop

```
Input: n = 16
```

| Step | i value | Action |
|------|---------|--------|
| 1 | 1 | i = 1 × 2 = 2 |
| 2 | 2 | i = 2 × 2 = 4 |
| 3 | 4 | i = 4 × 2 = 8 |
| 4 | 8 | i = 8 × 2 = 16 |
| 5 | 16 | 16 < 16? No → STOP |

**Total steps: 4 = log₂(16)** → O(log n) ✅

---

### Example: Dominant Term

```
Code: one O(n) loop + one O(n²) loop
n = 100
```

| Part | Steps |
|------|-------|
| O(n) loop | 100 steps |
| O(n²) loop | 10,000 steps |
| Total | 10,100 steps |

**For large n, the 100 steps become irrelevant → O(n²)** ✅

---

## 6. 💻 Basic Implementation

```php
<?php

/**
 * Day 02 — Big O Notation Deep Dive
 * Demonstrating O(log n) and dominant term simplification
 */

// ─────────────────────────────────────────────────────
// O(log n) — Input halves each step
// ─────────────────────────────────────────────────────

/**
 * Count how many times we can halve n until it reaches 1.
 *
 * WHY O(log n): Each iteration divides n by 2.
 * n=8 → 4 → 2 → 1 = 3 steps = log₂(8)
 *
 * Time:  O(log n)
 * Space: O(1)
 */
function countHalvingSteps(int $n): int
{
    $steps = 0;

    while ($n > 1) {
        $n = intdiv($n, 2); // halve n each time
        $steps++;
    }

    return $steps;
}

// ─────────────────────────────────────────────────────
// Dominant Term Demo
// O(n) + O(n²) → O(n²)
// ─────────────────────────────────────────────────────

/**
 * Shows how O(n) becomes irrelevant next to O(n²).
 *
 * Time:  O(n²)  ← dominant term wins
 * Space: O(1)
 */
function dominantTermDemo(int $n): void
{
    $ops = 0;

    // Part 1: O(n) — linear loop
    for ($i = 0; $i < $n; $i++) {
        $ops++; // counts as 1 operation
    }

    $linearOps = $ops;

    // Part 2: O(n²) — nested loop
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $ops++;
        }
    }

    $quadraticOps = $ops - $linearOps;

    echo "n = {$n}" . PHP_EOL;
    echo "O(n)  operations : {$linearOps}" . PHP_EOL;
    echo "O(n²) operations : {$quadraticOps}" . PHP_EOL;
    echo "Total            : {$ops}" . PHP_EOL;
    echo "Dominant term    : O(n²) ← the n² part overwhelms n" . PHP_EOL;
}

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

echo "=== O(log n) Demo ===" . PHP_EOL;
echo "n=8  → steps: " . countHalvingSteps(8) . PHP_EOL;   // 3
echo "n=16 → steps: " . countHalvingSteps(16) . PHP_EOL;  // 4
echo "n=32 → steps: " . countHalvingSteps(32) . PHP_EOL;  // 5
echo "n=64 → steps: " . countHalvingSteps(64) . PHP_EOL;  // 6
echo PHP_EOL;

echo "=== Dominant Term Demo (n=10) ===" . PHP_EOL;
dominantTermDemo(10);
echo PHP_EOL;

echo "=== Dominant Term Demo (n=100) ===" . PHP_EOL;
dominantTermDemo(100);
```

---

## 7. 🧩 Patterns Learned

| Pattern | Code Signal | Complexity |
|---------|-------------|------------|
| Doubling/Halving by constant factor | `$i *= 2`, `$i *= 3`, `$n /= 2` | O(log n) |
| Nested loops (same data) | loop inside loop | O(n²) |
| Consecutive loops | loop after loop | O(n) + O(n) = O(n) |
| Variable inner loop | inner runs 0,1,2,...n-1 | O(n²) |
| Geometric series body | `i*=2` outer + `j<i` inner | O(n) |
| Dominant term | O(n) + O(n²) | O(n²) |
| If/Else branch complexity | `if-else` blocks | 🟡 Basic understanding |
| O(log log n) | special double-reduction loops | 🟡 Basic intro / needs practice |

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time | Space |
|---|---------|----------|------------|--------------|--------|------|-------|
| 1 | Multiplicative loop: `i *= 3` | Custom | Easy | O(log n) — multiplicative growth | ✅ Solved Independently | O(log n) | O(1) |
| 2 | Consecutive + nested loops | Custom | Easy | Dominant term rule | ✅ Solved Independently | O(n²) | O(1) |
| 3 | Variable-dependent inner loop | Custom | Easy | Variable inner loop | ✅ Solved Independently | O(n²) | O(1) |
| 4 | If/Else branch complexity | Custom | Easy | If/Else branch analysis | ✅ Solved Independently | Best O(n) / Worst O(n²) | O(1) |

---

## 9. ❌ Mistakes and Learnings

### What confused me today:

- Initially thought consecutive loops multiply → they actually ADD
- Geometric series `1+2+4+...+n` looks like it should be O(n²) but it is O(n) — surprising

### What became clearer today:

- Whenever `i *= 2`, `i *= 3`, or `n /= 2` appears → think O(log n) first (any constant-factor reduction)
- Drop constants and dominant term are not optional — they are part of correct Big O notation
- By convention, Big O without a specified case means worst case — but technically it can describe any case

---

## 10. 📝 Revision Notes

- 📌 O(log n): problem size reduces by constant factor each step — `i *= 2`, `i *= 3`, `n /= 2` are code signals
- 📌 O(n log n): preview only — Merge Sort always O(n log n); Quick Sort avg O(n log n), worst O(n²)
- 📌 O(2ⁿ): work doubles each step — grows impractically fast for large n; preview only
- 📌 Drop constants: O(3n) = O(n), O(500) = O(1)
- 📌 Dominant term: O(n² + n) = O(n²), O(n + log n) = O(n)
- 📌 Consecutive loops → ADD: O(n) + O(n²) = O(n²)
- 📌 Nested loops → MULTIPLY: O(n) × O(n) = O(n²)
- 📌 By convention: Big O without a case = worst case
- 🟡 If/Else branch complexity: only one branch executes; best case = cheapest branch, worst case = most expensive branch
- 🟡 O(log log n): basic introduction only — needs deeper practice

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 4 |
| Solved Independently | 4 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 6 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
> When input halves each step → O(log n). When two complexities are added, only the dominant term survives.

**Confidence Level:** 🟢 High (for the concepts studied so far)

**Revision Needed:** Light revision recommended

**Tomorrow's Topic Preview:** Day 03 — Space Complexity and Recursion Cost

---

> *"Understanding one concept deeply is more valuable than skimming five concepts."*
