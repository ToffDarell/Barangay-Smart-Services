<?php

namespace Database\Factories;

use App\Models\CertificateRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateRequestFactory extends Factory
{
    protected $model = CertificateRequest::class;

    public function definition(): array
    {
        $types = ['clearance', 'indigency', 'residency', 'barangay-id', 'ftjs', 'business-clearance'];
        $type = fake()->randomElement($types);

        return [
            'reference_number'  => strtoupper(fake()->unique()->bothify('???-####-######')),
            'type_code'         => strtoupper(fake()->lexify('???')),
            'certificate_type'  => $type,
            'first_name'        => fake()->firstName(),
            'middle_name'       => null,
            'last_name'         => fake()->lastName(),
            'date_of_birth'     => fake()->date(),
            'civil_status'      => fake()->randomElement(['Single', 'Married', 'Widowed']),
            'gender'            => fake()->randomElement(['Male', 'Female']),
            'address'           => fake()->address(),
            'purok'             => 'Purok ' . fake()->numberBetween(1, 10),
            'contact_number'    => fake()->phoneNumber(),
            'purpose'           => fake()->sentence(),
            'status'            => 'pending',
        ];
    }
}
