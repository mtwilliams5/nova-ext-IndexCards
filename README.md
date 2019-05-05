# Nova Extension: Index Cards

This extension adds cards to the main index page, beneath the welcome message and above the tabs, with the number and content of cards controllable via `Site Messages`.

## Requirements

This extension requires:

- Nova 2.6+
- Nova Extension [`jquery`](https://github.com/jonmatterson/nova-ext-jquery)

## Installation

Copy the entire directory into `applications/extensions/IndexCards`.

Add the following to `application/config/extensions.php`:

```php
$config['extensions']['enabled'][] = 'IndexCards';
```

## Usage

To define a card, go to `Site Management > Messages and Titles` and then `Add New Message`. For the new message, give it a message key of `index-card-whatever`, where `whatever` is a unique name for the card you're adding. Then, when you go to your site's main index, it will show a new card beneath the welcome message.

If you wish to give the card a footer, create a new message with the key of `footer-index-card-whatever`, where `whatever` matches the name of the card you wish to apply the footer to.

Cards will be ordered on the page in alphabetical order of the unique name you give the card.

## Issues

If you encounter a bug or have a feature request, please report it on GitHub in the issue tracker [here](https://github.com/mtwilliams5/nova-ext-IndexCards/issues).

## License

Copyright (c) 2019 Matt Williams.

This module is open-source software licensed under the **MIT License**. The full text of the license may be found in the `LICENSE` file.
