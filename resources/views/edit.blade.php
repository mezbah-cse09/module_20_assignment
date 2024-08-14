
<x-layout>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-8 text-2xl">
            Contact Mangement System
        </div>
        
        {{-- <a href="{{ route('index') }}"
        class="mt-5 my-5 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 mr-2">
        All Contacts
        </a> --}}
    </div>

    <div class="container mx-auto mt-5">

        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full max-w-[550px] bg-white">
                <div class="mb-5">
                    <h1 class="text-2xl">Edit Contact</h1>
                </div>
                <form action="{{ route('edit',$contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Full Name
                        </label>
                        <input type="text" name="name" id="name" placeholder="Full Name" value="{{old('name')? old('name'):$contact->name}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        <span class="text-red-500">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                            Phone Number
                        </label>
                        <input type="text" name="phone" id="phone" value="{{$contact->phone}}" placeholder="Enter your phone number"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Email Address
                        </label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" value="{{old('email')? old('email'):$contact->email}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        <span class="text-red-500">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Address
                        </label>
                        <input type="text" name="address" id="address" placeholder="Enter your Address" value="{{$contact->address}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="mb-5">
                        <button
                        class="hover:shadow-form w-full rounded-md bg-green-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Update
                        </button>
                    </div>


                </form>
                <div class="mb-5">
                    <button
                    class="hover:shadow-form w-full rounded-md bg-red-600 py-3 px-8 text-center text-base font-semibold text-white outline-none"
                    {{-- onclick="window.location='{{ route("index") }}'"  --}}
                    onclick="window.history.back()"
                    >
                    Cancel
                    </button>
                </div>

            </div>
        </div>

    </div>

</x-layout>