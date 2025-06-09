# Temp Upload

Web application to upload files temporarily.

The application does not have any upload security controls, meaning we can upload arbitrary files. Since the backend executes PHP files, we can upload our own PHP file and when accessing it on the webserver, the code will execute, resulting in RCE.

Uploading the follow PHP code as the filename "test.php" and clicking on the upload link provided by the website will execute the `id` command.

```
echo '<?php system("id"); ?>'
```
