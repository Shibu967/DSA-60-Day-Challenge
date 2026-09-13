# DSA-60-Day-Challenge — AI Agent Instructions

## 1. CENTRAL SOURCE-OF-TRUTH

Make it explicit that the repository itself is the source of truth.

The instruction hierarchy must clearly be:

1. `AGENTS.md` → How the AI/agent must operate
2. `RULES.md` → Learning and coding rules
3. `ROADMAP.md` → Day/Phase curriculum
4. Relevant template → Artifact/file structure
5. Existing Day files → Actual repository format and history
6. `LEARNING_TRACKER.md` → Progress/mastery/history when applicable
7. Git history → Commit-message style when Git output is required

The agent must not invent a format when an existing repository rule,
template, or established convention already exists.

---

## 2. MANDATORY SOURCE READING

Strengthen the existing source-of-truth section.

Before ANY repository file is created OR modified, the agent MUST:

1. Identify the target Day and task.
2. Read `RULES.md`.
3. Read the relevant `ROADMAP.md` section.
4. Read the relevant template if one exists.
5. Inspect the existing target Day files.
6. Inspect sibling files of the same type.
7. Determine the established naming convention.
8. Determine the established content structure.
9. Only then generate or modify the file.

If a required source cannot be read, the agent MUST STOP and report
the missing source.

It must NOT guess the repository convention.

---

## 3. TEMPLATES ARE MANDATORY

Add a strong dedicated template section.

The following files are central templates:

* `PROBLEM_TEMPLATE.md` → individual problem files
* `README_TEMPLATE.md` → Day README files
* `REVISION_TEMPLATE.md` → revision documentation

Before creating OR modifying a file covered by a template, the agent
MUST read the relevant template first.

The template is the source of truth for the structure of that artifact.

Do NOT merely mention the templates as optional references.

Use this workflow:

### Problem File

`RULES.md`
→ relevant `ROADMAP.md`
→ `PROBLEM_TEMPLATE.md`
→ existing Day problem files
→ determine filename/numbering
→ create/update problem
→ validate against template

### Day README

`RULES.md`
→ relevant `ROADMAP.md`
→ `README_TEMPLATE.md`
→ existing Day README
→ existing Day problem files
→ update README
→ validate against template

### Revision Documentation

`RULES.md`
→ relevant `ROADMAP.md`
→ `REVISION_TEMPLATE.md`
→ existing revision files
→ create/update revision document
→ validate against template

Do not modify the template files themselves unless the user explicitly
requests a template change.

---

## 4. PROBLEM NAMING MUST BE VERIFIED

Make the problem naming rule explicit.

Before creating a problem file, the agent MUST inspect:

1. `PROBLEM_TEMPLATE.md`
2. Existing problem files in the same Day
3. Existing numbering
4. Existing filename pattern

The agent must continue the repository's established naming convention.

Example:

`problem-01-<descriptive-name>.php`
`problem-02-<descriptive-name>.php`
`problem-03-<descriptive-name>.php`

Never invent:

`Problem1.php`
`problem_1.php`
`01-problem.php`
`Problem-01.php`

unless the repository itself already uses that format.

Before creating a file, verify that the filename does not already exist.

If an existing problem has an incorrect filename, report it clearly
and provide the corrected filename. Do not silently claim that it is
correct.

---

## 5. README CONSISTENCY

Every Day README must follow:

* `README_TEMPLATE.md`
* `RULES.md`
* relevant `ROADMAP.md`
* existing Day README conventions

The README must reflect actual work.

Never invent:

* solved problems
* LeetCode problems
* mastery levels
* test results
* study time
* patterns
* achievements

If a problem was attempted, failed, corrected, or solved independently,
document the actual learning history honestly.

Status, problem count, mastery, patterns, mistakes, and summary must
remain consistent.

---

## 6. EXISTING FILES MUST BE INSPECTED

Before declaring a Day or file "correct", the agent MUST inspect
the actual files.

For example, when auditing Day 08:

1. Read Day 08 README.
2. List/read every file in `Day-08-.../problems/`.
3. Check every filename.
4. Compare every filename with the established naming convention.
5. Check numbering.
6. Check duplicate files.
7. Check README references against actual filenames.
8. Check problem count against actual files.
9. Only then report PASS/FAIL.

Do NOT say "everything is correct" based only on the README.

---

## 7. LEARNING WORKFLOW

Preserve the existing learning workflow:

Constraints
→ Examples / Edge Cases
→ Brute Force
→ Complexity
→ Bottleneck
→ Optimization
→ Pattern Recognition
→ Pseudocode
→ PHP Implementation
→ Tests
→ Final Complexity
→ Interview Explanation

The agent must follow the repository's learning process and must not
skip independent problem-solving where required by `RULES.md`.

---

## 8. HINT POLICY

Preserve the existing hint policy:

Independent Attempt
→ Small Hint
→ Retry
→ Approach
→ Implementation
→ Full Solution only as last resort

Document honestly whether a problem was:

* solved independently
* solved after hint
* solved after correction
* studied from a complete solution

Do not falsely mark solution-assisted work as independent.

---

## 9. NO DUPLICATES

Before creating any file, check whether the file or equivalent artifact
already exists.

Do not create:

* duplicate Day folders
* duplicate README files
* duplicate problem numbers
* `README-final.md`
* `README-updated.md`
* `README-v2.md`
* alternative problem filenames

When an existing file should be updated, update it in place.

---

## 10. PHP / DSA CONSISTENCY

Preserve the existing PHP/DSA distinction.

Use PHP unless the repository explicitly requires another language.

Keep algorithmic complexity separate from PHP implementation details.

When PHP behavior differs from the conceptual DSA model, document the
difference instead of silently changing the algorithmic explanation.

---

## 11. TESTING

For implemented problems, test where practical:

1. Normal case
2. Small input
3. Edge case
4. Boundary case
5. Algorithm-specific special case

Never claim a test passed unless it was actually executed or verified.

Expected output must match the implementation.

---

## 12. FINAL VALIDATION

Before considering any repository task complete, verify:

* Correct Day
* Correct Phase
* Correct topic
* Correct folder
* Correct filename
* Correct numbering
* Correct template
* Correct problem count
* Correct status
* Correct complexity
* Correct patterns
* Correct test cases
* Correct expected outputs
* Correct mastery
* Correct mistakes
* Correct README references
* No duplicate files
* No stale Pending/In Progress information
* No invented achievements
* No contradiction with `RULES.md`
* No contradiction with `ROADMAP.md`
* No contradiction with the relevant template
* No contradiction with `LEARNING_TRACKER.md`

If something cannot be verified, report it as UNVERIFIED rather than
calling it PASS.

---

## 13. GIT POLICY — USER CONTROLLED

This repository uses a strictly user-controlled Git workflow.

The AI/agent MUST NOT execute:

* `git commit`
* `git push`
* `git reset`
* `git clean`
* destructive Git restore/checkout operations

The user is solely responsible for committing and pushing changes.

The AI may inspect Git information when necessary, including:

* `git status`
* `git diff`
* `git log`
* `git diff --cached`

Before providing Git commands, the agent MUST:

1. Inspect `git status`.
2. Inspect relevant `git diff`.
3. Inspect recent `git log` to determine the repository's commit-message style.
4. Identify the exact files belonging to the current task.
5. Exclude unrelated changes.
6. Confirm the target branch.
7. Provide commands for the USER to execute manually.

Never use `git add .` by default.

---

## 14. REQUIRED GIT OUTPUT

When the task is complete and Git commands are appropriate, provide
ONLY the exact commands needed for the user to run manually.

Required format:

```bash
git add <specific-files-or-folder>
git commit -m "<commit-message-following-repo-style>"
git push origin main
```

The AI MUST NOT execute these commands.

The AI must never claim:

* "Committed successfully"
* "Pushed successfully"
* "Changes are now on GitHub"

unless the user explicitly confirms that they manually executed
the commands successfully.

If the branch is not `main`, use the actual verified branch.

If the changed files cannot be confidently identified, do not provide
a confident `git add` command. Report the uncertainty instead.

---

## 15. GIT COMMIT MESSAGE STYLE

Before suggesting a commit message:

1. Inspect recent commits.
2. Identify the established style.
3. Continue that style.
4. Mention the correct Day when appropriate.
5. Describe only the actual completed work.
6. Do not exaggerate.

Never invent a completely different commit-message convention.

---

## 16. CHANGE SCOPE

Only modify files required for the user's requested task.

For example:

If the user asks to update Day 08 README, do not automatically modify:

* Day 09
* Day 10
* RULES.md
* ROADMAP.md
* unrelated problems

unless required for consistency or explicitly requested.

If another file must be changed, explain why before making the change.

---

## 17. HONEST LEARNING HISTORY

The repository is a record of the learner's real development.

Preserve meaningful:

* mistakes
* failed approaches
* corrections
* independent attempts
* hint usage
* solution usage
* pattern discoveries

Do not rewrite history merely to make the repository look perfect.

The goal is authentic learning history and interview credibility.

---

## 18. LEARNING AND REVISION MODES

### 18.1 New Learning

When the user asks to learn a new Day, concept, topic, or DSA pattern:

The AI MUST:

1. Read `AGENTS.md`.
2. Read `LEARNING_MODE.md`.
3. Read `RULES.md`.
4. Read the relevant section of `ROADMAP.md`.
5. Read the current Day `README.md` if it exists.
6. Read relevant problem files.
7. Read `LEARNING_TRACKER.md`.
8. Read relevant repository templates.

Then follow `LEARNING_MODE.md`.

The AI MUST NOT teach the entire Day at once.

The AI MUST follow:

Concept → Explanation → Example → Analogy → Dry Run → Mini Test → Evaluation → Correction → Retest → Mastery Gate → Next Concept

The AI MUST NOT move to the next concept until the current concept has passed the required mastery gate.

### 18.2 Revision

When the user asks to revise a Day, multiple Days, a Phase, a topic, or previously learned DSA concepts:

The AI MUST:

1. Read `AGENTS.md`.
2. Read `REVISION_MODE.md`.
3. Read `RULES.md`.
4. Read the relevant sections of `ROADMAP.md`.
5. Read relevant Day READMEs.
6. Read relevant problem files.
7. Read `LEARNING_TRACKER.md`.
8. Read documented mistakes and mastery information.
9. Read relevant repository templates.

Then follow `REVISION_MODE.md`.

Revision MUST start with active recall/testing.

The AI MUST identify knowledge gaps before re-teaching.

### 18.3 Language

Teaching and revision conversations MUST use:

**Simple Hindi + English (Hinglish).**

Technical terms should remain in English.

Repository documentation MUST use:

**Simple, clear, easy English.**

This includes:

* README files
* Problem files
* Learning notes
* Revision notes
* Mistakes
* Trackers
* Interview explanations
* Code comments

Interview practice should gradually move from Hinglish understanding to clear English communication.

### 18.4 Structured Labels

Use consistent English labels such as:

A.
B.
C.
D.

Do not randomly switch between Hindi labels, English labels, numbers, and other formats when a structured A/B/C/D format is appropriate.

### 18.5 No Mastery Shortcut

The AI MUST NOT declare a concept, problem, Day, or Phase mastered only because:

* The learner saw the solution.
* The learner copied code.
* The learner recognized the answer after explanation.
* The README says it was completed.

Mastery must be supported by actual learner performance.

### 18.6 Documentation Accuracy

After learning or revision:

* Update documentation only with work actually completed.
* Preserve honest learning history.
* Record mistakes and corrections.
* Record hints used.
* Record independent vs assisted solving.
* Do not fabricate progress.

---

## 19. IMPORTANT PRINCIPLE

The repository is the source of truth.

The agent must READ before it GENERATES.

The agent must VERIFY before it CLAIMS "CORRECT".

The agent must NOT GUESS when repository evidence is available.

Optimize for:

Consistency
Accuracy
Learning History
Traceability
Maintainability
Pattern Progression
Interview Credibility
Git History Quality