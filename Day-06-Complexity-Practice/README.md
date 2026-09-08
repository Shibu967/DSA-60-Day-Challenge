# Day 06 — Complexity Practice

> **Date:** 2026-09-08
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner
> **Status:** ✅ Daily Learning Goal Complete

---

## 1. 🎯 Learning Objective

Today the focus was to move from **calculating Big-O after seeing code** to using complexity as a **decision-making tool before coding**.

- [x] Understand complexity of multi-step algorithms
- [x] Distinguish sequential steps from nested steps
- [x] Identify the dominant term in a complexity expression
- [x] Understand and recognize `O(log n)` halving/growth patterns
- [x] Use input constraints to judge whether an approach is practical
- [x] Decide an expected complexity before writing code
- [x] Practice explaining why one approach is preferable under given constraints

---

## 2. 📚 Theory

### What is Complexity in Real Code?

Moving beyond single-pattern recognition to analyzing a **complete multi-step algorithm end-to-end** and using that analysis to make decisions before writing code.

### Why does it matter?

Two solutions can produce the same correct output but have very different costs at scale. Knowing complexity before coding prevents wasting time on an approach that will time out. This is a core interview decision-making skill.

### When should you use this?

- Before writing any new algorithm — read constraints, decide the target complexity first
- When reviewing code — identify the bottleneck step
- In interviews — explain brute force, identify the bottleneck, then optimize

---

## 3. 🧩 Core Concepts

### Concept 1 — Multi-step Algorithm Complexity

A real algorithm can contain several steps with different costs.

For **sequential** steps, add the complexities and then keep only the dominant term.

```text
Step 1: O(n)
Step 2: O(n log n)
Step 3: O(n)

Total = O(n) + O(n log n) + O(n)
      = O(n log n)
```

The most expensive step is the **bottleneck** because it determines the overall Big-O.

> **Key rule:** Sequential work → add complexities → keep the dominant term.

---

### Concept 2 — Sequential vs Nested Steps

Two loops are not automatically `O(n²)`.

#### Sequential loops

```php
for ($i = 0; $i < $n; $i++) {
    // O(n)
}

for ($j = 0; $j < $n; $j++) {
    // O(n)
}
```

```text
O(n) + O(n) = O(2n) = O(n)
```

#### Nested loops

```php
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        // O(1)
    }
}
```

```text
O(n) × O(n) = O(n²)
```

> **Important:** Nested does not automatically mean `O(n²)`. You must inspect how many times the inner work actually runs.

---

### Concept 3 — Dominant Term & Big-O Simplification

Big-O focuses on how growth behaves as `n` becomes large.

```text
O(n² + n + 1)              → O(n²)
O(n³ + n² + n)             → O(n³)
O(n log n + n²)            → O(n²)
O(5n³ + 100n² + 50n + 999) → O(n³)
```

Constants and lower-order terms are dropped because the fastest-growing term dominates for large input sizes.

#### Growth hierarchy

```text
O(1) < O(log n) < O(n) < O(n log n) < O(n²) < O(n³)
```

---

### Concept 4 — Logarithmic Complexity `O(log n)`

If the amount of remaining work is reduced by a constant factor on every iteration, the number of iterations is logarithmic.

#### Halving pattern

```php
for ($i = $n; $i > 1; $i = intdiv($i, 2)) {
    // work
}
```

For `n = 16`:

```text
Start: 16

Iteration 1 → 8
Iteration 2 → 4
Iteration 3 → 2
Iteration 4 → 1

Total loop iterations = 4
log₂(16) = 4 ✓
```

> Note: `1` is the value of `$i` at the start of the last iteration — the loop condition `$i > 1` then fails and the loop stops. So there are exactly 4 iterations, not 5.

#### Doubling pattern (also O(log n))

```php
for ($i = 1; $i < $n; $i *= 2) {
    // work
}
```

Sequence: `1 → 2 → 4 → 8 → 16 → ...`

> **Mental trigger:** If the search/work range is repeatedly multiplied or divided by a constant, investigate `O(log n)`.

---

### Concept 5 — Complexity from Constraints

Constraints tell us the maximum input size. That helps us decide which complexity is practical.

```text
n ≤ 10        → O(n²) is ~100 operations           — often practical
n ≤ 1,000     → O(n²) is ~1,000,000 operations     — may be practical depending on time limit
n ≤ 100,000   → O(n²) is ~10,000,000,000 operations — usually too expensive at this scale
n ≤ 1,000,000 → O(n) or O(n log n) is generally preferred
```

> These are practical guidelines, not absolute rules. The actual time limit, the cost of each operation, and the specific problem all matter. Always verify before assuming.

Constraints do **not** say that one complexity is universally good or bad. They help answer:

> **"Given this maximum input size, is this complexity practical for this problem?"**

There is no universal "good" or "bad" Big-O without considering constraints and the actual problem.

---

### Concept 6 — Complexity Before Coding

Instead of:

```text
Code first → calculate complexity later
```

use:

```text
Constraints → Expected complexity → Approach → Bottleneck → Code
```

Example: Find an element in an array where `n ≤ 100,000`.

Before coding, ask:
- Is `O(n²)` practical? No — too slow at this scale.
- Can the problem be solved in `O(n)`? Often yes for a simple scan.
- Is the array sorted? Then `O(log n)` (binary search) may be possible.

> **Best algorithm = sufficiently efficient for the constraints + reasonably simple to implement and explain.**

---

## 4. 🧠 Mental Model / Intuition

**Checklist before coding any problem (Rule CA1):**

```text
1. What is the input size n?
2. What do the constraints allow?
3. What complexity should I target?
4. What approaches are possible?
5. What is the bottleneck?
6. Can I remove or reduce the bottleneck?
7. Then write the code.
```

**Key Insight:**

> Don't start with code. Start with constraints and complexity. The constraint tells you what complexity you must achieve before you think of any algorithm.

---

## 5. 🔄 Dry Run

### Constraint → Complexity decision trace

```text
Problem: Does this array contain a duplicate?
Input:   [4, 1, 7, 3, 7, 9]
n can be up to 100,000
```

| Step | Thinking | Decision |
|------|----------|----------|
| 1 | Read n: up to 100,000 | Large input |
| 2 | O(n²) = 10,000,000,000 ops | Will time out — ruled out |
| 3 | O(n) = 100,000 ops | Fast — target this |
| 4 | Brute force: check every pair | O(n²) → rejected |
| 5 | Bottleneck: repeated re-scanning of seen elements | Found |
| 6 | Fix: check each element once using O(1) lookup | O(n) total |
| 7 | Code the O(n) single-pass approach | Done |

**Result:** Constraint forced the decision. Code followed thinking.

---

## 6. 💻 Basic Implementation

```php
<?php

/**
 * Day 06 — Complexity Before Coding
 * Core concept: constraint → complexity target → approach → code
 *
 * Task: Detect if any duplicate exists in the array.
 * Constraint: n can be up to 100,000
 * Required complexity: O(n)
 */

$arr = [4, 1, 7, 3, 7, 9];

// Step 1: brute force — O(n²) — ruled out by constraint
// for ($i = 0; $i < count($arr); $i++)
//     for ($j = $i+1; $j < count($arr); $j++)
//         if ($arr[$i] === $arr[$j]) → duplicate
// Too slow at n = 100,000.

// Step 2: O(n) approach — track seen values, one pass
$seen = [];

foreach ($arr as $value) {
    if (isset($seen[$value])) {
        echo "Duplicate found: " . $value . PHP_EOL;  // Output: 7
        break;
    }
    $seen[$value] = true;  // O(1) key insert
}

// Time:  O(n) — one pass
// Space: O(n) — seen array
```

### What this implementation shows:
- Constraint (n ≤ 100,000) ruled out O(n²) before any code was written
- The bottleneck in brute force was re-scanning already-seen elements
- Using O(1) key lookup eliminates that bottleneck → O(n) total
- Run the 5 mastery checks in `problems/` for full drills

> **Note:** The key-based lookup (`$seen[$value]`) is used here only to demonstrate an example of an O(n) approach. The HashMap data structure and its full usage patterns will be studied in detail in their dedicated topic (Day 17).

**Run individual mastery checks:**

```bash
php problems/problem-01-constraint-small-n.php
php problems/problem-02-compare-complexities.php
php problems/problem-03-large-n-choice.php
php problems/problem-04-small-n-practicality.php
php problems/problem-05-complexity-before-coding.php
```

---

## 7. 🧩 Patterns Learned

| Pattern | Code Signal / Trigger | Complexity |
|---------|----------------------|------------|
| Sequential steps | step A runs, then step B runs | Add → keep dominant term |
| Nested loops (both depend on n) | inner loop runs proportional to n per outer step | O(n²) |
| Nested loops (inner is constant) | inner loop has a fixed count, not n | O(n) |
| Halving each step | `$i = intdiv($i, 2)` | O(log n) |
| Doubling each step | `$i *= 2` | O(log n) |
| Bottleneck identification | highest-complexity step in a sequence | Determines total cost |
| Constraint-driven selection | n ≤ 100,000 → O(n²) ruled out → need O(n log n) or O(n) | Algorithm choice |

---

## 8. 🔢 Problems Solved

> Today was a **guided complexity mastery session**. Five complexity drills were completed and stored as individual runnable PHP files in `problems/`.

| # | Mastery Check | Constraint | Key Skill | Status | Time | Space |
|---|--------------|------------|-----------|--------|------|-------|
| 1 | Is `O(n²)` acceptable? | n ≤ 10 | Constraint awareness | ✅ Correct | O(n²) | O(1) |
| 2 | Compare `O(n²)` vs `O(n log n)` | n ≤ 1,000 | Efficiency comparison | ✅ Correct | O(n log n) | O(1) |
| 3 | Compare `O(n²)` vs `O(n)` | n ≤ 100,000 | Constraint-driven selection | ✅ Correct | O(n) | O(n) |
| 4 | Compare `O(n²)` vs `O(n³)` | n ≤ 10 | Practicality + simplicity | ✅ Correct | O(n²) | O(1) |
| 5 | Duplicate detection — choose approach | n ≤ 100,000 | Complexity before coding | ✅ Correct | O(n) | O(n) |

---

## 9. ❌ Mistakes and Learnings

### What I corrected today:

- **Q1 option label:** The reasoning was correct but the spoken option label was initially mixed up. The correct answer was **Option B**: check constraints and expected complexity before coding.
- **Complexity is not absolute:** `O(n²)` is not automatically "bad". Its practicality depends on the input constraint.
- **Better Big-O is not the only factor:** For very small constraints, a simpler `O(n²)` solution can be preferable to a much more complicated `O(n)` solution.

### What became clearer today:

- Big-O is a **decision tool before coding**, not just something calculated after
- The bottleneck controls overall complexity — optimize that first, not random parts
- A lower Big-O does not automatically win — constraints, simplicity, and readability matter too
- For sequential work: add complexities, then drop smaller terms

---

## 10. 📝 Revision Notes

- 📌 Sequential steps → **add** complexities → keep the dominant term
- 📌 Nested repeated work → generally **multiply** — after checking actual iteration counts
- 📌 Keep only the **dominant term** in Big-O
- 📌 Repeated halving or doubling → **`O(log n)`**
- 📌 Constraints tell you whether a complexity is **practical for that input size**
- 📌 Decide the expected complexity **before coding**
- 📌 Optimize the **bottleneck** — not random parts of the code
- 📌 Lower Big-O is not always the best choice when constraints are tiny and the simpler approach is much easier to implement
- 📌 Best algorithm = sufficiently efficient + reasonably simple

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 0 |
| Solved Independently | 0 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| Guided Complexity Drills Completed | 5 |
| New DSA Patterns Learned | 0 |
| Complexity Concepts Strengthened | 6 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
> Constraints → Complexity Target → Approach → Bottleneck → Optimization → Code → Test → Explain

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Multi-step complexity analysis | Level 2 |
| Constraint-driven algorithm selection | Level 2 |
| Bottleneck identification | Level 2 |
| O(log n) recognition | Level 2 |

> Level 2 reflects today's work: concepts were explained, understood, and applied in guided drills. Level 3 requires independently solving Easy problems — that evidence does not yet exist for Day 06.

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

**Confidence Level:** 🟢 High

**Revision Needed:** Light — revisit constraint table and dominant-term simplification

**Tomorrow's Topic Preview:** Day 07 — Phase 1 Revision (complexity analysis from scratch, no notes)

---

> *"Don't start with code. Start with constraints and complexity."*
