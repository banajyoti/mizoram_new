@include('layouts.header')

@include('layouts.nav-2')

<div class="px-4 grow flex flex-col">
    <div class="mx-auto bg-white p-8 rounded-lg shadow-2xl w-full max-w-md text-center">
        <!-- Success Icon -->
        <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-green-500 mx-auto" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Success Message -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Payment Successful!</h2>
        <p class="text-sm text-gray-600 mb-6">Your payment has been successfully processed.
        </p>

        <!-- Payment Details -->
        <div class="text-left text-sm text-gray-600 mb-6 space-y-1">
            <div class="text-left text-sm text-gray-600 mb-6 space-y-1">
                <p><span class="font-semibold">Candidate Name:</span> {{ $userDetails->full_name ?? 'N/A' }}</p>
                <p><span class="font-semibold">Registration NUmber ID:</span> {{ $userDetails->registration_number ?? 'N/A' }}</p>
                <p><span class="font-semibold">Transaction ID:</span> {{ $userDetails->txnid ?? 'N/A' }}</p>
                <p><span class="font-semibold">Amount Paid:</span>
                    ₹ {{ $userDetails->txnamount }}</p>
                <p><span class="font-semibold">Payment Method:</span> {{ $userDetails->payment_mode ?? 'N/A' }}</p>
                <p><span class="font-semibold">Date:</span>
                    {{ \Carbon\Carbon::parse($userDetails->created_at)->format('F d, Y') }}</p>
            </div>
        </div>
        {{-- <div class="pt-6">
            <!-- Styled Download Button -->
            <a href="{{ route('download_ack') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                <i class="bi bi-download pr-2"></i> Download Acknowledgement Slip
            </a>
        </div><br> --}}

        <!-- Call to Action -->
        <a href="{{ route('dashboard') }}"
            class="text-white bg-green-600 hover:bg-green-700 px-6 py-2 rounded-lg text-sm font-semibold transition duration-300">Back
            to Homepage</a>
    </div>
</div>

@include('layouts.footer')
