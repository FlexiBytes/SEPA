[![Build Status](https://travis-ci.org/FlexiBytes/SEPA.png?branch=master)](https://travis-ci.org/FlexiBytes/SEPA)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/FlexiBytes/SEPA/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/FlexiBytes/SEPA/?branch=master)

# SEPA
This module provides a basic IBAN verification class

# Usage
```
$is_valid = \Sepa\IBAN\Validation::factory()
    ->isValid('AL47 2121 1009 0000 0002 3569 8741');
```

`check()` will throw an exception on error
`isValid()` will return boolean true/false