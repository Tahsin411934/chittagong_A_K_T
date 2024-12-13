<x-app-layout>
    <div class=" px-4 grid grid-cols-12 dark:text-white">
        <div class="md:col-span-2">
            @include('Admin.sidebar.sidebar')
        </div>

        <div class="md:col-span-10 mt-5">
            <h1 class="text-2xl font-bold mb-4">Member Information</h1>
            <div class="overflow-x-auto">
                <table id="example" class="table-auto w-full border-collapse border border-gray-300 text-sm">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-slate-950">
                            <th class="border border-gray-300 px-4 py-2">Member ID</th>
                            <th class="border border-gray-300 px-4 py-2"> Name</th>
                            <th class="border border-gray-300 px-4 py-2">Father Name</th>
                            <th class="border border-gray-300 px-4 py-2">Mother Name</th>
                            <th class="border border-gray-300 px-4 py-2">Current Amount</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $user)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->Member_ID }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->Name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->FatherName }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->MotherName }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->CurrentAmount }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button onclick="openModal({{ json_encode($user) }})"
                                    class="text-blue-50 btn bg-gray-900 hover:underline hover:bg-slate-900">
                                    View Details & Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg w-3/4 dark:text-gray-100">
            <h2 class="text-xl font-bold mb-4">View & Edit Member Information</h2>
            <form method="POST" action="{{ route('user.memberInfo.updateMember') }}">
                @csrf
                @method('PUT')

                <input type="hidden" id="Member_ID" name="Member_ID">

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="Name" class="block font-medium">Name</label>
                        <input type="text" id="Name" name="Name" class="form-input dark:bg-slate-700 w-full border-gray-300">
                    </div>
                    <div>
                        <label for="FatherName" class="block font-medium">Father's Name</label>
                        <input type="text" id="FatherName" name="FatherName" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="MotherName" class="block font-medium">Mother's Name</label>
                        <input type="text" id="MotherName" name="MotherName" class="form-input bg-slate-700  w-full border-gray-300">
                    </div>

                    <div>
                        <label for="SpouseName" class="block font-medium">Spouse's Name</label>
                        <input type="text" id="SpouseName" name="SpouseName" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="PerAddress" class="block font-medium">Permanent Address</label>
                        <input type="text" id="PerAddress" name="PerAddress" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="MailAddress" class="block font-medium">Mailing Address</label>
                        <input type="text" id="MailAddress" name="MailAddress" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>

                    <div>
                        <label for="PhoneNumber" class="block font-medium">Phone Number</label>
                        <input type="text" id="PhoneNumber" name="PhoneNumber" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="Email" class="block font-medium">Email</label>
                        <input type="email" id="EMail" name="EMail" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="DateOfBirth" class="block font-medium">Date of Birth</label>
                        <input type="date" id="DateOfBirth" name="DateOfBirth" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>

                    <div>
                        <label for="NID" class="block font-medium">NID</label>
                        <input type="text" id="NID" name="NID" class="form-input w-full dark:bg-slate-700  border-gray-300">
                    </div>
                    <div>
                        <label for="Date" class="block font-medium">Date</label>
                        <input type="date" id="Date" name="Date" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="Occupation" class="block font-medium">Occupation</label>
                        <input type="text" id="Occupation" name="Occupation" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>

                    <div>
                        <label for="EducationalQualification" class="block font-medium">Educational Qualification</label>
                        <input type="text" id="EducationalQualification" name="EducationalQualification" class="dark:bg-slate-700  form-input w-full border-gray-300">
                    </div>
                    <div>
                        <label for="MemberOfAkhondomondoli" class="block font-medium">Member of Akhondomondoli</label>
                        <input type="text" id="MemberOfAkhondomondoli" name="MemberOfAkhondomondoli" class="dark:bg-slate-700  form-input w-full border-gray-300">
                    </div>
                    <div>
                        <label for="AddressOfAkhondomondoli" class="block font-medium">Address of Akhondomondoli</label>
                        <input type="text" id="AddressOfAkhondomondoli" name="AddressOfAkhondomondoli" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>

                    <div>
                        <label for="VerifiedBy" class="block font-medium">Verified By</label>
                        <input type="text" id="VerifiedBy" name="VerifiedBy" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="Image" class="block font-medium">Image</label>
                        <input type="text" id="Image" name="Image" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                    <div>
                        <label for="Signature" class="block font-medium">Signature</label>
                        <input type="text" id="Signature" name="Signature" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>

                    <div>
                        <label for="CurrentAmount" class="block font-medium">Current Amount</label>
                        <input type="text" id="CurrentAmount" name="CurrentAmount" class="form-input dark:bg-slate-700  w-full border-gray-300">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 dark:bg-slate-700  rounded mr-2">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Script -->
    <script>
    function openModal(user) {
        document.getElementById('editModal').classList.remove('hidden');

        Object.keys(user).forEach(key => {
            if (document.getElementById(key)) {
                document.getElementById(key).value = user[key];
            }
        });
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
    </script>
</x-app-layout>
