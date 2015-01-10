## Installation

1. Download the [`composer.phar`](https://getcomposer.org/composer.phar) executable or use the installer.

    ``` sh
    $ curl -sS https://getcomposer.org/installer | php
    ```


2. Create a composer.json defining your dependencies. Note that this example is
a short version for applications that are not meant to be published as packages
themselves. To create libraries/packages please read the [guidelines](https://packagist.org/about).

    ``` json
    {
        "require": {
            "cpliakas/jira": "~1.0"
        }
    }
    ```

3. Run Composer: `php composer.phar install`


## Authenticating against JIRA

``` php

use Jira\JiraClient;
    
require_once 'vendor/autoload.php';

// Modify accordingly, note that in some installations the JIRA instance is
// in the document root and not in the "jira" subdirectory.
$host = 'http://localhost:8090/jira';
$username = 'my.username';
$password = 'my.password';

$jira = new JiraClient($host);
$jira->login($username, $password);

```


## Fetching an issue

``` php

$issue = $jira->issue('AB-123')->get();

```

## Creating an issue

``` php

use Jira\Remote\RemoteIssue;

$issue = new RemoteIssue();
$issue
    ->setProject('AB')
    ->setType(1) // ID can be found via $jira->issueTypes()->get().
    ->setSummary('Issue created via the API')
    ->setDescription('This is a test issue created throug the API');

$jira->create($issue);

```

## Updating an issue

``` php

use Jira\Remote\RemoteFieldValue;

$updates = [];

$value = new RemoteFieldValue();
$updates[] = $value->setId('assignee')->setValues(['jon.doe']);

$value = new RemoteFieldValue();
$updates[] = $value->setId('due-date')->setValues(['2015-12-31']);

$jira->issue('AB-1')->update($updates);

```

