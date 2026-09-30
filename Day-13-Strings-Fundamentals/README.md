# Day 13 — Strings: Fundamentals

> **Date:** 2026-09-30
> **Phase:** Phase 2 — Arrays & Strings
> **Difficulty Level:** Easy

---

## 1. 🎯 Learning Objective

> What should I clearly understand by the end of today?

- [x] Understand strings as character arrays under the hood.
- [x] Differentiate between string mutability in PHP/C++ vs immutability in Java/Python.
- [x] Learn character conversion using ASCII values (`ord()` and `chr()`).
- [x] Apply array techniques (like frequency counting and two pointers) directly to strings.

---

## 2. 📚 Theory

### Strings as Character Arrays & Mutability
In PHP, a string is a series of characters, and we can access individual characters using array-like index notation (e.g., `$str[0]`). Moreover, PHP strings are **mutable** (modifiable in-place):
```php
$word = "apple";
$word[4] = 'y'; // Becomes "apply"
```

### ASCII Values (`ord` and `chr`)
Computers represent characters as numbers (ASCII/Unicode).
- `ord('A')` returns `65`, `ord('a')` returns `97`.
- The difference between uppercase and lowercase is `32`.
- `chr(97)` returns `'a'`.

### Array Patterns on Strings
String problems are often just array problems disguised!
- **Two Pointers:** Reversing a string or checking palindromes.
- **Frequency Map:** Anagrams, character counts, and finding unique characters.

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time Complexity | Space Complexity |
|---|---------|----------|------------|--------------|--------|-----------------|------------------|
| 1 | Valid Anagram | LeetCode (242) | Easy | Frequency Map | 💡 Solved Independently | O(n) | O(1) |
| 2 | First Unique Character in a String | LeetCode (387) | Easy | Frequency Map (Two Passes) | 💡 Solved Independently | O(n) | O(1) |

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 2 |
| Solved Independently | 2 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 0 (Reused Array patterns) |
| Time Spent (approx.) | 1.5 hours |

**Key Learning of the Day:**
> String problems are essentially array problems. Using frequency maps allows us to solve complex counting and existence problems like anagrams and unique characters efficiently in O(n) time.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Frequency Counting | Level 3 (Easy) |

**Confidence Level:** 🟢 High

**Revision Needed:** No

**Tomorrow's Topic Preview:** Day 14 — Strings: Manipulation and Pattern Problems
