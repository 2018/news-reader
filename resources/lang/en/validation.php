<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => _i('The :attribute must be accepted.'),
    'active_url'           => _i('The :attribute is not a valid URL.'),
    'after'                => _i('The :attribute must be a date after :date.'),
    'after_or_equal'       => _i('The :attribute must be a date after or equal to :date.'),
    'alpha'                => _i('The :attribute may only contain letters.'),
    'alpha_dash'           => _i('The :attribute may only contain letters, numbers, and dashes.'),
    'alpha_num'            => _i('The :attribute may only contain letters and numbers.'),
    'array'                => _i('The :attribute must be an array.'),
    'before'               => _i('The :attribute must be a date before :date.'),
    'before_or_equal'      => _i('The :attribute must be a date before or equal to :date.'),
    'between'              => [
        'numeric' => _i('The :attribute must be between :min and :max.'),
        'file'    => _i('The :attribute must be between :min and :max kilobytes.'),
        'string'  => _i('The :attribute must be between :min and :max characters.'),
        'array'   => _i('The :attribute must have between :min and :max items.'),
    ],
    'boolean'              => _i('The :attribute field must be true or false.'),
    'confirmed'            => _i('The :attribute confirmation does not match.'),
    'date'                 => _i('The :attribute is not a valid date.'),
    'date_format'          => _i('The :attribute does not match the format :format.'),
    'different'            => _i('The :attribute and :other must be different.'),
    'digits'               => _i('The :attribute must be :digits digits.'),
    'digits_between'       => _i('The :attribute must be between :min and :max digits.'),
    'dimensions'           => _i('The :attribute has invalid image dimensions.'),
    'distinct'             => _i('The :attribute field has a duplicate value.'),
    'email'                => _i('The :attribute must be a valid email address.'),
    'exists'               => _i('The selected :attribute is invalid.'),
    'file'                 => _i('The :attribute must be a file.'),
    'filled'               => _i('The :attribute field must have a value.'),
    'image'                => _i('The :attribute must be an image.'),
    'in'                   => _i('The selected :attribute is invalid.'),
    'in_array'             => _i('The :attribute field does not exist in :other.'),
    'integer'              => _i('The :attribute must be an integer.'),
    'ip'                   => _i('The :attribute must be a valid IP address.'),
    'ipv4'                 => _i('The :attribute must be a valid IPv4 address.'),
    'ipv6'                 => _i('The :attribute must be a valid IPv6 address.'),
    'json'                 => _i('The :attribute must be a valid JSON string.'),
    'max'                  => [
        'numeric' => _i('The :attribute may not be greater than :max.'),
        'file'    => _i('The :attribute may not be greater than :max kilobytes.'),
        'string'  => _i('The :attribute may not be greater than :max characters.'),
        'array'   => _i('The :attribute may not have more than :max items.'),
    ],
    'mimes'                => _i('The :attribute must be a file of type: :values.'),
    'mimetypes'            => _i('The :attribute must be a file of type: :values.'),
    'min'                  => [
        'numeric' => _i('The :attribute must be at least :min.'),
        'file'    => _i('The :attribute must be at least :min kilobytes.'),
        'string'  => _i('The :attribute must be at least :min characters.'),
        'array'   => _i('The :attribute must have at least :min items.'),
    ],
    'not_in'               => _i('The selected :attribute is invalid.'),
    'numeric'              => _i('The :attribute must be a number.'),
    'present'              => _i('The :attribute field must be present.'),
    'regex'                => _i('The :attribute format is invalid.'),
    'required'             => _i('The :attribute field is required.'),
    'required_if'          => _i('The :attribute field is required when :other is :value.'),
    'required_unless'      => _i('The :attribute field is required unless :other is in :values.'),
    'required_with'        => _i('The :attribute field is required when :values is present.'),
    'required_with_all'    => _i('The :attribute field is required when :values is present.'),
    'required_without'     => _i('The :attribute field is required when :values is not present.'),
    'required_without_all' => _i('The :attribute field is required when none of :values are present.'),
    'same'                 => _i('The :attribute and :other must match.'),
    'size'                 => [
        'numeric' => _i('The :attribute must be :size.'),
        'file'    => _i('The :attribute must be :size kilobytes.'),
        'string'  => _i('The :attribute must be :size characters.'),
        'array'   => _i('The :attribute must contain :size items.'),
    ],
    'string'               => _i('The :attribute must be a string.'),
    'timezone'             => _i('The :attribute must be a valid zone.'),
    'unique'               => _i('The :attribute has already been taken.'),
    'uploaded'             => _i('The :attribute failed to upload.'),
    'url'                  => _i('The :attribute format is invalid.'),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
