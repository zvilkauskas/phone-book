<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactSharingTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_can_be_shared_with_user()
    {
        $contact = Contact::factory()->create();
        $user = User::factory()->create();

        $contact->sharedWithUsers()->attach($user->id);

        $this->assertTrue($contact->sharedWithUsers->contains($user->id));
    }
}
