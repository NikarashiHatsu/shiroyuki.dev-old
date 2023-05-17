# ARCHIVE NOTE
This repository has been archived, effective as of May 18th, 2023. I don't use Laravel a lot for blogging purposes as it is exhausting to manage and quite expensive to serve. The newest blog repository has been moved to https://github.com/NikarashiHatsu/nikarashihatsu.github.io. Consider checking it out to learn how to set up one for your own.

# Blog
An open source Laravel-based blog. Still in progress, will be updated regularly
as I wrote articles on my blog.

## Configurations

### Shared-hosting, and other hosting that didn't allow `storage` symlink.
Open `.env` file, set `FILESYSTEM_DISK` variable value to `hosting`, and set
the `PATH_TO_PUBLIC_STORAGE` variable relative from the `storage/app` folder
to your public folder.

### Google Analytics
To use Google Analytics in this project, initiate your app in Google Firebase,
and then change the `firebaseConfig` on `resources/js/app.js` to the config you
are obtained from Firebase.
