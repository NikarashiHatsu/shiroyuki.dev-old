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