<?php

namespace Tests\Feature;

use App\Models\CertificateRequest;
use App\Services\ReferenceNumberService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificateRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_request_form_is_accessible(): void
    {
        $response = $this->get(route('request.form', 'clearance'));
        $response->assertOk();
    }

    public function test_public_request_form_404_for_invalid_type(): void
    {
        $response = $this->get(route('request.form', 'invalid-type'));
        $response->assertNotFound();
    }

    public function test_public_can_submit_certificate_request(): void
    {
        $response = $this->post(route('request.submit', 'clearance'), [
            'first_name'     => 'Juan',
            'middle_name'    => 'Dela',
            'last_name'      => 'Cruz',
            'date_of_birth'  => '1990-01-01',
            'civil_status'   => 'Single',
            'gender'         => 'Male',
            'address'        => '123 Main St',
            'purok'          => 'Purok 1',
            'contact_number' => '09171234567',
            'purpose'        => 'Employment',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseCount('certificate_requests', 1);

        $cert = CertificateRequest::first();
        $this->assertEquals('CLR', $cert->type_code);
        $this->assertEquals('clearance', $cert->certificate_type);
        $this->assertEquals('Juan Dela Cruz', $cert->full_name);
        $this->assertEquals('pending', $cert->status);
    }

    public function test_reference_number_is_formatted_correctly(): void
    {
        CertificateRequest::factory()->create([
            'reference_number' => 'CLR-' . now()->year . '-000005',
            'created_at'       => now(),
        ]);

        $ref = ReferenceNumberService::generate('clearance');
        $this->assertEquals('CLR-' . now()->year . '-000006', $ref);
        $this->assertStringStartsWith('CLR-' . now()->year . '-', $ref);
    }

    public function test_full_name_accessor_works_without_middle_name(): void
    {
        $cert = CertificateRequest::factory()->create([
            'first_name'  => 'Maria',
            'middle_name' => null,
            'last_name'   => 'Santos',
        ]);

        $this->assertEquals('Maria Santos', $cert->full_name);
    }

    public function test_public_can_search_tracked_request(): void
    {
        $cert = CertificateRequest::factory()->create();

        $response = $this->post(route('track.search'), [
            'reference_number' => $cert->reference_number,
        ]);

        $response->assertOk();
        $response->assertSee($cert->reference_number);
    }

    public function test_public_sees_message_for_invalid_reference(): void
    {
        $response = $this->post(route('track.search'), [
            'reference_number' => 'NONEXISTENT-123',
        ]);

        $response->assertOk();
        $response->assertSee('No Request Found');
    }

    public function test_unauthenticated_cannot_access_admin(): void
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_can_access_dashboard(): void
    {
        CertificateRequest::factory()->count(3)->create();

        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard'));
        $response->assertOk();
    }

    public function test_reference_number_generates_sequential(): void
    {
        CertificateRequest::factory()->create([
            'reference_number' => 'CLR-' . now()->year . '-000001',
            'created_at'       => now(),
        ]);

        $ref = ReferenceNumberService::generate('clearance');
        $this->assertEquals('CLR-' . now()->year . '-000002', $ref);
    }
}
