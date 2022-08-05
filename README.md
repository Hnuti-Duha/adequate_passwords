Adequate Passwords
==================

Provides adequate password requirement when validating password fields. This module
allows admins to require a minimum strength for chosen roles. It matches
Drupal's core password strength indicator. The indicator evaluates the strength of a 
password based on fairly basic criteria, including the length, whether it has a 
combination of uppercase, lowercase, punctuation, and that it does not equal the 
username. The strength levels are based on core's indicator levels of: weak, fair, 
good, and strong.

Core's strength indicator isn't great but it is adequate. And this module will 
ensure that the validation matches the feedback users get from the indicator.

The purpose of this module is to easy be to understand from using the UI. If you're
looking for stronger passwords, try Better Passwords or Password Strength modules.

Installation
------------

The easiest way to install this module is to use composer:
  
    composer require drupal/adequate_passwords

Please see the issue queue for questions about installation without composer.

Enable the module as you would any other Drupal module.

Configuration
-------------

Configuration options are available at admin/config/people/adequate_passwords. The
strength threshold and roles it applies to can be chosen.
