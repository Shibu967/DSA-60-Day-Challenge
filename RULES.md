# 📜 RULES.md — DSA 60-Day Challenge Learning Rulebook

> These rules exist to ensure genuine learning — not the illusion of progress.
> Every rule here has a reason. Read the reason. Follow the rule.

---

## 🧠 Section 1 — Theory Rules

Before solving any problem on a new topic, you **must** complete all theory steps.

### Rule T1 — Understand What It Is
Before touching code, answer in plain English:
- What is this data structure or algorithm?
- What problem does it solve?

### Rule T2 — Understand Why It Exists
- Why was this invented?
- What was the limitation of the previous approach?

### Rule T3 — Understand Where It Is Used
- In what real-world situations is this used?
- What type of problem should trigger this in your mind?

### Rule T4 — Understand Advantages and Limitations
- What does this do well?
- Where does it fail or become inefficient?

### Rule T5 — Understand Basic Operations
- What are the fundamental operations? (Insert, Delete, Search, Traverse, etc.)
- What happens step-by-step during each operation?

### Rule T6 — Understand Time Complexity
Before any implementation:
- State the time complexity of each operation
- Understand **why** that complexity exists, not just what it is

### Rule T7 — Understand Space Complexity
- How much memory does this use?
- Is there auxiliary space required?

### Rule T8 — Perform at Least One Dry Run
- Pick a small, simple example
- Trace through the algorithm step by step — on paper, in comments, or in your daily README
- Never skip this. The dry run reveals understanding gaps before they become bugs.

---

## 💻 Section 2 — Coding Rules

### Rule C1 — Attempt Independently First
- No matter how unfamiliar the problem feels, spend genuine time thinking
- Write even a wrong approach — wrong attempts reveal your thinking gaps

### Rule C2 — Always Start with Brute Force
- Write the simplest possible solution first, even if it is O(n²) or worse
- A working brute force is better than a half-written optimal solution

### Rule C3 — Analyze Before Optimizing
- After brute force works, analyze its complexity
- Ask: "What is doing repeated work?" or "What can be precomputed?"

### Rule C4 — Think Before You Code
Before writing a single line:
- Identify the input and output
- Write 1–2 examples manually
- Think about edge cases
- Sketch the algorithm in plain English or pseudocode

### Rule C5 — Name Files Clearly
- All PHP solution files use `lowercase-kebab-case.php`
- Examples: `two-sum.php`, `binary-search.php`, `valid-anagram.php`

### Rule C6 — Comment Your Logic
- Every non-obvious block of code must have a comment explaining the reasoning
- Do not write code that you yourself cannot explain line by line

### Rule C7 — Test Manually Before Submitting
- Run through at least 2 test cases: a normal case and an edge case
- Edge cases: empty input, single element, all same values, negative numbers, very large input

---

## 🔢 Section 3 — Problem-Solving Rules

For every problem you attempt, follow this sequence:

| Step | Action |
|------|--------|
| 1 | Read the problem carefully — twice |
| 2 | Identify input and output clearly |
| 3 | Read and understand the constraints |
| 4 | Write 2–3 examples manually |
| 5 | Identify edge cases |
| 6 | Design a brute-force approach |
| 7 | Analyze brute-force time and space complexity |
| 8 | Think about optimization |
| 9 | Identify the DSA pattern (Two Pointers? Sliding Window? BFS?) |
| 10 | Write pseudocode if needed |
| 11 | Implement in PHP |
| 12 | Test manually with examples |
| 13 | Analyze final time complexity |
| 14 | Analyze final space complexity |
| 15 | Document mistakes and learnings |

---

## ⏱️ Section 4 — Time Limit Rules

These are **learning guidelines**, not failure conditions. They exist to prevent you from spending 3 hours on one Easy problem.

| Difficulty | Suggested Time |
|------------|---------------|
| Easy | 15–20 minutes |
| Medium | 25–40 minutes |
| Hard | 45–60 minutes |

**If you exceed the time limit:**
- Do not immediately look at the full solution
- Follow the Hint Rule below

---

## 💡 Section 5 — The Hint Rule

This is the most important rule for genuine learning.

```
Step 1: Spend genuine thinking time (see time limits above)
Step 2: If stuck, look for ONE small hint only (not the full solution)
Step 3: Try again with that hint
Step 4: If still stuck, look for another hint or read the approach section only
Step 5: Try to implement based on the approach you understood
Step 6: Only as a last resort, study the complete solution
Step 7: MANDATORY — Close the solution. Implement it again from memory and understanding.
Step 8: Document what you learned and why you were stuck
```

> **Why this rule exists:** Reading a solution and understanding a solution are different things. You must be able to reproduce the logic independently. If you cannot, you have not learned it — you have only seen it.

---

## 📝 Section 6 — Documentation Rules

### Rule D1 — Daily README is mandatory
- Every day must have a filled-in README using `DAILY_TEMPLATE.md`
- Do not skip documentation. It is part of the learning, not extra work.

### Rule D2 — Document mistakes honestly
- Write what confused you
- Write what you got wrong
- Write what the correct thinking was
- This section is the most valuable part of your notes

### Rule D3 — Use PROBLEM_TEMPLATE.md for important problems
Use the detailed problem template for:
- Any medium difficulty problem
- Any easy problem where you struggled
- Any problem that introduced a new pattern
- Any problem you found during revision that still confused you

### Rule D4 — Commit every day
- Every day of the challenge must have at least one meaningful commit
- "Meaningful" means real work: theory, code, problems, or documentation
- Do **not** create empty commits or push placeholder files

---

## 🔁 Section 7 — Revision Rules

| When | Action |
|------|--------|
| Same day | Review all mistakes before closing the day |
| Next morning | 5-minute recall — what did I learn yesterday? |
| After 3–5 days | Revisit 1–2 important problems from that period |
| Revision days | Solve mixed problems without looking at notes first |
| End of challenge | Mock interview simulation with timed problems |

### Spaced Repetition Schedule
- **Day 3**: Revisit Day 1 concepts
- **Day 7**: First weekly revision (Days 1–6)
- **Day 14**: Second weekly revision (Days 8–13)
- **Day 21**: Third weekly revision + Phase 1 & 2 recap
- **Day 28**: Revision of Phases 1–3
- **Day 35**: Midpoint revision
- **Day 45**: Revision before advanced topics
- **Day 55**: Full mock practice begins
- **Day 60**: Final interview simulation

---

## 🔢 Section 9 — Constraint Analysis Rule

Before writing a single line of code, read the constraints. This is mandatory.

### Rule CA1 — State n before choosing an algorithm

Ask yourself:
```
What is n?              → How large is the input?
What is the value range? → Are there negative numbers? Large values?
Is input sorted?         → Does order matter?
Are duplicates possible? → How does that affect correctness?
Is memory limited?       → Can I use O(n) extra space?
```

### Rule CA2 — Use n to guide your algorithm selection

| Input size n | What this tells you |
|-------------|---------------------|
| n ≤ 20 | Exponential or brute force may be acceptable |
| n ≤ 1,000 | O(n²) is likely acceptable |
| n ≤ 100,000 | Need O(n log n) or O(n) |
| n ≤ 1,000,000 | Must be O(n) or O(log n) |

> These are heuristics, not absolute rules. Always verify against the actual time limit.

### Rule CA3 — State your constraint reasoning out loud (or in comments)

Before coding:
> "n is up to 10⁵, so O(n²) will time out. I need O(n log n) or O(n). HashMap gives me O(1) lookup. I'll use that."

---

## 💬 Section 10 — Interview Communication Rule

DSA knowledge alone is not enough. You must communicate your thinking clearly.

### Rule IC1 — Always think out loud in interview practice

When solving a problem (even alone), practice saying:

```
"Let me first clarify the problem..."
"The brute-force approach would be..."
"The time complexity of this is... because..."
"The bottleneck is... because..."
"We can optimize this by..."
"The key observation is..."
"Let me trace through an example..."
"The final complexity is... time, ... space."
```

### Rule IC2 — Never jump to code without explaining the approach

In interviews, an interviewer who understands your thinking can help you. An interviewer watching silent typing cannot.

### Rule IC3 — Practice the brute-force → optimize conversation

Always present the brute force first, even if you know the optimal. This shows:
- You can verify correctness
- You understand why optimization is needed
- You are not memorizing solutions

### Rule IC4 — Handle clarifying questions gracefully

When an interviewer asks "Can you do better?" — do not panic. Say:
> "The current solution is O(n²). The bottleneck is the nested loop. If I use a HashMap, I can reduce lookups to O(1) and bring the overall complexity to O(n)."

---

## 🚫 Section 8 — Things You Must Never Do

| ❌ Never | ✅ Instead |
|----------|-----------|
| Copy-paste a solution without understanding | Study it, close it, rewrite from memory |
| Skip the dry run | Always trace at least one example |
| Skip complexity analysis | Always state Time and Space complexity |
| Move on after confusion | Document the confusion and find clarity |
| Push empty or placeholder commits | Only push real work |
| Skip revision days | Treat revision days as seriously as learning days |
| Memorize patterns without understanding | Always understand WHY the pattern works |

---

## ✅ Daily Checklist

Before ending each day, verify:

- [ ] Theory studied and understood (not just read)
- [ ] At least one dry run completed
- [ ] Basic implementation written in PHP
- [ ] **Constraints read and n-size noted before every problem** (Rule CA1)
- [ ] Problems attempted within time limits
- [ ] Complexity analyzed for each solution
- [ ] **Brute force explained before jumping to optimal** (Rule IC3)
- [ ] Mistakes and learnings documented
- [ ] Daily README filled in
- [ ] Next day's topic briefly previewed
- [ ] Committed and pushed to GitHub

---

> *"Discipline in learning creates freedom in problem-solving."*
