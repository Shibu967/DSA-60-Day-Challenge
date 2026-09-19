# Day 12 — Arrays & Strings: Sliding Window (Variable Size)

> **Date:** 2026-09-19
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Medium

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [x] Understand the concept of Variable-Size Sliding Windows.
- [x] Learn when to Expand (`right++`) and when to Shrink (`left++`).
- [x] Differentiate between Minimum Window logic (shrink when valid) and Maximum Window logic (shrink when invalid).

---

## 2. 📚 Theory

### What is a Variable-Size Sliding Window?
A window defined by two pointers (`left` and `right`) that can grow or shrink dynamically based on a specific condition.

### Core Patterns
**1. Minimum Window Logic (e.g. Min Size Subarray Sum)**
- Expand window.
- If condition is **VALID**, record the answer.
- Shrink from the left to find if a smaller valid window exists.

**2. Maximum Window Logic (e.g. Longest Substring)**
- Expand window.
- If condition becomes **INVALID** (e.g., duplicate found), shrink from the left until it becomes VALID again.
- Record the answer only when the window is valid.

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | Minimum Size Subarray Sum | LeetCode (209) | Medium | Sliding Window | 💡 Solved Independently | O(n) | O(1) |
| 2 | Longest Substring Without Repeating Characters | LeetCode (3) | Medium | Sliding Window + Set | 💡 Solved Independently | O(n) | O(min(n, m)) |

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 2 |
| Solved Independently | 2 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 1 |
| Time Spent (approx.) | 2 hours |

**Key Learning of the Day:**
> Variable size sliding windows drastically optimize problems looking for contiguous lengths. Minimum windows shrink upon becoming valid, while Maximum windows shrink upon becoming invalid. 

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Sliding Window (Variable) | Level 2 (Implement) |

**Confidence Level:** 🟢 High

**Revision Needed:** No

**Tomorrow's Topic Preview:** Day 13 — Strings: Fundamentals
