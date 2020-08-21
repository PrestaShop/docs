---
title: Supported branches
weight: 30
---

# Supported branches

Maintainers should only accept contributions for branches which are subject to new releases.

Once a minor "dot-zero" version has been released, no new patch releases will be made for previous versions. This means that only the latest minor version patch branch is supported – with the exception of rare cases, like a security bug being found just before or after a minor release is published.

For example, the `1.7.4.x` branch is supported until version 1.7.5.0 is released. After that, the only supported version branch will be `1.7.5.x`, and so on.

If you find a bug on an unsupported version, make sure that bug is still present in the latest version. If the bug is still present, please submit a Pull Request on `develop`.

**Pull Requests for unsupported versions should not be accepted.**

{{% notice tip %}}
When in doubt, use the develop branch. We will ask you to rebase on the correct branch if necessary.
{{% /notice %}}
