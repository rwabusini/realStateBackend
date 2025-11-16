// In AuthServiceProvider::boot()
protected $policies = [
    Property::class => PropertyPolicy::class,
    Unit::class => UnitPolicy::class,
    Booking::class => BookingPolicy::class,
    Contract::class => ContractPolicy::class,
];