<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Bill Payments Template</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      </head>
      <body class="bg-gray-100">
        <!-- Header Section -->
        <header class="bg-white shadow">
          <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="text-center flex-grow">
                <a href="{{ route('home') }}" class="text-2xl font-bold">
                    BBPS Panel
                </a>
            </div>
              <!-- Left-Aligned Content (Empty or Add if needed) -->
              <div class="flex-grow"></div>
      
              <!-- Center-Aligned Heading -->
              
      
              <!-- Right-Aligned Content -->
              <div class="ml-auto flex items-center space-x-6">
                  <div class="bg-gray-50 p-2 shadow rounded-lg text-center">
                      <span class="text-gray-600 text-sm">Wallet Balance</span>
                      <p id="wallet-amount" class="font-semibold text-lg">₹ 0.2</p>
                  </div>
              </div>
          </div>
      </header>


    <div id="gas" class="tab-content mt-7">
        <div class="max-w-sm w-full h-auto p-6 bg-white rounded-lg shadow-md mx-auto sm:max-w-md md:max-w-lg">
            <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">Book LPG Gas Cylinder</h2>
            <form id="gasForm">
                <div class="flex gap-4 mb-4">
                    <label class="flex items-center">
                        <input type="radio" name="recharge" value="gasBill" class="mr-2">
                        Pay Gas Bill
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="recharge" value="cylinderBill" class="mr-2">
                        Book A Cylinder
                    </label>
                </div>

                <!-- Dynamic Input Fields -->
                <div id="gasDynamicFields"></div>

                <button type="submit"
                    class="w-full p-3 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black hover:focus:border-black transition-colors">
                    Proceed
                </button>
            </form>
        </div>
    </div>

    <script>
          document.addEventListener('DOMContentLoaded', () => {
            const dynamicFields = document.getElementById('gasDynamicFields');
            const form = document.getElementById('gasForm');

            form.addEventListener('change', (event) => {
                if (event.target.name === 'recharge') {
                    dynamicFields.innerHTML = ''; // Clear existing fields

                    if (event.target.value === 'gasBill') {
                        // Add fields for Electricity Boards
                        dynamicFields.innerHTML = `
                            <div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">Piped Gas Provider</label>
    <select name="gasProvider" class="w-full p-2 border rounded">
        <option value="" disabled selected>Select your gas provider</option>
        <option value="gail">GAIL (Gas Authority of India Limited)</option>
        <option value="adaniGas">Adani Gas</option>
        <option value="mgl">Mahanagar Gas Limited (MGL)</option>
        <option value="igl">Indraprastha Gas Limited (IGL)</option>
        <option value="hpcl">Hindustan Petroleum Corporation Limited (HPCL)</option>
        <option value="bpcl">Bharat Petroleum Corporation Limited (BPCL)</option>
        <option value="gujaratGas">Gujarat Gas</option>
        <option value="sundaramFinance">Sundaram Finance Gas</option>
        <option value="thinkGas">Think Gas</option>
    </select>
</div>
<div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">Customer ID</label>
    <input type="text" name="customerId" class="w-full p-2 border rounded" placeholder="Enter your Customer ID">
</div>

                        `;
                    } else if (event.target.value === 'cylinderBill') {
                        // Add fields for Apartments
                        dynamicFields.innerHTML = `
                            <div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">Gas Provider</label>
    <select name="gasProvider" class="w-full p-2 border rounded">
        <option value="" disabled selected>Select your gas provider</option>
        <option value="gail">GAIL (Gas Authority of India Limited)</option>
        <option value="adaniGas">Adani Gas</option>
        <option value="mgl">Mahanagar Gas Limited (MGL)</option>
        <option value="igl">Indraprastha Gas Limited (IGL)</option>
        <option value="hpcl">Hindustan Petroleum Corporation Limited (HPCL)</option>
        <option value="bpcl">Bharat Petroleum Corporation Limited (BPCL)</option>
        <option value="gujaratGas">Gujarat Gas</option>
        <option value="sundaramFinance">Sundaram Finance Gas</option>
        <option value="thinkGas">Think Gas</option>
    </select>
</div>
<div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">Customer ID/Mobile Number</label>
    <input type="text" name="customerId" class="w-full p-2 border rounded" placeholder="Enter Customer ID or Mobile Number">
</div>
<div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">Gas Agency</label>
    <select name="gasAgency" class="w-full p-2 border rounded">
        <option value="" disabled selected>Select your gas agency</option>
        <option value="indane">Indane Gas</option>
        <option value="bharatGas">Bharat Gas</option>
        <option value="hpGas">HP Gas</option>
        <option value="superGas">SUPERGAS</option>
        <option value="shivGas">Shiv Gas</option>
        <option value="jyotiGas">Jyoti Gas</option>
        <option value="flameGas">Flame Gas</option>
    </select>
</div>

                        `;
                    }
                }
            });
        });
    </script>

</body>
</html>