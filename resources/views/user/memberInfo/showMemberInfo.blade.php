<x-app-layout>
    <div class="grid  grid-cols-11 justify-center bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 min-h-screen">
        <div class="col-span-2 bg-gray-900 text-white shadow-lg">
            @include('user.sidebar.sidebar')
        </div>
        <div class="col-span-9 w-[95%]  pl-6">
            <div class="container bg-gray-800 w-[95%]  shadow-md rounded-lg p-3 mt-5">
                <h1 class="  font-extrabold text-white">Enter Member ID</h1>
                <form action="{{ route('user.memberInfo.showMemberInfo') }}" method="GET" class="mt-6">
                
                <div class="mb-6 flex gap-5">
                        
                        <input list="members_list" id="Member_ID" name="Member_ID" 
                               class="border border-gray-600 rounded-lg w-[95%]   bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               required placeholder="Type to search...">

                        <datalist id="members_list">
                            @if ($members->isNotEmpty())
                                @foreach($members as $member)
                                    <option value="{{ $member->Member_ID }}">{{ $member->Member_ID }} - {{ $member->Name }}</option>
                                @endforeach
                            @endif
                        </datalist>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold shadow-md">Search</button>
                    </div>
                    
                </form>
            </div>

            <div class="container mx-auto mt-8">
                @if (isset($selectedMember))
                    <h1 class="text-2xl font-prata  font-bold text-gray-100">Member Information</h1>
                    <div class="bg-gray-800 text-gray-100 shadow-lg rounded-lg p-6 mt-4">
                        <table class="table-auto w-full text-left">
                            <tbody class="divide-y divide-gray-700">
                                <tr><td class="py-2 font-semibold">Member ID:</td><td class="py-2">{{ $selectedMember->Member_ID }}</td></tr>
                                <tr><td class="py-2 font-semibold">Member Name:</td><td class="py-2">{{ $selectedMember->Name }}</td></tr>
                                <tr><td class="py-2 font-semibold">Father's Name:</td><td class="py-2">{{ $selectedMember->FatherName }}</td></tr>
                                <tr><td class="py-2 font-semibold">Mother's Name:</td><td class="py-2">{{ $selectedMember->MotherName }}</td></tr>
                                <tr><td class="py-2 font-semibold">Spouse's Name:</td><td class="py-2">{{ $selectedMember->SpouseName }}</td></tr>
                                <tr><td class="py-2 font-semibold">Permanent Address:</td><td class="py-2">{{ $selectedMember->PerAddress }}</td></tr>
                                <tr><td class="py-2 font-semibold">Present Address:</td><td class="py-2">{{ $selectedMember->MailAddress }}</td></tr>
                                <tr><td class="py-2 font-semibold">Mobile Number:</td><td class="py-2">{{ $selectedMember->PhoneNumber }}</td></tr>
                                <tr><td class="py-2 font-semibold">Email:</td><td class="py-2">{{ $selectedMember->EMail }}</td></tr>
                                <tr><td class="py-2 font-semibold">Date of Birth:</td><td class="py-2">{{ $selectedMember->DateOfBirth }}</td></tr>
                                <tr><td class="py-2 font-semibold">National ID Number:</td><td class="py-2">{{ $selectedMember->NID }}</td></tr>
                                <tr><td class="py-2 font-semibold">Occupation:</td><td class="py-2">{{ $selectedMember->Occupation }}</td></tr>
                                <tr><td class="py-2 font-semibold">Educational Qualification:</td><td class="py-2">{{ $selectedMember->EducationalQualification }}</td></tr>
                                <tr><td class="py-2 font-semibold">Balance:</td><td class="py-2">{{ $selectedMember->CurrentAmount }}</td></tr>
                                <tr>
                                    <td class="py-2 font-semibold">Image:</td>
                                    <td class="py-2">
                                        @if ($selectedMember->Image)
                                            <img src="{{ $selectedMember->Image }}" alt="Member Image" class="rounded-lg w-32 h-32 object-cover">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-semibold">Signature:</td>
                                    <td class="py-2">
                                        @if ($selectedMember->Signature)
                                            <img src="{{ $selectedMember->Signature }}" alt="Member Signature" class="rounded-lg w-32 h-32 object-cover">
                                        @else
                                            <p>No signature available</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-2xl font-prata font-bold mt-6 text-gray-100">Nominees</h2>
                    @if ($selectedMember->nominees->isEmpty())
                        <p class="text-gray-300">No nominees found for this member.</p>
                    @else
                        @foreach ($selectedMember->nominees as $index => $nominee)
                            <div class="bg-gray-800 shadow-md rounded-lg p-4 mt-4 text-gray-100">
                                <h3 class="font-bold text-lg">Nominee {{ $index + 1 }}</h3>
                                <table class="table-auto w-full mt-2">
                                    <tbody class="divide-y divide-gray-700">
                                        <tr><td class="py-2 font-semibold">Nominee Name:</td><td class="py-2">{{ $nominee->Name }}</td></tr>
                                        <tr><td class="py-2 font-semibold">Age:</td><td class="py-2">{{ $nominee->Age }}</td></tr>
                                        <tr><td class="py-2 font-semibold">Address:</td><td class="py-2">{{ $nominee->Address }}</td></tr>
                                        <tr><td class="py-2 font-semibold">Relation:</td><td class="py-2">{{ $nominee->Relation }}</td></tr>
                                        <tr><td class="py-2 font-semibold">Get Percentage:</td><td class="py-2">{{ $nominee->Percentage }}%</td></tr>
                                        <tr>
                                            <td class="py-2 font-semibold">Nominee Image:</td>
                                            <td class="py-2">
                                                @if ($nominee->Image)
                                                    <img src="{{ $nominee->Image }}" alt="Nominee Image" class="rounded-lg w-32 h-32 object-cover">
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
                    <p class="text-gray-300">No member found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
