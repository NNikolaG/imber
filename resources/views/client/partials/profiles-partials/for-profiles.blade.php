<div class="row">
    @foreach($profiles as $profile)
        @component('client.partials.profiles-partials.single-profile-in-profiles',[
            "profile" => $profile
])
        @endcomponent
    @endforeach
</div>
<div class="row">
    {{ $profiles->withQueryString()->links('pagination::bootstrap-4') }}
</div>
