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
                        <label for="operatorName" class="form-label text-sm font-medium text-gray-700">Operator
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



        <!-- Modal for managing routes -->
<div id="routeModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Routes for Bus <span id="busIdLabel"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="routeForm">
                    <input type="hidden" id="busId" name="bus_id">
                    <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" class="form-control" id="source" name="source" required>
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" required>
                    </div>
                    <div class="form-group">
                        <label for="departure_time">Departure Time</label>
                        <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                    </div>
                    <div class="form-group">
                        <label for="arrival_time">Arrival Time</label>
                        <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
                    </div>
                    <div class="form-group">
                        <label for="fare">Fare</label>
                        <input type="number" class="form-control" id="fare" name="fare" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Route</button>
                </form>
                <div id="route-message" class="mt-2"></div>
            </div>
        </div>
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
                <td>${bus.id}</td>
                <td>${bus.operator_name}</td>
                <td>${bus.bus_type}</td>
                <td>${bus.total_seats}</td>
                <td>
                     <button class="btn btn-sm btn-warning" onclick="editBus(${bus.id})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteBus(${bus.id})">Delete</button>
                    
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




        function updateBusDetail(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get the form values
            const busId = document.getElementById('busId').value; // Bus ID from the hidden input field
            const operatorName = document.getElementById('operatorName').value;
            const busType = document.getElementById('busType').value;
            const totalSeats = document.getElementById('totalSeats').value;

            // Validate input values (optional, but recommended)
            if (!busId || !operatorName || !busType || !totalSeats) {
                alert('All fields are required!');
                return;
            }

            // Prepare data for the API request
            const data = {
                operator_name: operatorName,
                bus_type: busType,
                total_seats: totalSeats,
            };

            // Send the PUT request to update the bus details
            axios.put(`admin/buses/${busId}`, data, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => {
                    // Handle success
                    alert('Bus details updated successfully!');
                    fetchBuses(); // Refresh the bus list (this function needs to be defined to refresh your bus list)
                    // Optionally, close the form or reset it
                    document.getElementById('busForm').reset();
                })
                .catch(error => {
                    // Handle error
                    console.error('Error updating bus:', error);
                    alert('Failed to update bus details. Please try again.');
                });
        }


        // Edit bus
       // Edit bus
function editBus(id) {
    // Show the edit form and hide the create form
    document.getElementById('editBusCard').style.display = 'block';
    document.getElementById('busForm').style.display = 'none';

    // Use AJAX to get the bus data
    axios.get(`/admin/buses/${id}`)
        .then(response => {
            const bus = response.data.data; // Adjust this depending on your response structure
            console.log(bus);

            if (bus) {
                // Populate the form with bus data
                document.getElementById('editOperatorName').value = bus.operator_name;
                document.getElementById('editBusType').value = bus.bus_type;
                document.getElementById('editTotalSeats').value = bus.total_seats;

                // Update the hidden bus ID field
                document.getElementById('busId').value = bus.id; // This will set the correct bus ID

                // Update the form action to include the bus ID for PUT request
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



        // Show modal to manage routes
function manageRoutes(busId) {
    // Set the bus ID in the form
    document.getElementById('busId').value = busId;
    document.getElementById('busIdLabel').textContent = busId;
    // Clear any previous messages
    document.getElementById('route-message').innerHTML = '';
    // Show the modal
    $('#routeModal').modal('show');
}

// Submit the route form
document.getElementById('routeForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const busId = document.getElementById('busId').value;
    const source = document.getElementById('source').value;
    const destination = document.getElementById('destination').value;
    const departureTime = document.getElementById('departure_time').value;
    const arrivalTime = document.getElementById('arrival_time').value;
    const fare = document.getElementById('fare').value;

    axios.post(`/routes`, {
        bus_id: busId,
        source: source,
        destination: destination,
        departure_time: departureTime,
        arrival_time: arrivalTime,
        fare: fare
    })
    .then(response => {
        document.getElementById('route-message').innerHTML = 'Route added successfully!';
        $('#routeModal').modal('hide');
        fetchRoutesForBus(busId);  // Reload routes for that bus
    })
    .catch(error => {
        document.getElementById('route-message').innerHTML = 'Error adding route.';
        console.error(error);
    });
});



        // Initialize
        fetchBuses(); // Fetch buses when the page loads
    </script>
</x-app-layout>
