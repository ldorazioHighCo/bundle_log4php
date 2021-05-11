Installation
============

Assurez-vous que Composer est installé de manière globale, comme expliqué dans la section
[chapitre sur l'installation](https://getcomposer.org/doc/00-intro.md)
de la documentation relative à Composer.

### Etape 1: Ajouter le dépot Git du Bundle 

Ouvrez votre composer.json de votre projet et copier le git du Bundle :

```composer log
"repositories": [
    {
        "type": "vcs",
        "url": "https://bitbucket.hcnx.eu/scm/hxweb/hcnx_bundle_log4php_symfony.git"
    }
]
```


Applications qui n'utilisent pas Symfony Flex
----------------------------------------

### Etape 2: Télécharger le Bundle

Ouvrez une console de commande, entrez dans le répertoire de votre projet et exécutez la commande suivante
commande suivante pour télécharger la dernière version stable de ce bundle :

```console
$ composer require ldorazio/log4php-bundle
```

### Etapge 3: Activer le Bundle

Ensuite, activez le bundle en l'ajoutant à la liste des bundles enregistrés
dans le fichier `config/bundles.php` de votre projet :

```php
// config/bundles.php

return [
    // ...
    hcnx\hcnx_bundle_symfony\Log4PhpBundle::class => ['all' => true],
];
```

### Etapge 4: Créer un fichier de config du Bundle

Créer un fichier `config/packages/log4php.yaml` pour configurer : 
* le chemin du package apache/log4php 
* chemin du fichier de configuration (log4php.xml)
```yaml
log4php:
  lib_path: '%env(log4php_path)%'
  config_path: '%kernel.project_dir%'
```

### Etapge 4: Créer un fichier de config du Bundle

Créer un fichier de configuration a la racine du projet.

Exemple :
```xml
<configuration xmlns="http://logging.apache.org/log4php/">
    <appender name="myConsoleAppender" class="LoggerAppenderConsole" threshold="TRACE">
    </appender>

    <appender name="myTestUnitAppender" class="LoggerAppenderRollingFile">
        <layout class="LoggerLayoutPattern">
            <param name="conversionPattern" value="%date [%logger] %level -  %message%newline" />
        </layout>
        <param name="maxFileSize" value="1MB" />
        <param name="maxBackupIndex" value="5" />
        <param name="compress" value="1" />
        <param name="file" value="/var/www/sites/Log4PhpBundle/testlog4php.log" />
    </appender>


    <logger name="TestUnit">
        <appender_ref ref="myTestUnitAppender" />
        <level value="trace" />
    </logger>


    <root>
        <level value="DEBUG" />
        <appender_ref ref="myConsoleAppender" />
    </root>
</configuration>
```