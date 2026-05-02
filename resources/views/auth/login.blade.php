<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form action="/login" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-fields>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" name="email" placeholder="email@address.com" required
                                :value="old('email')" />
                            <x-form-error name="email" />
                        </div>
                    </x-form-fields>

                    <x-form-fields>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" name="password" placeholder="Type your password"
                                type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-fields>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Login</x-form-button>
        </div>
    </form>
</x-layout>


{{-- Gentlemen, I want to share something.

In this example, there are only two parameters, but if for example we have a form with 20 inputs and forget to fill one, we could lose all the entered data. To prevent this, we can use value="{{ old('firstname') }}" && value="{{ old('lastname') }}" in the input fields. This way, the form will retain previously entered values after submission.

The code would look something like this:
<input type="text" name="firstname" id="firstname" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="Shift Leader" required value="{{ old('firstname') }}"> --}}


{{-- Here's another tip, "old" helper function takes a second parameter as fallback value. This mostly applies to edit pages rather than create pages though. Here's an example :

<input name="username" value="{{ old('username', $user->username) }}" /> --}}
