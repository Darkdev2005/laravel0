<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @if(auth()->user()->role->name == 'manager')--}}
                    @if(auth()->user()->role_id == 1) {{-- manager --}}
                        <span class='text-blue-500 font-bold text-xl'>Received Applications!</span>
                        <!-- component -->
                        <!-- This is an example component -->
                        {{-- <div class='flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900'> --}}
                            <div
                                class="rounded-xl border p-5 mt-5 shadow-md w-9/12 bg-white dark:bg-gray-800 dark:border-gray-700">
                                <div
                                    class="flex w-full items-center justify-between border-b pb-3 border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                        </div>
                                        <div class="text-lg font-bold text-slate-700 dark:text-slate-200">Joe Smith</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button
                                            class="rounded-2xl border bg-neutral-100 dark:bg-gray-700 dark:text-gray-200 px-3 py-1 text-xs font-semibold">
                                            id:5
                                        </button>
                                        <div class="text-xs text-neutral-500 dark:text-neutral-400">2025-09-24 16:39:03
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-3">
                                    <div class="mb-3 text-xl font-bold text-slate-800 dark:text-slate-100">
                                        Nulla sed leo tempus, feugiat velit vel, rhoncus neque?
                                    </div>
                                    <div class="text-sm text-neutral-600 dark:text-neutral-300">
                                        Aliquam a tristique sapien, nec bibendum urna.
                                        Maecenas convallis dignissim turpis, non suscipit mauris interdum at.
                                        Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo,
                                        ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum
                                        mauris consequat nec. Curabitur eget feugiat massa
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-slate-500 dark:text-slate-400">
                                        email@email.com{{-- <div class="flex space-x-4 md:space-x-8">
                                            <div
                                                class="flex cursor-pointer items-center transition hover:text-slate-600 dark:hover:text-slate-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                                </svg>
                                                <span>125</span>
                                            </div>
                                            <div
                                                class="flex cursor-pointer items-center transition hover:text-slate-600 dark:hover:text-slate-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                </svg>
                                                <span>4</span>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div
                                class="rounded-xl border p-5 mt-5 shadow-md w-9/12 bg-white dark:bg-gray-800 dark:border-gray-700">
                                <div
                                    class="flex w-full items-center justify-between border-b pb-3 border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                        </div>
                                        <div class="text-lg font-bold text-slate-700 dark:text-slate-200">Joe Smith</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button
                                            class="rounded-2xl border bg-neutral-100 dark:bg-gray-700 dark:text-gray-200 px-3 py-1 text-xs font-semibold">
                                            id:5
                                        </button>
                                        <div class="text-xs text-neutral-500 dark:text-neutral-400">2025-09-24 16:39:03
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-3">
                                    <div class="mb-3 text-xl font-bold text-slate-800 dark:text-slate-100">
                                        Nulla sed leo tempus, feugiat velit vel, rhoncus neque?
                                    </div>
                                    <div class="text-sm text-neutral-600 dark:text-neutral-300">
                                        Aliquam a tristique sapien, nec bibendum urna.
                                        Maecenas convallis dignissim turpis, non suscipit mauris interdum at.
                                        Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo,
                                        ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum
                                        mauris consequat nec. Curabitur eget feugiat massa
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-slate-500 dark:text-slate-400">
                                        email@email.com{{-- <div class="flex space-x-4 md:space-x-8">
                                            <div
                                                class="flex cursor-pointer items-center transition hover:text-slate-600 dark:hover:text-slate-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                                </svg>
                                                <span>125</span>
                                            </div>
                                            <div
                                                class="flex cursor-pointer items-center transition hover:text-slate-600 dark:hover:text-slate-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                </svg>
                                                <span>4</span>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            {{--
                        </div>--}}


                    @elseif(auth()->user()->role_id == 2) {{-- client --}}



                        <div class='flex items-center  from-slate-900 via-slate-800 to-slate-900 bg-gradient-to-br'>
                            <div
                                class='w-full max-w-lg px-10 py-8 mx-auto bg-slate-800 rounded-lg shadow-2xl border border-slate-700'>
                                <div class='max-w-md mx-auto space-y-6'>
                                    <form action="" method="POST" enctype="multipart/form-data" ">
                                        @csrf
                                        <h2 class="text-2xl font-bold text-white">Submit your application</h2>

                                        <hr class="my-6 border-slate-600">

                                        <label class="uppercase text-sm font-bold text-slate-300">Subject</label>
                                        <input type="message"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-700 text-white rounded border-2 border-slate-600 focus:border-teal-400 focus:outline-none placeholder-slate-400">




                                        <label class="uppercase text-sm font-bold text-slate-300">Message</label>
                                        <textarea rows="5"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-700 text-white rounded border-2 border-slate-600 focus:border-teal-400 focus:outline-none placeholder-slate-400"
                                            name="" id=""></textarea>

                                        <label class="uppercase text-sm font-bold text-slate-300">File</label>
                                        <input type="file"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-700 text-white rounded border-2 border-slate-600 focus:border-teal-400 focus:outline-none placeholder-slate-400">



                                        <input type="submit"
                                            class="py-3 px-6 my-2 bg-teal-600 text-white font-medium rounded hover:bg-teal-500 cursor-pointer ease-in-out duration-300 w-full transition-colors"
                                            value="Send">
                                    </form>
                                </div>
                            </div>
                        </div>


                        </html>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>