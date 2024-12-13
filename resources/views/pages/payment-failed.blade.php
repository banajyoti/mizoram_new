@include('layouts.header')

@include('layouts.nav-2')
<div class="min-h-screen bg-red-50 flex flex-col justify-center items-center py-12 px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md text-center">
        <!-- Failure Icon -->
        <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-red-500 mx-auto" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <!-- Failure Message -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Payment Failed!</h2>
        <p class="text-lg text-gray-600 mb-6">Unfortunately, your payment could not be processed. Please try again later
            or contact support.</p>

        <!-- Payment Details -->
        <div class="text-left text-sm text-gray-600 mb-6">
            <p><span class="font-semibold">Transaction ID:</span> 1234567890</p>
            <p><span class="font-semibold">Amount Attempted:</span> $100.00</p>
            <p><span class="font-semibold">Payment Method:</span> Credit Card</p>
            <p><span class="font-semibold">Date:</span> December 13, 2024</p>
        </div>

        <!-- Call to Action -->
        <div class="flex justify-center gap-4">
            <a href=""
                class="text-white bg-red-600 hover:bg-red-700 px-6 py-2 rounded-lg text-sm font-semibold transition duration-300">Retry
                Payment</a>
            <a href="{{ route('home') }}"
                class="text-red-600 bg-white border border-red-600 hover:bg-red-50 px-6 py-2 rounded-lg text-sm font-semibold transition duration-300">Go
                Back to Homepage</a>
        </div>
    </div>
</div>
@include('layouts.footer')
