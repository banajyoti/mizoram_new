@include('layouts.header')

@include('layouts.nav-2')
<div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center py-12 px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Payment Details</h2>
            <p class="text-sm text-gray-600">Below are the details of your recent payment transaction.</p>
        </div>

        <!-- Payment Details Section -->
        <div class="space-y-4">
            <!-- Payment Information -->
            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Transaction Information</h3>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Transaction ID:</span>
                    <span class="font-medium">1234567890</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Payment Method:</span>
                    <span class="font-medium">Credit Card (Visa)</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Transaction Date:</span>
                    <span class="font-medium">December 13, 2024</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Status:</span>
                    <span class="font-medium text-green-600">Successful</span>
                </div>
            </div>

            <!-- Payment Amount -->
            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Amount Details</h3>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Total Amount:</span>
                    <span class="font-medium text-gray-800">$100.00</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Discount Applied:</span>
                    <span class="font-medium text-gray-800">-$10.00</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Final Amount:</span>
                    <span class="font-medium text-gray-800 text-xl">$90.00</span>
                </div>
            </div>

            <!-- Billing Information -->
            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Billing Information</h3>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Billing Address:</span>
                    <span class="font-medium">123 Main St, Springfield, IL</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Contact Email:</span>
                    <span class="font-medium">johndoe@example.com</span>
                </div>
            </div>
        </div>

        <!-- Actions Section -->
        <div class="mt-6 flex justify-center gap-4">
            <a href="{{ route('home') }}"
                class="text-white bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg text-sm font-semibold transition duration-300">Go
                to Homepage</a>
            <a href=""
                class="text-blue-600 bg-white border border-blue-600 hover:bg-blue-50 px-6 py-2 rounded-lg text-sm font-semibold transition duration-300">Retry
                Payment</a>
        </div>
    </div>
</div>
@include('layouts.footer')
