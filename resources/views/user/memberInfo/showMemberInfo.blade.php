<x-app-layout>
    <div class="grid grid-cols-11 justify-center">
        <div class="col-span-2">
            @include('user.sidebar.sidebar')
        </div>
        <div class="col-span-9 pl-6">
            <div class="container mx-auto mt-5">
                <h1 class="text-2xl font-bold">Enter Member ID</h1>
                <form action="{{ route('user.memberInfo.showMemberInfo') }}" method="GET" class="mt-4">
                    <div class="mb-4">
                        <label for="Member_ID" class="block text-gray-50">Member ID</label>
                        <input list="members_list" id="Member_ID" name="Member_ID" 
                               class="border rounded-lg p-2 w-full text-gray-900" required placeholder="Type to search...">
                        
                        <datalist id="members_list">
                            @if ($members->isNotEmpty())
                                @foreach($members as $member)
                                    <option value="{{ $member->Member_ID }}">{{ $member->Member_ID }} - {{ $member->Name }}</option>
                                @endforeach
                            @endif
                        </datalist>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
                </form>
            </div>

            <div class="container mx-auto mt-5">
                @if (isset($selectedMember))
                    <h1 class="text-2xl font-bold">Member Information</h1>
                    <div class="bg-white shadow-md rounded-lg p-6 mt-4 dark:bg-gray-900">
                        <table class="table-auto w-full">
                            <tbody>
                                <tr><td class="border px-4 py-2"><strong>Member ID:</strong></td><td class="border px-4 py-2">{{ $selectedMember->Member_ID }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Member Name:</strong></td><td class="border px-4 py-2">{{ $selectedMember->Name }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Father's Name:</strong></td><td class="border px-4 py-2">{{ $selectedMember->FatherName }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Mother's Name:</strong></td><td class="border px-4 py-2">{{ $selectedMember->MotherName }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Spouse's Name:</strong></td><td class="border px-4 py-2">{{ $selectedMember->SpouseName }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Permanent Address:</strong></td><td class="border px-4 py-2">{{ $selectedMember->PerAddress }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Present Address:</strong></td><td class="border px-4 py-2">{{ $selectedMember->MailAddress }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Mobile Number:</strong></td><td class="border px-4 py-2">{{ $selectedMember->PhoneNumber }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Email:</strong></td><td class="border px-4 py-2">{{ $selectedMember->EMail }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Date of Birth:</strong></td><td class="border px-4 py-2">{{ $selectedMember->DateOfBirth }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>National ID Number:</strong></td><td class="border px-4 py-2">{{ $selectedMember->NID }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Occupation:</strong></td><td class="border px-4 py-2">{{ $selectedMember->Occupation }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Educational Qualification:</strong></td><td class="border px-4 py-2">{{ $selectedMember->EducationalQualification }}</td></tr>
                                <tr><td class="border px-4 py-2"><strong>Balance:</strong></td><td class="border px-4 py-2">{{ $selectedMember->CurrentAmount }}</td></tr>
                                <tr>
                                    <td class="border px-4 py-2"><strong>Image:</strong></td>
                                    <td class="border px-4 py-2">
                                      
                                        @if ($selectedMember->Image)
                                            <img src="{{ $selectedMember->Image }}" alt="Member Image" style="max-width: 150px;" class="rounded">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2"><strong>Signature:</strong></td>
                                    <td class="border px-4 py-2">
                                        @if ($selectedMember->Signature)
                                            <img src="{{ $selectedMember->Signature }}" alt="Member Signature" style="max-width: 150px;" class="rounded">
                                        @else
                                            <p>No signature available</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-xl font-bold mt-6">Nominees</h2>
                    @if ($selectedMember->nominees->isEmpty())
                        <p>No nominees found for this member.</p>
                    @else
                        @foreach ($selectedMember->nominees as $index => $nominee)
                            <div class="bg-white shadow-md rounded-lg p-4 mt-4 dark:bg-gray-900">
                                <h3 class="font-bold">Nominee {{ $index + 1 }}</h3>
                                <table class="table-auto w-full mt-2">
                                    <tbody>
                                        <tr><td class="border px-4 py-2"><strong>Nominee Name:</strong></td><td class="border px-4 py-2">{{ $nominee->Name }}</td></tr>
                                        <tr><td class="border px-4 py-2"><strong>Age:</strong></td><td class="border px-4 py-2">{{ $nominee->Age }}</td></tr>
                                        <tr><td class="border px-4 py-2"><strong>Address:</strong></td><td class="border px-4 py-2">{{ $nominee->Address }}</td></tr>
                                        <tr><td class="border px-4 py-2"><strong>Relation:</strong></td><td class="border px-4 py-2">{{ $nominee->Relation }}</td></tr>
                                        <tr><td class="border px-4 py-2"><strong>Get Percentage:</strong></td><td class="border px-4 py-2">{{ $nominee->Percentage }}%</td></tr>
                                        <tr>
                                            <td class="border px-4 py-2"><strong>Nominee Image:</strong></td>
                                            <td class="border px-4 py-2">
                                                @if ($nominee->Image)
                                                    <img src="{{ $nominee->Image }}" alt="Nominee Image" style="max-width: 150px;" class="rounded">
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @endif
                @else
                    <p>No member found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
