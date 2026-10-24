<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\NewContactMessage;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactSubmissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_user_can_submit_contact_message(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Jean-Luc Godard',
            'email' => 'jeanluc@example.com',
            'subject' => 'Tournage & Montage court métrage',
            'message' => 'Bonjour Aimé, nous aimerions collaborer avec vous sur une série de vidéos pour TikTok.',
        ];

        $response = $this->post(route('contact.store'), $payload);

        $response->assertRedirect(route('contact.create'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'name' => 'Jean-Luc Godard',
            'email' => 'jeanluc@example.com',
            'subject' => 'Tournage & Montage court métrage',
            'is_read' => false,
        ]);

        Mail::assertSent(NewContactMessage::class, function (NewContactMessage $mail): bool {
            return $mail->contact->email === 'jeanluc@example.com';
        });
    }

    public function test_contact_form_requires_valid_fields(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => '',
            'email' => 'invalid-email',
            'subject' => '',
            'message' => 'Court',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
        $this->assertSame(0, Contact::query()->count());
    }

    public function test_contact_form_rate_limiting(): void
    {
        $payload = [
            'name' => 'Test Rate Limit',
            'email' => 'ratelimit@example.com',
            'subject' => 'Demande de test',
            'message' => 'Message de test pour vérifier la limitation à 5 requêtes par minute.',
        ];

        // 5 requests allowed
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post(route('contact.store'), $payload);
            $response->assertRedirect(route('contact.create'));
        }

        // 6th request should be throttled (HTTP 429)
        $response = $this->post(route('contact.store'), $payload);
        $response->assertStatus(429);
    }
}
