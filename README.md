Adequate Passwords
==================

Provides adequate password requirement when validating password fields. This module
allows admins to require a minimum strength for chosen roles. It matches
Drupal's core password strength indicator. The indicator evaluates the strength of a
password based on fairly basic criteria, including: the length; whether it has a
combination of uppercase, lowercase, punctuation; and that it does not equal the
username. The strength levels are based on core's indicator levels of: weak, fair,
good, and strong.

Core's strength indicator isn't great but it is adequate. And this module will
ensure that the validation matches the feedback users get from the indicator.

The purpose of this module is to make it easy to understand that password is strong
enough to meet requirements by using the UI.

Installation
------------

The easiest way to install this module is to use Composer:

    composer require drupal/adequate_passwords

Please see the issue queue for questions about installation without Composer.

Enable the module as you would any other Drupal module.

Configuration
-------------

Configuration options are available at `admin/config/people/adequate_passwords`. The
strength threshold and roles it applies to can be chosen.

Similar modules
---------------

Better Passwords or Password Strength modules so far lack a consistent UI but do
provide stronger password requirements.
