<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KycFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_kyc_submission_moves_user_to_in_review(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'username' => 'kyc-user',
            'status' => 0,
        ]);

        $response = $this
            ->actingAs($user)
            ->post(route('user.submitKyc'), [
                'phone' => '+2348000000000',
                'telegram' => '@kycuser',
                'country' => 'Nigeria',
                'city' => 'Lagos',
                'address' => '12 Marina Road',
                'id_type' => 'passport',
                'id_image_1' => UploadedFile::fake()->image('front.jpg'),
                'id_image_2' => UploadedFile::fake()->image('back.jpg'),
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('user.kycStart'));

        $user->refresh();

        $this->assertSame(1, (int) $user->status);
        $this->assertNotNull($user->id_image_1);
        $this->assertNotNull($user->id_image_2);
        Storage::disk('public')->assertExists($user->id_image_1);
        Storage::disk('public')->assertExists($user->id_image_2);
    }
}
