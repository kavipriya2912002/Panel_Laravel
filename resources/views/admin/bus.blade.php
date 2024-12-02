<script src="https://cdn.tailwindcss.com"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <!-- Admin Panel for Managing Buses -->
    <div class="container mt-5 px-4">
        <h1 class="text-center mb-5 text-3xl font-semibold text-gray-800">Admin Panel - Manage Buses</h1>

        <!-- Create Bus Form -->
        <div class="card shadow-lg mb-6 bg-white rounded-lg overflow-hidden">
            <div class="card-header bg-indigo-600 text-white py-3 px-4">
                <span class="font-semibold text-lg">Add New Bus</span>
            </div>
            <div class="card-body p-6">
                <form id="busForm" onsubmit="storeBusDetail(event)" method="POST" action="{{ route('bus.store') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="operatorName" class="form-label text-sm font-medium text-gray-700">Bus
                            Name</label>
                        <input type="text" id="operatorName"
                            class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            required>
                    </div>
                    <div class="mb-5">
                        <label for="busType" class="form-label text-sm font-medium text-gray-700">Bus Type</label>
                        <select id="busType"
                            class="form-select w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            required>
                            <option value="">Select Bus Type</option>
                            <option value="AC">AC</option>
                            <option value="Non-AC">Non-AC</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="totalSeats" class="form-label text-sm font-medium text-gray-700">Total Seats</label>
                        <input type="number" id="totalSeats"
                            class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            min="1" required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="submit"
                            class="btn btn-primary px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            Save Bus
                        </button>
                        <button type="button"
                            class="btn btn-secondary px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none"
                            onclick="resetForm()">Reset</button>
                    </div>
                    <div id="bus-message" class="text-center mt-3 mb-3"></div>
                </form>
            </div>
        </div>

        <!-- Edit Bus Form (Initially Hidden) -->
        <div class="card shadow-lg mb-6 bg-white rounded-lg overflow-hidden" id="editBusCard" style="display: none;">
            <div class="card-header bg-yellow-600 text-white py-3 px-4">
                <span class="font-semibold text-lg">Edit Bus</span>
            </div>
            <div class="card-body p-6">
                <form id="editBusForm" onsubmit="updateBusDetail(event)" method="POST">
                    @csrf
                    @method('PUT') <!-- Used for PUT request in Laravel -->

                    <input type="hidden" id="busId">

                    <div class="mb-5">
                        <label for="editOperatorName" class="form-label text-sm font-medium text-gray-700">Operator
                            Name</label>
                        <input type="text" id="editOperatorName"
                            class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            required>
                    </div>
                    <div class="mb-5">
                        <label for="editBusType" class="form-label text-sm font-medium text-gray-700">Bus Type</label>
                        <select id="editBusType"
                            class="form-select w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            required>
                            <option value="">Select Bus Type</option>
                            <option value="AC">AC</option>
                            <option value="Non-AC">Non-AC</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="editTotalSeats" class="form-label text-sm font-medium text-gray-700">Total
                            Seats</label>
                        <input type="number" id="editTotalSeats"
                            class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            min="1" required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="submit"
                            class="btn btn-primary px-6 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                            Update Bus
                        </button>
                        <button type="button"
                            class="btn btn-secondary px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none"
                            onclick="resetEditForm()">Cancel</button>
                    </div>
                    <div id="edit-bus-message" class="text-center mt-3 mb-3"></div>

                </form>
            </div>
        </div>

        <!-- Bus List -->
        <div class="card shadow-lg bg-white rounded-lg overflow-hidden">
            <div class="card-header bg-indigo-600 text-white py-3 px-4">
                <span class="font-semibold text-lg">Bus List</span>
            </div>
            <div class="card-body p-6">
                <table class="table w-full table-auto text-left">
                    <thead class="text-gray-700">
                        <tr>
                            <th class="py-3 px-4 border-b font-medium">ID</th>
                            <th class="py-3 px-4 border-b font-medium">Operator Name</th>
                            <th class="py-3 px-4 border-b font-medium">Bus Type</th>
                            <th class="py-3 px-4 border-b font-medium">Total Seats</th>
                            <th class="py-3 px-4 border-b font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="busList" class="text-gray-600">
                        <!-- Bus list will be dynamically populated here -->
                    </tbody>
                </table>
            </div>
        </div>



        <div id="manageRoutesModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                <div class="border-b border-gray-200 p-4 flex justify-between items-center">
                    <h5 class="text-lg font-semibold text-gray-700">Manage Routes</h5>
                    <button class="text-gray-400 hover:text-gray-600"
                        onclick="document.getElementById('manageRoutesModal').classList.add('hidden')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <form id="routeForm" class="space-y-4">
                        <div>
                            <label for="source" class="block text-sm font-medium text-gray-700">Source</label>
                            <input type="text" id="source"
                                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5"
                                placeholder="Enter source" />
                        </div>
                        <div>
                            <label for="destination"
                                class="block text-sm font-medium text-gray-700">Destination</label>
                            <input type="text" id="destination"
                                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5"
                                placeholder="Enter destination" />
                        </div>
                        <div>
                            <label for="departure_time" class="block text-sm font-medium text-gray-700">Departure
                                Time</label>
                            <input type="datetime-local" id="departure_time"
                                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" />
                        </div>
                        <div>
                            <label for="arrival_time" class="block text-sm font-medium text-gray-700">Arrival
                                Time</label>
                            <input type="datetime-local" id="arrival_time"
                                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" />
                        </div>
                        <div>
                            <label for="departure_date" class="block text-sm font-medium text-gray-700">Departure
                                Date</label>
                            <input type="date" id="departure_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" />
                        </div>
                        <div>
                            <label for="fare" class="block text-sm font-medium text-gray-700">Fare</label>
                            <input type="number" id="fare"
                                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5"
                                placeholder="Enter fare" />
                        </div>
                        <button type="button"
                            class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            onclick="saveRoute()">
                            Save Route
                        </button>
                        <button type="button"
                            class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            onclick="updateRoute()">
                            Update Route
                        </button>
                    </form>
                    <div id="routeList" class="mt-6">
                        <!-- Dynamic content -->
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow-lg mt-4 bg-white rounded-lg overflow-hidden">
            <div class="card-header bg-indigo-600 text-white py-3 px-4">
                <span class="font-semibold text-lg">Routes List</span>
            </div>
            <div class="card-body p-6">
                <table class="table w-full table-auto text-left">
                    <thead class="text-gray-700">
                        <tr>
                            <th class="py-3 px-4 border-b font-medium">Route ID</th>
                            <th class="py-3 px-4 border-b font-medium">Bus ID</th>
                            <th class="py-3 px-4 border-b font-medium">Source</th>
                            <th class="py-3 px-4 border-b font-medium">Destination</th>
                            <th class="py-3 px-4 border-b font-medium">Departure Time</th>
                            <th class="py-3 px-4 border-b font-medium">Arrival Time</th>
                            <th class="py-3 px-4 border-b font-medium">Fare</th>
                            <th class="py-3 px-4 border-b font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="routesList" class="text-gray-600">
                        <!-- Routes will be dynamically populated here -->
                    </tbody>
                </table>
            </div>
        </div>



        <!-- Popup Modal -->
        <div id="seatModal"
            class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold">Seat Layout</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-800">&times;</button>
                </div>
                <div id="seatTableContainer" class="mt-4"></div>
                <button onclick="closeModal()" class="bg-pink-600 text-white px-4 py-2 rounded-lg mt-4">Close</button>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Fetch and display buses
        function fetchBuses() {
            console.log('fetchBuses called'); // Debugging statement

            axios.get('{{ route('bus.index') }}', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                }).then(response => {
                    console.log('Response:', response.data); // Debug response
                    const buses = response.data;

                    if (!Array.isArray(buses)) {
                        console.error('Unexpected response format:', buses);
                        return;
                    }

                    const busList = document.getElementById('busList');
                    busList.innerHTML = '';
                    buses.forEach(bus => {
                        busList.innerHTML += `
            <tr>
                <td class="py-3 px-4">${bus.id}</td>
                <td class="py-3 px-4">${bus.operator_name}</td>
                <td class="py-3 px-4">${bus.bus_type}</td>
                <td class="py-3 px-4">${bus.total_seats}</td>
                <td class="py-3 px-4">
                     <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg" onclick="editBus(${bus.id})">Edit</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg" onclick="deleteBus(${bus.id})">Delete</button>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg" onclick="manageRoutes(${bus.id})">Manage Routes</button>

                    
                </td>
            </tr>
        `;
                    });
                })
                .catch(error => console.error('Error fetching buses:', error));

        }



        function storeBusDetail(event) {
            // Prevent the form from submitting (page refresh)
            event.preventDefault();

            const OperatorName = document.getElementById('operatorName').value;
            const BusType = document.getElementById('busType').value;
            const TotalSeats = document.getElementById('totalSeats').value;
            const messageElement = document.getElementById('bus-message');

            // Clear previous messages
            messageElement.textContent = '';

            // Validate the input
            if (!OperatorName || !BusType || !TotalSeats) {
                messageElement.textContent = 'All fields are required.';
                messageElement.style.color = 'red';
                return;
            }

            // Send the request to the backend via POST (using Axios)
            axios.post('{{ route('bus.store') }}', {
                    operator_name: OperatorName,
                    bus_type: BusType,
                    total_seats: TotalSeats,
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => {
                    // Display the success message
                    messageElement.innerHTML = `<p style="color: green;">${response.data.message}</p>`;
                })
                .catch(error => {
                    console.error('Error response:', error.response.data);
                    if (error.response) {
                        messageElement.textContent = error.response.data.message ||
                            'Failed to add bus. Please try again.';
                    } else {
                        messageElement.textContent = 'Network error. Please check your connection.';
                    }
                    messageElement.style.color = 'red';
                });
        }


        // Edit bus
        // Edit bus
        function editBus(id) {
            document.getElementById('editBusCard').style.display = 'block';
            document.getElementById('busForm').style.display = 'none';

            axios.get(`/admin/buses/${id}`)
                .then(response => {
                    const bus = response.data.data;
                    console.log(bus);

                    if (bus) {
                        document.getElementById('editOperatorName').value = bus.operator_name;
                        document.getElementById('editBusType').value = bus.bus_type;
                        document.getElementById('editTotalSeats').value = bus.total_seats;

                        // Correctly set the hidden bus ID
                        document.getElementById('busId').value = bus.id;

                        // Set form action to include bus ID
                        document.getElementById('editBusForm').action = `/admin/buses/${bus.id}`;
                    } else {
                        alert('Bus not found');
                    }
                })
                .catch(error => {
                    console.error('Error fetching bus details:', error);
                    alert('Failed to load bus details. Please try again later.');
                });
        }



        function updateBusDetail(event) {
            event.preventDefault();

            const busId = document.getElementById('busId').value;
            const operatorName = document.getElementById('editOperatorName').value;
            const busType = document.getElementById('editBusType').value;
            const totalSeats = document.getElementById('editTotalSeats').value;

            if (!busId || !operatorName || !busType || !totalSeats) {
                alert('All fields are required!');
                return;
            }

            const data = {
                operator_name: operatorName,
                bus_type: busType,
                total_seats: totalSeats,
            };

            axios.put(`/admin/buses/${busId}`, data, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => {
                    alert('Bus details updated successfully!');
                    fetchBuses();
                    document.getElementById('editBusCard').style.display = 'none';
                })
                .catch(error => {
                    console.error('Error updating bus:', error);
                    alert('Failed to update bus details. Please try again.');
                });
        }





        // Delete bus
        function deleteBus(id) {
            if (confirm('Are you sure you want to delete this bus?')) {
                axios.delete(`/admin/buses/${id}`, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        }
                    })
                    .then(() => {
                        alert('Bus deleted successfully');
                        fetchBuses(); // Refresh the list of buses
                    })
                    .catch(error => {
                        console.error('Error deleting bus:', error.response ? error.response.data : error.message);
                        alert('Failed to delete the bus: ' + (error.response?.data.message || error.message));
                    });
            }
        }




        let currentBusId;

        function manageRoutes(busId) {
            currentBusId = busId; // Assign the clicked bus ID
            const modal = document.getElementById('manageRoutesModal');
            modal.classList.remove('hidden');
        }

        async function saveRoute() {
            const source = document.getElementById('source').value;
            const destination = document.getElementById('destination').value;
            const departure_time = document.getElementById('departure_time').value;
            const departure_date = document.getElementById('departure_date').value;
            const arrival_time = document.getElementById('arrival_time').value;
            const fare = document.getElementById('fare').value;

            // Validate form data
            if (!source || !destination || !departure_time || !departure_date || !arrival_time || !fare) {
                alert('All fields are required.');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            const response = await fetch('/admin/routes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    source,
                    destination,
                    departure_time,
                    arrival_time,
                    departure_date,
                    fare,
                    bus_id: currentBusId,
                }),
            });

            if (response.ok) {
                alert('Route added successfully!');
                manageRoutes(currentBusId); // Refresh the routes list
                document.getElementById('routeForm').reset();
            } else {
                const errorDetails = await response.json();
                console.error('Error:', errorDetails);
                alert(`Failed to save route. ${errorDetails.message || 'Please check your input and try again.'}`);
            }

        }

        async function deleteRoute(routeId) {
            try {
                const response = await fetch(`/admin/routes/${routeId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'application/json'
                    }
                });

                if (response.ok) {
                    alert('Route deleted successfully!');
                    fetchRoutes(); // Reload the routes after deletion
                } else {
                    alert('Failed to delete route.');
                }
            } catch (error) {
                console.error('Error deleting route:', error);
            }
        }

        function editRoute(routeId) {
            console.log('Editing route with ID:', routeId);

            // Fetch route details
            fetch(`/admin/routes/${routeId}`)
                .then(response => response.json())
                .then(route => {
                    // Populate form fields
                    document.getElementById('source').value = route.source || '';
                    document.getElementById('destination').value = route.destination || '';
                    document.getElementById('departure_time').value = route.departure_time || '';
                    document.getElementById('departure_date').value = route.departure_date || '';
                    document.getElementById('arrival_time').value = route.arrival_time || '';
                    document.getElementById('fare').value = route.fare || '';

                    // Store routeId in the save button
                    const saveButton = document.querySelector('#routeForm button');
                    saveButton.setAttribute('data-route-id', routeId);

                    // Show the modal
                    document.getElementById('manageRoutesModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Failed to fetch route details:', error);
                });
        }


        async function updateRoute() {
            // Retrieve the routeId from the save button
            const saveButton = document.querySelector('#routeForm button');
            const routeId = saveButton.getAttribute('data-route-id');

            console.log('Updating route with ID:', routeId); // Debugging to verify routeId

            if (!routeId) {
                alert('Route ID is missing. Cannot update.');
                return;
            }

            try {
                const source = document.getElementById('source').value;
                const destination = document.getElementById('destination').value;
                const departure_time = document.getElementById('departure_time').value;
                const arrival_time = document.getElementById('arrival_time').value;
                const departure_date = document.getElementById('departure_date').value;
                const fare = document.getElementById('fare').value;

                if (!source || !destination || !fare) {
                    alert('Source, destination, and fare are required.');
                    return;
                }

                const response = await fetch(`/admin/routes/${routeId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify({
                        source,
                        destination,
                        departure_time,
                        arrival_time,
                        departure_date,
                        fare,
                    }),
                });

                if (response.ok) {
                    alert('Route updated successfully!');
                    document.getElementById('manageRoutesModal').classList.add('hidden');
                    fetchRoutes(); // Reload the routes list
                } else {
                    const errorData = await response.json();
                    console.error('Update failed:', errorData);
                    alert(`Failed to update the route: ${errorData.error || 'Unknown error'}`);
                }
            } catch (error) {
                console.error('Error updating route:', error);
                alert('An error occurred while updating the route.');
            }
        }









        function resetForm() {
            document.getElementById('operatorName').value = '';
            document.getElementById('busType').value = '';
            document.getElementById('totalSeats').value = '';
        }

        // Reset the Edit Form
        function resetEditForm() {
            document.getElementById('editBusCard').style.display = 'none';
            document.getElementById('editOperatorName').value = '';
            document.getElementById('editBusType').value = '';
            document.getElementById('editTotalSeats').value = '';
        }

        async function fetchRoutes() {
            try {
                const response = await fetch(`/admin/routes`);
                const routes = await response.json();

                const routesList = document.getElementById('routesList');
                routesList.innerHTML = ''; // Clear existing content

                routes.forEach(route => {
                    const row = document.createElement('tr');
                    row.classList.add('border-b');

                    row.innerHTML = `
                <td class="py-3 px-4">${route.id}</td>
                <td class="py-3 px-4">${route.bus_id}</td>
                <td class="py-3 px-4">${route.source}</td>
                <td class="py-3 px-4">${route.destination}</td>
                <td class="py-3 px-4">${route.departure_time}</td>
                <td class="py-3 px-4">${route.departure_date}</td>
                <td class="py-3 px-4">${route.arrival_time}</td>
                <td class="py-3 px-4">${route.fare}</td>
                <td class="py-3 px-4">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg" onclick="editRoute(${route.id})">Edit</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg ml-2" onclick="deleteRoute(${route.id})">Delete</button>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded-lg ml-2" onclick="viewSeats(${route.id})">View Seats</button>
                </td>
            `;

                    routesList.appendChild(row);
                });
            } catch (error) {
                console.error('Error fetching routes:', error);
            }
        }

        // Call this function with the specific bus ID when you want to load routes for that bus
        fetchRoutes(currentBusId);



        // Initialize
        fetchBuses(); // Fetch buses when the page loads



        function viewSeats(routeId) {
            // Insert CSS dynamically
            const existingStyle = document.getElementById("dynamicSeatStyles");
            if (!existingStyle) {
                const style = document.createElement("style");
                style.id = "dynamicSeatStyles";
                style.textContent = `
            .seat {
                width: 40px;
                height: 40px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                margin: 5px;
                border-radius: 4px;
                color: white;
                font-weight: bold;
            }
            .seat.available {
                background-color: green;
            }
            .seat.unavailable {
                background-color: red;
            }
        `;
                document.head.appendChild(style);
            }

            // Show the modal
            const modal = document.getElementById("seatModal");
            modal.classList.remove("hidden");

            // Fetch seat data
            fetch(`/admin/seats/${routeId}`)
                .then(response => response.json())
                .then(seats => {
                    const container = document.getElementById("seatTableContainer");
                    container.innerHTML = "";

                    const rows = ["A", "B", "C", "D"];
                    rows.forEach(row => {
                        const rowDiv = document.createElement("div");
                        rowDiv.style.display = "flex"; // Ensure row alignment
                        seats
                            .filter(seat => seat.seat_number.startsWith(row))
                            .forEach(seat => {
                                const seatDiv = document.createElement("div");
                                seatDiv.classList.add("seat", seat.status === "available" ? "available" :
                                    "unavailable");
                                seatDiv.textContent = seat.seat_number;

                                // Add event listener for click
                                seatDiv.addEventListener("click", function() {
                                    if (seat.status === "available") {
                                        const confirmBooking = confirm(
                                            `Do you want to mark seat ${seat.seat_number} as booked?`
                                        );
                                        if (confirmBooking) {
                                            // Send the update request to the backend
                                            fetch(`/admin/seats/book/${seat.id}`, {
                                                    method: 'PUT',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': document.querySelector(
                                                                'meta[name="csrf-token"]')
                                                            .getAttribute('content')
                                                    },
                                                    body: JSON.stringify({
                                                        status: 'unavailable'
                                                    }) // Book the seat
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        // Update the UI
                                                        seatDiv.classList.remove("available");
                                                        seatDiv.classList.add("unavailable");
                                                        alert('Seat marked as booked!');
                                                    } else {
                                                        alert(
                                                            'Failed to book seat. Please try again.');
                                                    }
                                                })
                                                .catch(error => console.error("Error booking seat:",
                                                    error));
                                        }
                                    } else {
                                        const confirmUnbooking = confirm(
                                            `Do you want to mark seat ${seat.seat_number} as available again?`
                                        );
                                        if (confirmUnbooking) {
                                            // Send the update request to the backend
                                            fetch(`/admin/seats/unbook/${seat.id}`, {
                                                    method: 'PUT',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': document.querySelector(
                                                                'meta[name="csrf-token"]')
                                                            .getAttribute('content')
                                                    },
                                                    body: JSON.stringify({
                                                        status: 'available'
                                                    }) // Unbook the seat
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        // Update the UI
                                                        seatDiv.classList.remove("unavailable");
                                                        seatDiv.classList.add("available");
                                                        alert('Seat marked as available!');
                                                    } else {
                                                        alert(
                                                            'Failed to unbook seat. Please try again.');
                                                    }
                                                })
                                                .catch(error => console.error(
                                                    "Error unbooking seat:", error));
                                        }
                                    }
                                });

                                rowDiv.appendChild(seatDiv);
                            });
                        container.appendChild(rowDiv);
                    });
                })
                .catch(error => {
                    console.error("Error fetching seats:", error);
                    alert('Failed to load seats. Please try again later.');
                });
        }

        function closeModal() {
            document.getElementById("seatModal").classList.add("hidden");
        }
    </script>
</x-app-layout>
