# Problem: [Problem Name]

> **Use this template for:**
> - All Medium difficulty problems
> - Any Easy problem where you struggled or got stuck
> - Any problem that introduced a new pattern
> - Any problem you revisit and still find difficult

---

## 📎 Problem Link

- [LeetCode / Platform Link](#)

## 📊 Metadata

| Field | Value |
|-------|-------|
| Difficulty | Easy / Medium / Hard |
| Topic | Arrays / Strings / DP / Graph / etc. |
| Pattern | Two Pointers / Sliding Window / BFS / etc. |
| Attempted On | YYYY-MM-DD |
| Status | Solved Independently / Solved After Hint / Studied |
| Revisit Date | YYYY-MM-DD |

---

## 🧾 Problem Understanding

> Explain the problem in your own words.
> Do not copy the problem statement. Restate it as you understand it.

---

## 📥 Input and Output

**Input:**
```
Example input here
```

**Output:**
```
Expected output here
```

---

## 📐 Constraints

> List the key constraints from the problem.
> These will guide your approach.

- Constraint 1 (e.g., `1 <= n <= 10^5`)
- Constraint 2
- Constraint 3

---

## 📋 Examples

### Example 1
```
Input:  ...
Output: ...
Explanation: ...
```

### Example 2
```
Input:  ...
Output: ...
Explanation: ...
```

---

## 🔍 Pattern Hypothesis

> Before writing any code, state your guess.
> Wrong guesses are fine — they reveal your thinking.

**What pattern do you think this might use?**
> e.g., "This looks like a Two Pointers problem because..."
> or "I'm not sure yet, but the constraint n ≤ 10⁵ rules out O(n²)."

**What does the constraint tell you?**
> n = ___ → algorithm class: ___

---

## 🐢 Brute Force Approach

### Idea

> Describe the simplest possible solution.
> Nested loops? Check every pair? Try all possibilities?

### Algorithm (Step by Step)

1. Step 1
2. Step 2
3. Step 3

### PHP Implementation

```php
<?php

/**
 * Problem: [Problem Name]
 * Approach: Brute Force
 * Time: O(?)
 * Space: O(?)
 */
function bruteForce(array $input): mixed
{
    // Implementation here
}
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(?) | |
| Space | O(?) | |

---

## 🔍 Bottleneck Analysis

> What makes the brute force slow?
> What repeated work is happening?

**The bottleneck is:**
>

**Example of repeated work:**
> e.g., "For each element, we scan the entire array again — this is O(n) work done n times = O(n²)."

**How to eliminate it:**
>

---

## ⚡ Optimized Approach

### Key Observation

> What did you notice about the brute force?
> What repeated work can be eliminated?
> What data structure or pattern makes this faster?

### Pattern Used

> e.g., Two Pointers / Sliding Window / Hash Map / Binary Search / BFS / DP

### Why This Pattern Works Here

> Explain the intuition behind why this pattern solves this specific problem.

### Algorithm (Step by Step)

1. Step 1
2. Step 2
3. Step 3

### PHP Implementation

```php
<?php

/**
 * Problem: [Problem Name]
 * Approach: Optimized — [Pattern Name]
 * Time: O(?)
 * Space: O(?)
 */
function optimizedSolution(array $input): mixed
{
    // Implementation here
}

// --- Test ---
$result = optimizedSolution([/* test input */]);
var_dump($result);
```

### Complexity Analysis

| | Complexity | Reason |
|-|-----------|--------|
| Time | O(?) | |
| Space | O(?) | |

---

## 🔍 Dry Run

> Trace through your optimized solution with Example 1.

```
Input: ...
```

| Step | Variable States | Action |
|------|----------------|--------|
| 1 | | |
| 2 | | |
| 3 | | |

**Final Output:** `...`

---

## ⚠️ Edge Cases

> What special inputs could break your solution?

| Edge Case | Expected Behavior | Handled? |
|-----------|------------------|---------|
| Empty input | Return ... | ✅ / ❌ |
| Single element | Return ... | ✅ / ❌ |
| All same values | Return ... | ✅ / ❌ |
| Negative numbers | Return ... | ✅ / ❌ |

---

## ❌ Mistakes / Learnings

### What I got wrong initially:
>

### What confused me:
>

### The key insight I was missing:
>

### What I will remember next time:
>

### What clue in the problem should have told me the pattern?
> e.g., "The word 'contiguous subarray' should have triggered Sliding Window."

### Mistake category:
```
[ ] Concept misunderstanding
[ ] Pattern not recognized
[ ] Logic error
[ ] Off-by-one error
[ ] Edge case missed
[ ] Complexity mistake
[ ] Implementation mistake
[ ] PHP-specific mistake (e.g., used in_array in loop)
[ ] Optimization missed — knew brute force but not how to optimize
[ ] Misread the problem
[ ] Did not do dry run
[ ] Wrong data structure chosen
```

---

## 🔁 Revision Note

**Pattern to remember:** When I see `[problem signal]`, I should think of `[pattern/approach]`.

**One-line summary of the solution:**

**Next review date:** ___

**Interview follow-up questions to be ready for:**
- "Can you reduce the space?"
- "What if the input is sorted?"
- "What if n is 10 million?"
- _(add specific ones for this problem)_

---

> *"Every problem you struggle with is a pattern you are learning to recognize."*
