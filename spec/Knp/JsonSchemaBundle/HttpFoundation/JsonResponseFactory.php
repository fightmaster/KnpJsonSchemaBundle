<?php

namespace spec\Knp\JsonSchemaBundle\HttpFoundation;

use PHPSpec2\ObjectBehavior;

class JsonResponseFactory extends ObjectBehavior

{
    /**
     * @param Knp\JsonSchemaBundle\Schema\SchemaRegistry $registry
     * @param Symfony\Component\Routing\RouterInterface  $router
     */
    function let($registry, $router)
    {
        $this->beConstructedWith($registry, $router);
    }

    /**
     * @param stdClass $data
     */
    function it_should_create_a_json_response_and_associate_a_json_schema_if_available(
        $registry, $router, $data
    )
    {
        $registry->getAlias(ANY_ARGUMENT)->willReturn('foo');
        $router->generate('show_json_schema', ['alias' => 'foo'], true)->willReturn('http://localhost/schemas/foo.json');

        $response = $this->create($data);
        $response->headers->get('Content-Type')->shouldBe('application/json');
        $response->headers->get('Link')->shouldBe('<http://localhost/schemas/foo.json>; rel="describedBy"');
        $response->shouldHaveType('Symfony\Component\HttpFoundation\JsonResponse');
    }
}
