# Ping Pong

Web application to ping arbitrary hosts.

This application is vulnerable to command injection via the `host` POST parameter.

The following is an example payload you can use to execute the `id` command.

```
solopie.com;echo $(id)
```