# Day 09 — Arrays: Two Pointers Pattern

> **Date:** 2026-09-13
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Beginner

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [x] Understand what the Two Pointers pattern is.
- [x] Know when to apply Left-Right Pointers vs Slow-Fast Pointers.
- [x] Solve basic Two Pointers problems in O(n) time.

---

## 2. 📚 Theory

### What is this?
Two Pointers is a technique that uses two variables to track indices in an array, allowing you to traverse the array from different ends or at different speeds to solve a problem in O(n) time.

### Why do we need it?
It optimizes brute force O(n²) nested loops into O(n) time.

### When should it be used?
- When the array is sorted.
- When searching for a pair that meets a condition.
- When moving elements in-place.

### How does it work?
- **Left-Right:** Place one pointer at the start (left) and one at the end (right). Move them towards each other based on a condition (like comparing their sum to a target).
- **Slow-Fast:** Place both pointers at the start. One moves element-by-element (fast) while the other tracks the position for modifications (slow).

### Time Complexity Summary

| Case | Complexity | Reason |
|------|-----------|--------|
| Best Case | O(n) | Both pointers traverse the array exactly once. |

### Space Complexity

- **Auxiliary Space:** O(1)
- **Reason:** Only two variables (pointers) are used.

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | Two Sum II (Sorted Array) | Custom | Easy | Two Pointers (Left-Right) | 💡 Solved After Hint | O(n) | O(1) |
| 2 | Move Zeroes | Custom | Easy | Two Pointers (Slow-Fast) | 💡 Solved After Hint | O(n) | O(1) |
| 3 | Valid Palindrome | Custom | Easy | Two Pointers (Left-Right) | 💡 Solved After Hint | O(n) | O(1) |

---

## 9. ❌ Mistakes and Learnings

### Mistake 1 (Two Sum)
- **What I did wrong:** Assumed we only need to decrease the right pointer if the sum doesn't match target.
- **Why it was wrong:** If the sum is smaller than the target, decreasing the right pointer makes the sum even smaller.
- **What the correct thinking is:** Handle three conditions: `==` (return), `>` (right--), `<` (left++).

### Mistake 2 (Valid Palindrome)
- **What I did wrong:** Confused "checking if a string is a palindrome" with "reversing a string".
- **Why it was wrong:** I thought we needed to swap `$left` and `$right`.
- **What the correct thinking is:** A palindrome check only requires comparing characters, not modifying the array/string.

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 3 |
| Solved Independently | 0 |
| Solved After Hint | 3 |
| Studied from Solution | 0 |
| New Patterns Learned | 1 |
| Time Spent (approx.) | 1.5 hours |

**Key Learning of the Day:**
> Two Pointers reduces nested loops O(n²) to O(n) by using two variables to intelligently traverse the array.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Two Pointers | Level 2 (Implement) |

**Confidence Level:** 🟢 High
**Revision Needed:** No
**Tomorrow's Topic Preview:** Day 10 — Arrays: Prefix Sum
