Autoloading the JIRA library
============================

    <?php

    // Modify accordingly.
    $path_to_lib = '/path/to/downloaded/library';

    // Use any PSR-0 compliant autloader, such as Zend Framework's autoloader.
    $loader = new Zend\Loader\StandardAutoloader();
    $loader->registerNamespace('Jira', $path_to_lib . '/src/Jira');
    $loader->register();

    ?>


Authenticating against JIRA
===========================

    <?php

    // Modify accordingly, note that in some installations the JIRA instance is
    // in the document root and not in the "jira" subdirectory.
    $host = 'http://localhost:8090/jira';
    $username = 'my.username';
    $password = 'my.password';

    try {
        $jira = new Jira\Client($host);
        $jira->login($username, $password);
    } catch (Exception $e) {
        // Something went wrong.
    }

    ?>


Fetching an issue
=================

    <?php

    $issue = $jira->issue('AB-123')->get();

    ?>
