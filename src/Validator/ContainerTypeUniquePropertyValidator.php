<?php

namespace App\Validator;

use App\Services\Entity\Logistic\ContainerTypeService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

use function Symfony\Component\String\u;

class ContainerTypeUniquePropertyValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {

        if (!($constraint instanceof ContainerTypeUniqueProperty)) {
            throw new UnexpectedTypeException($constraint, ContainerTypeUniqueProperty::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }
        $this->context->buildViolation($constraint->message . '.' . u($constraint->propertyName)->snake())
        ->setParameter('{{ string }}', $value)
        ->addViolation();

    }
}
