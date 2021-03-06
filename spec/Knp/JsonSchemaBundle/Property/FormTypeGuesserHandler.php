<?php

namespace spec\Knp\JsonSchemaBundle\Property;

use PHPSpec2\ObjectBehavior;
use Knp\JsonSchemaBundle\Model\Property;

class FormTypeGuesserHandler extends ObjectBehavior
{
    /**
     * @param Symfony\Component\Form\FormTypeGuesserInterface $guesser
     * @param Knp\JsonSchemaBundle\Model\Property $property
     * @param Symfony\Component\Form\Guess\TypeGuess $typeGuess
     * @param Symfony\Component\Form\Guess\ValueGuess $requiredGuess
     * @param Symfony\Component\Form\Guess\ValueGuess $patternGuess
     * @param Symfony\Component\Form\Guess\ValueGuess $minLengthGuess
     * @param Symfony\Component\Form\Guess\ValueGuess $maxLengthGuess
     */
    function let($guesser, $property, $typeGuess, $requiredGuess, $patternGuess, $minLengthGuess, $maxLengthGuess)
    {
        $this->beConstructedWith($guesser);
        $guesser->guessType(ANY_ARGUMENTS)->shouldBeCalled()->willReturn($typeGuess);
        $guesser->guessRequired(ANY_ARGUMENTS)->shouldBeCalled()->willReturn($requiredGuess);
        $guesser->guessPattern(ANY_ARGUMENTS)->shouldBeCalled()->willReturn($patternGuess);
        $guesser->guessMinLength(ANY_ARGUMENTS)->shouldBeCalled()->willReturn($minLengthGuess);
        $guesser->guessMaxLength(ANY_ARGUMENTS)->shouldBeCalled()->willReturn($maxLengthGuess);
    }

    function it_should_add_json_type_object_if_guessed_type_is_entity($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('entity');
        $property->addType('object')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_array_if_guessed_type_is_collection($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('collection');
        $property->addType('array')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_boolean_if_guessed_type_is_checkbox($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('checkbox');
        $property->addType('boolean')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_number_if_guessed_type_is_number($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('number');
        $property->addType('number')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_integer_if_guessed_type_is_integer($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('integer');
        $property->addType('integer')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_date($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('date');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_datetime($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('datetime');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_text($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('text');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_country($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('country');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_email($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('email');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_file($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('file');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_language($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('language');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_locale($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('locale');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_time($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('time');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_add_json_type_string_if_guessed_type_is_url($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('url');
        $property->addType('string')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_json_format_date_time_if_guessed_type_is_datetime($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('datetime');
        $property->setFormat(Property::FORMAT_DATETIME)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_json_format_date_if_guessed_type_is_date($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('date');
        $property->setFormat(Property::FORMAT_DATE)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_json_format_time_if_guessed_type_is_time($guesser, $property, $typeGuess)
    {
        $typeGuess->getType()->willReturn('time');
        $property->setFormat(Property::FORMAT_TIME)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_a_property_requirement_if_guessed_requirement_is_true($guesser, $property, $requiredGuess)
    {
        $requiredGuess->getValue()->willReturn(true);
        $property->setRequired(true)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_a_property_non_requirement_if_guessed_requirement_is_false($guesser, $property, $requiredGuess)
    {
        $requiredGuess->getValue()->willReturn(false);
        $property->setRequired(false)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_a_json_pattern_if_guessed_pattern_is_not_null($guesser, $property, $patternGuess)
    {
        $patternGuess->getValue()->willReturn('/^[a-z]{5}$/');
        $property->setPattern('/^[a-z]{5}$/')->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_a_minimum_if_guessed_minimum_length_is_not_null($guesser, $property, $minLengthGuess)
    {
        $minLengthGuess->getValue()->willReturn(10);
        $property->setMinimum(10)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }

    function it_should_set_a_maximum_if_guessed_maximum_length_is_not_null($guesser, $property, $maxLengthGuess)
    {
        $maxLengthGuess->getValue()->willReturn(10);
        $property->setMaximum(10)->shouldBeCalled();

        $this->handle('my\class\namespace', $property);
    }
}
