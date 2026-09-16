# Day 10 — Arrays: Prefix Sum Pattern

> **Date:** 2026-09-16
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Medium

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [x] Understand the concept of Prefix Sum and Prefix Product.
- [x] Learn how to perform O(1) range queries after O(n) pre-processing.
- [x] Use Hash Maps along with Prefix Sums for counting contiguous subarrays.

---

## 2. 📚 Theory

### What is Prefix Sum?
It's a technique where we pre-calculate the running total of an array so that we can find the sum of any contiguous subarray instantly.

### Why do we need it?
It optimizes range sum queries from O(n) down to O(1). When combined with Hash Maps, it optimizes subarray counting from O(n²) to O(n).

### How does it work?
- Build array: `prefix[i] = prefix[i-1] + arr[i]`
- Range sum `[L, R]`: `sum = prefix[R] - prefix[L-1]`

### Space and Time
- **Time Complexity:** O(n) to build, O(1) per query.
- **Space Complexity:** O(n) for the prefix array.

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | Range Sum Query | Custom | Easy | Prefix Sum | 💡 Solved Independently | O(1) query | O(n) |
| 2 | Subarray Sum Equals K | Custom | Medium | Prefix Sum + Hash Map | 💡 Solved After Hint | O(n) | O(n) |
| 3 | Product of Array Except Self | Custom | Medium | Prefix / Suffix Product | 💡 Solved After Hint | O(n) | O(n) |

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 3 |
| Solved Independently | 1 |
| Solved After Hint | 2 |
| Studied from Solution | 0 |
| New Patterns Learned | 1 |
| Time Spent (approx.) | 2.5 hours |

**Key Learning of the Day:**
> Prefix Sum isn't just for addition; the concept applies to multiplication (Prefix Product) and counting frequencies using Hash Maps in O(n) time.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Prefix Sum | Level 2 (Implement) |

**Confidence Level:** 🟢 High

**Revision Needed:** No

**Tomorrow's Topic Preview:** Day 11 — Arrays: Sliding Window (Fixed)
