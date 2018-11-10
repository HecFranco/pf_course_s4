## EMAILS

----------------------------------------------

### DEVELOPER CONFIGURATION

----------------------------------------------

#### INTERCEPT REDIRECTS

----------------------------------------------

To see the correct sending of emails we will need to activate the following option in the development environment.

_[config/packages/dev/web_profiler.yaml](./config/packages/dev/web_profiler.yaml)_
```diff
web_profiler:
    toolbar: true
--  intercept_redirects: false    
++  intercept_redirects: true
```

#### ALWAYS SEND EMAIL TO THE SAME DESTINATION

----------------------------------------------

To work during the development, it is good to send the email always to the same mail to test its correct functioning. This will be configured here:

_[config/packages/swiftmailer.yaml](./config/packages/swiftmailer.yaml)_
```diff
swiftmailer:
++  # Disabling Sending (option to development)
++  disable_delivery: true
++  delivery_addresses: ['seo@prodigia.com']
```

#### STANDAR CONFIGURATION GMAIL

----------------------------------------------

The standard configuration for sending emails from a **gmail** account is:

_[config/packages/swiftmailer.yaml](./config/packages/swiftmailer.yaml)_
```diff
swiftmailer:
++  url: '%env(MAILER_URL)%'
++  # Spool Using Memory    
++  spool: { type: 'memory' }
++  encryption:	ssl
++  auth_mode:	login
++  host:	smtp.gmail.com      
++  stream_options:
++      ssl:
++          verify_peer: false
++          verify_peer_name: false
```

> **NOTE**: To allow access to our mail less secure applications read this documentation: [https://support.google.com/accounts/answer/6010255](https://support.google.com/accounts/answer/6010255) and [https://myaccount.google.com/lesssecureapps](https://myaccount.google.com/lesssecureapps)