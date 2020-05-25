<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <textarea name="body" class="w-full" placeholder="What's up doc?" required></textarea>


        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="image">
                Upload image
            </label>
            <div class="flex">
                <input class="border border-gray-400 p-2 w-full" type="file" name="image" id="image">
            </div>
            @error('image')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="your avatar" class="rounded-full mr-2" width="50" height="50">

            <button type="submit" class="bg-blue-500 rounded-lg shadow px-10 text-sm text-white h-10 hover:bg-blue-600">
                Publish
            </button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>