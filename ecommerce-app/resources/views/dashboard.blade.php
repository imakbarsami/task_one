<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl">
            <div class="p-8 text-gray-900">
                
                <h2 class="text-3xl font-extrabold text-gray-900 border-b border-gray-100 pb-4 mb-6">
                    E-Commerce Dashboard
                </h2>

                <div class="mb-10">
                    <p class="text-lg text-gray-700 mb-3">
                        Welcome back, <span class="font-bold text-blue-600">{{ Auth::user()->name }}</span>!
                    </p>
                    <p class="text-gray-500 leading-relaxed max-w-2xl">
                        This is your central hub for managing online orders, tracking shipments, and exploring new products. You can also securely access our partner applications directly from here without needing to log in again.
                    </p>
                </div>

                <div>
                    <a href="{{ route('sso.login') }}" class="group relative inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-white transition-all duration-200 bg-pink-600 border border-transparent rounded-full shadow-md hover:bg-pink-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-600">
                        <span>Go to Foodpanda</span>
                        <svg class="w-5 h-5 ml-2 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>
</x-app-layout>
