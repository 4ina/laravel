<x-app>

    <header class="mb-6 relative">
        <div class="relative">
            <img src="/images/default-profile-banner.jpg" alt="No" class="mb-2">
            <img src="{{ $user->avatar }}" alt="No" class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="width:150px; left: 50%">
        </div>
        <div class="flex justify-between items-center mb-6">
            <div style="max-width:270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined{{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                @endcan
                <x-follow_button :user="$user">
                    </x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
        </p>
    </header>

    @include('_timeline', [
    'tweets' => $tweets
    ])
</x-app>