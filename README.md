
# Bot Twitter

A little bot who post what you want

## Create a account on Twitter

- Go to [Twitter developer](https://developer.twitter.com/en) and create a account and choose your package
- Modify the User authentication settings
    - App permissions to Read and write and Direct message
    - Type of App Web to App, Automated App or Bot
    - App info 
        - Callback URI / Redirect URL : http://localhost/bot-twitter-publish/index.php
        - Website URL : no matter
- Generate Access Token and Secret

## Installation

Install my project with composer

```bash
  composer init
  composer require abraham/twitteroauth
```

the change the index.php

```
    $consumerKey = 'Consumer Key';
    $consumerSecret = 'Consumer Secret';
    $accessToken = 'Access Token';
    $accessTokenSecret = 'Access Token Secret';
```
