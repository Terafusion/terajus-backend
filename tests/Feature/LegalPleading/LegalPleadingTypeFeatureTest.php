<?php

namespace Tests\Feature\LegalPleading;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
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
        $this->get('api/legal-pleading-types?filter[name]=xpto')->assertStatus(Response::HTTP_OK)->assertJsonCount(0, 'data');
        $this->get('api/legal-pleading-types?filter[name]=Petição')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => 'Petição Inicial']);
    }
}
