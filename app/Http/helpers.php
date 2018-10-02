<?php

/**
 * Checks whether a section exists
 *
 * @param  string  $section
 * @return bool
 */
function section_exists($section)
{
    return array_key_exists($section, app('view')->getSections());
}

/**
 * Checks whether a section has a certain value
 *
 * @param  string  $section
 * @return bool
 */
function section_has_value($section, $value)
{
    return section_exists($section) && app('view')->getSections()[$section] == $value;
}

function formField($errors, $name)
{
    if ($errors->has($name)) {
        return 'is-invalid';
    } else if (count($errors) > 0) {
        return 'is-valid';
    }
}

function variableIsModel($variable)
{
    return ($variable instanceof \Illuminate\Database\Eloquent\Model);
}