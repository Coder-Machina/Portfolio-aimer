<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\NewContactMessage;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    /**
     * Show the contact form page.
     */
    public function create(): View
    {
        return view('pages.contact');
    }

    /**
     * Store an incoming contact inquiry and trigger immediate email notification.
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $contact = Contact::query()->create($request->validated());

        // [WHY] Notify the client immediately via email whenever a new message is received
        $recipient = setting('contact_email', config('mail.from.address'));

        if ($recipient) {
            try {
                if (class_exists(NewContactMessage::class)) {
                    Mail::to($recipient)->send(new NewContactMessage($contact));
                }
            } catch (Throwable $e) {
                // [WHY] Do not fail user submission if SMTP is temporarily unreachable
                Log::warning('Contact notification mail failed: '.$e->getMessage());
            }
        }

        return redirect()
            ->route('contact.create')
            ->with('success', 'Votre message a bien été envoyé ! Je vous répondrai dans les plus brefs délais.');
    }
}
