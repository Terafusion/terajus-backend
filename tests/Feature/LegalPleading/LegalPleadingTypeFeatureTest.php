<?php

namespace Tests\Feature\LegalPleading;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class LegalPleadingTypeFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieve all legal_pleadings_types and filters
     *
     * @return void
     */
    public function test_index_legal_pleading_types()
    {
        $this->get('api/legal-pleading-types')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => 'Usucapião']);
    }
}
