# Day 04 — PHP Refresher + Complexity in Built-in Functions

> **Date:** 2026-09-06
> **Phase:** Phase 1 — Foundations
> **Difficulty Level:** Beginner

> **Today's Focus (ROADMAP):** As a PHP developer, know the hidden cost of the tools you already use — `array_push`, `array_pop`, `array_shift`, `array_unshift`, `in_array`, `array_search`, and `sort`.

> **Learning Flow (RESOURCES.md):** GeeksforGeeks (theory) → Basic PHP implementation → Custom problems in `problems/`

---

## 1. 🎯 Learning Objective

- [ ] Understand how PHP arrays work internally (ordered hash map)
- [ ] Know the time complexity of: `array_push`, `array_pop`, `array_shift`, `array_unshift`, `in_array`, `array_search`, `sort`
- [ ] Understand why `in_array()` is O(n) but array key lookup is O(1)
- [ ] Understand why `array_shift()` is O(n) but `array_pop()` is O(1)
- [ ] Choose the right PHP data structure and built-in function for a given task
- [ ] Identify which built-in functions are expensive when used inside loops

---

## 2. 📚 Theory

> **References:**
> - [GeeksforGeeks — Analysis of Algorithms (Asymptotic Analysis)](https://www.geeksforgeeks.org/analysis-of-algorithms-set-1-asymptotic-analysis/)
> - [PHP Manual — Arrays](https://www.php.net/manual/en/language.types.array.php)

### What is this?

PHP arrays are **ordered hash maps** — not plain lists. They support O(1) key lookup but O(n) value search. Every built-in function you call (`in_array`, `array_shift`, `sort`) has a hidden time and space cost that affects how your code scales.

### Why do we need to know this?

As a PHP/Laravel developer, you already use these functions daily. Without knowing their complexity, you can accidentally write O(n²) code that looks clean — for example, `in_array()` inside a loop, or `array_shift()` used as a queue on a large array.

### When should you think about built-in complexity?

- When checking if a value exists **more than once** → build a map, don't repeat `in_array()`
- When implementing a **stack** → use `array_push` + `array_pop`
- When implementing a **queue** on large data → use `SplQueue`, not `array_shift()`
- When you need **sorted order** → call `sort()` once (O(n log n)), not inside a loop
- When reviewing code in code review or interviews → name the expensive built-in

### What Makes PHP Arrays Special?

In many languages, an "array" is a contiguous list of values with integer indices. In PHP, an **array is an ordered hash map** — it can behave like:
- A **list** (integer keys: `0, 1, 2, ...`)
- An **associative map** (string or integer keys: `'name' => 'Alice'`)
- Or both at the same time

Because of this internal design:
- **Key lookup** (`$arr[$key]`, `isset($map[$key])`) → **O(1)** average
- **Value search** (`in_array()`, `array_search()`) → **O(n)** — must scan values

> **Key insight:** PHP gives you HashMap-like speed for keys, but not for searching values.

---

### PHP Array Function Complexity Cheat Sheet

| Function | Time Complexity | Why |
|----------|----------------|-----|
| `$arr[$key]` / `isset($arr[$key])` | O(1) avg | Hash-based key lookup |
| `array_push($arr, $val)` | O(1) amortized | Append at end |
| `array_pop($arr)` | O(1) | Remove from end — no re-indexing |
| `array_shift($arr)` | O(n) | Remove from front — **all remaining elements re-index** |
| `array_unshift($arr, $val)` | O(n) | Insert at front — **all elements shift right** |
| `in_array($val, $arr)` | O(n) | Linear scan through all values |
| `array_search($val, $arr)` | O(n) | Linear scan — returns key if found |
| `array_key_exists($key, $arr)` | O(1) avg | Hash-based key check |
| `count($arr)` | O(1) | PHP stores element count internally |
| `sort($arr)` | O(n log n) | Comparison-based sort |
| `array_merge($a, $b)` | O(n + m) | Creates new array with all elements |
| `array_slice($arr, $start, $len)` | O(n) | May copy elements |
| `array_values($arr)` | O(n) | Re-indexes all values |
| `array_flip($arr)` | O(n) | Swaps keys and values — one pass |

### Space Complexity of Common Built-ins

| Function | Auxiliary Space | Why |
|----------|----------------|-----|
| `in_array()` / `array_search()` | O(1) | No extra structures — scans in place |
| `isset($map[$key])` | O(1) per check | Map must exist already |
| Building lookup map | O(n) | Stores up to n keys |
| `array_pop()` / `array_push()` | O(1) | Modifies array in place |
| `array_shift()` / `array_unshift()` | O(1) aux | Re-indexing is in-place work, not extra memory |
| `sort($arr)` | O(log n) typical | Internal sort stack/recursion space |
| `array_merge($a, $b)` | O(n + m) | **Creates a new array** — copies all elements |

> **Key rule:** Functions that **create a new array** (`array_merge`, `array_slice`, building a map) add O(n) space. Functions that **scan or modify in place** usually use O(1) extra space.

---

### Advantages of PHP's Array Model

- O(1) key lookup out of the box — no separate HashMap class needed
- Flexible: works as list, map, or both
- Rich built-in functions — less boilerplate for common tasks
- `count()` is O(1) — size is tracked internally

### Limitations / Disadvantages

- Value search (`in_array`) is always O(n) — easy to misuse in loops
- `array_shift` / `array_unshift` are O(n) — misleading if you treat PHP arrays as true queues
- `sort()` is O(n log n) — expensive if called repeatedly inside loops
- Copy-on-write can hide space costs until you modify a copied array

---

### Why `in_array()` is O(n) but Key Lookup is O(1)

```php
$users = ['alice', 'bob', 'charlie', 'dave'];

// O(n) — scans every value until match found
in_array('charlie', $users);

// O(1) avg — direct hash lookup by key
$map = ['alice' => true, 'bob' => true, 'charlie' => true];
isset($map['charlie']);
```

**Why the difference?**
- `in_array()` does not know where a value lives — it must check each element one by one
- `isset($map[$key])` uses the hash of the key to jump directly to the right bucket

> **Rule:** If you need fast existence checks, **convert values to keys** first.

```php
// Build a lookup map once — O(n)
$lookup = array_flip($users);  // ['alice'=>0, 'bob'=>1, 'charlie'=>2, ...]

// Then each check is O(1)
isset($lookup['charlie']);  // true
```

**Trade-off:** O(n) one-time setup + O(1) per lookup vs O(n) per lookup with `in_array()`.

---

### Why `array_shift()` is O(n) but `array_pop()` is O(1)

PHP lists use integer keys starting at 0. When you remove from the **front**:

```php
$arr = [10, 20, 30, 40];
array_shift($arr);  // removes 10
// PHP must re-index: [20, 30, 40] → keys become [0, 1, 2]
// Every remaining element moves — O(n) work
```

When you remove from the **back**:

```php
$arr = [10, 20, 30, 40];
array_pop($arr);  // removes 40
// No re-indexing needed — O(1) work
```

| Operation | End Used | Complexity | Use As |
|-----------|----------|------------|--------|
| `array_push` / `array_pop` | Back | O(1) | **Stack** (LIFO) |
| `array_unshift` / `array_shift` | Front | O(n) | **Queue** (avoid for large arrays!) |

> **For queues in PHP:** Use `SplQueue` instead of `array_shift()` on large arrays — it is designed for O(1) enqueue/dequeue.

---

### `sort()` and Other O(n log n) Operations

```php
$arr = [5, 2, 8, 1, 9];
sort($arr);  // O(n log n) — modifies array in place
// Result: [1, 2, 5, 8, 9]
```

PHP's `sort()`, `rsort()`, `asort()`, and `usort()` all use efficient comparison-based sorting — typically **O(n log n)**.

| Sort Function | Sorts By | Preserves Keys? |
|---------------|----------|-----------------|
| `sort()` | Values ascending | No — re-indexes |
| `rsort()` | Values descending | No |
| `asort()` | Values ascending | Yes |
| `ksort()` | Keys ascending | Yes |
| `usort()` | Custom comparator | No |

---

### Choosing the Right PHP Data Structure

| Need | Wrong Choice | Right Choice | Why |
|------|-------------|--------------|-----|
| Fast "does value exist?" | `in_array()` in a loop | `isset($map[$val])` after `array_flip()` | O(1) vs O(n) per check |
| Stack (LIFO) | `array_shift()` | `array_push()` + `array_pop()` | O(1) vs O(n) |
| Queue (FIFO) | `array_shift()` on large array | `SplQueue` | O(1) dequeue |
| Frequency count | Nested loops | Associative array as counter | O(n) vs O(n²) |
| Sorted data + fast search | Unsorted array + `in_array()` | Sort once + binary search | O(n) vs O(log n) per search |

---

## 3. 🧩 Core Concepts

1. **PHP arrays are ordered hash maps** — O(1) key access, O(n) value search.
2. **`in_array()` / `array_search()`** — always O(n). Use a key-based lookup map when you need repeated existence checks.
3. **`array_pop()` / `array_push()`** — O(1). Safe for stack operations.
4. **`array_shift()` / `array_unshift()`** — O(n). Avoid on large arrays; use `SplQueue` for queues.
5. **`sort()`** — O(n log n). Sort once if you need repeated searches; then use binary search (Day 22).
6. **Trade-off pattern** — spend O(n) once to build a lookup map, then get O(1) per query.

---

## 4. 🧠 Mental Model / Intuition

**Hash Map Analogy — Library Catalog:**
- Finding a book by **call number** (key) → instant — O(1)
- Finding a book by **title** (value) without a catalog → walk every shelf — O(n)
- Building an index (title → location) once → then every title lookup is O(1)

**Stack vs Queue Analogy — Cafeteria Trays:**
- **Stack (push/pop at back):** Add/remove from the top of a pile — fast, no shifting
- **Queue with `array_shift()`:** Everyone in line moves forward one step when the front person leaves — slow for large lines (O(n))

**Key Insight:**
> As a PHP developer, you already use these functions daily. Knowing their hidden cost helps you write code that scales — without changing languages or frameworks.

---

## 5. 🔄 Dry Run

### Example 1: `in_array()` vs Key Lookup

```
Input: $users = ['alice', 'bob', 'charlie']
       Check if 'charlie' exists — 3 times
```

**Approach A — `in_array()` each time (O(n) per check):**

| Check # | Scan Steps | Total Comparisons |
|---------|-----------|-------------------|
| 1 | alice → bob → charlie ✓ | 3 |
| 2 | alice → bob → charlie ✓ | 3 |
| 3 | alice → bob → charlie ✓ | 3 |
| **Total** | | **9 comparisons** |

**Approach B — Build map once, then `isset()` (O(n) setup + O(1) per check):**

```
Step 1: array_flip → ['alice'=>0, 'bob'=>1, 'charlie'=>2]  — 3 ops (one-time)
Step 2: isset($map['charlie']) → 1 hash lookup             — 1 op
Step 3: isset($map['charlie']) → 1 hash lookup             — 1 op
Step 4: isset($map['charlie']) → 1 hash lookup             — 1 op
Total: 3 + 1 + 1 + 1 = 6 ops  ← wins as checks increase
```

> For 3 checks, savings are small. For 1000 checks on 10,000 items, the map approach is dramatically faster.

---

### Example 2: `array_shift()` Re-indexing

```
Input: $arr = [10, 20, 30, 40]
Action: array_shift($arr)
```

| Step | Array State | Keys | Work Done |
|------|-------------|------|-----------|
| Before | [10, 20, 30, 40] | [0, 1, 2, 3] | — |
| Remove index 0 | [20, 30, 40] | needs re-index | 1 removal |
| Re-index | [20, 30, 40] | [0, 1, 2] | 3 elements shifted |

**Elements moved: 3 out of 4 → O(n) in general.**

Compare with `array_pop()`:

| Step | Array State | Work Done |
|------|-------------|-----------|
| Before | [10, 20, 30, 40] | — |
| Remove last | [10, 20, 30] | 1 removal, no re-index |

**Elements moved: 0 → O(1).**

---

## 6. 💻 Basic Implementation

```php
<?php

/**
 * Day 04 — PHP Built-in Function Complexity
 * Demonstrating O(1) key lookup vs O(n) value search,
 * and O(1) pop vs O(n) shift
 */

// ─────────────────────────────────────────────────────
// O(n) — in_array() linear scan
// ─────────────────────────────────────────────────────

/**
 * Check existence using in_array — O(n) per call.
 * PHP must scan every value until a match is found.
 */
function existsWithInArray(array $arr, mixed $target): bool
{
    return in_array($target, $arr);  // O(n)
}

// ─────────────────────────────────────────────────────
// O(1) avg — key lookup via isset()
// ─────────────────────────────────────────────────────

/**
 * Build a lookup map from values — O(n) one-time cost.
 * After this, isset($map[$target]) is O(1) average.
 */
function buildLookupMap(array $values): array
{
    $map = [];
    foreach ($values as $val) {
        $map[$val] = true;  // value becomes key
    }
    return $map;
}

function existsWithMap(array $map, mixed $target): bool
{
    return isset($map[$target]);  // O(1) avg
}

// ─────────────────────────────────────────────────────
// O(1) — Stack using push/pop (back of array)
// ─────────────────────────────────────────────────────

function stackDemo(): void
{
    $stack = [];
    array_push($stack, 10, 20, 30);  // O(1) each
    echo array_pop($stack) . PHP_EOL;  // 30 — O(1)
    echo array_pop($stack) . PHP_EOL;  // 20 — O(1)
}

// ─────────────────────────────────────────────────────
// O(n) — array_shift re-indexes all remaining elements
// ─────────────────────────────────────────────────────

function shiftDemo(): void
{
    $arr = [10, 20, 30, 40];
    echo "Before shift: " . json_encode($arr) . PHP_EOL;
    array_shift($arr);  // O(n) — removes 10, re-indexes [20,30,40]
    echo "After shift : " . json_encode($arr) . PHP_EOL;
}

// ─────────────────────────────────────────────────────
// O(n log n) — sort
// ─────────────────────────────────────────────────────

function sortDemo(): void
{
    $arr = [5, 2, 8, 1, 9];
    sort($arr);  // O(n log n)
    echo "Sorted: " . json_encode($arr) . PHP_EOL;
}

// ─────────────────────────────────────────────────────
// Demonstration
// ─────────────────────────────────────────────────────

$users = ['alice', 'bob', 'charlie', 'dave'];

echo "=== Day 04: PHP Built-in Complexity ===" . PHP_EOL;
echo PHP_EOL;

echo "in_array (O(n))  : " . (existsWithInArray($users, 'charlie') ? 'found' : 'not found') . PHP_EOL;

$lookup = buildLookupMap($users);
echo "isset map (O(1)): " . (existsWithMap($lookup, 'charlie') ? 'found' : 'not found') . PHP_EOL;
echo PHP_EOL;

echo "--- Stack (push/pop = O(1)) ---" . PHP_EOL;
stackDemo();
echo PHP_EOL;

echo "--- Shift (O(n) re-index) ---" . PHP_EOL;
shiftDemo();
echo PHP_EOL;

echo "--- Sort (O(n log n)) ---" . PHP_EOL;
sortDemo();
```

### What this implementation shows:
- `in_array()` scans linearly — fine for small arrays, expensive at scale
- Converting values to keys gives O(1) lookups after O(n) setup
- `array_pop()` is safe for stack; `array_shift()` triggers O(n) re-indexing
- `sort()` is O(n log n) — use deliberately, not inside tight loops

**ROADMAP core snippet:**

```php
// O(n) — scans values linearly
in_array($target, $arr);

// O(1) avg — hash-based key lookup (after building $map)
isset($map[$target]);
```

---

## 7. 🧩 Patterns Learned

| Pattern | Time | When to Use |
|---------|------|-------------|
| Key lookup (`isset($map[$key])`) | O(1) avg | Repeated existence checks by value (after building map) |
| Value scan (`in_array()`) | O(n) | One-off check on small array |
| Stack (push + pop) | O(1) per op | LIFO — undo, nesting, DFS |
| Queue via array_shift | O(n) per op | **Avoid** — use `SplQueue` instead |
| Sort once + search | O(n log n) + O(log n) | Need sorted data for binary search |
| Frequency map | O(n) build, O(1) update | Count occurrences with `$map[$val]++` |

---

### 🔎 Quick Decision Guide

| Question | Answer |
|----------|--------|
| Do I need to find a value repeatedly? | Build a key map first |
| Do I need a stack? | `array_push` + `array_pop` |
| Do I need a queue? | `SplQueue`, not `array_shift` |
| Do I need sorted order? | `sort()` once — O(n log n) |
| Is my array small (< 20 items)? | `in_array()` is fine — constants matter less |

---

## 8. 📝 Practice Problems

> **ROADMAP goal:** 3–4 easy problems using PHP arrays — focus on choosing the right approach and identifying expensive built-ins.
> Attempt independently first (15–20 min each per `RULES.md`). Fill in the `My Approach` section in each file.

| # | File | Topic | Goal |
|---|------|-------|------|
| 1 | [`problem-01-in-array-vs-map-lookup.php`](problems/problem-01-in-array-vs-map-lookup.php) | `in_array()` vs `isset()` map | Compare O(n×m) vs O(n+m) for multiple checks |
| 2 | [`problem-02-stack-push-pop.php`](problems/problem-02-stack-push-pop.php) | `push/pop` vs `array_shift` | See O(n) stack vs O(n²) shift-in-loop |
| 3 | [`problem-03-sort-and-find-duplicate.php`](problems/problem-03-sort-and-find-duplicate.php) | `sort()` cost | Understand O(n log n) sort vs O(n) map |
| 4 | [`problem-04-identify-expensive-builtins.php`](problems/problem-04-identify-expensive-builtins.php) | Spot expensive built-ins | Identify O(n²) patterns in real PHP code |

**Run a problem:**

```bash
php Day-04-PHP-Built-in-Complexity/problems/problem-01-in-array-vs-map-lookup.php
```

---

## 9. 🔢 Problems Solved

| # | Problem | Platform | Difficulty | Pattern Used | Status | Time | Space |
|---|---------|----------|------------|--------------|--------|------|-------|
| 1 | in_array() vs Map Lookup | Custom | Easy | Key lookup map | | O(n+m) | O(n) |
| 2 | Stack push/pop vs shift | Custom | Easy | Stack with push/pop | | O(n) / O(n²) | O(n) / O(1) |
| 3 | sort() + Find Duplicate | Custom | Easy | sort + scan / isset map | | O(n log n) / O(n) | O(1) / O(n) |
| 4 | Identify Expensive Built-ins | Custom | Easy | Complexity analysis | | O(n²) vs O(n) | O(1) vs O(n) |

> **Status Key:**
> - ✅ Solved Independently
> - 💡 Solved After Hint
> - 📖 Studied Solution
> - 🔄 Revisit Required

---

## 10. ❌ Mistakes and Learnings

### What confused me today:

>

### What became clearer today:

>

---

## 11. 📝 Revision Notes

- 📌 PHP arrays = ordered hash maps — O(1) key access, O(n) value search
- 📌 `in_array()` / `array_search()` → O(n) — linear scan
- 📌 `isset($map[$key])` / `$arr[$key]` → O(1) avg — hash lookup
- 📌 `array_push()` / `array_pop()` → O(1) — use for stack
- 📌 `array_search()` → O(n) — same as `in_array()`, but returns key
- 📌 `array_unshift()` → O(n) — same re-index cost as `array_shift()`
- 📌 `sort()` → O(n log n)
- 📌 `count()` → O(1) — PHP tracks size internally
- 📌 For repeated value lookups: build map once O(n), then O(1) per check
- 📌 For queues: use `SplQueue`, not `array_shift()` on large arrays
- 📌 Small arrays (< 20): built-in functions are fine — optimize when scale demands it

### 5 Functions to Recall from Memory (ROADMAP Revision Task):

| Function | Time | Space (aux) |
|----------|------|-------------|
| `isset($arr[$key])` | O(1) | O(1) |
| `in_array($val, $arr)` | O(n) | O(1) |
| `array_pop($arr)` | O(1) | O(1) |
| `array_shift($arr)` | O(n) | O(1) |
| `sort($arr)` | O(n log n) | O(log n) |

---

## 12. 📋 Day Summary

| Metric | Value |
|--------|-------|
| Problems Attempted | 0 / 4 |
| Solved Independently | 0 |
| Solved After Hint | 0 |
| Studied from Solution | 0 |
| New Patterns Learned | 0 |
| Time Spent (approx.) | — |

**Key Learning of the Day:**
>

**Confidence Level:** 🔴 Low / 🟡 Medium / 🟢 High

**Revision Needed:** Yes / No

**Tomorrow's Topic Preview:** Day 05 — Complexity Pattern Recognition

---

> *"The functions you use every day have hidden costs. Knowing them turns everyday PHP into deliberate engineering."*
