---
title: Writing a good commit message
weight: 10
---

# Writing a good commit message

Commit names should give an idea of the nature and context of the change that has been done. The more details, the better! The commit name should be as unique and recognizable as your commit itself. There are multitude of articles on the web regarding commit messages, here are two that you can find useful: [How to Write a Git Commit Message](https://chris.beams.io/posts/git-commit/) and [What makes a good commit message?](https://hackernoon.com/what-makes-a-good-commit-message-995d23687ad).

Bad commit messages give pretty much no context:

- `add cli new`
- `fix useless code`
- `fix code review comments`

A good commit message explains _what_ is done, and _why_. Here's an example: 

```text
Make Source.indexOf(ByteString) significantly faster

Previously the algorithm that did this was extremely inefficient, and
had worst case runtime of O(N * S * S) for N is size of the bytestring
and S is the number of segments.

The new code runs in O(N * S). It accomplishes this by not starting
each search at the first segment, which could occur many times when
called by RealBufferedSource.
```

Some tips:

- Separate subject from body with a blank line
- Limit the subject line to 50 characters
- Capitalize the subject line
- Use the body to explain _what_ and _why_ vs. _how_

