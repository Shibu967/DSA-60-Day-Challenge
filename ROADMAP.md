# 🗺️ ROADMAP.md — DSA 60-Day Challenge

> A complete day-by-day learning plan from absolute beginner to interview-ready.
> Every day has a clear topic, theory goal, implementation task, and problem-solving target.

---

## 📋 Phase Overview

| Phase | Days | Focus |
|-------|------|-------|
| Phase 1 | 01–07 | Foundations: Algorithms, Complexity, Big O |
| Phase 2 | 08–16 | Arrays & Strings: Core Patterns |
| Phase 3 | 17–21 | Hashing: HashMap, HashSet, Frequency |
| Phase 4 | 22–27 | Searching & Sorting |
| Phase 5 | 28–32 | Recursion & Backtracking |
| Phase 6 | 33–38 | Linked Lists, Stacks & Queues |
| Phase 7 | 39–44 | Trees & Binary Search Trees |
| Phase 8 | 45–46 | Heaps & Priority Queues |
| Phase 9 | 47–50 | Graphs |
| Phase 10 | 51–52 | Greedy Algorithms & Intervals |
| Phase 11 | 53–57 | Dynamic Programming |
| Phase 12 | 58–60 | Advanced Topics & Interview Simulation |

---

## Phase 1 — Foundations: Algorithms and Complexity (Day 01–07)

---

### Day 01 — What is an Algorithm? Introduction to Complexity

#### Learn
- What is an algorithm?
- Why do we analyze algorithms?
- What is time complexity?
- What is space complexity?
- Introduction to Big O notation

#### Understand
- An algorithm is a step-by-step set of instructions to solve a problem
- We analyze algorithms to predict how they behave as input grows
- O(1) is constant — the same time regardless of input size
- O(n) is linear — time grows proportionally with input
- O(n²) is quadratic — nested loops over the same input

#### Implement (PHP)
Write 3 simple PHP functions to demonstrate:
- O(1): return the first element of an array
- O(n): find the maximum value in an array
- O(n²): check all pairs in an array (brute force)

#### Practice
- 3–4 easy problems: simple loops, finding max/min, counting elements
- Focus: understand which line of code causes which complexity

#### Focus
Understand WHY complexity matters — not just what the notation means.

#### Revision
Before Day 02: recall O(1), O(n), and O(n²) from memory.

---

### Day 02 — Big O Notation Deep Dive

#### Learn
- O(log n) — what it means and when it appears
- O(n log n) — what it means (preview for sorting)
- O(2ⁿ) — exponential growth (preview for recursion)
- Drop constants rule: O(2n) → O(n)
- Dominant term rule: O(n² + n) → O(n²)
- Best, Average, and Worst case analysis
- Amortized analysis (brief introduction)

#### Understand
- Why O(log n) appears when we halve the input each step
- Why we only care about dominant terms for large inputs
- Difference between best case and worst case

#### Implement (PHP)
- Demonstrate O(log n) with a simple halving loop
- Demonstrate why O(n + n²) simplifies to O(n²) with a timing comment

#### Practice
- 3–4 problems: analyze the complexity of given code snippets
- Identify complexity of: single loop, nested loop, loop that halves

#### Focus
Learn to read code and estimate its complexity without running it.

#### Revision
Write the Big O hierarchy from memory: O(1) → O(log n) → O(n) → O(n log n) → O(n²) → O(2ⁿ)

---

### Day 03 — Space Complexity and Recursion Cost

#### Learn
- What is auxiliary space?
- How to calculate space complexity
- Stack space used by recursive calls
- In-place algorithms vs algorithms requiring extra space
- Trade-off: time vs space

#### Understand
- Space complexity counts extra memory your algorithm uses
- Recursive calls use stack space — each call frame takes memory
- An algorithm can be time-efficient but space-inefficient

#### Implement (PHP)
- Compare an in-place array reversal (O(1) space) vs creating a new reversed array (O(n) space)
- Show a recursive sum function and count stack frames

#### Practice
- 3–4 problems: analyze space complexity of given solutions
- One problem: solve the same problem both in-place and with extra space — compare

#### Focus
Understand that every solution has both a time cost and a space cost.

#### Revision
State the space complexity of: iterative loop, recursive function, hash map storage.

---

### Day 04 — PHP Refresher + Complexity in Built-in Functions

#### Learn
- PHP array functions and their hidden complexity: `array_push`, `array_pop`, `array_shift`, `array_unshift`, `in_array`, `array_search`, `sort`
- Why `in_array` is O(n) but array key lookup is O(1)
- Choosing the right PHP data structure

#### Understand
- PHP arrays are hash table-based. Key lookup is O(1) on average for both string and integer keys
- `array_pop` is O(1) — removes the last element without reindexing
- `array_push` / `$arr[] =` is O(1) amortized — occasional resize is rare
- `array_shift` is O(n) — removes from the front, re-indexes all remaining elements
- `in_array` scans linearly — O(n) — never use inside a loop if you need O(1) lookup
- `sort()` is O(n log n)
- Use `isset($map[$key])` instead of `in_array($val, $arr)` for O(1) existence checks

#### Implement (PHP)
```php
// Demonstrate the difference:
// Using in_array() — O(n)
in_array($target, $arr);

// Using array key lookup — O(1)
isset($map[$target]);
```

#### Practice
- 3–4 problems using PHP arrays — focus on choosing the right approach
- Identify which built-in functions are expensive

#### Focus
As a PHP developer, know the cost of the tools you already use.

#### Revision
List 5 PHP array functions and state their time complexity.

---

### Day 05 — Complexity Pattern Recognition

#### Learn
- How to identify O(n) patterns at a glance
- How to identify O(n²) patterns (nested loops)
- How to identify O(log n) patterns (halving)
- Common complexity traps and misconceptions

#### Understand
- Two separate loops = O(n + n) = O(n), not O(n²)
- Nested loops = O(n × m), or O(n²) if same input
- A loop inside a function called n times = O(n²) total

#### Practice
- 5 problems: given a function, determine its time and space complexity
- 2 problems: optimize an O(n²) brute force to O(n)

#### Focus
Pattern recognition: look at the loop structure, not just individual lines.

---

### Day 06 — Complexity in Real Code + Problem Solving

#### Learn
- Read complete multi-step algorithms and analyze them end-to-end
- Identify the bottleneck in an algorithm (the most expensive step)
- Add complexity of sequential steps, keep only the dominant term

#### Understand
- When an algorithm has multiple steps, the **dominant term** determines overall complexity
- Example: Sort O(n log n) + Loop O(n) = O(n log n) total
- The **bottleneck** is the single step you must optimize to improve the whole algorithm
- Writing complexity analysis BEFORE coding, not after, is an interview skill

#### Constraint Habit (mandatory from today)
Before every problem:
```
1. Read n from the constraints
2. State which algorithm class is implied
3. Only then design your solution
```

#### Practice
5 problems — for each one, write brute force complexity BEFORE coding the optimal:

| # | Problem | Pattern | Key Bottleneck |
|---|---------|---------|----------------|
| 1 | Merge Sorted Array | Two pointer, in-place | Avoid creating new array |
| 2 | Remove Duplicates from Sorted Array | Two pointer | Slow + fast pointer |
| 3 | Best Time to Buy and Sell Stock | Single pass | Track running minimum |
| 4 | Move Zeroes | Two pointer | Stable relative order |
| 5 | Find All Disappeared Numbers | HashMap / frequency | in_array trap → HashMap |

#### Focus
For every problem today:
1. State n and complexity class implied
2. Write brute force + its complexity
3. Identify the bottleneck
4. Write optimized + its complexity
5. Explain optimization out loud (Rule IC3)

#### Pattern Recognition
> **Signal that Day 06 is complete:** You can look at any algorithm and immediately identify its most expensive step without running it.

---

### Day 07 — Revision Day: Phase 1

#### Goal
Consolidate all Phase 1 learning before moving to arrays.

#### Activities
- Re-read your daily README notes from Days 01–06
- Rewrite the Big O hierarchy from memory: O(1) → O(log n) → O(n) → O(n log n) → O(n²) → O(2ⁿ)
- State the complexity of 10 common PHP operations from memory
- Update LEARNING_TRACKER.md

#### Revision Problems (5 problems — Phase 1 only)

> These problems test ONLY what was covered in Days 01–06.
> No Two Pointers. No HashMap. No Sliding Window. Those are Phases 2–3.
> The skill being tested: **Can you read code, analyze complexity, find the bottleneck, and write the optimization?**

**Problem 1 — Read and classify complexity**
```php
function process(array $arr): void {
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            echo $arr[$i] + $arr[$j];
        }
    }
    for ($k = 0; $k < count($arr); $k++) {
        echo $arr[$k];
    }
}
```
> What is the time complexity? What is the dominant term? Why?

**Problem 2 — Identify the bottleneck and fix it**
```php
function hasDuplicate(array $arr): bool {
    for ($i = 0; $i < count($arr); $i++) {
        if (in_array($arr[$i], array_slice($arr, $i + 1))) {
            return true;
        }
    }
    return false;
}
```
> What is the current complexity? What is the bottleneck? Rewrite it to be O(n).

**Problem 3 — Constraint → algorithm selection**
> You receive a problem. The constraint says n ≤ 10⁶.
> You have three candidate algorithms: O(n²), O(n log n), O(n).
> Which ones are acceptable? Which ones will time out? Justify your answer with numbers.

**Problem 4 — Trace halving and state its complexity**
```php
$n = 1024;
$count = 0;
while ($n > 1) {
    $n = intdiv($n, 2);
    $count++;
}
echo $count; // What is the output? What is the time complexity?
```
> What does `$count` print? How many steps does halving 1024 take? What general formula gives the number of steps?

**Problem 5 — Rewrite a slow function**
```php
function sumOfSquares(int $n): int {
    $result = 0;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $result += 1;  // counts total iterations
        }
    }
    return $result;
}
```
> What is the time complexity? Can you write a mathematical formula that computes the same result in O(1)? (Hint: sum of 1+2+3+...+n)

#### Mastery Check
- Can you read any code block and state its complexity in under 30 seconds?
- Can you identify the bottleneck (most expensive step) in a multi-step algorithm?
- Can you look at n ≤ 10⁵ and immediately say "O(n²) will time out"?
- Can you explain why `in_array()` inside a loop is dangerous?

---

## Phase 2 — Arrays and Strings (Day 08–16)

---

### Day 08 — Arrays: Fundamentals

#### Learn
- What is an array?
- Why arrays exist (contiguous memory, O(1) access by index)
- Basic operations: access, insert, delete, search, traverse
- Complexity of each operation
- PHP array as a dynamic array / hash map hybrid

#### Understand
- Array index access is O(1) because of memory offset calculation
- Inserting at the beginning is O(n) — all elements must shift
- Inserting at the end is O(1) amortized

#### Implement (PHP)
- Manual array traversal
- Find min and max
- Reverse an array in-place
- Rotate an array by k positions

#### Practice
- 4–5 easy array problems: sum of elements, find duplicates, move zeros

#### Focus
Understand the cost of every array operation before using it.

---

### Day 09 — Arrays: Two Pointers Pattern

#### Learn
- What is the Two Pointers pattern?
- When to use it: sorted arrays, finding pairs, partitioning
- Left-Right pointer approach
- Slow-Fast pointer approach (preview)

#### Understand
- Two Pointers reduces O(n²) brute force to O(n)
- Works best when the array is sorted or when we need to find pairs
- Left pointer moves right; right pointer moves left; they meet in the middle

#### Implement (PHP)
- Two Sum (sorted array version)
- Move all zeros to the end
- Check if a string is a palindrome using two pointers

#### Practice
- 4–5 easy-medium problems: pair with target sum, remove duplicates from sorted array, three-sum brute force → two pointer

#### Pattern Recognition
> **Trigger:** "Find a pair," "Find two elements that satisfy a condition," "Sorted array," "Compare from both ends"

---

### Day 10 — Arrays: Prefix Sum

#### Learn
- What is prefix sum?
- Why it exists: avoid recomputing range sums
- Building the prefix sum array
- Answering range sum queries in O(1)

#### Understand
- Without prefix sum: range sum query = O(n) per query
- With prefix sum: build once in O(n), answer each query in O(1)
- `prefix[i] = prefix[i-1] + arr[i]`
- Range sum from index `l` to `r` = `prefix[r] - prefix[l-1]`

#### Implement (PHP)
```php
function buildPrefix(array $arr): array {
    $prefix = [];
    $prefix[0] = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $prefix[$i] = $prefix[$i - 1] + $arr[$i];
    }
    return $prefix;
}

function rangeSum(array $prefix, int $l, int $r): int {
    return $l === 0 ? $prefix[$r] : $prefix[$r] - $prefix[$l - 1];
}
```

#### Practice
- 3–4 problems: range sum query, subarray sum equals k (counting), product of array except self

#### Pattern Recognition
> **Trigger:** "Subarray sum," "Range query," "Running total," "Cumulative sum"

---

### Day 11 — Arrays: Sliding Window (Fixed Size)

#### Learn
- What is the Sliding Window pattern?
- Fixed-size window: window size k is given
- How to slide the window without recomputing the entire window sum

#### Understand
- Brute force for max sum of k-size subarray = O(n × k)
- Sliding window: add new element, remove old element = O(n)
- Maintain a running sum; subtract left element, add right element as window moves

#### Implement (PHP)
- Maximum sum of subarray of size k
- Average of all subarrays of size k

#### Practice
- 3–4 easy-medium problems: max average of k elements, contains duplicate within k distance

#### Pattern Recognition
> **Trigger:** "Subarray of size k," "Window of fixed size," "Consecutive k elements"

---

### Day 12 — Arrays: Sliding Window (Variable Size)

#### Learn
- Variable-size sliding window: window expands and shrinks
- When to expand: condition not yet met
- When to shrink: condition violated
- Track max/min window that satisfies condition

#### Understand
- Two pointers: `left` and `right` define the window
- Move `right` to expand, move `left` to shrink
- Track the answer at each valid window state

#### Implement (PHP)
- Smallest subarray with sum ≥ target
- Longest substring without repeating characters

#### Practice
- 3–4 problems: minimum window substring (intro), longest subarray with at most k zeros

#### Pattern Recognition
> **Trigger:** "Longest/shortest subarray/substring," "At most k," "Minimum size," "Contiguous elements satisfying a condition"

---

### Day 13 — Strings: Fundamentals

#### Learn
- String as a character array
- Common string operations and their complexity
- ASCII values and character manipulation in PHP
- String immutability concept
- ord() and chr() in PHP

#### Implement (PHP)
- Reverse a string
- Check if palindrome
- Count character frequencies
- Remove whitespace, convert case

#### Practice
- 4–5 easy string problems: reverse words, check anagram, first unique character

---

### Day 14 — Strings: Manipulation and Pattern Problems

#### Learn
- Substring searching
- String building efficiently
- Comparing strings character by character
- Common string patterns: sliding window on strings, two pointers on strings

#### Practice
- 4–5 easy-medium string problems: valid palindrome, longest common prefix, count vowels, isomorphic strings

---

### Day 15 — Mixed Practice: Arrays + Strings

#### Goal
Combine array and string patterns in problems that require both.

#### Practice
- 5–6 mixed problems
- At least 1–2 medium problems
- Apply: Two Pointers, Prefix Sum, Sliding Window, String manipulation

#### Focus
Identify the pattern quickly. Do not brute-force if a pattern fits.

---

### Day 16 — Revision Day: Phase 2

#### Goal
Solidify array and string patterns before hashing.

#### Activities
- Write the definition and trigger signal for each pattern from memory:
  - Two Pointers
  - Prefix Sum
  - Sliding Window (fixed)
  - Sliding Window (variable)
- Revisit any problem from Days 08–15 that you struggled with

#### Blind Problem Set (5–6 problems, pattern NOT revealed)

Solve these without being told which pattern to use:

| # | Problem | Your pattern guess | Actual pattern |
|---|---------|-------------------|----------------|
| 1 | Find two numbers in sorted array that sum to target | __ | Two Pointers |
| 2 | Maximum average subarray of size k | __ | Sliding Window Fixed |
| 3 | Longest substring with at most 2 distinct characters | __ | Sliding Window Variable |
| 4 | Product of array except self | __ | Prefix Sum |
| 5 | Valid palindrome using two pointers | __ | Two Pointers |
| 6 | Minimum size subarray with sum ≥ target | __ | Sliding Window Variable |

> Attempt each independently first. Record what you tried and why.

---

## Phase 3 — Hashing: HashMap, HashSet, Frequency Counting (Day 17–21)

---

### Day 17 — HashMap Fundamentals

#### Learn
- What is a HashMap?
- How PHP associative arrays work as HashMaps
- Key-value storage and O(1) average lookup
- Common HashMap operations: set, get, delete, check existence
- When to use a HashMap

#### Understand
- HashMap allows us to trade space for time
- Key lookup is O(1) on average due to hashing
- PHP's associative array (`$map['key']`) is a built-in HashMap

#### Implement (PHP)
- Build a frequency map for an array
- Check if two strings are anagrams using frequency map
- Two Sum using HashMap (O(n) solution)

#### Practice
- 4–5 easy problems: two sum, contains duplicate, valid anagram

#### Pattern Recognition
> **Trigger:** "Need O(1) lookup," "Count occurrences," "Check existence quickly," "Map one thing to another"

---

### Day 18 — HashSet and Frequency Counting

#### Learn
- What is a HashSet? (unique values, O(1) existence check)
- PHP does not have a built-in Set — simulate with `array_flip` or use keys
- Frequency counting pattern
- Finding duplicates, missing numbers, first unique elements

#### Implement (PHP)
```php
// Simulate HashSet in PHP
$set = [];
$set[$value] = true;  // Add
isset($set[$value]);  // Check existence
unset($set[$value]);  // Remove
```

#### Practice
- 4–5 problems: find all duplicates, single number, longest consecutive sequence

#### Pattern Recognition
> **Trigger:** "Find duplicates," "Has this element appeared before?," "Unique elements only"

---

### Day 19 — Hashing: Anagram and Grouping Patterns

#### Learn
- Grouping anagrams using a sorted key
- Frequency array as a HashMap key
- Character count comparison pattern

#### Implement (PHP)
- Group anagrams
- Find all anagram positions in a string (sliding window + frequency map)

#### Practice
- 3–4 problems: group anagrams, find anagrams in string, word pattern

---

### Day 20 — Hashing: Subarray and Count Patterns

#### Learn
- Prefix sum + HashMap combined pattern
- Subarray sum equals k using running sum and frequency map
- Counting subarrays with a given property

#### Understand
- `prefixSum[i] - prefixSum[j] = k` → look for `prefixSum[i] - k` in the map
- This reduces O(n²) brute force to O(n)

#### Implement (PHP)
- Subarray sum equals k
- Count subarrays with given XOR (if covered)
- Longest subarray with sum 0

#### Practice
- 3–4 medium problems using prefix sum + hash map combined

---

### Day 21 — Revision Day: Phase 3

#### Goal
Solidify hashing before moving to searching and sorting.

#### Activities
- Write the time complexity of: HashMap lookup, HashSet insertion, frequency map build
- Revisit any struggling problem from Days 17–20
- State 3 problem trigger signals for HashMap pattern from memory

#### Blind Problem Set (5 problems, pattern NOT revealed)

| # | Problem | Your pattern guess | Actual pattern |
|---|---------|-------------------|----------------|
| 1 | Two Sum | __ | HashMap |
| 2 | Longest consecutive sequence | __ | HashSet |
| 3 | Group anagrams | __ | HashMap with sorted key |
| 4 | Subarray sum equals k | __ | Prefix Sum + HashMap |
| 5 | Find all duplicates in array | __ | HashMap / Frequency |

> Attempt each independently. No pattern hints before you try.

---

## Phase 4 — Searching and Sorting (Day 22–27)

---

### Day 22 — Binary Search: Fundamentals

#### Learn
- What is Binary Search?
- Why it works only on sorted data
- How it achieves O(log n)
- Iterative and recursive implementation
- The `left`, `right`, `mid` pointer logic

#### Understand
- Each step eliminates half the search space
- After k steps: n / 2^k elements remain
- At most log₂(n) steps needed

#### Implement (PHP)
```php
function binarySearch(array $arr, int $target): int {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = $left + intdiv($right - $left, 2); // Avoid integer overflow
        if ($arr[$mid] === $target) return $mid;
        elseif ($arr[$mid] < $target) $left = $mid + 1;
        else $right = $mid - 1;
    }
    return -1;
}
```

#### Practice
- 4–5 easy-medium problems: classic binary search, search insert position, first and last position

#### Pattern Recognition
> **Trigger:** "Sorted array," "Find target position," "Minimize/maximize value under a condition"

---

### Day 23 — Binary Search: Variants and Advanced Applications

#### Learn
- Finding the first/last occurrence of a target
- Binary search on the answer (search space is not an array, but a range of answers)
- Condition-based binary search

#### Understand
- Binary search is not just for finding a value — it can find a threshold
- Pattern: "Find the minimum value of X such that condition(X) is true" = binary search on X

#### Implement (PHP)
- Find first occurrence of target
- Find last occurrence of target
- Search in rotated sorted array

#### Practice
- 3–4 medium problems: find peak element, capacity to ship packages in D days (intro to binary search on answer)

---

### Day 24 — Sorting: Bubble, Selection, Insertion Sort

#### Learn
- Bubble Sort: compare adjacent, swap, bubble max to end
- Selection Sort: find minimum, place it at front
- Insertion Sort: build sorted portion by inserting elements one by one
- Time complexity of each: O(n²) worst case
- When Insertion Sort is O(n): nearly sorted data

#### Understand
- These are not used in production — but they teach the mechanics of sorting
- Understanding these builds intuition for why Merge Sort and Quick Sort are better

#### Implement (PHP)
- All three sorting algorithms from scratch

#### Practice
- 2–3 problems: sort colors (Dutch National Flag), sort array by parity

---

### Day 25 — Sorting: Merge Sort

#### Learn
- Divide and Conquer concept
- Merge Sort: split array in half, sort each half, merge
- Why Merge Sort is O(n log n)
- Stable sort property

#### Understand
- "Divide and Conquer" = break the problem into smaller subproblems
- Merging two sorted arrays is O(n)
- There are log n levels of splitting → total O(n log n)

#### Implement (PHP)
```php
function mergeSort(array $arr): array {
    if (count($arr) <= 1) return $arr;
    $mid = intdiv(count($arr), 2);
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));
    return merge($left, $right);
}

function merge(array $left, array $right): array {
    $result = [];
    $i = $j = 0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) $result[] = $left[$i++];
        else $result[] = $right[$j++];
    }
    return array_merge($result, array_slice($left, $i), array_slice($right, $j));
}
```

#### Practice
- 3–4 problems: merge intervals, sort linked list (concept), count inversions (intro)

> **Note on PHP implementation:** The merge sort above uses `array_slice` (O(k) per call) and `array_merge` (O(n+m)). Over all recursive levels, this creates approximately O(n log n) total extra space — more than the theoretical O(n) of an index-based implementation. For learning purposes this is fine. For interviews, state: "A true O(n) space implementation would pass indices instead of slicing."

---

### Day 26 — Sorting: Quick Sort + Sorting Applications

#### Learn
- Quick Sort: pick a pivot, partition around it, sort halves recursively
- Best/average case: O(n log n), worst case: O(n²)
- In-place sorting — O(log n) space for recursion stack
- When to use which sorting algorithm

#### Implement (PHP)
- Quick Sort from scratch with Lomuto partition scheme

#### Practice
- 3–4 problems: kth largest element, meeting rooms, sort by custom comparator

#### Sorting Pattern Summary

| Algorithm | Time (Avg) | Time (Worst) | Space | Stable? |
|-----------|-----------|--------------|-------|---------|
| Bubble Sort | O(n²) | O(n²) | O(1) | ✅ |
| Selection Sort | O(n²) | O(n²) | O(1) | ❌ |
| Insertion Sort | O(n²) | O(n²) | O(1) | ✅ |
| Merge Sort | O(n log n) | O(n log n) | O(n) | ✅ |
| Quick Sort | O(n log n) | O(n²) | O(log n) | ❌ |

---

### Day 27 — Revision Day: Phase 4

#### Goal
Consolidate searching and sorting before recursion.

#### Activities
- Implement Binary Search from memory (iterative)
- Implement Merge Sort from memory
- State the complexity of all 5 sorting algorithms from memory

#### Blind Problem Set (4–5 problems, pattern NOT revealed)

| # | Problem | Your pattern guess | Actual pattern |
|---|---------|-------------------|----------------|
| 1 | Search in rotated sorted array | __ | Binary Search |
| 2 | Find peak element | __ | Binary Search |
| 3 | Sort colors (Dutch National Flag) | __ | Two Pointers / Counting Sort |
| 4 | Kth largest element in array | __ | Quick Select / Heap |
| 5 | Merge intervals | __ | Sort + Greedy |

> Attempt each independently. Identify the pattern AFTER solving.

---

## Phase 5 — Recursion and Backtracking (Day 28–32)

---

### Day 28 — Recursion: Fundamentals

#### Learn
- What is recursion?
- Base case and recursive case
- Call stack and how recursion unfolds
- Recursion vs Iteration
- Common recursion mistakes: missing base case, infinite recursion

#### Understand
- Every recursive function must have a base case or it never stops
- Each recursive call adds a frame to the call stack
- Recursion trades simplicity of code for call stack space

#### Implement (PHP)
- Factorial
- Fibonacci (naive recursive, then memoized)
- Sum of digits
- Print 1 to n recursively

#### Practice
- 4–5 easy recursion problems: power function, reverse string recursively, count zeros

#### Pattern Recognition
> **Trigger:** "Can this problem be broken into a smaller version of itself?"

---

### Day 29 — Recursion: Tree of Calls and Patterns

#### Learn
- Visualize the recursion tree for Fibonacci
- Overlapping subproblems (why naive Fibonacci is O(2ⁿ))
- Memoization: cache recursive results
- Head recursion vs Tail recursion

#### Implement (PHP)
- Fibonacci with memoization (top-down DP preview)
- Binary search recursively
- Recursive array sum

#### Practice
- 3–4 problems where drawing the recursion tree reveals the pattern

---

### Day 30 — Recursion: Subsets and Permutations

#### Learn
- Generate all subsets of a set (Power Set)
- Generate all permutations of an array
- How recursion naturally explores all choices

#### Understand
- Subsets: at each element, choose to include or exclude → 2ⁿ subsets
- Permutations: at each position, try each remaining element → n! permutations

#### Implement (PHP)
- Generate all subsets
- Generate all permutations

#### Practice
- 3–4 problems: subsets, permutations, combination sum (intro)

---

### Day 31 — Backtracking: Fundamentals

#### Learn
- What is backtracking?
- Backtracking = Recursion + Undo
- The "choose, explore, unchoose" pattern
- When to prune branches early

#### Understand
- Backtracking explores all paths but backtracks when a path is invalid
- It avoids exploring paths that cannot lead to a valid answer (pruning)
- Core template: choose → recurse → unchoose

#### Implement (PHP)
```php
function backtrack(array &$current, array &$result, /* params */): void {
    if (/* base condition */) {
        $result[] = $current;
        return;
    }
    foreach ($choices as $choice) {
        $current[] = $choice;        // Choose
        backtrack($current, $result, /* updated params */);
        array_pop($current);         // Unchoose
    }
}
```

#### Practice
- 3–4 problems: combination sum, letter combinations of phone number, word search (grid)

---

### Day 32 — Backtracking: Practice + Phase 5 Revision

#### Activities
- Solve 4–5 backtracking problems
- Revision: implement factorial, subsets, permutations from memory
- State when to use recursion vs iteration vs backtracking

#### Practice
- N-Queens (study), Sudoku Solver (study concept), Palindrome Partitioning

---

## Phase 6 — Linked Lists, Stacks, and Queues (Day 33–38)

---

### Day 33 — Linked Lists: Fundamentals

#### Learn
- What is a Linked List?
- Node structure: value + next pointer
- Singly vs Doubly Linked List
- Why Linked Lists exist: dynamic size, O(1) insert/delete at known position
- Operations: traverse, insert at head/tail, delete by value, search

#### Understand
- Array: O(1) access by index, O(n) insert at middle
- Linked List: O(n) access by index, O(1) insert at known position
- Trade-off: Linked Lists use more memory (pointer storage)

#### Implement (PHP)
```php
class ListNode {
    public int $val;
    public ?ListNode $next;

    public function __construct(int $val = 0, ?ListNode $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
```
- Build a singly linked list
- Traverse and print
- Insert at head, tail, middle
- Delete a node

#### Practice
- 3–4 easy problems: reverse linked list, find middle, merge two sorted lists

---

### Day 34 — Linked Lists: Patterns

#### Learn
- Fast and Slow Pointers (Floyd's Algorithm)
- Cycle detection
- Finding the middle in one pass
- Linked List reversal patterns

#### Implement (PHP)
- Detect cycle in linked list
- Find the middle node
- Reverse a linked list iteratively and recursively

#### Practice
- 4–5 problems: detect cycle, palindrome linked list, remove nth node from end, intersection of two lists

#### Pattern Recognition
> **Trigger:** "Linked List + cycle," "Middle of list," "Two speeds," "Find intersection"

---

### Day 35 — Stack: Fundamentals and Patterns

#### Learn
- What is a Stack? (LIFO — Last In, First Out)
- Real-world uses: function call stack, undo/redo, browser history
- Operations: push, pop, peek, isEmpty — all O(1)
- Stack using PHP array (array_push / array_pop)

#### Understand
- Stack is the natural structure for problems involving "most recent" or "matching pairs"
- Parentheses matching, expression evaluation, monotonic stack patterns all use Stack

#### Implement (PHP)
- Stack class using array
- Valid Parentheses checker
- Evaluate Reverse Polish Notation

#### Practice
- 4–5 problems: valid parentheses, min stack, daily temperatures (intro to monotonic)

#### Pattern Recognition
> **Trigger:** "Matching brackets," "Most recent element," "Undo operations," "Nested structure"

---

### Day 36 — Queue and Deque: Fundamentals

#### Learn
- What is a Queue? (FIFO — First In, First Out)
- Real-world uses: BFS traversal, task scheduling, request queues
- Operations: enqueue, dequeue, peek, isEmpty — O(1)
- What is a Deque (Double-Ended Queue)?
- PHP SplQueue and SplDoublyLinkedList

#### Implement (PHP)
- Queue using array (array_push / array_shift — but note array_shift is O(n))
- Efficient Queue using two stacks or SplQueue
- Circular Queue implementation

#### Practice
- 3–4 problems: implement queue using stacks, number of recent calls, circular queue

---

### Day 37 — Monotonic Stack and Queue

#### Learn
- What is a Monotonic Stack? (stack that maintains increasing or decreasing order)
- When to use: "Next Greater Element" type problems
- Monotonic Deque: for sliding window maximum problems

#### Understand
- Monotonic Stack eliminates O(n²) brute force for "next greater/smaller" problems
- Elements are popped when a larger (or smaller) element is found
- The pattern: for each element, pop while stack top is smaller (for NGE)

#### Implement (PHP)
- Next Greater Element
- Largest Rectangle in Histogram (study)
- Sliding Window Maximum using Deque

#### Practice
- 3–4 problems: next greater element, daily temperatures, stock span problem

#### Pattern Recognition
> **Trigger:** "Next greater/smaller element," "Sliding window max/min," "Nearest element satisfying a condition"

---

### Day 38 — Revision Day: Phase 6

#### Activities
- Implement: Linked List from scratch, Stack, Queue from memory
- Solve 5–6 mixed problems from Phase 6 without notes
- State trigger signals for: Fast-Slow Pointer, Stack pattern, Monotonic Stack

---

## Phase 7 — Trees and Binary Search Trees (Day 39–44)

---

### Day 39 — Binary Tree: Structure and Traversals

#### Learn
- What is a Tree? Node, edge, root, leaf, height, depth
- What is a Binary Tree? (at most 2 children per node)
- Tree traversals: Inorder, Preorder, Postorder (DFS)
- Recursive traversal implementation

#### Understand
- Tree problems almost always use recursion naturally
- Inorder (Left → Root → Right) of BST gives sorted order
- Preorder (Root → Left → Right) useful for copying/serializing a tree
- Postorder (Left → Right → Root) useful for deletion

#### Implement (PHP)
```php
class TreeNode {
    public int $val;
    public ?TreeNode $left;
    public ?TreeNode $right;
    public function __construct(int $val = 0) {
        $this->val = $val;
        $this->left = $this->right = null;
    }
}
```
- Inorder, Preorder, Postorder traversal (recursive)
- Calculate height of tree
- Count total nodes

#### Practice
- 4–5 easy problems: max depth, diameter of binary tree, inorder traversal, symmetric tree

---

### Day 40 — Binary Tree: BFS Level Order Traversal

#### Learn
- What is Level Order Traversal?
- Why we use a Queue for BFS
- Level-by-level processing
- Applications: find level of a node, zigzag traversal, right side view

#### Understand
- BFS uses a Queue: enqueue left child, then right child
- Process nodes level by level — all nodes at depth d before depth d+1
- Track levels by managing the queue size at the start of each level

#### Implement (PHP)
- Level order traversal using SplQueue
- Return level-by-level grouped results

#### Practice
- 4–5 problems: level order traversal, right side view, average of levels, zigzag order

#### Pattern Recognition
> **Trigger:** "Level by level," "Shortest path in tree," "Find nodes at same depth"

---

### Day 41 — Binary Tree: DFS Patterns

#### Learn
- Path sum problems
- Root-to-leaf paths
- Maximum path sum
- LCA (Lowest Common Ancestor)

#### Understand
- DFS naturally tracks the path from root to current node
- For path problems: pass running sum down; check at leaf
- LCA: if both target nodes are in different subtrees, current node is the LCA

#### Practice
- 4–5 medium problems: path sum, all root-to-leaf paths, max path sum, LCA

---

### Day 42 — Binary Search Tree: Fundamentals

#### Learn
- What is a BST? (left < root < right at every node)
- Search in BST: O(log n) average, O(n) worst case (unbalanced)
- Insert in BST
- Inorder traversal of BST gives sorted output

#### Understand
- BST enables O(log n) search because at each node you eliminate half the remaining tree
- A poorly balanced BST degrades to O(n) — worst case: all nodes inserted in sorted order creates a degenerate tree (essentially a linked list, all nodes on one side)
- For interviews: understand BST properties deeply, not just implementation

#### Implement (PHP)
- BST search (iterative and recursive)
- BST insert
- Inorder traversal of BST (verify sorted output)

#### Practice
- 3–4 problems: search BST, insert into BST, validate BST

---

### Day 43 — BST: Advanced Operations + Tree Problems

#### Learn
- Delete node from BST (3 cases: leaf, one child, two children)
- Kth smallest element in BST
- Convert sorted array to BST (balanced)

#### Practice
- 4–5 problems: delete node in BST, kth smallest in BST, range sum of BST, convert array to BST

---

### Day 44 — Revision Day: Phase 7

#### Activities
- Implement TreeNode, BFS traversal, DFS traversal from memory
- Solve 5–6 mixed tree problems without notes
- State: when to use BFS vs DFS for tree problems?

---

## Phase 8 — Heaps and Priority Queues (Day 45–46)

---

### Day 45 — Heap: Min-Heap and Max-Heap Fundamentals

#### Learn
- What is a Heap? (complete binary tree with heap property)
- Min-Heap: parent ≤ children (minimum is always at root)
- Max-Heap: parent ≥ children (maximum is always at root)
- Heap as an array representation
- Operations: insert (O(log n)), extractMin/Max (O(log n)), peek (O(1))
- PHP has no built-in Heap — use SplMinHeap and SplMaxHeap

#### Understand
- Heap gives you fast access to the minimum (or maximum) at all times
- It does NOT keep all elements sorted — only guarantees the root is min/max
- Heapify up (after insert) and heapify down (after extract)

#### Implement (PHP)
```php
$minHeap = new SplMinHeap();
$minHeap->insert(5);
$minHeap->insert(2);
$minHeap->insert(8);
echo $minHeap->extract(); // 2 (minimum)
```
- Build a max-heap manually (to understand the concept)
- Heap sort (conceptual understanding)

#### Practice
- 3–4 problems: kth largest element, last stone weight, find median from data stream (intro)

#### Pattern Recognition
> **Trigger:** "Kth largest/smallest," "Running median," "Always need the current minimum/maximum"

---

### Day 46 — Priority Queue: Patterns and Problems

#### Learn
- Priority Queue = abstraction over Heap
- Top K elements pattern
- Merge K sorted lists pattern (concept)
- Meeting rooms II (greedy + heap)

#### Practice
- 4–5 problems: top k frequent elements, k closest points to origin, task scheduler (intro), merge k sorted lists

#### Pattern Recognition
> **Trigger:** "Top K," "K closest," "Continuously finding min/max from a changing set"

---

## Phase 9 — Graphs (Day 47–50)

---

### Day 47 — Graphs: Fundamentals and BFS

#### Learn
- What is a Graph? Vertices (nodes) and Edges
- Directed vs Undirected graphs
- Weighted vs Unweighted graphs
- Graph representations: Adjacency List (preferred), Adjacency Matrix
- BFS on a graph: uses a Queue, tracks visited nodes

#### Understand
- BFS explores level by level from the source node
- BFS is used for: shortest path in unweighted graph, level traversal, connected components
- Always maintain a `visited` set to avoid revisiting nodes

#### Implement (PHP)
```php
// Adjacency List representation
$graph = [
    0 => [1, 2],
    1 => [0, 3],
    2 => [0, 4],
    3 => [1],
    4 => [2],
];

function bfs(array $graph, int $start): void {
    $visited = [];
    $queue = new SplQueue();
    $queue->enqueue($start);
    $visited[$start] = true;

    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();
        echo $node . " ";
        foreach ($graph[$node] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $visited[$neighbor] = true;
                $queue->enqueue($neighbor);
            }
        }
    }
}
```

#### Practice
- 3–4 problems: number of islands, flood fill, shortest path in binary matrix

---

### Day 48 — Graphs: DFS and Cycle Detection

#### Learn
- DFS on a graph: uses recursion (or explicit Stack)
- DFS traversal order vs BFS
- Cycle detection in undirected graph (using visited + parent tracking)
- Cycle detection in directed graph (using visited + recursion stack)
- Connected components

#### Implement (PHP)
- DFS recursive
- Cycle detection in undirected graph
- Count connected components

#### Practice
- 4–5 problems: number of provinces, clone graph, course schedule (cycle detection), pacific atlantic water flow

---

### Day 49 — Graphs: Topological Sort

#### Learn
- What is Topological Sort? (ordering of nodes with no back edges)
- Only for Directed Acyclic Graphs (DAG)
- Kahn's Algorithm (BFS-based, uses in-degree)
- DFS-based topological sort

#### Understand
- Topological sort answers: "In what order must tasks be completed, given dependencies?"
- If cycle exists → no valid topological order
- Kahn's Algorithm: start from nodes with in-degree 0

#### Implement (PHP)
- Kahn's Algorithm (BFS topological sort)

#### Practice
- 3–4 problems: course schedule, course schedule II, build order, alien dictionary (intro)

#### Pattern Recognition
> **Trigger:** "Tasks with dependencies," "Prerequisites," "Order of completion," "DAG ordering"

---

### Day 50 — Graphs: Shortest Path + Full Revision

#### Learn
- Dijkstra's Algorithm (basic understanding)
- Why BFS gives shortest path for unweighted graphs
- When to use Dijkstra: weighted graphs with non-negative weights

#### Implement (PHP)
- Dijkstra using a Min Heap (SplMinHeap)

#### Practice
- 3–4 problems: network delay time, cheapest flights within k stops, path with minimum effort
- **Revision**: Solve 2 problems each from BFS and DFS

---

## Phase 10 — Greedy Algorithms and Intervals (Day 51–52)

---

### Day 51 — Greedy: Fundamentals and Interval Problems

#### Learn
- What is a Greedy Algorithm?
- Greedy choice property: local optimum leads to global optimum
- When greedy works vs when it fails
- Classic greedy problems: activity selection, interval scheduling

#### Understand
- Greedy works when: making the locally best choice at each step leads to the global best answer
- Greedy fails when: local choices conflict with global optimality (→ use DP instead)
- Interval scheduling: sort by end time, always pick the interval that ends earliest

#### Implement (PHP)
- Activity selection (maximum non-overlapping intervals)
- Jump Game (can you reach the end?)

#### Practice
- 4–5 problems: jump game, meeting rooms, non-overlapping intervals, gas station

#### Pattern Recognition
> **Trigger:** "Maximize/minimize without considering all combinations," "Intervals," "Always pick the best current option"

---

### Day 52 — Greedy: More Patterns + Revision

#### Learn
- Fractional knapsack (greedy works)
- 0/1 Knapsack (greedy does NOT work — needs DP)
- Greedy on strings: largest number, reorganize string

#### Practice
- 4–5 problems: assign cookies, lemonade change, greedy string problems
- **Revision**: Solve 2 interval problems and 2 basic greedy problems from memory

---

## Phase 11 — Dynamic Programming (Day 53–57)

---

### Day 53 — Dynamic Programming: Fundamentals and 1D DP

#### Learn
- What is Dynamic Programming?
- Two properties required for DP: Optimal Substructure + Overlapping Subproblems
- Top-down DP (Memoization) vs Bottom-up DP (Tabulation)
- 1D DP: solving problems with a 1D table

#### Understand
- DP eliminates redundant computation of overlapping subproblems — two approaches:
  - **Top-down (Memoization):** Recursive function + cache to avoid recomputing results
  - **Bottom-up (Tabulation):** Iterative, fill a table from base cases upward — no recursion needed
- Two properties required for DP:
  - **Optimal Substructure:** Optimal solution contains optimal solutions to subproblems
  - **Overlapping Subproblems:** The same subproblem is solved multiple times in brute force
- Classic 1D DP: Fibonacci, Climbing Stairs, House Robber

#### Implement (PHP)
```php
// Climbing Stairs — Bottom-Up DP
function climbStairs(int $n): int {
    if ($n <= 2) return $n;
    $dp = array_fill(0, $n + 1, 0);
    $dp[1] = 1;
    $dp[2] = 2;
    for ($i = 3; $i <= $n; $i++) {
        $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
    }
    return $dp[$n];
}
```

#### Practice
- 4–5 problems: climbing stairs, house robber, min cost climbing stairs, decode ways

#### Pattern Recognition
> **Trigger:** "Find number of ways," "Maximum/minimum with choices," "Can this be broken into subproblems?"

---

### Day 54 — Dynamic Programming: Classic 1D Problems

#### Learn
- Coin Change (minimum coins)
- Longest Common Subsequence (preview)
- Word Break problem
- Perfect Squares

#### Practice
- 4–5 medium DP problems
- For each: define the state, write the recurrence, then implement

#### Focus
Always define `dp[i]` meaning before writing code. What does `dp[i]` represent?

---

### Day 55 — Dynamic Programming: 2D DP and Grid Problems

#### Learn
- 2D DP: the state depends on two variables
- Grid problems: unique paths, minimum path sum
- `dp[i][j]` = answer for subproblem involving row i and column j

#### Implement (PHP)
```php
// Unique Paths — 2D DP
function uniquePaths(int $m, int $n): int {
    $dp = array_fill(0, $m, array_fill(0, $n, 1));
    for ($i = 1; $i < $m; $i++) {
        for ($j = 1; $j < $n; $j++) {
            $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
        }
    }
    return $dp[$m - 1][$n - 1];
}
```

#### Practice
- 4–5 problems: unique paths, minimum path sum, triangle, maximal square

---

### Day 56 — Dynamic Programming: Knapsack Pattern

#### Learn
- 0/1 Knapsack: include or exclude each item
- Unbounded Knapsack: include an item multiple times
- Subset Sum problem (knapsack variant)

#### Understand
- 0/1 Knapsack: `dp[i][w] = max(dp[i-1][w], dp[i-1][w - weight[i]] + value[i])`
- The "include or exclude" choice is the foundation of many DP problems

#### Implement (PHP)
- 0/1 Knapsack from scratch
- Subset sum check

#### Practice
- 3–4 problems: partition equal subset sum, target sum, coin change 2

---

### Day 57 — Dynamic Programming: LIS + Revision

#### Learn
- Longest Increasing Subsequence (LIS): O(n²) DP approach
- LIS O(n log n) approach (concept level, binary search based)
- Longest Common Subsequence (LCS)

#### Practice
- 3–4 problems: LIS, number of LIS, LCS
- **Revision**: Solve 2 problems each from 1D DP, 2D DP, and Knapsack

---

## Phase 12 — Advanced Topics and Interview Simulation (Day 58–60)

---

### Day 58 — Trie and Bit Manipulation

#### Learn: Trie
- What is a Trie (Prefix Tree)?
- Why Trie: O(L) search/insert where L = word length
- Applications: autocomplete, spell check, prefix search

#### Implement (PHP)
```php
class TrieNode {
    public array $children = [];
    public bool $isEnd = false;
}

class Trie {
    private TrieNode $root;
    public function __construct() { $this->root = new TrieNode(); }

    public function insert(string $word): void {
        $node = $this->root;
        foreach (str_split($word) as $char) {
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }
        $node->isEnd = true;
    }

    public function search(string $word): bool {
        $node = $this->root;
        foreach (str_split($word) as $char) {
            if (!isset($node->children[$char])) return false;
            $node = $node->children[$char];
        }
        return $node->isEnd;
    }
}
```

#### Learn: Bit Manipulation
- AND, OR, XOR, NOT, left shift, right shift
- Common bit tricks: `n & (n-1)` removes lowest set bit, `n & (-n)` isolates lowest set bit
- XOR trick: `a ^ a = 0`, `a ^ 0 = a` → useful for finding single numbers

#### Practice
- 3–4 problems: implement Trie, single number (XOR), count bits, reverse bits

---

### Day 59 — Union Find (DSU) + Mixed Practice

#### Learn
- What is Union Find (Disjoint Set Union)?
- Operations: find (with path compression), union (with rank)
- Applications: connected components, cycle detection, network connectivity

#### Implement (PHP)
```php
class UnionFind {
    private array $parent;
    private array $rank;

    public function __construct(int $n) {
        $this->parent = range(0, $n - 1);
        $this->rank = array_fill(0, $n, 0);
    }

    public function find(int $x): int {
        if ($this->parent[$x] !== $x) {
            $this->parent[$x] = $this->find($this->parent[$x]); // Path compression
        }
        return $this->parent[$x];
    }

    public function union(int $x, int $y): bool {
        $px = $this->find($x);
        $py = $this->find($y);
        if ($px === $py) return false; // Already connected
        if ($this->rank[$px] < $this->rank[$py]) [$px, $py] = [$py, $px];
        $this->parent[$py] = $px;
        if ($this->rank[$px] === $this->rank[$py]) $this->rank[$px]++;
        return true;
    }
}
```

#### Practice
- 3–4 problems: number of provinces (DSU), redundant connection, accounts merge

#### Mixed Practice
- 3–4 mixed problems from any phase — simulate interview conditions

---

### Day 60 — Final Mock Interview Simulation

#### Goal
Test everything you have learned under realistic interview conditions.

#### Rules for Today
- No notes. No looking at solutions.
- Use time limits: Easy = 20 min, Medium = 40 min
- Attempt each problem independently

#### Problem Set (Timed)
Attempt 4–6 problems covering:
- 1 Array/String problem (Medium)
- 1 HashMap/Sliding Window problem (Medium)
- 1 Tree problem (Medium)
- 1 Graph problem (BFS or DFS, Medium)
- 1 DP problem (Easy-Medium)
- 1 problem of your choice from any topic

#### Post-Simulation Review
- For each problem: analyze your solution, compare with optimal, document what you missed
- Update LEARNING_TRACKER.md with final stats
- Write a final reflection in your Day 60 README

#### Final Reflection Questions
1. Which topic felt strongest? Why?
2. Which topic still needs more practice?
3. What was the most important pattern I learned?
4. What would I do differently if I started again?
5. What is my next step after this challenge?

---

## 📌 Problem Count Strategy Summary

| Day Type | Easy | Medium | Hard | Total |
|----------|------|--------|------|-------|
| Foundation days | 3–5 | 0 | 0 | 3–5 |
| Pattern-learning days | 2–3 | 1 | 0 | 3–4 |
| Advanced days | 1 | 2 | 0 | 2–3 |
| Revision days | 3–4 | 1–2 | 0 | 4–6 |
| Mock days | 2 | 3–4 | 0–1 | 5–6 |

**Target:** 120–180 meaningful problem-solving attempts by Day 60.

**Priority:** Quality over quantity. Deep understanding of one problem beats shallow attempts at five.

---

## 🔁 Revision System Summary

| Timing | Action |
|--------|--------|
| Same day | Review all mistakes before ending the day |
| Next morning | 5-minute recall — what did I learn yesterday? |
| After 3–5 days | Revisit 1–2 important problems |
| Revision days | Solve 5–6 mixed problems without notes |
| End of challenge | Full mock interview simulation |

---

## 🛠️ Recommended Git Commit Examples

```bash
git commit -m "Day 01: Add algorithm and complexity fundamentals"
git commit -m "Day 08: Arrays — Two Pointers pattern and practice"
git commit -m "Day 16: Revision — Arrays and Strings phase complete"
git commit -m "Day 22: Binary Search implementation and variants"
git commit -m "Day 28: Recursion fundamentals and call stack understanding"
git commit -m "Day 35: Stack pattern — monotonic stack and daily temperatures"
git commit -m "Day 39: Binary Tree — DFS traversals implemented"
git commit -m "Day 47: Graphs — BFS and number of islands"
git commit -m "Day 53: Dynamic Programming — 1D DP and climbing stairs"
git commit -m "Day 60: Final mock simulation complete — challenge summary"
```

---

> *"A roadmap is only useful if you follow it consistently. Adjust the pace if needed — but never skip the fundamentals."*
