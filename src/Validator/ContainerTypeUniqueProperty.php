<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainerTypeUniqueProperty extends Constraint
{
    // Attention: the translation key is recomposed by $message. ".". snake cased property name
    public string $message = 'wms.container_type.error.unique';
    public string $propertyName = '';
}
