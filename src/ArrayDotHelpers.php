<?php

if( ! function_exists('array_dot') )
{
    /**
     * Flatten a multi dimensional array into a flat with dots
     *
     * @param array  $array
     * @param string $prefix
     * @return array
     */
    function array_dot(array $array, $prefix = '')
    {
        $new = [];

        foreach($array as $key => $value) {
            if(is_array($value)) {
                $new = array_merge($new, array_dot($value, $prefix.$key.'.'));
                continue;
            }

            $new[$prefix.$key] = $value;
        }

        return $new;
    }
}

if( ! function_exists('array_undot') )
{
    /**
     * Turn array dot notation into a multidimensional array
     *
     * @param array $dotted The dotted array
     * @param array $root   The root array to append the unflattend array to.
     * @return array
     */
    function array_undot(array $dotted, array $root = [])
    {
        foreach($dotted as $key => $value) {
            array_undot_element($root, $key, $value);
        }

        return $root;
    }

    /**
     * Undot a single element
     *
     * @param   array  $root
     * @param   string $string
     * @param   mixed  $value
     * @return array
     */
    function array_undot_element(&$root, $string, $value)
    {
        $explode = explode('.', $string);

        foreach($explode as $step) {
            $root = &$root[$step];
        }

        $root = $value;
    }
}
