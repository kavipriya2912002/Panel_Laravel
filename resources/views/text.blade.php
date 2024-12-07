<x-app-layout>
    <form action="" method="POST" class="max-w-lg mt-4 mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
        @csrf
        <div>
            <label for="formText" class="block text-gray-700 font-medium mb-2">Form Text</label>
            <textarea 
                name="formText" 
                id="formText" 
                cols="30" 
                rows="10" 
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            ></textarea>
        </div>

        <div>
            <label for="nameInput" class="block text-gray-700 font-medium mb-2">Name</label>
            <input 
                type="text" 
                name="name" 
                id="nameInput" 
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <div>
            <label for="accountNo" class="block text-gray-700 font-medium mb-2">Account No:</label>
            <input 
                type="text" 
                name="accountNo" 
                id="accountNo" 
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <div>
            <label for="ifsc" class="block text-gray-700 font-medium mb-2">IFSC</label>
            <input 
                type="text" 
                name="ifsc" 
                id="ifsc" 
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <div>
            <label for="bankName" class="block text-gray-700 font-medium mb-2">Bank Name</label>
            <input 
                type="text" 
                name="bankName" 
                id="bankName" 
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <div>
            <button 
                type="submit" 
                class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Submit
            </button>
        </div>
    </form>

    <script>
        document.getElementById('formText').addEventListener('input', function (e) {
            const text = e.target.value;

            // Parse the text into key-value pairs
            const lines = text.split('\n');
            const data = {};
            lines.forEach(line => {
                const [key, value] = line.split(':').map(item => item.trim());
                if (key && value) {
                    data[key.toLowerCase()] = value;
                }
            });

            // Map the parsed data to the corresponding input fields
            if (data.name) document.getElementById('nameInput').value = data.name;
            if (data['account no']) document.getElementById('accountNo').value = data['account no'];
            if (data.ifsc) document.getElementById('ifsc').value = data.ifsc;
            if (data['bank name']) document.getElementById('bankName').value = data['bank name'];
        });
    </script>
</x-app-layout>
