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

                    @if(auth()->user()->role->name == 'manager')
                        <span class='text-blue-500 font-bold text-xl'>Received Applications!</span>

                        @foreach ($applications as $application)
                            <div
                                class="rounded-xl border p-5 mt-5 shadow-md w-9/12 bg-white dark:bg-gray-800 dark:border-gray-700">
                                <div
                                    class="flex w-full items-center justify-between border-b pb-3 border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                        </div>
                                        <div class="text-lg font-bold text-slate-700 dark:text-slate-200">
                                            {{ $application->user->name }}
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button
                                            class="rounded-2xl border bg-neutral-100 dark:bg-gray-700 dark:text-gray-200 px-3 py-1 text-xs font-semibold">
                                            #{{ $application->id }}
                                        </button>
                                        <div class="text-xs text-neutral-500 dark:text-neutral-400">
                                            {{ $application->created_at->format('Y-m-d H:i:s') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-3">
                                    <div class="mb-3 text-xl font-bold text-slate-800 dark:text-slate-100">
                                        {{ $application->subject }}
                                    </div>
                                    <div class="text-sm text-neutral-600 dark:text-neutral-300">
                                        {{ $application->message }}
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-slate-500 dark:text-slate-400">
                                        {{ $application->user->email }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $applications->links() }}

                   @elseif(auth()->user()->role->name == 'client')
                     @if(session()->has('error'))
                     <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                       <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                           d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                              clip-rule="evenodd"></path>
                           </svg>
                            <div>
                             <span class="font-medium">Xatolik: </span> {{ session('error') }}
                          </div>
                        </div>
                      @endif


                        <div class='flex items-center from-slate-900 via-slate-800 to-slate-900 bg-gradient-to-br'>
                            <div
                                class='w-full max-w-lg px-10 py-8 mx-auto bg-slate-800 rounded-lg shadow-2xl border border-slate-700'>
                                <div class='max-w-md mx-auto space-y-6'>
                                    <form action="{{ route('applications.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="text-2xl font-bold text-white">Submit your application</h2>

                                        <hr class="my-6 border-slate-600">

                                        <label class="uppercase text-sm font-bold text-slate-300">Subject</label>
                                        <input type="text" name="subject" required
                                            class="p-3 mt-2 mb-4 w-full bg-slate-700 text-white rounded border-2 border-slate-600 focus:border-teal-400 focus:outline-none placeholder-slate-400">

                                        <label class="uppercase text-sm font-bold text-slate-300">Message</label>
                                        <textarea rows="5" name="message" required
                                            class="p-3 mt-2 mb-4 w-full bg-slate-700 text-white rounded border-2 border-slate-600 focus:border-teal-400 focus:outline-none placeholder-slate-400"></textarea>

                                        <label class="uppercase text-sm font-bold text-slate-300">File</label>
                                        <input type="file" name="file"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-700 text-white rounded border-2 border-slate-600 focus:border-teal-400 focus:outline-none placeholder-slate-400">

                                        <input type="submit"
                                            class="py-3 px-6 my-2 bg-teal-600 text-white font-medium rounded hover:bg-teal-500 cursor-pointer ease-in-out duration-300 w-full transition-colors"
                                            value="Send">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>