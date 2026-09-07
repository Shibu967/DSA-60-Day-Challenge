# Day 05 — Complexity Pattern Recognition

> **Phase 1 | Day 5 of 60**
> **Topic:** Code देखकर जल्दी Time & Space Complexity identify करना
> **Status:** ✅ Theory Complete | ✅ Problems 1–4 | ✅ P5 Brute | ✅ P5 Optimized | ✅ P6 | ✅ P7

---

## 🎯 Day 5 Goal

Code देखकर तुरंत identify करना:

- O(n) — Single Loop
- O(n²) — Nested Loop
- O(log n) — Halving Pattern
- O(n log n) — Sorting
- O(1) Auxiliary Space — In-place
- O(n) Space — Extra array/map
- `in_array()` का hidden O(n) impact
- HashMap से O(n²) → O(n) optimization
- Nested loop **vs** Separate loops (common confusion)

---

## ✅ PART 1 — Theory & Concepts

---

### 1. Single Loop → O(n)

```php
for ($i = 0; $i < $n; $i++) {
    echo $i;
}
```

| | Complexity |
|---|---|
| **Time** | O(n) |
| **Space** | O(1) |

> Loop n बार चलता है → n operations → **O(n)**

---

### 2. Two Separate Loops → O(n), NOT O(n²) ⚠️

```php
for ($i = 0; $i < $n; $i++) {
    echo $i;
}

for ($j = 0; $j < $n; $j++) {
    echo $j;
}
```

```
O(n) + O(n) = O(2n) = O(n)
```

| | Complexity |
|---|---|
| **Time** | O(n) |
| **Space** | O(1) |

> **Important Learning:** Loop की संख्या नहीं, nested relationship complexity decide करती है।
> दो separate loops = O(n), nested loops = O(n²)

---

### 3. Nested Loop → O(n²)

```php
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        echo $i . " " . $j;
    }
}
```

| | Complexity |
|---|---|
| **Time** | O(n²) |
| **Space** | O(1) |

> बाहरी loop n बार → अंदर का loop हर बार n बार → **n × n = n²**

---

### 4. Halving Pattern → O(log n)

```php
$i = $n;

while ($i > 1) {
    $i = intdiv($i, 2);
}
```

```
n → n/2 → n/4 → n/8 → ... → 1
```

| | Complexity |
|---|---|
| **Time** | O(log n) |
| **Space** | O(1) |

> हर iteration में input आधा होता है → log₂(n) steps → **O(log n)**

---

### 5. Function Called n Times (Inner Loop) → O(n²)

```php
function processArray($arr) {
    foreach ($arr as $value) {   // O(n)
        echo $value;
    }
}

for ($i = 0; $i < $n; $i++) {
    processArray($arr);          // n बार call
}
```

```
Outer loop = n
Function inside = n
Total = n × n = n²
```

| | Complexity |
|---|---|
| **Time** | O(n²) |
| **Space** | O(1) |

---

### 6. In-place Modification → Auxiliary Space O(1)

```php
// Running Sum — in-place
for ($i = 1; $i < count($nums); $i++) {
    $nums[$i] += $nums[$i - 1];
}
```

| | Complexity |
|---|---|
| **Time** | O(n) |
| **Auxiliary Space** | O(1) ← नया array नहीं बनाया |

> **Auxiliary Space** = Extra memory जो algorithm खुद use करे (input को count नहीं करते)

---

### 7. `in_array()` Trap → Hidden O(n) ⚠️

```php
foreach ($nums1 as $num) {           // O(n)
    if (!in_array($num, $nums2)) {   // O(n) per call ← TRAP!
        $result[] = $num;
    }
}
```

```
O(n) × O(n) = O(n²)
```

> `in_array()` पूरा array linearly scan करता है → worst case O(n)
> इसे loop के अंदर use करना = **hidden O(n²)**

---

### 8. HashMap / Associative Array Optimization

```php
// पहले set बनाओ — O(n)
$set = [];
foreach ($nums2 as $num) {
    $set[$num] = true;
}

// अब lookup — Average O(1)
if (isset($set[$num])) {
    // found!
}
```

```
Build: O(n)
Lookup: O(1) average
Total: O(n + n) = O(n)
```

> **Result:** `O(n²)` → `O(n)` 🎯
> **Interview Note:** HashMap lookup को average **O(1)** माना जाता है।

---

### 9. Sorting Pattern → O(n log n)

```php
sort($nums);
// smallest → $nums[0]
// largest  → $nums[n-1]
```

| | Complexity |
|---|---|
| **Time** | O(n log n) |
| **Auxiliary Space** | O(1) in-place sorting |

> Sorting के बाद smallest/largest values index [0] और [n-1] पर मिल जाती हैं।

---

## 🧩 Pattern Recognition Cheat Sheet

```
Code देखो → Structure पहचानो:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
  Single loop                → O(n)
  Two separate loops         → O(n)   ← n² नहीं!
  Nested loop (same input)   → O(n²)
  Loop halving each time     → O(log n)
  Function called n times
    + inner loop             → O(n²)
  sort()                     → O(n log n)
  in_array() inside loop     → O(n²)   ← TRAP!
  HashMap lookup             → O(1) avg
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
```

---

## ✅ PART 2 — Problems

| # | Problem | Difficulty | Time | Space | Status |
|---|---------|-----------|------|-------|--------|
| P1 | Running Sum of 1d Array | 🟢 Easy | O(n) | O(1) | ✅ |
| P2 | Find the Difference of Two Arrays | 🟢 Easy | O(n+m) | O(n+m) | ✅ |
| P3 | Count Items Matching a Rule | 🟢 Easy | O(n) | O(1) | ✅ |
| P4 | Maximum Product Difference | 🟢 Easy | O(n log n) | O(1) | ✅ |
| P5 | How Many Numbers Are Smaller | 🟢 Easy | O(n) optimal | O(n) | ✅ |
| P6 | Contains Duplicate | 🟢 Easy | O(n) optimal | O(n) | ✅ |
| P7 | Two Sum | 🟢 Easy | O(n) optimal | O(n) | ✅ |

---

### Problem 1 — Running Sum of 1d Array
**Link:** https://leetcode.com/problems/running-sum-of-1d-array/

**Key Concept:** Single loop + in-place modification = O(n) time, O(1) auxiliary space

```
Input:  [1, 2, 3, 4]
Output: [1, 3, 6, 10]
Logic:  nums[i] += nums[i-1]
```

---

### Problem 2 — Find the Difference of Two Arrays
**Link:** https://leetcode.com/problems/find-the-difference-of-two-arrays/

**Key Concept:** `in_array()` trap → HashMap से O(n²) को O(n) करो

```
nums1 = [1,2,3], nums2 = [3,5,7]
Answer: [[1,2], [5,7]]
Brute:  O(n × m) — in_array() inside loop
Optimal: O(n + m) — HashMap/Set use करो
```

---

### Problem 3 — Count Items Matching a Rule
**Link:** https://leetcode.com/problems/count-items-matching-a-rule/

**Key Concept:** Single pass, specific index check

```
ruleKey decides which index (0,1,2)
Single loop → O(n), O(1) space
```

---

### Problem 4 — Maximum Product Difference
**Link:** https://leetcode.com/problems/maximum-product-difference-between-two-pairs/

**Key Concept:** Sorting → smallest and largest at known indices

```
Sort → (last × second_last) - (first × second)
Time: O(n log n) due to sort
Space: O(1) auxiliary
```

---

### Problem 5 — How Many Numbers Are Smaller Than Current
**Link:** https://leetcode.com/problems/how-many-numbers-are-smaller-than-the-current-number/

**Key Concept:** Brute O(n²) → Sort + Prefix Count O(n)

```
Input:  [8, 1, 2, 2, 3]
Output: [4, 0, 1, 1, 3]

Brute:  Nested loop → O(n²)
Optimal: Sort → count frequency → prefix sum → O(n)
```

---

### Problem 6 — Contains Duplicate
**Link:** https://leetcode.com/problems/contains-duplicate/

**Key Concept:** Brute O(n²) → HashMap O(n)

```
Input:  [1, 2, 3, 1] → true
Input:  [1, 2, 3, 4] → false

Brute:  Check all pairs → O(n²)
Optimal: Store in HashMap, check if exists → O(n)
```

---

### Problem 7 — Two Sum
**Link:** https://leetcode.com/problems/two-sum/

**Key Concept:** Classic Brute O(n²) → HashMap O(n)

```
nums = [2, 7, 11, 15], target = 9
Output: [0, 1]  (2 + 7 = 9)

Brute:  Nested loop → O(n²)
Optimal: complement = target - current
         Check HashMap for complement → O(n)
```

---

## 📊 Day 5 Status

| Section | Status |
|---------|--------|
| Single Loop O(n) | ✅ |
| Separate Loops O(n) | ✅ |
| Nested Loop O(n²) | ✅ |
| Halving O(log n) | ✅ |
| Function × n Calls | ✅ |
| In-place Space O(1) | ✅ |
| `in_array()` complexity | ✅ |
| HashMap concept | ✅ |
| Sorting O(n log n) | ✅ |
| Problem 1 — Running Sum | ✅ |
| Problem 2 — Find Difference | ✅ |
| Problem 3 — Count Items | ✅ |
| Problem 4 — Max Product Diff | ✅ |
| Problem 5 — Brute Force | ✅ |
| Problem 5 — Optimized | ✅ |
| Problem 6 — Contains Duplicate | ✅ |
| Problem 7 — Two Sum | ✅ |

---

## 🔑 Key Takeaways

1. **Two separate loops ≠ O(n²)** — यह सबसे common confusion है
2. **`in_array()` inside a loop = hidden O(n²)** — PHP developers का common trap
3. **HashMap = O(1) lookup** — Search-heavy problems को O(n) में solve करने का weapon
4. **Sort first** — अगर min/max चाहिए और O(n log n) acceptable है
5. **Auxiliary space ≠ Total space** — Input को count नहीं करते

---

> *"Pattern recognition speed ही interview mein fark dalti hai."*
