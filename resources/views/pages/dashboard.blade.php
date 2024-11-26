@include('layouts.header')
@include('layouts.nav-2')
@include('layouts.modals')

<div class="grow p-4 grid md:grid-cols-5 lg:grid-cols-7 xl:grid-cols-5 gap-3">
    <div class="md:col-span-2 lg:col-span-2 xl:col-span-1 p-2 pt-14">
        <div class="hidde relative shadow border rounded-lg p-2.5">
            <div class="absolute top-[-12%] left-[-2%] h-24 w-24 rounded-full border-2 border-green-600 overflow-hidden">
                <img class="w-full h-full object-cover object-center rounded-full"
                    src="{{ asset('storage/public/uploads/upload_photo/' . $documents->photo) }}" alt="User Photo">
            </div>
            <div class="mb-4 text-right">
                <button type="button" data-modal-target="edit_profile" data-modal-toggle="edit_profile"
                    class="h-8 w-8 rounded-full border border-gray-200 hover:border-gray-300 bg-gray-100 hover:bg-gray-200"
                    title="edit profile"></button>
            </div>
            <div class="space-y-1">
                <p class="text-sm">{{ $userDetails->full_name }}</p>
                <p class="text-sm text-gray-500"><i class="bi bi-telephone pr-1"></i>+91 {{ $userDetails->phone }}</p>
            </div>
            <div class="space-y-4 pt-5">
                <div class="flex">
                    <div class="h-10 w-10 border border-gray-400 rounded-md flex"><i class="fa fa-quora m-auto"></i>
                    </div>
                    <div class="pl-2 flex flex-col justify-center">
                        <p class="text-xs text-gray-500 font-medium">Qualification</p>
                        @if ($userDetails->high_qual == 1)
                            <p class="text-md text-gray-800 Nunito">HSLC</p>
                        @endif
                    </div>
                </div>
                <div class="flex">
                    <div class="h-10 w-10 border border-gray-400 rounded-md flex"><i class="fa fa-arrows-h m-auto"></i>
                    </div>
                    <div class="pl-2 flex flex-col justify-center">
                        <p class="text-xs text-gray-500 font-medium">Cast/ Category</p>
                        @if ($userDetails->category_id == 1)
                            <p class="text-md text-gray-800 Nunito">General</p>
                        @elseif ($userDetails->category_id == 2)
                            <p class="text-md text-gray-800 Nunito">OBC</p>
                        @elseif ($userDetails->category_id == 3)
                            <p class="text-md text-gray-800 Nunito">MOBC</p>
                        @elseif ($userDetails->category_id == 4)
                            <p class="text-md text-gray-800 Nunito">SC</p>
                        @elseif ($userDetails->category_id == 5)
                            <p class="text-md text-gray-800 Nunito">ST(P)</p>
                        @else
                            <p class="text-md text-gray-800 Nunito">ST(H)</p>
                        @endif
                    </div>
                </div>
                <div class="flex">
                    <div class="h-10 w-10 border border-gray-400 rounded-md flex"><i
                            class="fa fa-birthday-cake m-auto"></i></div>
                    <div class="pl-2 flex flex-col justify-center">
                        <p class="text-xs text-gray-500 font-medium">Date of Birth</p>
                        <p class="text-md text-gray-800 Nunito">{{ $userDetails->dob }}</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="h-10 w-10 border border-gray-400 rounded-md flex"><i class="bi bi-bezier2 m-auto"></i>
                    </div>
                    <div class="pl-2 flex flex-col justify-center">
                        <p class="text-xs text-gray-500 font-medium">Gender</p>
                        @if ($userDetails->gender_id == 1)
                            <p class="text-md text-gray-800 Nunito">Male</p>
                        @elseif($userDetails->gender_id == 2)
                            <p class="text-md text-gray-800 Nunito">Male</p>
                        @else
                            <p class="text-md text-gray-800 Nunito">Others</p>
                        @endif
                    </div>
                </div>
                <div class="flex">
                    <div class="h-10 w-10 border border-gray-400 rounded-md flex"><i
                            class="bi bi-vector-pen m-auto"></i></div>
                    <div class="pl-2 flex flex-col justify-center">
                        <p class="text-xs text-gray-500 font-medium">Signature</p>
                        <img class="mt-2 inline-block h-14 w-auto border "
                            src="{{ asset('storage/public/uploads/upload_signature/' . $documents->signature) }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:col-span-3 lg:col-span-5 xl:col-span-4 p-2 md:pt-14">
        <div class="h-full space-y-2">
            <div class="p-4 grow border border-gray-300 rounded-lg flex">
                <div class="m-auto text-center space-y-3">
                    {{-- <p class="text-2xl font-medium TimesNR">" MIZOPOL02356487 "</p>
					<p class="md:text-2xl text-green-600 font-medium">You have successfully registered!</p> --}}
                    <p class="text-sm">For the post of</p>
                    <div class="flex flex-wrap items-center justify-center gap-3">
                        @foreach ($preferences as $p)
                            @if ($p->preferences == 1)
                                <span
                                    class="inlone-block p-2 px-4 w-full md:w-auto border rounded-xl border-blue-600"><i
                                        class="bi bi-1-circle text-blue-800 pr-2"></i>{{ $p->post }}</span>
                            @endif
                            @if ($p->preferences == 2)
                                <span
                                    class="inlone-block p-2 px-4 w-full md:w-auto border rounded-xl border-blue-600"><i
                                        class="bi bi-2-circle text-blue-800 pr-2"></i>{{ $p->post }}</span>
                            @endif
                            @if ($p->preferences == 3)
                                <span
                                    class="inlone-block p-2 px-4 w-full md:w-auto border rounded-xl border-blue-600"><i
                                        class="bi bi-3-circle text-blue-800 pr-2"></i>{{ $p->post }}</span>
                            @endif
                        @endforeach
                    </div>

                    <p class="text-xs font-medium text-gray-500">(Post's are displayed in respect to preference order)
                    </p>
                    <div class="pt-6">
                        <a class="inline-block hover:text-blue-600" href="{{ route('download_ack') }}"><i
                                class="bi bi-download pr-1"></i>Download Acknowledgement Slip</a>
                    </div>
                </div>
            </div>
            {{-- <div class="flex flex-wrap gap-4 lg:gap-2 xl:gap-4">
				<div class="shadow border rounded-lg p-2.5 lg:p-1.5 xl:p-2.5 flex gap-3 lg:gap-1 xl:gap-3">
					<div class="">
						<p class="TimesNR bg-gray-300 h-10 w-10 lg:h-7 lg:w-7 xl:h-10 xl:w-10 text-2xl lg:text-lg xl:text-2xl flex justify-center items-center rounded-lg">
							P
						</p>
					</div>
					<div class="space-y-4 lg:space-y-2 xl:space-y-4">
						<div class="py-2 lg:py-0.5 xl:py-2">
							<p class="text-sm">Post's Applied for</p>
							<hr class="mt-2">
						</div>
						<div class="flex flex-wrap gap-2">
							<p class="p-1 flex items-center text-xs lg:text-[0.60rem] xl:text-xs border border-blue-600 rounded-lg"><i class="bi bi-1-circle-fill text-blue-600 text-xs pr-1"></i>Armed Branch</p>
							<p class="p-1 flex items-center text-xs lg:text-[0.60rem] xl:text-xs border border-violet-600 rounded-lg"><i class="bi bi-2-circle-fill text-violet-600 text-xs pr-1"></i>Unarmed Branch</p>
							<p class="p-1 flex items-center text-xs lg:text-[0.60rem] xl:text-xs border border-fuchsia-600 rounded-lg"><i class="bi bi-3-circle-fill text-fuchsia-600 text-xs pr-1"></i>Condtable</p>
						</div>
						<div class="space-y-1">
							<p class="text-xs lg:text-[0.65rem] xl:text-xs text-gray-400">Last date of registartion: 22/02/2025</p>
							<p class="text-xs lg:text-[0.65rem] xl:text-xs text-gray-400">Exam Date: Not Declared Yet.</p>
						</div>
						<div class="space-y-2">
							<div class="text-sm flex items-center justify-between">
								<p class="text-sm lg:text-xs xl:text-sm"><span class="inline-block px-2 lg:px-1.5 xl:px-2 py-0.5 lg:py-0 xl:py-0.5 bg-gray-200 rounded mr-2">₹</span>Payment:</p>
								<span class="block text-green-600 text-sm lg:text-xs xl:text-sm">Paid</span></div>
							<div class="text-sm flex items-center justify-between">
								<p class="text-sm lg:text-xs xl:text-sm"><span class="inline-block px-1.5 lg:px-1 xl:px-1.5 py-0.5 bg-gray-200 rounded mr-2"><i class="bi bi-vector-pen text-sm lg:text-xs xl:text-sm"></i></span>Registration:</p>
								<span class="block text-blue-600 text-sm lg:text-xs xl:text-sm">Completed</span></div>
						</div>
						<hr>
						<div class="text-center">
							<a class="block text-xs lg:text-[0.65rem] xl:text-xs font-medium text-gray-700 hover:text-blue-600" href=""><i class="bi bi-download pr-1"></i>Download Acknowledgement Slip</a>
						</div>
					</div>
				</div>
				<div class="shadow border rounded-lg p-2.5 lg:p-1.5 xl:p-2.5 flex gap-3 lg:gap-1 xl:gap-3">
					<div class="">
						<p class="TimesNR bg-gray-300 h-10 w-10 lg:h-7 lg:w-7 xl:h-10 xl:w-10 text-2xl lg:text-lg xl:text-2xl flex justify-center items-center rounded-lg">
							P
						</p>
					</div>
					<div class="space-y-4 lg:space-y-2 xl:space-y-4">
						<div class="py-2 lg:py-0.5 xl:py-2">
							<p class="text-sm">Post's Applied for</p>
							<hr class="mt-2">
						</div>
						<div class="flex flex-wrap gap-2">
							<p class="p-1 flex items-center text-xs lg:text-[0.60rem] xl:text-xs border border-blue-600 rounded-lg"><i class="bi bi-1-circle-fill text-blue-600 text-xs pr-1"></i>Armed Branch</p>
							<p class="p-1 flex items-center text-xs lg:text-[0.60rem] xl:text-xs border border-violet-600 rounded-lg"><i class="bi bi-2-circle-fill text-violet-600 text-xs pr-1"></i>Unarmed Branch</p>
							<p class="p-1 flex items-center text-xs lg:text-[0.60rem] xl:text-xs border border-fuchsia-600 rounded-lg"><i class="bi bi-3-circle-fill text-fuchsia-600 text-xs pr-1"></i>Condtable</p>
						</div>
						<div class="space-y-1">
							<p class="text-xs lg:text-[0.65rem] xl:text-xs text-gray-400">Last date of registartion: 22/02/2025</p>
							<p class="text-xs lg:text-[0.65rem] xl:text-xs text-gray-400">Exam Date: Not Declared Yet.</p>
						</div>
						<div class="space-y-2">
							<div class="text-sm flex items-center justify-between">
								<p class="text-sm lg:text-xs xl:text-sm"><span class="inline-block px-2 lg:px-1.5 xl:px-2 py-0.5 lg:py-0 xl:py-0.5 bg-gray-200 rounded mr-2">₹</span>Payment:</p>
								<span class="block text-green-600 text-sm lg:text-xs xl:text-sm">Paid</span></div>
							<div class="text-sm flex items-center justify-between">
								<p class="text-sm lg:text-xs xl:text-sm"><span class="inline-block px-1.5 lg:px-1 xl:px-1.5 py-0.5 bg-gray-200 rounded mr-2"><i class="bi bi-vector-pen text-sm lg:text-xs xl:text-sm"></i></span>Registration:</p>
								<span class="block text-blue-600 text-sm lg:text-xs xl:text-sm">Completed</span></div>
						</div>
						<hr>
						<div class="text-center">
							<a class="block text-xs lg:text-[0.65rem] xl:text-xs font-medium text-gray-700 hover:text-blue-600" href=""><i class="bi bi-download pr-1"></i>Download Acknowledgement Slip</a>
						</div>
					</div>
				</div>
				<div class="shadow border rounded-lg p-2.5 flex gap-3">
					<div class="">
						<p class="TimesNR bg-gray-300 h-10 w-10 text-2xl flex justify-center items-center rounded-lg">
							P
						</p>
					</div>
					<div class="space-y-4">
						<div class="py-2">
							<p class="">Post's Applied for</p>
							<hr class="mt-2">
						</div>
						<div class="flex flex-wrap gap-2">
							<p class="p-1 flex items-center text-xs border border-blue-600 rounded-lg"><i class="bi bi-1-circle-fill text-blue-600 text-xs pr-1"></i>Armed Branch</p>
							<p class="p-1 flex items-center text-xs border border-violet-600 rounded-lg"><i class="bi bi-2-circle-fill text-violet-600 text-xs pr-1"></i>Unarmed Branch</p>
							<p class="p-1 flex items-center text-xs border border-fuchsia-600 rounded-lg"><i class="bi bi-3-circle-fill text-fuchsia-600 text-xs pr-1"></i>Condtable</p>
						</div>
						<div class="space-y-1">
							<p class="text-xs text-gray-400">Last date of registartion: 22/02/2025</p>
							<p class="text-xs text-gray-400">Exam Date: Not Declared Yet.</p>
						</div>
						<div class="space-y-2">
							<div class="text-sm flex items-center justify-between">
								<p class=""><span class="inline-block px-2 py-0.5 bg-gray-200 rounded mr-2">₹</span>Payment:</p>
								<span class="block text-red-600">Declined</span></div>
							<div class="text-sm flex items-center justify-between">
								<p class=""><span class="inline-block px-1.5 py-0.5 bg-gray-200 rounded mr-2"><i class="bi bi-vector-pen"></i></span>Registration:</p>
								<span class="block text-yellow-600">Pending</span></div>
						</div>
						<hr>
						<div class="text-center">
							<p class="text-xs text-gray-500">Please complete registartion before the date exceeds.</p>
						</div>
					</div>
				</div>
				<div class="shadow border rounded-lg p-2.5 flex gap-3">
					<div class="">
						<p class="TimesNR bg-gray-300 h-10 w-10 text-2xl flex justify-center items-center rounded-lg">
							P
						</p>
					</div>
					<div class="space-y-4">
						<div class="py-2">
							<p class="">Post's Applied for</p>
							<hr class="mt-2">
						</div>
						<div class="flex flex-wrap gap-2">
							<p class="p-1 flex items-center text-xs border border-blue-600 rounded-lg"><i class="bi bi-1-circle-fill text-blue-600 text-xs pr-1"></i>Armed Branch</p>
							<p class="p-1 flex items-center text-xs border border-violet-600 rounded-lg"><i class="bi bi-2-circle-fill text-violet-600 text-xs pr-1"></i>Unarmed Branch</p>
							<p class="p-1 flex items-center text-xs border border-fuchsia-600 rounded-lg"><i class="bi bi-3-circle-fill text-fuchsia-600 text-xs pr-1"></i>Condtable</p>
						</div>
						<div class="space-y-1">
							<p class="text-xs text-gray-400">Last date of registartion: 22/02/2025</p>
							<p class="text-xs text-gray-400">Exam Date: Not Declared Yet.</p>
						</div>
						<div class="space-y-2">
							<div class="text-sm flex items-center justify-between">
								<p class=""><span class="inline-block px-2 py-0.5 bg-gray-200 rounded mr-2">₹</span>Payment:</p>
								<span class="block text-yellow-600">Pending</span></div>
							<div class="text-sm flex items-center justify-between">
								<p class=""><span class="inline-block px-1.5 py-0.5 bg-gray-200 rounded mr-2"><i class="bi bi-vector-pen"></i></span>Registration:</p>
								<span class="block text-yellow-600">Pending</span></div>
						</div>
						<hr>
						<div class="text-center">
							<p class="text-xs text-gray-500">Please complete registartion before the date exceeds.</p>
						</div>
					</div>
				</div>
				<div class="shadow border rounded-lg p-2.5 flex gap-3">
					<div class="">
						<p class="TimesNR bg-gray-300 h-10 w-10 text-2xl flex justify-center items-center rounded-lg">
							P
						</p>
					</div>
					<div class="space-y-4">
						<div class="py-2">
							<p class="">Post's Applied for</p>
							<hr class="mt-2">
						</div>
						<div class="flex flex-wrap gap-2">
							<p class="p-1 flex items-center text-xs border border-blue-600 rounded-lg"><i class="bi bi-1-circle-fill text-blue-600 text-xs pr-1"></i>Armed Branch</p>
							<p class="p-1 flex items-center text-xs border border-violet-600 rounded-lg"><i class="bi bi-2-circle-fill text-violet-600 text-xs pr-1"></i>Unarmed Branch</p>
							<p class="p-1 flex items-center text-xs border border-fuchsia-600 rounded-lg"><i class="bi bi-3-circle-fill text-fuchsia-600 text-xs pr-1"></i>Condtable</p>
						</div>
						<div class="space-y-1">
							<p class="text-xs text-gray-400">Last date of registartion: 22/02/2025</p>
							<p class="text-xs text-gray-400">Exam Date: Not Declared Yet.</p>
						</div>
						<div class="space-y-2">
							<div class="text-sm flex items-center justify-between">
								<p class=""><span class="inline-block px-2 py-0.5 bg-gray-200 rounded mr-2">₹</span>Payment:</p>
								<span class="block text-red-600">Expired</span></div>
							<div class="text-sm flex items-center justify-between">
								<p class=""><span class="inline-block px-1.5 py-0.5 bg-gray-200 rounded mr-2"><i class="bi bi-vector-pen"></i></span>Registration:</p>
								<span class="block text-red-600">Expired</span></div>
						</div>
						<hr>
						<div class="text-center">
							<p class="text-xs text-gray-500">Registartion process is over. Better luck next time.</p>
						</div>
					</div>
				</div>
			</div> --}}
        </div>
    </div>
</div>

@include('layouts.footer')
