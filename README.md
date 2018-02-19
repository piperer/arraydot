# arraydot

Helper functions to deal with array dotting

## Installation

```
composer require cipherpixel/arraydot --no-dev
```

## Examples

```php
$array = [
    'config' =>
        'group' => [
            'setting'  => 'value',
            'setting2' => 'value2',
        ],
    ],
];

$array = array_dot($array);

// Elements can now be accessed using dot notation, like the example below.
// Echos: 'value';
echo $array['config.group.setting'];

// To return the array back to the original, the following
// line can be used.
$array = array_undot($array);

// Echos 'value2'
echo $array['config']['group']['setting2'];
```
