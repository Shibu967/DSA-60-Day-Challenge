# Day 14 — Strings: Manipulation and Pattern Problems

> **Date:** 2026-10-02
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Medium

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [x] Understand how to build strings efficiently without generating unnecessary memory overhead.
- [x] Know how to process alphanumeric characters using `ctype_alnum` or custom logic.
- [x] Learn to check character structural equality using double Hash Maps.
- [x] Apply Two Pointers for string validation patterns.

---

## 2. 📚 Theory

### Efficient String Building
In some programming environments, repetitive string concatenation (`$str .= "a"`) can be costly because strings are immutable. In PHP, while strings are mutable, we often build a temporary array and `implode()` it for complex data manipulation. This makes transformations much cleaner.

### Character-by-Character Processing (Two Pointers)
A common pattern involves walking through a string from both ends. For a **Valid Palindrome**, we skip over any non-alphanumeric characters, and when we find valid characters on both sides, we convert them to the same case and compare.

### Structural Mapping (Isomorphic Strings)
Sometimes we need to know if two strings share the same structure/pattern, not just identical letters. 
We map characters from String A to String B, and String B to String A. If any mapping contradicts an earlier established rule, the strings are not isomorphic. Two separate maps ensure that neither two characters map to the same target, nor one character maps to two different targets.

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | Valid Palindrome | LeetCode (125) | Easy | Optimized Two Pointers | 💡 Solved Independently | O(n) | O(1) |
| 2 | Isomorphic Strings | LeetCode (205) | Easy | Two Hash Maps | 💡 Solved Independently | O(n) | O(1) |
| 3 | Longest Common Prefix | LeetCode (14) | Easy | Horizontal Scanning | 💡 Solved Independently | O(S) | O(1) |
| 4 | Count Vowels | Basic Practice | Easy | Iteration with Lookup | 💡 Solved Independently | O(n) | O(1) |

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 4 |
| Solved Independently | 4 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 1 (Two Hash Maps Mapping) |
| Time Spent (approx.) | 2.5 hours |

**Key Learning of the Day:**
> String structure validation (like Isomorphic Strings) requires strict bijection (one-to-one mapping). Using two Hash Maps guarantees that both mapping directions are perfectly aligned.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Structural Mapping (Two Hash Maps) | Level 2 (Implement) |

**Confidence Level:** 🟢 High

**Revision Needed:** No

**Tomorrow's Topic Preview:** Day 15 — Mixed: Arrays + Strings Practice
