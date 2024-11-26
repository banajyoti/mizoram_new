@if ($registerDetails->permanent_residence == 1)
    <!-- State (Disabled) -->
    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2">
        <div class="h-full flex flex-col">
            <label for="State" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                State <span class="ps-1 text-red-500">*</span>
            </label>
            <select id="p_state_id" name="permanent_address[state_id]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2
                    @if ($registerDetails->permanent_residence == 1) pointer-events-none cursor-not-allowed @endif"
                @if ($registerDetails->permanent_residence == 1) disabled @endif>
                <option value="" selected disabled>Select</option>
                @foreach ($states as $state)
                    @if ($state->id != 17) <!-- Exclude state with id 17 -->
                        <option value="{{ $state->id }}"
                            {{ old('permanent_address.state_id', $userProfiles && $userProfiles->p_state_id ? $userProfiles->p_state_id : 17) == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('permanent_address.state_id')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
@else
    <!-- State (Enabled) -->
    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2">
        <div class="h-full flex flex-col">
            <label for="State" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                State <span class="ps-1 text-red-500">*</span>
            </label>
            <select id="p_state_id" name="permanent_address[state_id]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                required>
                <option value="" selected disabled>Select</option>
                @foreach ($states as $state)
                    @if ($state->id != 17) <!-- Exclude state with id 17 -->
                        <option value="{{ $state->id }}"
                            {{ old('permanent_address.state_id', $userProfiles && $userProfiles->p_state_id ? $userProfiles->p_state_id : '') == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('permanent_address.state_id')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endif
