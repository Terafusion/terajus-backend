<?php

namespace Tests\Feature\LegalPleading;

use App\Models\LegalPleading\LegalPleading;
use App\Models\LegalPleadingType\LegalPleadingType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class LegalPleadingFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieve all legal_pleadings and filters
     *
     * @return void
     */
    public function test_index_legal_pleadings()
    {
        $legalPleadingType = LegalPleadingType::factory()->create();
        $legalPleading = LegalPleading::factory()->create(['legal_pleading_type_id' => $legalPleadingType->id]);
        $this->get('api/legal-pleadings')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['content' => $legalPleading->content]);
        $this->get('api/legal-pleadings?filter[search]=xpto')->assertStatus(Response::HTTP_OK)->assertJsonCount(0, 'data');
        $this->get('api/legal-pleadings?filter[search]='.$legalPleading->context)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['id' => $legalPleading->id]);
    }
}
