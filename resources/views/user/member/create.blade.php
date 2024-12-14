<x-app-layout>
    <style>
        .preview-container {
            margin-bottom: 20px;
        }

        .preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin-top: 22px;
        }
    </style>
    <div class="grid grid-cols-11 dark:bg-gray-900 dark:text-gray-100   font-poppins">
        <div class="col-span-2  shadow-2xl ">
            @include('user.sidebar.sidebar')
        </div>
        <div class="col-span-9">


            
            <div class="w-[70%] mx-auto dark:bg-gray-800 px-5 py-1 ">
            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf

    <div class="p-8 border dark:border-gray-800 border-blue-300 dark:bg-transparent shadow-lg rounded-xl">
        <div class="text-center pb-8 text-xl dark:text-[#95A5BC] font-semibold">
            <h2>Provide Your Information To</h2>
            <h1 class="font-bold font-prata dark:text-white">Be A Member</h1>
        </div>
        <!-- Member Details -->
        <div class="">

            <div class="flex items-center justify-center gap-2">
                <!-- Member ID -->
                <div class="mb-4 form-control w-full">
                    <label for="member_id" class="block dark:text-gray-50 mb-2">Member ID</label>
                    <input type="number" id="member_id" name="member_id" value="{{ $largestMemberId + 1 }}" required class="input-field w-full" readonly>
                </div>

                <!-- Member Name -->
                <div class="mb-4 form-control w-full">
                    <label for="member_name" class="block dark:text-gray-50 mb-2">Member Name</label>
                    <input type="text" id="Name" name="Name" value="{{ old('Name') }}" required class="input-field w-full">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Father's Name -->
                <div class="mb-4 form-control w-full">
                    <label for="FatherName" class="block dark:text-gray-50 mb-2">Father's Name</label>
                    <input type="text" id="FatherName" name="FatherName" value="{{ old('FatherName') }}" required class="input-field w-full">
                </div>

                <!-- Mother's Name -->
                <div class="mb-4 form-control w-full">
                    <label for="MotherName" class="block dark:text-gray-50 mb-2">Mother's Name</label>
                    <input type="text" id="MotherName" name="MotherName" value="{{ old('MotherName') }}" required class="input-field w-full">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Spouse's Name -->
                <div class="mb-4 form-control w-full">
                    <label for="SpouseName" class="block dark:text-gray-50 mb-2">Spouse's Name (Optional)</label>
                    <input type="text" id="SpouseName" name="SpouseName" value="{{ old('SpouseName') }}" class="input-field w-full">
                </div>

                <!-- Mobile Number -->
                <div class="mb-4 form-control w-full">
                    <label for="PhoneNumber" class="block dark:text-gray-50 mb-2">Mobile Number</label>
                    <input type="number" id="PhoneNumber" name="PhoneNumber" value="{{ old('PhoneNumber') }}" class="input-field w-full">
                </div>
            </div>

            <!-- Permanent Address -->
            <div>
                <div class="mb-4">
                    <label for="PerAddress" class="block dark:text-gray-50 mb-2">Permanent Address</label>
                    <textarea id="PerAddress" name="PerAddress" required class="input-field w-full">{{ old('PerAddress') }}</textarea>
                </div>

                <!-- Present Address -->
                <div class="mb-4">
                    <label for="MailAddress" class="block dark:text-gray-50 mb-2">Present Address</label>
                    <textarea id="MailAddress" name="MailAddress" required class="input-field w-full">{{ old('MailAddress') }}</textarea>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Email -->
                <div class="mb-4 form-control w-full">
                    <label for="EMail" class="block dark:text-gray-50 mb-2">Email</label>
                    <input type="email" id="EMail" name="EMail" value="{{ old('EMail') }}" class="input-field w-full">
                </div>

                <!-- Date of Birth -->
                <div class="mb-4 form-control w-full">
                    <label for="DateOfBirth" class="block dark:text-gray-50 mb-2">Date of Birth</label>
                    <input type="date" id="DateOfBirth" name="DateOfBirth" value="{{ old('DateOfBirth') }}" class="input-field w-full">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- National ID Number -->
                <div class="mb-4 form-control w-full">
                    <label for="NID" class="block dark:text-gray-50 mb-2">National ID Number</label>
                    <input type="number" id="NID" name="NID" value="{{ old('NID') }}" class="input-field w-full">
                </div>

                <!-- Occupation -->
                <div class="mb-4 form-control w-full">
                    <label for="Occupation" class="block dark:text-gray-50 mb-2">Occupation</label>
                    <input type="text" id="Occupation" name="Occupation" value="{{ old('Occupation') }}" class="input-field w-full">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Educational Qualification -->
                <div class="mb-4 form-control w-full">
                    <label for="EducationalQualification" class="block dark:text-gray-50 mb-2">Educational Qualification</label>
                    <input type="text" id="EducationalQualification" name="EducationalQualification" value="{{ old('EducationalQualification') }}" class="input-field w-full">
                </div>

                <!-- Akhanda Kalyan Tahabil -->
                <div class="mb-4 form-control w-full">
                    <label for="MemberOfAkhondomondoli" class="block dark:text-gray-50 mb-2">Member of Tahabil</label>
                    <select id="MemberOfAkhondomondoli" name="MemberOfAkhondomondoli" class="input-field w-full">
                        <option value="">Select</option>
                        <option value="chittagong" {{ old('MemberOfAkhondomondoli') == 'chittagong' ? 'selected' : '' }}>
                            Chittagong akhanda kalyan tahabil
                        </option>
                        <option value="dhaka" {{ old('MemberOfAkhondomondoli') == 'dhaka' ? 'selected' : '' }}>
                            Dhaka akhanda kalyan tahabil
                        </option>
                        <option value="coxbazar" {{ old('MemberOfAkhondomondoli') == 'coxbazar' ? 'selected' : '' }}>
                            Cox's Bazar akhanda kalyan tahabil
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Address of Akhandomondoli -->
                <div class="mb-4 form-control w-full">
                    <label for="AddressOfAkhondomondoli" class="block dark:text-gray-50 mb-2">Address Tahabil</label>
                    <input type="text" id="AddressOfAkhondomondoli" name="AddressOfAkhondomondoli" value="{{ old('AddressOfAkhondomondoli') }}" class="input-field w-full">
                </div>
            </div>
        </div>

        <!-- Image and Signature Uploads -->
        <div class="col-span-2 mx-auto w-[85%]">
            <div>
                <div class="flex items-center justify-center gap-10 mt-8">
                    <!-- Image Upload Section -->
                    <div class="flex flex-col">
                        <div class="border border-gray-400 rounded-2xl h-40 w-40 flex items-center justify-center relative mb-4">
                            <div id="image-preview" class="preview-container -mt-5 h-36 w-36 rounded-2xl"></div>
                            <div id="camera-container" class="hidden absolute top-0 left-0 w-full h-full">
                                <video id="video" class="w-full h-full" autoplay></video>
                                <button type="button" class="bg-blue-600 text-white rounded-lg mt-2" onclick="capturePhoto('image')">Capture Image</button>
                                <canvas id="canvas" class="hidden"></canvas>
                            </div>
                        </div>
                        <div class="preview-container" id="image-preview-container">
                            <label for="image" class="block w-36 mb-2">Upload Image</label>
                            <input type="file" id="image" name="image" class="border w-56 p-2" onchange="previewImage('image')">
                            <button type="button" class="bg-slate-700 text-white rounded-lg px-4 py-2 mt-2" onclick="startCamera('image')">Open Camera</button>
                        </div>
                    </div>

                    <!-- Signature Upload Section -->
                    <div class="flex flex-col">
                        <div class="border rounded-2xl border-gray-400 h-40 w-40 flex items-center justify-center relative mb-4">
                            <div id="signature-preview" class="preview-container rounded-xl -mt-5 h-36 w-36"></div>
                            <div id="signature-camera-container" class="hidden absolute top-0 left-0 w-full h-full">
                                <video id="signature-video" class="w-full h-full" autoplay></video>
                                <button type="button" class="bg-blue-600 text-white rounded-lg mt-2" onclick="capturePhoto('signature')">Capture Signature</button>
                            </div>
                        </div>
                        <div class="preview-container" id="signature-preview-container">
                            <label for="signature" class="block w-36 mb-2">Upload Signature</label>
                            <input type="file" id="signature" name="signature" class="border w-56 p-2" onchange="previewSignature()">
                            <button type="button" class="bg-slate-700 text-white rounded-lg px-4 py-2 mt-2" onclick="startCamera('signature')">Open Camera</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-around mt-7 gap-5 items-center mx-auto w-[70%]">
                                <div class="mb-4 form-control w-full">
                                    <button type="submit" class="bg-blue-600  text-white rounded-lg px-4 py-2">Add
                                        New
                                        Member</button>
                                </div>

                                <div class="mb-4 form-control w-full">
                                    <a href="/nominees/create"
                                        class="bg-gray-800 border border-blue-50   text-white rounded-lg px-4 py-2">Add
                                        a
                                        Nominee</a>
                                </div>

                            </div>
    </div>
</form>

<!-- Add Custom Styling to Ensure Input Consistency -->
<style>
    .input-field {
        height: 45px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        background-color: transparent;
        box-shadow: none;
    }
</style>

            </div>
                <script>
                    function getRandomTitle() {
                        return 'Image-' + Math.random().toString(36).substring(2, 15);
                    }

                    async function uploadImage(imageData, title) {
                        const formData = new FormData();
                        formData.append('image', imageData);
                        formData.append('title', title);

                        const response = await fetch('/upload', {
                            method: 'POST',
                            body: formData
                        });

                        if (response.ok) {
                            const result = await response.json();
                            console.log('Image uploaded successfully:', result);
                        } else {
                            console.error('Error uploading image:', response.statusText);
                        }
                    }

                    function previewImage(type) {
                        const imageInput = document.getElementById(type);
                        const imagePreview = type === 'image' ? document.getElementById('image-preview') : document
                            .getElementById('signature-preview');
                        const cameraContainer = type === 'image' ? document.getElementById('camera-container') : document
                            .getElementById('signature-camera-container');

                        imagePreview.innerHTML = ''; // Clear previous content
                        cameraContainer.classList.add('hidden'); // Hide camera

                        if (imageInput.files && imageInput.files[0]) {
                            const file = imageInput.files[0];
                            const title = getRandomTitle();
                            const img = document.createElement('img');
                            img.src = URL.createObjectURL(file);
                            img.style.maxWidth = '100%';
                            img.style.maxHeight = '180px';
                            img.classList.add('rounded-xl');
                            const titleElement = document.createElement('p');
                            titleElement.textContent = title;
                            // imagePreview.appendChild(titleElement);
                            imagePreview.appendChild(img);

                            // Upload image
                            uploadImage(file, title);
                        }
                    }

                    function startCamera(type) {
                        const video = type === 'image' ? document.getElementById('video') : document.getElementById(
                            'signature-video');
                        const cameraContainer = type === 'image' ? document.getElementById('camera-container') : document
                            .getElementById('signature-camera-container');
                        const imagePreview = type === 'image' ? document.getElementById('image-preview') : document
                            .getElementById('signature-preview');

                        navigator.mediaDevices.getUserMedia({
                                video: true
                            })
                            .then(function(stream) {
                                video.srcObject = stream;
                                cameraContainer.classList.remove('hidden'); // Show camera
                                imagePreview.innerHTML = ''; // Clear previous content
                            })
                            .catch(function(err) {
                                console.error("Error accessing camera: ", err);
                            });
                    }

                    function capturePhoto(type) {
                        const canvas = document.getElementById('canvas');
                        const video = type === 'image' ? document.getElementById('video') : document.getElementById(
                            'signature-video');
                        const context = canvas.getContext('2d');

                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        context.drawImage(video, 0, 0, canvas.width, canvas.height);

                        // Convert the canvas image to a Blob
                        canvas.toBlob(function(blob) {
                            const title = getRandomTitle();
                            const img = document.createElement('img');
                            img.src = URL.createObjectURL(blob);
                            img.style.maxWidth = '100%';
                            img.classList.add('rounded-xl'); // Adjust size
                            const imagePreview = type === 'image' ? document.getElementById('image-preview') :
                                document.getElementById('signature-preview');
                            imagePreview.innerHTML = ''; // Clear previous content
                            const titleElement = document.createElement('p');
                            titleElement.textContent = title;
                            imagePreview.appendChild(titleElement);
                            imagePreview.appendChild(img);

                            // Upload image
                            uploadImage(blob, title);
                        }, 'image/png');

                        // Stop the video stream
                        const stream = video.srcObject;
                        const tracks = stream.getTracks();
                        tracks.forEach(track => track.stop());
                        video.srcObject = null;
                    }

                    function validateForm() {
                        // Add your validation logic here
                        return true;
                    }

                    function previewSignature() {
                        const signatureInput = document.getElementById('signature');
                        const signaturePreview = document.getElementById('signature-preview');

                        // Clear previous preview
                        signaturePreview.innerHTML = '';

                        if (signatureInput.files && signatureInput.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                signaturePreview.appendChild(img);
                                img.classList.add('rounded-xl');
                            }

                            reader.readAsDataURL(signatureInput.files[0]);
                        }
                    }

                    function validateForm() {
                        const memberId = document.getElementById('member_id').value;
                        const mobileNumber = document.getElementById('mobile_number').value;
                        const email = document.getElementById('email').value;
                        const nationalId = document.getElementById('national_id_number').value;

                        // Example validation rules
                        if (!memberId) {
                            alert('Member ID is required');
                            return false;
                        }

                        if (mobileNumber && !/^\d{11}$/.test(mobileNumber)) {
                            alert('Mobile number must be 11 digits');
                            return false;
                        }

                        if (email && !/\S+@\S+\.\S+/.test(email)) {
                            alert('Email is invalid');
                            return false;
                        }

                        if (nationalId && nationalId.length < 10) {
                            alert('National ID must be at least 10 characters long');
                            return false;
                        }

                        return true; // Proceed with form submission
                    }
                    @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top", // Position: top or bottom
                position: "right", // Position: left, center, or right
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast();
        @elseif(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            }).showToast();
        @endif
                </script>

            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
