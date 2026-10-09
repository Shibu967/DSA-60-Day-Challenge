# Day 15 — Mixed Practice: Arrays + Strings

> **Date:** 2026-10-06
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Intermediate

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [ ] Objective 1
- [ ] Objective 2
- [ ] Objective 3

---

## 2. 📚 Theory

### What is this?

> Explain the concept in 2–4 sentences in your own words. Do not copy-paste definitions.

### Why do we need it?

> What problem does this data structure or algorithm solve?
> What limitation of a simpler approach does it overcome?

### When should it be used?

> In what type of problem or situation should this concept come to mind?
> What are the trigger signals in a problem that suggest this pattern?

### How does it work?

> Describe the core mechanism step by step. Keep it simple.

### Advantages

- Advantage 1
- Advantage 2

### Limitations / Disadvantages

- Limitation 1
- Limitation 2

### Important Operations

| Operation | Description | Time Complexity |
|-----------|-------------|-----------------|
| Operation 1 | | O(?) |
| Operation 2 | | O(?) |
| Operation 3 | | O(?) |

### Time Complexity Summary

| Case | Complexity | Reason |
|------|-----------|--------|
| Best Case | O(?) | |
| Average Case | O(?) | |
| Worst Case | O(?) | |

### Space Complexity

- **Auxiliary Space:** O(?)
- **Reason:** Explain why

---

## 2b. 🔢 Constraint-Driven Thinking

> Before solving any problem today, answer these questions first.
> This is now mandatory per Rule CA1.

**Input size (n):** ___
**Value range:** ___
**Is input sorted?** Yes / No / Not applicable
**Duplicates possible?** Yes / No
**Memory constraint?** Yes / No

**Algorithm class implied by n:** ___

> Example: "n is up to 10⁵ → O(n²) will likely TLE → target O(n log n) or O(n)"

---

## 3. 🧩 Core Concepts

> List the 3–5 most important concepts to understand about today's topic.
> Write them in simple language.

1. **Concept 1:** Explanation
2. **Concept 2:** Explanation
3. **Concept 3:** Explanation

---

## 4. 🧠 Mental Model / Intuition

> How should I think about this topic?
> What real-world analogy helps understand it?
> What mental image or metaphor makes it click?

**Analogy:**
> For example: "A Stack is like a pile of plates — you always add and remove from the top."

**Key Insight:**
> The single most important thing to remember about this concept.

---

## 5. 🔄 Dry Run

> Pick a small, simple example and trace through it step by step.
> This is the most important learning exercise — never skip it.

### Example Input:
```
Input: ...
Expected Output: ...
```

### Step-by-Step Trace:

| Step | Action | State |
|------|--------|-------|
| 1 | | |
| 2 | | |
| 3 | | |
| 4 | | |

### Observations from this Dry Run:
- What did I notice?
- What was non-obvious?

---

## 6. 💻 Basic Implementation

> Write the basic PHP implementation before solving problems.
> This is foundational — do not skip to problems without understanding the implementation.

```php
<?php

/**
 * Day XX — Topic Name
 * Basic Implementation
 *
 * Purpose: Demonstrate the core concept before problem solving.
 */

// --- Implementation goes here ---

// Example usage:
$result = yourFunction($input);
echo $result;
```

### What this implementation shows:
- Point 1
- Point 2

---

## 7. 🧩 Patterns Learned

> What problem-solving patterns are related to today's topic?

| Pattern | Description | When to Use |
|---------|-------------|-------------|
| Pattern 1 | | |
| Pattern 2 | | |

---

## 7b. 🏗️ Interview Relevance

> For important patterns only. Skip this section for minor topics.

**Interview Importance:** Low / Medium / High / Very High

**Why this comes up in interviews:**
>

**Common follow-up questions interviewers ask:**
- "Can you reduce the space complexity?"
- "What if the input is sorted?"
- "What if duplicates exist?"
- "Can you do it in-place?"
- "What if n is 10 million?"
- _(add specific follow-ups for this topic)_

**Real-world engineering connection:**
> Example: HashMap → caching, database indexing, O(1) lookup tables in backend systems.

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | [392. Is Subsequence](problems/problem-01-is-subsequence.php) | LeetCode | Easy | Two Pointers | ✅ Solved Independently | O(T) | O(1) |
| 2 | [567. Permutation in String](problems/problem-02-permutation-in-string.php) | LeetCode | Medium | Fixed Window + Frequency Map | ✅ Solved Independently | O(N+M) | O(1) |
| 3 | [438. Find All Anagrams in a String](problems/problem-03-find-all-anagrams.php) | LeetCode | Medium | Fixed Window + Frequency Map | ✅ Solved Independently | O(N+M) | O(1) |

> **Status Key:**
> - ✅ Solved Independently
> - 💡 Solved After Hint
> - 📖 Studied Solution (closed and reimplemented)
> - 🔄 Revisit Required

---

## 9. ❌ Mistakes and Learnings

> This is the most important section. Be honest. Every mistake is a learning opportunity.

### Mistake 1
- **What I did wrong:**
- **Why it was wrong:**
- **What the correct thinking is:**

### Mistake 2
- **What I did wrong:**
- **Why it was wrong:**
- **What the correct thinking is:**

### What confused me today:
>

### What became clearer today:
>

---

## 10. 📝 Revision Notes

> Key things to remember. Short and scannable.
> These are your flash-card-style notes for future revision.

- 📌 Point 1
- 📌 Point 2
- 📌 Point 3
- 📌 Complexity: Time O(?), Space O(?)
- 📌 Common mistake: ...
- 📌 Pattern trigger: Use this when you see ...

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 3 |
| Solved Independently | 3 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 0 (Applied existing patterns) |
| Time Spent (approx.) | 2 hours |

**Key Learning of the Day:**
> Successfully combined Strings and Arrays patterns (Sliding Window + Hash Map) to solve medium problems in O(N) time.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| _(today's main pattern)_ | Level ? |

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

**Confidence Level:** 🔴 Low / 🟡 Medium / 🟢 High

**Revision Needed:** Yes / No

**Tomorrow's Topic Preview:** Day XX+1 — Next Topic Name

---

> *"Understanding one concept deeply is more valuable than skimming five concepts."*
