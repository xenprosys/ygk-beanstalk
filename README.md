## Ygk-Beanstalk
---
Zend2 base module [Beanstalk][4] queue job services.

## Installation

Recommended installation method is through composer:

    composer require xenprosys/ygk-beanstalk dev-master

## Configuration

Register the module in the main application: `config/application.config.php`

    'modules' => array(
        ...
        'Xenprosys\\Ygk\\Beanstalk'
        ...
    )

## Feedback

If you'd like to contribute to the project or file a bug or feature request, please visit [the project page][1].

## License

The project is licensed under the [GNU GPL v3][2] ([tldr][3]) license. Which means you're allowed to copy, edit, change, hack, use all or any part of this project *as long* as all of the changes and contributions remains under the same terms and conditions.

  [1]: https://github.com/xenprosys/ygk/
  [2]: http://www.gnu.org/licenses/gpl.html
  [3]: http://www.tldrlegal.com/license/gnu-general-public-lic
  [4]: http://kr.github.io/beanstalkd/
