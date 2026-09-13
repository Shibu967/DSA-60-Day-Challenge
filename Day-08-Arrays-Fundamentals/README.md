# Day 08 — Arrays: Fundamentals

> **Date:** 2026-09-13
> **Phase:** Phase 2 — Arrays and Strings
> **Difficulty Level:** Beginner
> **Status:** ✅ Completed / Mastered

---

## 1. 🎯 Learning Objective

- [x] Understand what an array is and why it exists
- [x] Understand index-based O(1) access vs O(n) value search
- [x] State the complexity of every array operation with reasoning
- [x] Implement traversal, find min/max, reverse in-place
- [x] Implement rotate array by k positions
- [x] Complete the Easy array practice completed during Day 08
- [x] Complete final mastery self-assessment

---

## 2. 📚 Theory

### What is an Array?

An array stores multiple related values in a sequence.

```php
$arr = [10, 20, 30, 40, 50];
```

Indexes start from 0.

```
Index:   0   1   2   3   4
Value:  10  20  30  40  50

$arr[0]; // 10
$arr[3]; // 40
```

### Why Do We Use Arrays?

Arrays allow us to store and work with multiple related values using a single variable.

Instead of:
```php
$mark1 = 70;
$mark2 = 85;
$mark3 = 92;
```

We use:
```php
$marks = [70, 85, 92];
```

### When Should Arrays Be Used?

**Trigger signals in a problem:**
- "list of elements"
- "subarray", "contiguous", "range"
- "index-based access"
- "traverse all elements"
- "find min/max/sum/count"

---

## 3. 🧩 Core Concepts

### Concept 1 — Array Index Access: O(1)

If the index is known, we can directly access the element.

```
Known index → Direct access → O(1)
```

Conceptually: `address = base_address + (index × element_size)`

No traversal of previous elements is needed.

```
Unknown index + unsorted array → Need to search → O(n) worst case
```

> **Key Distinction:** `$arr[500]` means 500 is the **index** → O(1).
> Searching for the **value** 500 in an unsorted array → O(n).

---

### Concept 2 — Array Traversal: O(n)

Traversal means visiting every element of an array exactly once.

```php
foreach ($arr as $value) {
    echo $value;
}
```

```
5 elements       → 5 visits
100 elements     → 100 visits
1,000,000        → 1,000,000 visits
```

Time Complexity = **O(n)** — grows linearly with input size.

---

### Concept 3 — Linear Search

If we know the **value** but not its **index**, and the array is unsorted, we must search.

```
[10, 20, 30, 40, 50]   Search for 40:
10 ❌  20 ❌  30 ❌  40 ✅
```

| Case | Condition | Complexity |
|------|-----------|:-----------:|
| Best Case | Target is the first element | O(1) |
| Worst Case | Target is last or not present | O(n) |

> **Note:** Binary Search (Day 22) achieves O(log n) — but only on a **sorted** search space.

---

### Concept 4 — Array Operation Costs

| Operation | Complexity | Reason |
|-----------|:----------:|--------|
| Access by index | **O(1)** | Direct address calculation |
| Search (unsorted) | **O(n)** | May check every element |
| Insert at end | **O(1)** amortized | No shift needed |
| Insert at beginning | **O(n)** | All elements must shift right |
| Insert at middle | **O(n)** | Elements after position must shift |
| Delete from end | **O(1)** amortized | No shift needed |
| Delete from beginning | **O(n)** | All elements must shift left / re-index |

**Why beginning insert is O(n):**

```
[10, 20, 30, 40]   Insert 5 at beginning

[5, 10, 20, 30, 40]   ← all existing elements shifted right
```

**Why end insert is O(1) amortized:**
Appending at the end normally requires no shifting of existing elements.

---

## Additional PHP Array Complexity Notes (Reference)

PHP arrays are **not** the same as a simple contiguous array (like in C).
PHP arrays behave like a **dynamic ordered map / hash-table structure**.

For DSA learning, we use the **conceptual array model** to understand algorithmic patterns, while keeping PHP-specific behavior in mind.

**PHP function complexity (from Phase 1):**

| PHP Function | Complexity | Trap? |
|---|:---:|---|
| `$arr[$i]` | O(1) | ✅ Safe |
| `array_push()` / `$arr[] =` | O(1) amortized | ✅ Safe |
| `array_pop()` | O(1) | ✅ Safe |
| `array_shift()` | **O(n)** | ⚠️ Never inside a loop |
| `array_unshift()` | **O(n)** | ⚠️ Never inside a loop |
| `in_array()` | **O(n)** | ⚠️ Never inside a loop |
| `sort()` | O(n log n) | ✅ Acceptable |

---

## 4. 🧠 Mental Model / Intuition

**Analogy — Array as a numbered shelf:**
> Imagine a shelf with numbered slots. If you know the slot number (index), you go directly to it — O(1). If you only know what the item looks like but not which slot it's in, you must scan every slot — O(n).

**Pattern — Initialize → Traverse → Compare → Update:**

This is the fundamental pattern for min/max/sum problems.

```
Find Minimum:
  Initialize minimum with first element
        ↓
  Traverse elements
        ↓
  Compare current value with minimum
        ↓
  If smaller → update minimum
```

**Key Insight:**
> O(1) access requires a **known index**. The moment you need to find a value, you are searching — and searching an unsorted array is O(n).

---

## 5. 🔄 Dry Runs

### 1. Reverse Array In-Place
```text
Input:  [10, 20, 30, 40, 50]
left = 0, right = 4
Step 1: swap(10, 50) → [50, 20, 30, 40, 10], left=1, right=3
Step 2: swap(20, 40) → [50, 40, 30, 20, 10], left=2, right=2
Step 3: left >= right → STOP
```

### 2. Rotate Array by K (Reverse Trick)
```text
Input: [1, 2, 3, 4, 5], k = 2
Step 1: Reverse whole array → [5, 4, 3, 2, 1]
Step 2: Reverse first k (2) elements → [4, 5, 3, 2, 1]
Step 3: Reverse remaining n-k (3) elements → [4, 5, 1, 2, 3]
```

### 3. Move Zeroes (Placement Pointer)
```text
Input: [0, 1, 0, 3, 12]
write = 0
read 0: arr[0]=0 (skip)
read 1: arr[1]=1 → arr[0]=1, write=1
read 2: arr[2]=0 (skip)
read 3: arr[3]=3 → arr[1]=3, write=2
read 4: arr[4]=12 → arr[2]=12, write=3
End read. Fill remaining (write 3, 4) with 0 → [1, 3, 12, 0, 0]
```

### 4. Remove Duplicates from Sorted Array (Read/Write Pointer)
```text
Input: [1, 1, 2]
write = 1
read 1: arr[1]==arr[0] (skip)
read 2: arr[2]!=arr[1] (2!=1) → arr[1]=2, write=2
Return write (2). Array: [1, 2, ...]
```

---

## 6. 💻 Basic Implementation

See `problems/` folder for all implementations.

```bash
php problems/problem-01-manual-array-traversal.php
php problems/problem-02-find-minimum.php
php problems/problem-03-find-maximum.php
php problems/problem-04-reverse-array-in-place.php
php problems/problem-05-rotate-array-right.php
php problems/problem-06-array-sum.php
php problems/problem-07-find-duplicates.php
php problems/problem-08-move-zeroes.php
php problems/problem-09-remove-duplicates-sorted.php
```

---

## 7. 🧩 Patterns Learned

| Pattern | Signal / Trigger | Complexity |
|---------|-----------------|:----------:|
| Array Traversal | "visit each", "sum", "count" | O(n) |
| Initialize-Compare-Update | "find min/max/sum" | O(n), O(1) space |
| Two-Pointer In-Place Swap | "reverse in-place", "no extra space" | O(n), O(1) space |
| Reverse Trick | "rotate by k positions" | O(n), O(1) space |
| Write / Placement Pointer | "move zeroes", "preserve relative order" | O(n), O(1) space |
| Read / Write Pointer | "remove duplicates from sorted array" | O(n), O(1) space |
| Brute Force Nested Traversal | "find duplicates (no hashmap allowed)" | O(n²) |

---

## 7b. 🏗️ Interview Relevance

**Interview Importance:** Very High

**Common interview questions:**
- "Why is array index access O(1)?"
- "Why is beginning insertion O(n)?"
- "What does in-place mean?"
- "Can you reverse an array without extra space?"
- "Rotate this array by k positions."
- "What is the difference between O(1) access and O(n) search?"
- "How do you identify a Two Pointer problem?"
- "Why does the Rotate Reverse Trick work?"
- "Why is Move Zeroes a Placement Pointer problem?"
- "Why does sorted input make duplicate removal easier?"
- "Why can brute force duplicate detection be O(n²)?"

**Answers practiced today:**

| Question | Answer |
|----------|--------|
| Why is index access O(1)? | When index is known, element is accessed directly without traversing previous elements |
| Why is beginning insertion O(n)? | Existing elements may need to shift right to make space |
| What does in-place mean? | Modify the existing structure without extra auxiliary space proportional to input size |
| Best case of Linear Search? | O(1) — target is the first element |
| Worst case of Linear Search? | O(n) — target is last or absent |
| How do you identify a Two Pointer problem? | Looking for pairs, comparing elements from ends, or maintaining in-place read/write pointers |
| Why does sorted input make duplicate removal easier? | Duplicates are guaranteed to be adjacent, allowing O(n) removal with a single pass |
| Why can brute force duplicate detection be O(n²)? | Because for each of the $n$ elements, we may need to scan the remaining elements (or use `in_array()` which itself is O(n)) |

---

## 8. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time | Space |
|---|---------|----------|:----------:|--------------|--------|:----:|:-----:|
| 1 | Manual Array Traversal | Custom | Easy | Traversal | ✅ Solved Independently | O(n) | O(1) |
| 2 | Find Minimum | Custom | Easy | Initialize-Compare-Update | ✅ Solved Independently | O(n) | O(1) |
| 3 | Find Maximum | Custom | Easy | Initialize-Compare-Update | ✅ Solved Independently | O(n) | O(1) |
| 4 | Reverse Array In-Place | Custom | Easy | Two-Pointer Swap | ✅ Solved Independently | O(n) | O(1) |
| 5 | Rotate Array by K Positions | Custom | Easy-Medium | Reverse Trick | ✅ Solved Independently | O(n) | O(1) |
| 6 | Sum of Array Elements | Custom | Easy | Traversal | ✅ Solved Independently | O(n) | O(1) |
| 7 | Find Duplicates — Brute Force | Custom | Easy | Nested Traversal | ✅ Solved Independently | O(n²) | O(n) |
| 8 | Move Zeroes | Custom | Easy | Write / Placement Pointer | ✅ Solved Independently | O(n) | O(1) |
| 9 | Remove Duplicates from Sorted Array | Custom | Easy | Read / Write Pointer | ✅ Solved Independently | O(n) | O(1) |

---

## 9. ❌ Mistakes and Learnings

### Mistake 1 — Linear Search Best Case Confusion

**What I thought:** Best case of Linear Search = O(log n) (confused with Binary Search)

**What was wrong:** Binary Search requires a **sorted** array. Linear Search has no such requirement.

**Correct thinking:**
```
Linear Search Best Case  → O(1)   (target is first element)
Linear Search Worst Case → O(n)   (target is last or absent)
Binary Search            → O(log n) (requires sorted array)
```

---

### Mistake 2 — Number of Comparisons Off by One

**What I thought:** Searching for 20 in `[10, 20, 30, 40, 50]` = 1 comparison

**What was wrong:**
```
10 → comparison 1
20 → comparison 2
```

**Correct answer:** 2 comparisons. The element at the target position is still compared.

---

### Mistake 3 — Known Index vs Value Search

**What I thought:** `$arr[500]` means searching for the value 500

**Correct thinking:**
```
$arr[500]  → 500 is the INDEX → O(1) direct access

Searching for VALUE 500 in unsorted array → O(n) worst case
```

---

### Mistake 4 — Reverse Array Created a New Array

**First attempt:** Created `$newArr = []` and copied values into it.
Result was correct but violated the "in-place" requirement.

**Corrected approach:** Two-pointer swap — no extra array.
```
left + right pointers → swap → left++ → right--
Result: O(n) time, O(1) extra space
```

---

### Mistake 5 — Rotate vs Reverse Confusion

**What I thought:** Rotate array just means reversing it or shifting elements one by one.

**Correct thinking:** Shifting one by one is O(n²). The optimized O(n) "Reverse Trick" involves 3 steps: 
1. Reverse entire array 
2. Reverse first `k` elements 
3. Reverse remaining `n-k` elements.

---

### Mistake 6 — Ignoring $k > n$ in Rotation

**What I thought:** We can just rotate by any $k$ directly.

**What was wrong:** If $k$ is greater than the array length $n$, doing it naively causes out-of-bounds or redundant work.

**Correct approach:** Always do `$k = $k % $n` before rotating.

---

### Learning 7 — Two Pointers: Move Zeroes (Write Pointer)

**Learning:** Instead of swapping arbitrarily, use a `write` pointer to track where the next non-zero element should go. Iterate with a `read` pointer, and whenever a non-zero is found, place it at the `write` pointer and increment `write`.

---

### Learning 8 — Two Pointers: Remove Duplicates (Read/Write Pointer)

**Learning:** Similar to Move Zeroes. Since the array is sorted, duplicates are adjacent. Use a `write` pointer (starting at index 1). Compare current element with previous; if different, place at `write` pointer and increment `write`.

---

### Mistake 9 — `in_array()` Hidden Complexity Trap

**What I thought:** `in_array()` is a fast O(1) built-in function to check duplicates.

**What was wrong:** `in_array()` itself is O(n). Repeated use inside a loop can make the overall solution O(n²).

**Correct approach:** Since we are focusing on fundamentals and brute force today, nested traversal (or repeated `in_array`) is intentionally used to demonstrate O(n²). HashMap optimization (O(1) lookups) will be introduced in a future phase (Day 17).

---

## 10. 📝 Revision Notes

- 📌 **Array index access = O(1)** — index is known → direct address calculation
- 📌 **Value search (unsorted) = O(n)** — may check every element
- 📌 **Traversal = O(n)** — visit every element exactly once
- 📌 **Insert/delete at beginning = O(n)** — shift required
- 📌 **Insert/delete at end = O(1) amortized** — no shift required
- 📌 **In-place = no extra data structure proportional to input size**
- 📌 **Linear Search:** Best O(1), Worst O(n) — NOT O(log n)
- 📌 **`$arr[500]` = index 500, NOT value 500**
- 📌 **Pattern trigger:** "Traverse + compare" → Initialize-Compare-Update
- 📌 **Rotate trick:** Reverse all, reverse first k, reverse remaining n-k.
- 📌 **k > n constraint:** Always `$k = $k % $n`
- 📌 **`in_array()` inside loop = O(n²) trap!** Use Hash Map / Associative array for O(1) lookups.
- 📌 **Read/Write Pointers:** Useful for in-place filtering (Remove duplicates, Move Zeroes).

---

## 11. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 9 |
| Solved Independently | 9 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| Actual LeetCode Problems Solved | 0 |
| New Patterns Learned | 7 (Traversal, Init-Compare-Update, Two-Pointer Swap, Reverse Trick, Write Pointer, Read/Write Pointer, Brute Force) |
| Mistakes Documented | 9 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
> `$arr[500]` accesses index 500 in O(1). Searching for the *value* 500 without knowing its index requires O(n). These are fundamentally different operations.

**Pattern Mastery Self-Assessment (8-level scale):**

| Pattern | Level |
|---------|-------|
| Array Traversal | Level 3 — Can solve Easy problems independently |
| Initialize-Compare-Update | Level 3 — Can solve Easy problems independently |
| Two-Pointer In-Place Swap | Level 3 — Can solve Easy problems independently |
| Rotate Array (Reverse Trick) | Level 3 — Can solve Easy problems independently |
| Write / Placement Pointer | Level 3 — Can solve Easy problems independently |
| Read / Write Pointer | Level 3 — Can solve Easy problems independently |

**Confidence Level:** 🟢 High 

**Revision Needed:** None

**Tomorrow's Topic Preview:** Day 09 — Arrays: Two Pointers Pattern

---

> *"Understand the cost of every array operation before using it."*
