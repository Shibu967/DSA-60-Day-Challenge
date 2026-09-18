# Day 11 — Arrays: Sliding Window (Fixed Size)

> **Date:** 2026-09-18
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Easy

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [x] Understand the concept of the Sliding Window pattern.
- [x] Learn how to identify fixed-size window problems (`k` size).
- [x] Learn the `Old remove -> New add` logic to slide windows in O(n) time.
- [x] Combine Sliding Windows with Hash Sets to maintain a state over a specific distance.

---

## 2. 📚 Theory

### What is a Sliding Window (Fixed Size)?
A technique used to perform calculations on contiguous sub-arrays of a fixed size `k` without recalculating everything from scratch.

### Why do we need it?
It optimizes brute-force nested loop approaches from $O(n \times k)$ down to $O(n)$ by reusing overlapping calculations.

### How does it work?
- Keep track of the current window state (e.g., sum, elements).
- To move the window forward by one step:
  - Add the new element entering the window.
  - Subtract/remove the oldest element leaving the window.

### Common Trigger Phrases
- "Subarray of size k"
- "Window of fixed size"
- "Consecutive k elements"
- "Within distance k"

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | Maximum Sum Subarray | Custom | Easy | Sliding Window | 💡 Solved Independently | O(n) | O(1) |
| 2 | Maximum Average Subarray I | LeetCode (643) | Easy | Sliding Window | 💡 Solved Independently | O(n) | O(1) |
| 3 | Contains Duplicate II | LeetCode (219) | Easy | Sliding Window + Hash Set | 💡 Solved Independently | O(n) | O(k) |

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 3 |
| Solved Independently | 3 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 1 |
| Time Spent (approx.) | 2 hours |

**Key Learning of the Day:**
> Sliding window significantly optimizes overlapping subarray calculations. When combining with a Set for "distance k" constraints, the pattern `Old remove → Duplicate check → New add` ensures that our Set only contains valid elements at any moment, running cleanly in O(n) time and O(k) space.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Sliding Window (Fixed) | Level 2 (Implement) |

**Confidence Level:** 🟢 High

**Revision Needed:** No

**Tomorrow's Topic Preview:** Day 12 — Arrays: Sliding Window (Variable)
