<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border-t-4 border-pink-600">
            <div class="p-8 text-gray-900">
                
                <h2 class="text-3xl font-extrabold text-pink-600 border-b border-gray-100 pb-4 mb-6 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z"></path>
                    </svg>
                    Foodpanda Dashboard
                </h2>

                <div class="mb-8">
                    <p class="text-lg text-gray-700 mb-3">
                        Welcome, <span class="font-bold text-pink-600">{{ Auth::user()->name }}</span>! 🍔🍕
                    </p>
                    <p class="text-gray-500 leading-relaxed max-w-2xl">
                        Browse your favorite restaurants, track your recent food orders, and enjoy super fast delivery straight to your door. What are you craving today?
                    </p>
                </div>

                <div>
                    <button type="button" class="inline-flex items-center justify-center px-8 py-3 text-base font-bold text-white transition-all duration-200 bg-pink-600 border border-transparent rounded-full shadow-md hover:bg-pink-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-600">
                        Browse Restaurants
                    </button>
                </div>
                
            </div>
        </div>
    </div>
</div>
</x-app-layout>
