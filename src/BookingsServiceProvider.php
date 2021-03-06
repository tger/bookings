<?php

declare(strict_types=1);

namespace Tipoff\Bookings;

use Tipoff\Bookings\Models\Booking;
use Tipoff\Bookings\Models\Participant;
use Tipoff\Bookings\Policies\BookingPolicy;
use Tipoff\Bookings\Policies\ParticipantPolicy;
use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class BookingsServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->hasPolicies([
                Booking::class => BookingPolicy::class,
                Participant::class => ParticipantPolicy::class,
            ])
            ->hasNovaResources([
                \Tipoff\Bookings\Nova\Booking::class,
                \Tipoff\Bookings\Nova\Participant::class,
            ])
            ->name('bookings')
            ->hasConfigFile();
    }
}
