---
title: Minor release lifecycle
weight: 2
---

# Minor release lifecycle

## Kanban and scope

Each minor version is defined by a feature scope, that is, a number of GitHub issues that we put in a version [Kanban](https://help.github.com/en/github/managing-your-work-on-github/about-project-boards). How these issues are picked or sorted is the responsibility of the Product Team, who spends a lot of time gathering feedback from the PrestaShop community to make sure the next minor version addresses the most important needs.

For example PrestaShop 8.1.0 scope contained, but not only:

- New product management page in the back office
- Some of the new features that the community wanted to implement in the version (improved developer features, new hooks, better product availability, label management, etc.)

Although it is very hard to estimate the size of this scope, we try to size it in order for the development phase to last 4 months.

Once this scope has been completed – i.e all issues have reached the "Done" column of the Kanban – the project reaches the [Feature Freeze](https://en.wikipedia.org/wiki/Freeze_(software_engineering)) stage.

During this phase, no new items can be added to the version's scope if there is a risk of breaking the stability of the software.
This is a _Feature Freeze_, not a _Code Freeze_. Some older bugs may be added to the scope if it is considered opportune to fix them quickly before the release is out (e.g. security fixes), new hooks may be added or some minor features may be added if they are considered to be very important for the community.

## Feature Freeze

Feature freeze means all features initially planned for this version have been done. The project enters a phase of _stabilization_ whose aim is to identify and fix all regressions before it's released.

Once this phase is started, project maintainers create a git branch from `develop` branch which will carry the work to be done until the release (for 8.1.0, the branch name was `8.1.x`). Starting now, the main job of this branch is to fix bugs for this version. We won't add any new features, unless they are really wanted by the community and safe to add. Any contribution that isn't about fixing bugs will be carefully checked by our project members (technical, product and quality council) to see if it can be included in the main patch branch.

Incidentally, this is also the branch where all future patch versions for this minor version will be developed on (hence the `.x` at the end).

Also, since stabilization is performed in a separate branch (`8.1.x` in our example), and as with the current release cycle we aim to release only one minor version per major version, development for the next major release (9.0 in our example) can start on the `develop` branch. This means that the development of any given minor version development actually starts (albeit slowly) precisely the moment the previous version enters feature freeze.

## Public Beta period

In the past, this was when the project's QA team started an extensive testing campaign. The community would wait for QA to test and perform the first campaign, and then it was decided whether to publish the public beta or not. To let the community try the version with project members and speed up the process, after launching PrestaShop 8.0, it has been decided to begin the public beta testing phase for both the project QA team and the community simultaneously. To kick off this period, the QA team is provided with the version build by project maintainers and initiates a preliminary campaign to determine if the public beta is ready to be released. At this stage, it's not a complete testing campaign, just a set of tasks to make sure the main features of the software are working as they should.

After validating the build with a preliminary campaign the public beta period starts. As the QA team and community verifies the build, they will report issues which later populate the Kanban with all the bugs they find. All important regressions must be fixed quickly. Although it depends heavily on the number of regressions found, this phase should last about one month. 

During the month following this release, the community is **very strongly encouraged to test it** and give their feedback quickly: the sooner a problem is identified, the sooner it will be fixed. Remember that experts agree that the cost of fixing a bug grows exponentially with time – it is much cheaper to spend time now to ensure everything works well before the final release is out than to discover a bug in production later and lose business while a patch is prepared. The goal of this public beta period is to find and register all regressions.

During this one month, we continue testing and fixing the `.x` (following the stabilization goal) but we know that we can only test and imagine a limited amount of usecases. The community however knows better than us all the possible ways to use PrestaShop to build a business.

What does it mean to test a Beta build?

- If you use PrestaShop web services API for integration with other systems, make sure they work as expected
- If you build modules or themes for PrestaShop, test them on the new version
- If you know very well some of the modified/improved/reworked back office pages, please give them a try
- If you customized some parts of the shop, make sure they work well in the new version
- If you are hosting shops or providing maintenance services to merchants, import the data of one or two typical shops on a pre-production server and check the performance and the behavior of this version; you can also check that the update process is working as expected, depending on your favorite method

For example, if you are a payment module developer, just installing your module on this Beta software, processing one payment and telling us that everything is running as expected is already a great feedback.

If however you find a problem, you can

 - [Report this as a bug on GitHub](https://github.com/PrestaShop/PrestaShop/issues) (read [how to report issues]({{< relref "/8/contribute/contribute-reporting-issues" >}}))
 - Submit a bug fix by creating a [pull request](https://github.com/PrestaShop/PrestaShop/compare) (read the [contribution guidelines]({{< relref "/8/contribute/contribution-guidelines/" >}}))

Once all major bugs have been fixed, the [Release canddiate phase](https://en.wikipedia.org/wiki/Software_release_life_cycle#Release_candidate) can be launched.

## Release Candidate

When Beta period ends, we consider that all the remaining regressions for this release are registered in the Kanban. So the aim is clear: fix them all, then ship.

Once all regressions have been fixed, project members deliver a Release Candidate Build using the `.x` branch codebase. This will be the Release Candidate 1 (also known as RC1).

This Build is extensively re-tested by the QA and provided to everyone at the same time. Once released, the timer starts. This phase can take up two a few weeks. During the next few weeks, we will continue testing and exploring the Build, trying to find anything that would not have been detected earlier, and the community should do the same.

At the end, if no new regression has been reported, the RC1 is rebranded and becomes the final release. **The new minor version of PrestaShop is out.**

Most of the time, a couple final regressions will be reported. In that case, the bugs are fixed, an RC2 build is published, and the timer is reset. This cycle repeats until no new regressions are reported within the defined timeframe.

Finally the latest built Release Candidate becomes the new latest stable PrestaShop software minor release.

## Summary

- The cycle begins when development starts within the scope of a minor version release. When the scope of this version is finished, Feature Freeze is triggered.

Expected duration: 4 months

- Following Feature Freeze, a new version build is picked up and tested by QA team, this preliminary campaign determine if the public beta is ready to be released

Expected duration: 1 week

- After preliminary campaign, the Beta Build is made available to all. A one-month long beta period to allow the community and QA to test the build and submit feedback.

Expected duration: 1 month

- At the end of the Beta period, all regressions are fixed and project members deliver a Release Candidate 1 build.
If bugs are reported, they are fixed in an RC2 build, and so on until a build has no issues reported within the following week. The last Release Candidate becomes the stable release.

Expected duration: from 1 week (if RC1 is flawless) to 1 month, possibly 2 months

### Calendar

The global duration for all the process is about 6 months. You can read [more information about project's release cycle](https://www.prestashop-project.org/project-organization/release-cycle/).
