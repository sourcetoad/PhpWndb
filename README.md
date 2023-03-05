# PHP API for WordNet database

[WordNet database](https://wordnet.princeton.edu/) provides kind of semantic of words stored in files. This project is PHP API for easy reading of these files. See [examples/wordNet.php](examples/wordNet.php).

## Getting Started

### Prerequisites

The code needs PHP 8.1 or greater.

### Installing

```
composer require phpwndb/phpwndb
```

### Basic usage

```php
$wordNet = (new PhpWndb\Dataset\WordNetProvider())->getWordNet();
$synsets = $wordNet->search('word');

foreach ($synsets as $synset) {
    echo $synset->getGloss() . "\n";
}
```

## Running the tests

```
composer install
composer phpstan
composer tests
```

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/PhpWndb/PhpWndb/tags).
