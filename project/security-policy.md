---
title: Security policy
---

# Security Policy

Obviously, PrestaShop project security is a critical matter. PrestaShop teams are dedicated to keep a high level of security in every aspects of the software.

However a software without vulnerability does not exist, which is why there is a security report process. If you find a security issue, please follow it to [responsibly disclose](https://en.wikipedia.org/wiki/Responsible_disclosure) your findings.

## Reporting a Vulnerability

Security issues can be reported by sending an email to security@prestashop.com or through our [YesWeHack Bug Bounty Program](https://yeswehack.com/programs/prestashop), which will go to security team members.

When the security team receives a security bug report, the report will be assigned to a primary handler. 
This person will coordinate the fix and release process, involving the following steps:

 - Confirm the problem and determine the affected versions.
 - Audit code to find any potential similar problems.
 - Prepare fixes for all releases still under maintenance. These fixes will be released as fast as possible.

The security team will follow up with a response indicating the next steps in handling the report.

If the issue is confirmed, the security team will keep you informed of the progress towards a fix and full announcement, and may ask for additional information or guidance.

### Disclosure Policy

In general, public disclosure are made after the issue has been fully identified and a patch is ready to be released.


## Security release process

Here is a short summary of the steps followed by the primary handler:

1) Security issues is reported to security@prestashop.com or through the [YesWeHack Bug Bounty Program](https://yeswehack.com/programs/prestashop).

2) Security issues is assessed to identify their criticality level.

- Minor issues are scoped to be fixed in the next scheduled minor release
- Critical issues are scoped to be fixed as soon as possible, meaning a patch release is delivered usually within 72 hours

3) For both minor and critical issues, a [GitHub Security Advisory](https://help.github.com/en/github/managing-security-vulnerabilities/creating-a-security-advisory
) will be created to register the issue in GitHub CVE database.

4) A [Private Security Forks](https://docs.github.com/en/github/managing-security-vulnerabilities/collaborating-in-a-temporary-private-fork-to-resolve-a-security-vulnerability) is used to prepare a patch Pull Request for the advisory. The Pull Request then reviewed and tested by QA.

5) When all patch Pull Requests are ready (in the event that multiple issues are reported), they are all merged and a new [Patch Release](../release/patch-release-lifecycle) is built and delivered. Security Advisories are published and the vulnerabilities are disclosed in a Release Note, urging all PrestaShop users to upgrade in order to protect their shops.

![Issue or Feature request](../img/security-process.png)

(click on it to see full size)

