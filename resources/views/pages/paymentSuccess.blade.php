@include('layouts.header')

@include('layouts.nav-2')

<div class="min-h-screen bg-green-50 flex flex-col justify-center items-center py-12 px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md text-center">
        <!-- Success Icon -->
        <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-green-500 mx-auto" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Success Message -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Payment Successful!</h2>
        <p class="text-lg text-gray-600 mb-6">Your payment has been successfully processed. Thank you for your purchase!
        </p>

        <!-- Payment Details -->
        <div class="text-left text-sm text-gray-600 mb-6">
            <p><span class="font-semibold">Transaction ID:</span> 1234567890</p>
            <p><span class="font-semibold">Amount Paid:</span> $100.00</p>
            <p><span class="font-semibold">Payment Method:</span> Credit Card</p>
            <p><span class="font-semibold">Date:</span> December 13, 2024</p>
        </div>

        <!-- Call to Action -->
        <a href="{{ route('home') }}"
            class="text-white bg-green-600 hover:bg-green-700 px-6 py-2 rounded-lg text-sm font-semibold transition duration-300">Back
            to Homepage</a>
    </div>
</div>

@include('layouts.footer')
