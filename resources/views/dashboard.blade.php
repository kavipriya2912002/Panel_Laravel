<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mobile Recharge Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4 bg-gray-100 min-h-screen flex">
        <div class="flex">
            <!-- sidebar -->

            <!-- component -->
            <div class="h-full">
                <dh-component>
                    <div class="flex flex-no-wrap">
                        <div style="min-height: 400px"
                            class="w-64 absolute sm:relative bg-white shadow md:h-full flex-col justify-between hidden sm:flex">
                            <div class="px-8">
                                <div class="h-16 w-full flex items-center">
                                    <svg aria-label="Ripples. Logo" role="img" xmlns="http://www.w3.org/2000/svg"
                                        width="144" height="30" viewBox="0 0 144 30">
                                        <path fill="#5F7DF2"
                                            d="M80.544 9.48c1.177 0 2.194.306 3.053.92.86.614 1.513 1.45 1.962 2.507.448 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.699 3.51-.465 1.037-1.136 1.851-2.012 2.444-.876.592-1.885.888-3.028.888-1.405 0-2.704-.554-3.897-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78H70.45V9.657h6.145v1.663l.209-.21c1.123-1.087 2.369-1.63 3.74-1.63zm17.675 0c1.176 0 2.194.306 3.053.92.859.614 1.513 1.45 1.961 2.507.449 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.698 3.51-.466 1.037-1.136 1.851-2.012 2.444-.876.592-1.886.888-3.028.888-1.405 0-2.704-.554-3.898-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78h-1.904V9.657h6.144v1.663l.21-.21c1.122-1.087 2.368-1.63 3.739-1.63zM24.973 1c1.13 0 2.123.433 2.842 1.133 0 .004 0 .008.034.012 1.54 1.515 1.54 3.962-.034 5.472-.035.029-.069.058-.069.089-.719.65-1.712 1.05-2.773 1.05-.719 0-1.37.061-1.985.184-2.363.474-3.8 1.86-4.28 4.13-.114.489-.18 1.02-.2 1.59l-.003.176.001-.034.002.034c.022.505-.058 1.014-.239 1.495l-.076.182.064-.157c.106-.28.18-.575.217-.881l.008-.084-.026.195c-.286 1.797-1.858 3.188-3.754 3.282l-.204.005h-.103l-.103.002h-.034c-.65.012-1.232.072-1.78.181-2.328.473-3.765 1.863-4.279 4.139-.082.417-.142.863-.163 1.339l-.008.362v.23c0 2.02-1.603 3.681-3.661 3.861L4.16 29l-.48-.01c-.958-.073-1.849-.485-2.499-1.113-1.522-1.464-1.573-3.808-.152-5.33l.152-.154.103-.12c.719-.636 1.677-1.026 2.704-1.026.754 0 1.404-.062 2.02-.184 2.362-.475 3.8-1.86 4.28-4.126.136-.587.17-1.235.17-1.942 0-.991.411-1.896 1.027-2.583.069-.047.137-.097.172-.15.068-.051.102-.104.17-.159.633-.564 1.498-.925 2.408-.978l.229-.007h.034c.068 0 .171.003.274.009.616-.014 1.198-.074 1.746-.18 2.328-.474 3.766-1.863 4.279-4.135.082-.44.142-.912.163-1.418l.008-.385v-.132c0-2.138 1.78-3.872 4.005-3.877zm-.886 10c1.065 0 1.998.408 2.697 1.073.022.011.03.024.042.036l.025.017v.015c1.532 1.524 1.532 3.996 0 5.52-.034.03-.067.06-.067.09-.7.655-1.665 1.056-2.697 1.056-.7 0-1.332.062-1.932.186-2.298.477-3.696 1.873-4.163 4.157-.133.591-.2 1.242-.2 1.95 0 1.036-.399 1.975-1.032 2.674l-.1.084c-.676.679-1.551 1.055-2.441 1.13l-.223.012-.366-.006c-.633-.043-1.3-.254-1.865-.632-.156-.096-.296-.201-.432-.315l-.2-.177v-.012c-.734-.735-1.133-1.72-1.133-2.757 0-2.078 1.656-3.793 3.698-3.899l.198-.005h.133c.666-.007 1.266-.069 1.832-.185 2.265-.476 3.663-1.874 4.163-4.161.08-.442.139-.916.159-1.424l.008-.387v-.136c0-2.153 1.731-3.899 3.896-3.904zm3.882 11.025c1.375 1.367 1.375 3.583 0 4.95s-3.586 1.367-4.96 0c-1.345-1.367-1.345-3.583 0-4.95 1.374-1.367 3.585-1.367 4.96 0zm94.655-12.672c1.405 0 2.628.323 3.669.97 1.041.648 1.843 1.566 2.406 2.756.563 1.189.852 2.57.87 4.145h-9.954l.03.251c.132.906.476 1.633 1.03 2.18.605.596 1.386.895 2.343.895 1.058 0 2.09-.525 3.097-1.574l3.301 1.066-.203.291c-.69.947-1.524 1.67-2.501 2.166-1.075.545-2.349.818-3.821.818-1.473 0-2.774-.277-3.904-.831-1.13-.555-2.006-1.34-2.628-2.355-.622-1.016-.933-2.21-.933-3.58 0-1.354.324-2.582.971-3.682s1.523-1.961 2.628-2.583c1.104-.622 2.304-.933 3.599-.933zm13.955.126c1.202 0 2.314.216 3.339.648v-.47h3.034v3.91h-3.034l-.045-.137c-.317-.848-1.275-1.272-2.875-1.272-1.21 0-1.816.339-1.816 1.016 0 .296.161.516.483.66.321.144.791.262 1.409.355 1.735.22 3.102.536 4.1.946 1 .41 1.697.919 2.095 1.524.398.605.597 1.339.597 2.202 0 1.405-.48 2.5-1.441 3.282-.96.783-2.266 1.174-3.917 1.174-1.608 0-2.7-.321-3.275-.964V23h-3.098v-4.596h3.098l.032.187c.116.547.412.984.888 1.311.53.364 1.183.546 1.962.546.762 0 1.324-.087 1.688-.26.364-.174.546-.476.546-.908 0-.296-.076-.527-.228-.692-.153-.165-.447-.31-.883-.438-.435-.127-1.102-.27-2-.431-1.997-.313-3.433-.82-4.31-1.517-.875-.699-1.313-1.64-1.313-2.825 0-1.21.455-2.162 1.365-2.856.91-.695 2.11-1.042 3.599-1.042zm-69.164.178v10.27h1.98V23h-8.24v-3.072h2.032V12.78h-2.031V9.657h6.259zm-16.85-5.789l.37.005c1.94.05 3.473.494 4.6 1.335 1.198.892 1.797 2.185 1.797 3.878 0 1.168-.273 2.15-.819 2.945-.546.796-1.373 1.443-2.482 1.943l3.085 5.776h2.476V23h-5.827l-4.317-8.366h-2.183v5.116h2.4V23H39.646v-3.25h2.628V7.118h-2.628v-3.25h10.918zm61.329 0v16.06h1.892V23h-8.24v-3.072h2.082v-13h-2.082v-3.06h6.348zm-32.683 9.04c-.812 0-1.462.317-1.949.951-.486.635-.73 1.49-.73 2.565 0 1.007.252 1.847.756 2.52.503.673 1.161 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.448-.622.672-1.504.672-2.647 0-1.092-.228-1.942-.685-2.552-.457-.61-1.113-.914-1.968-.914zm17.675 0c-.813 0-1.463.317-1.95.951-.486.635-.73 1.49-.73 2.565 0 1.007.253 1.847.756 2.52.504.673 1.162 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.449-.622.673-1.504.673-2.647 0-1.092-.229-1.942-.686-2.552-.457-.61-1.113-.914-1.967-.914zM14.1 0C16.267 0 18 1.743 18 3.894v.01c0 2.155-1.733 3.903-3.9 3.903-4.166 0-6.3 2.133-6.3 6.293 0 2.103-1.667 3.817-3.734 3.9l-.5-.009c-.933-.075-1.8-.49-2.433-1.121C.4 16.134 0 15.143 0 14.1c0-2.144 1.733-3.903 3.9-3.903 4.166 0 6.3-2.133 6.3-6.294C10.2 1.751 11.934.005 14.1 0zm108.32 12.184c-.76 0-1.372.22-1.834.66-.46.44-.75 1.113-.87 2.018h5.561c-.118-.795-.442-1.44-.97-1.936-.53-.495-1.158-.742-1.886-.742zM49.525 7.118h-2.26v4.444h1.829c2.023 0 3.034-.754 3.034-2.26 0-.728-.233-1.274-.698-1.638-.466-.364-1.1-.546-1.905-.546zm15.821-3.593c.635 0 1.183.231 1.644.692.462.462.692 1.01.692 1.644 0 .677-.23 1.238-.692 1.682-.46.445-1.009.667-1.644.667-.643 0-1.195-.23-1.656-.692-.462-.461-.692-1.013-.692-1.657 0-.634.23-1.182.692-1.644.46-.461 1.013-.692 1.656-.692zM5.991 1.171c1.345 1.563 1.345 4.095 0 5.658-1.374 1.561-3.585 1.561-4.96 0-1.375-1.563-1.375-4.095 0-5.658 1.375-1.561 3.586-1.561 4.96 0z" />
                                    </svg>
                                </div>
                                <ul class="mt-12">
                                    <li class="flex w-full justify-between text-black cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-grid" width="18" height="18"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('home')">Home</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('wallet')">Wallet</span>
                                        </a>
                                    </li>

                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-code" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="7 8 3 12 7 16"></polyline>
                                                <polyline points="17 8 21 12 17 16"></polyline>
                                                <line x1="14" y1="4" x2="10" y2="20">
                                                </line>
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('transfer')">Transactions</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('recharge')">Mobile
                                                Recharge</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-stack" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                                <polyline points="4 12 12 16 20 12" />
                                                <polyline points="4 16 12 20 20 16" />
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('electricity')">Electricity</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('gas')">Gas Bill</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('loan')">Pay Loan</span>
                                        </a>
                                    </li>

                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('landline')">Broadband/Landline</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('busbooking')">Bus
                                                Booking</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('mybookings')">My
                                                Bookings</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('dth')">Recharge DTH or
                                                TV</span>
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>
                        <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
                            id="mobile-nav">
                            <button aria-label="toggle sidebar" id="openSideBar"
                                class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
                                onclick="sidebarHandler(true)">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-adjustments" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="6" cy="10" r="2" />
                                    <line x1="6" y1="4" x2="6" y2="8" />
                                    <line x1="6" y1="12" x2="6" y2="20" />
                                    <circle cx="12" cy="16" r="2" />
                                    <line x1="12" y1="4" x2="12" y2="14" />
                                    <line x1="12" y1="18" x2="12" y2="20" />
                                    <circle cx="18" cy="7" r="2" />
                                    <line x1="18" y1="4" x2="18" y2="5" />
                                    <line x1="18" y1="9" x2="18" y2="20" />
                                </svg>
                            </button>
                            <button aria-label="Close sidebar" id="closeSideBar"
                                class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
                                onclick="sidebarHandler(false)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>
                            <div class="px-8">
                                <div class="h-16 w-full flex items-center">
                                    <svg aria-label="Ripples. Logo"role="img" xmlns="http://www.w3.org/2000/svg"
                                        width="144" height="30" viewBox="0 0 144 30">
                                        <path fill="#5F7DF2"
                                            d="M80.544 9.48c1.177 0 2.194.306 3.053.92.86.614 1.513 1.45 1.962 2.507.448 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.699 3.51-.465 1.037-1.136 1.851-2.012 2.444-.876.592-1.885.888-3.028.888-1.405 0-2.704-.554-3.897-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78H70.45V9.657h6.145v1.663l.209-.21c1.123-1.087 2.369-1.63 3.74-1.63zm17.675 0c1.176 0 2.194.306 3.053.92.859.614 1.513 1.45 1.961 2.507.449 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.698 3.51-.466 1.037-1.136 1.851-2.012 2.444-.876.592-1.886.888-3.028.888-1.405 0-2.704-.554-3.898-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78h-1.904V9.657h6.144v1.663l.21-.21c1.122-1.087 2.368-1.63 3.739-1.63zM24.973 1c1.13 0 2.123.433 2.842 1.133 0 .004 0 .008.034.012 1.54 1.515 1.54 3.962-.034 5.472-.035.029-.069.058-.069.089-.719.65-1.712 1.05-2.773 1.05-.719 0-1.37.061-1.985.184-2.363.474-3.8 1.86-4.28 4.13-.114.489-.18 1.02-.2 1.59l-.003.176.001-.034.002.034c.022.505-.058 1.014-.239 1.495l-.076.182.064-.157c.106-.28.18-.575.217-.881l.008-.084-.026.195c-.286 1.797-1.858 3.188-3.754 3.282l-.204.005h-.103l-.103.002h-.034c-.65.012-1.232.072-1.78.181-2.328.473-3.765 1.863-4.279 4.139-.082.417-.142.863-.163 1.339l-.008.362v.23c0 2.02-1.603 3.681-3.661 3.861L4.16 29l-.48-.01c-.958-.073-1.849-.485-2.499-1.113-1.522-1.464-1.573-3.808-.152-5.33l.152-.154.103-.12c.719-.636 1.677-1.026 2.704-1.026.754 0 1.404-.062 2.02-.184 2.362-.475 3.8-1.86 4.28-4.126.136-.587.17-1.235.17-1.942 0-.991.411-1.896 1.027-2.583.069-.047.137-.097.172-.15.068-.051.102-.104.17-.159.633-.564 1.498-.925 2.408-.978l.229-.007h.034c.068 0 .171.003.274.009.616-.014 1.198-.074 1.746-.18 2.328-.474 3.766-1.863 4.279-4.135.082-.44.142-.912.163-1.418l.008-.385v-.132c0-2.138 1.78-3.872 4.005-3.877zm-.886 10c1.065 0 1.998.408 2.697 1.073.022.011.03.024.042.036l.025.017v.015c1.532 1.524 1.532 3.996 0 5.52-.034.03-.067.06-.067.09-.7.655-1.665 1.056-2.697 1.056-.7 0-1.332.062-1.932.186-2.298.477-3.696 1.873-4.163 4.157-.133.591-.2 1.242-.2 1.95 0 1.036-.399 1.975-1.032 2.674l-.1.084c-.676.679-1.551 1.055-2.441 1.13l-.223.012-.366-.006c-.633-.043-1.3-.254-1.865-.632-.156-.096-.296-.201-.432-.315l-.2-.177v-.012c-.734-.735-1.133-1.72-1.133-2.757 0-2.078 1.656-3.793 3.698-3.899l.198-.005h.133c.666-.007 1.266-.069 1.832-.185 2.265-.476 3.663-1.874 4.163-4.161.08-.442.139-.916.159-1.424l.008-.387v-.136c0-2.153 1.731-3.899 3.896-3.904zm3.882 11.025c1.375 1.367 1.375 3.583 0 4.95s-3.586 1.367-4.96 0c-1.345-1.367-1.345-3.583 0-4.95 1.374-1.367 3.585-1.367 4.96 0zm94.655-12.672c1.405 0 2.628.323 3.669.97 1.041.648 1.843 1.566 2.406 2.756.563 1.189.852 2.57.87 4.145h-9.954l.03.251c.132.906.476 1.633 1.03 2.18.605.596 1.386.895 2.343.895 1.058 0 2.09-.525 3.097-1.574l3.301 1.066-.203.291c-.69.947-1.524 1.67-2.501 2.166-1.075.545-2.349.818-3.821.818-1.473 0-2.774-.277-3.904-.831-1.13-.555-2.006-1.34-2.628-2.355-.622-1.016-.933-2.21-.933-3.58 0-1.354.324-2.582.971-3.682s1.523-1.961 2.628-2.583c1.104-.622 2.304-.933 3.599-.933zm13.955.126c1.202 0 2.314.216 3.339.648v-.47h3.034v3.91h-3.034l-.045-.137c-.317-.848-1.275-1.272-2.875-1.272-1.21 0-1.816.339-1.816 1.016 0 .296.161.516.483.66.321.144.791.262 1.409.355 1.735.22 3.102.536 4.1.946 1 .41 1.697.919 2.095 1.524.398.605.597 1.339.597 2.202 0 1.405-.48 2.5-1.441 3.282-.96.783-2.266 1.174-3.917 1.174-1.608 0-2.7-.321-3.275-.964V23h-3.098v-4.596h3.098l.032.187c.116.547.412.984.888 1.311.53.364 1.183.546 1.962.546.762 0 1.324-.087 1.688-.26.364-.174.546-.476.546-.908 0-.296-.076-.527-.228-.692-.153-.165-.447-.31-.883-.438-.435-.127-1.102-.27-2-.431-1.997-.313-3.433-.82-4.31-1.517-.875-.699-1.313-1.64-1.313-2.825 0-1.21.455-2.162 1.365-2.856.91-.695 2.11-1.042 3.599-1.042zm-69.164.178v10.27h1.98V23h-8.24v-3.072h2.032V12.78h-2.031V9.657h6.259zm-16.85-5.789l.37.005c1.94.05 3.473.494 4.6 1.335 1.198.892 1.797 2.185 1.797 3.878 0 1.168-.273 2.15-.819 2.945-.546.796-1.373 1.443-2.482 1.943l3.085 5.776h2.476V23h-5.827l-4.317-8.366h-2.183v5.116h2.4V23H39.646v-3.25h2.628V7.118h-2.628v-3.25h10.918zm61.329 0v16.06h1.892V23h-8.24v-3.072h2.082v-13h-2.082v-3.06h6.348zm-32.683 9.04c-.812 0-1.462.317-1.949.951-.486.635-.73 1.49-.73 2.565 0 1.007.252 1.847.756 2.52.503.673 1.161 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.448-.622.672-1.504.672-2.647 0-1.092-.228-1.942-.685-2.552-.457-.61-1.113-.914-1.968-.914zm17.675 0c-.813 0-1.463.317-1.95.951-.486.635-.73 1.49-.73 2.565 0 1.007.253 1.847.756 2.52.504.673 1.162 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.449-.622.673-1.504.673-2.647 0-1.092-.229-1.942-.686-2.552-.457-.61-1.113-.914-1.967-.914zM14.1 0C16.267 0 18 1.743 18 3.894v.01c0 2.155-1.733 3.903-3.9 3.903-4.166 0-6.3 2.133-6.3 6.293 0 2.103-1.667 3.817-3.734 3.9l-.5-.009c-.933-.075-1.8-.49-2.433-1.121C.4 16.134 0 15.143 0 14.1c0-2.144 1.733-3.903 3.9-3.903 4.166 0 6.3-2.133 6.3-6.294C10.2 1.751 11.934.005 14.1 0zm108.32 12.184c-.76 0-1.372.22-1.834.66-.46.44-.75 1.113-.87 2.018h5.561c-.118-.795-.442-1.44-.97-1.936-.53-.495-1.158-.742-1.886-.742zM49.525 7.118h-2.26v4.444h1.829c2.023 0 3.034-.754 3.034-2.26 0-.728-.233-1.274-.698-1.638-.466-.364-1.1-.546-1.905-.546zm15.821-3.593c.635 0 1.183.231 1.644.692.462.462.692 1.01.692 1.644 0 .677-.23 1.238-.692 1.682-.46.445-1.009.667-1.644.667-.643 0-1.195-.23-1.656-.692-.462-.461-.692-1.013-.692-1.657 0-.634.23-1.182.692-1.644.46-.461 1.013-.692 1.656-.692zM5.991 1.171c1.345 1.563 1.345 4.095 0 5.658-1.374 1.561-3.585 1.561-4.96 0-1.375-1.563-1.375-4.095 0-5.658 1.375-1.561 3.586-1.561 4.96 0z" />
                                    </svg>
                                </div>
                                <ul class="mt-12">
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-500 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none  ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-grid" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <rect x="4" y="4" width="6" height="6" rx="1">
                                                </rect>
                                                <rect x="14" y="4" width="6" height="6" rx="1">
                                                </rect>
                                                <rect x="4" y="14" width="6" height="6" rx="1">
                                                </rect>
                                                <rect x="14" y="14" width="6" height="6" rx="1">
                                                </rect>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('home')">Home</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none  ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('wallet')">Wallet</span>
                                        </a>
                                    </li>

                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none  ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-code" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="7 8 3 12 7 16"></polyline>
                                                <polyline points="17 8 21 12 17 16"></polyline>
                                                <line x1="14" y1="4" x2="10" y2="20">
                                                </line>
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('transfer')">Transactions</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('recharge')">Mobile
                                                Recharge</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-stack" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                                <polyline points="4 12 12 16 20 12" />
                                                <polyline points="4 16 12 20 20 16" />
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('electricity')">Electricity</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('gas')">Gas Bill</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('loan')">Pay Loan</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('landline')">Broadband/Landline</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('busbooking')">Bus
                                                Booking</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('mybookings')">My
                                                Bookings</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)" class="flex items-center focus:outline-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-compass" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                                <circle cx="12" cy="12" r="9"></circle>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('dth')">Recharge DTH or
                                                TV</span>
                                        </a>
                                    </li>


                                </ul>

                            </div>

                        </div>

                    </div>


                </dh-component>
            </div>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-6 overflow-hidden">
            <!-- Home Content -->
            <div id="home" class="tab-content hidden">
                <div class="flex flex-wrap justify-center lg:justify-start">


                    <!-- main1 -->
                    <div class="mr-12 mb-8 lg:mb-0">
                        <div class="w-full sm:w-96 p-5 bg-white rounded-2xl shadow-md text-center"
                            style="height: 200px;">
                            <div class="flex justify-between items-center mb-5">
                                <h3 class="text-lg font-bold">Balance</h3>
                                <div class="flex space-x-2">
                                    <button class="w-10 h-10 bg-gray-200 rounded-full text-lg">₹</button>

                                </div>
                            </div>
                            <div class="text-3xl font-bold mb-6">₹ 8,453.00</div>
                            <div class="flex justify-between">
                                <div class="flex items-center space-x-2 text-green-500">
                                    <img src="{{ asset('assets/uparrow.svg') }}" class="h-5 w-5">
                                    <span>+₹ 2,431.00</span>
                                </div>
                                <div class="flex items-center space-x-2 text-red-500">
                                    <img src="{{ asset('assets/downarrow.svg') }}" class="h-5 w-5">
                                    <span>-₹ 526.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 w-full sm:w-96 p-5 bg-white rounded-2xl shadow-md" style="height: 210px;">
                            <div class="flex justify-between items-center mb-5">
                                <h3 class="text-lg font-bold">Information</h3>

                            </div>

                            <div class="flex items-center space-x-2">
                                <img src="{{ asset('assets/location.svg') }}">
                                <p class="ml-2">Location: India</p>
                            </div><br>

                            <div class="flex items-center space-x-2">
                                <img src="{{ asset('assets/address.svg') }}">
                                <p class="ml-2">Address: Mumbai</p>
                            </div><br>

                            <div class="flex items-center space-x-2">
                                <img src="{{ asset('assets/wallet (1).svg') }}">
                                <p class="ml-2">Wallet ID: 6HE46URR677wSR446Ic</p>
                            </div>
                        </div>

                        <div class="mt-5 w-full sm:w-96 p-5 bg-white rounded-xl shadow-md" style="height: 200px;">
                            <div class="flex justify-between items-center mb-5">
                                <h3 class="text-lg font-semibold">Security</h3>
                                <img src="{{ asset('assets/dots.svg') }}" class="h-5 w-5">
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="relative w-10 h-10">
                                        <img src="{{ asset('assets/p2.svg') }}"
                                            class="absolute top-0 left-0 w-full h-full">
                                        <img src="{{ asset('assets/p1.svg') }}"
                                            class="absolute top-1 left-1 w-4/5 h-4/5">
                                    </div>
                                    <div>2X A Enabled</div>
                                </div>
                                <div class="w-10 h-5 bg-black rounded-full relative">
                                    <div class="absolute top-0.5 left-6 w-4 h-4 bg-white rounded-full transition-all">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-3">
                                    <div class="relative w-10 h-10">
                                        <img src="{{ asset('assets/p3.svg') }}"
                                            class="absolute top-0 left-0 w-full h-full">
                                        <img src="{{ asset('assets/p4.svg') }}"
                                            class="absolute top-1 left-1 w-4/5 h-4/5">
                                    </div>
                                    <div>Key</div>
                                </div>
                                <button
                                    class="px-4 py-1 bg-gray-200 border border-gray-300 rounded-md text-sm hover:bg-gray-300">
                                    Change
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- main2 -->
                    <div
                        class="w-full sm:max-w-4xl md:max-w-2xl lg:max-w-4xl bg-white rounded-lg shadow-lg flex flex-col items-center overflow-hidden mr-8 mb-8">
                        <!-- Using inline style to ensure the image size is forced to 100px x 100px -->
                        <img src="{{ asset('assets/3487900.jpg') }}" alt="Large Image" class="object-contain mt-4"
                            style="width: 400px; height: 390px;">
                        <div class="p-5 text-center">
                            <h2 class="mt-4 text-3xl font-bold text-gray-800">Accept payments online with ease</h2>
                            <p class="mt-4 text-lg text-gray-600 px-12 leading-7">
                                Grow your business with the payment gateway that powers India’s largest brands and even
                                the Paytm App.
                            </p>
                            <p class="mt-2 text-lg text-gray-600 px-12 leading-7 mb-2">
                                Millions of small & big businesses use Paytm to accept payments anywhere anytime with a
                                wide range of solutions for all kinds of merchants.
                            </p>
                        </div>
                    </div>

                    <!-- main3 -->
                    <div class="hidden sm:flex flex-col items-center space-y-5">
                        <img src="{{ asset('assets/i2.png') }}" class="w-46 h-50 rounded-2xl"
                            style="height: 200px;">
                        <img src="{{ asset('assets/i3.png') }}" class="w-46 h-50 rounded-2xl"
                            style="height: 200px;">
                        <img src="{{ asset('assets/i1.png') }}" class="w-46 h-50 rounded-2xl"
                            style="height: 200px;">
                    </div>

                </div>
            </div>

            <!-- Wallet Content -->

            <div id="wallet" class="tab-content block p-4 max-w-sm mx-auto">
                <h3 class="text-xl font-semibold mb-4 text-center">Wallet</h3>

                <div class="mt-5 w-full max-w-md p-5 bg-white rounded-2xl shadow-md mx-auto">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-5">
                        <h3 class="text-lg font-bold text-center sm:text-left">Add Amount to Wallet</h3>
                    </div>

                    <div class="flex flex-col space-y-4">
                        <div>
                            <input id="amount" type="number" placeholder="Enter amount"
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div>
                            <button
                                class="w-full bg-black text-white font-medium py-2 rounded-md hover:bg-gray-100 hover:text-black focus:outline-black focus:ring-2 focus:bg-gray-600 focus:ring-offset-2"
                                onclick="addMoneyToWallet()"> <!-- Added onclick event -->
                                Add Money to Wallet
                            </button>
                        </div>
                        <div id="wallet-message" class="text-center mt-3 mb-3"></div>
                    </div>
                </div>
            </div>

            <!-- Deposit Content -->
            {{-- <div id="deposit" class="tab-content hidden" style="margin-left: 270px;">
                <h3 class="text-xl font-semibold">Deposit-Withdraw</h3>
                <p>This is the Deposit-Withdraw section content.</p>
            </div> --}}

            <!-- Transfer Content -->
            <div id="transfer" class="tab-content hidden container">
                <h3 class="mb-8 font-extrabold">
                    All Transactions
                </h3>

                <!-- Added Overflow-x-auto for responsiveness -->
                <div class="overflow-x-auto">
                    <table class="text-left w-full">
                        <thead class="bg-black text-white">
                            <tr class="w-full mb-4">
                                <th class="p-4">Wallet ID</th>
                                <th class="p-4">Type</th>
                                <th class="p-4">Amount</th>
                                <th class="p-4">Reason</th>
                                <th class="p-4">Transaction ID</th>
                            </tr>
                        </thead>
                        <tbody class="bg-grey-light">
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                            <tr class="w-full mb-4">
                                <td class="p-4">W12346</td>
                                <td class="p-4">Credit</td>
                                <td class="p-4">$100</td>
                                <td class="p-4">Refund</td>
                                <td class="p-4">T987654321</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Recharge Content -->
            <div id="recharge" class="tab-content hidden px-4">
                <div class="flex flex-wrap gap-2 ">
                    {{-- first table --}}
                    <div
                        class="max-w-sm w-full p-6 bg-white rounded-lg shadow-md mx-auto h-96 sm:max-w-md md:max-w-lg">
                        <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">Recharge or Pay Mobile Bill
                        </h2>
                        <form>
                            <div class="flex gap-4 mb-4">
                                <label class="flex items-center">
                                    <input type="radio" name="recharge" class="mr-2">
                                    Prepaid
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="recharge" class="mr-2">
                                    Postpaid
                                </label>
                            </div>
                            <label for="phone" class="block text-sm text-gray-600 mb-1">Phone Number:</label>
                            <input type="tel" id="phone" name="phone"
                                placeholder="Enter your phone number" required
                                class="w-full sm:w-3/4 md:w-1/2 p-2 text-sm border border-gray-300 rounded-md mb-4 focus:border-black focus:ring-1 focus:ring-gray-500">

                            <div class="custom-dropdown mb-4">
                                <div class="selected-operator mb-2 text-sm text-gray-600">Select your operator</div>
                                <div class="dropdown-menu space-y-2">
                                    <div class="dropdown-item flex items-center space-x-2" data-value="airtel">
                                        <img src="assets/airtel.png" alt="Airtel Logo" class="w-6 h-6">
                                        <span>Airtel</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="jio">
                                        <img src="assets/jio.png" alt="Jio Logo" class="w-6 h-6">
                                        <span>Jio</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="vodafone">
                                        <img src="assets/vadofone.jpg" alt="Vodafone Logo" class="w-6 h-6">
                                        <span>Vodafone</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="bsnl">
                                        <img src="assets/bsnl.png" alt="BSNL Logo" class="w-6 h-6">
                                        <span>BSNL</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="mtnl">
                                        <img src="assets/mtnl.png" alt="MTNL Logo" class="w-6 h-6">
                                        <span>MTNL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="amount flex justify-between items-center mb-4">
                                <div class="a1 w-2/3">
                                    <label for="amount" class="text-sm text-gray-600">Enter Amount</label>
                                    <input type="text"
                                        class="w-full p-2 text-sm border border-gray-300 rounded-md focus:border-black focus:ring-1 focus:ring-gray-500">
                                </div>
                                <div class="a2 text-right">
                                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Browse
                                        Plans</a>
                                    <p class="text-xs text-gray-500">of all operators</p>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full p-3 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black hover:focus:border-black transition-colors">
                                Proceed To Recharge
                            </button>
                        </form>
                    </div>
                </div>
                {{-- second table --}}

                <div
                    class="max-w-sm h-auto p-8 bg-white rounded-lg shadow-md mx-auto sm:max-w-md md:max-w-lg lg:w-full xl:max-w-[1600px] mt-4">

                    <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center lg:text-left">Browse Plans</h1>
                    <hr>

                    <div class="flex flex-col lg:flex-row flex-wrap justify-center lg:justify-start gap-4 mt-2 mb-6">
                        <button onclick="showTable('recommended')"
                            class="py-2 px-4 bg-black text-white rounded-lg border border-black cursor-pointer active:bg-black active:text-white">
                            Recommended
                        </button>
                        <button onclick="showTable('unlimited')"
                            class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-black hover:text-white">
                            True Unlimited
                        </button>
                        <button onclick="showTable('data')"
                            class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-black hover:text-white">
                            Data Add On
                        </button>
                        <button onclick="showTable('entertainment')"
                            class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-black hover:text-white">
                            Entertainment
                        </button>
                        <button onclick="showTable('international')"
                            class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-black hover:text-white">
                            International Roaming
                        </button>
                        <button onclick="showTable('discontinued')"
                            class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-black hover:text-white">
                            Discontinued Plans
                        </button>
                    </div>



                    <div id="recommended" class="table-container overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Description</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- True Unlimited Table -->
                    <div id="unlimited" class="table-container overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Description</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Data Add On Table -->
                    <div id="data" class="table-container overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Description</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Maharashtra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">24 GB</td>
                                    <td class="px-4 py-2 border">336 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- True entertainment Table -->
                    <div id="entertainment" class="table-container overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Description</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Mumbai</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">1.5 GB/day</td>
                                    <td class="px-4 py-2 border">84 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- international Table -->
                    <div id="international" class="table-container overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Description</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Delhi</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">2 GB/day</td>
                                    <td class="px-4 py-2 border">56 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Delhi</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">2 GB/day</td>
                                    <td class="px-4 py-2 border">56 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Delhi</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">2 GB/day</td>
                                    <td class="px-4 py-2 border">56 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div id="discontinued" class="table-container overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Description</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Andhra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">2 GB/day</td>
                                    <td class="px-4 py-2 border">56 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Andhra</td>
                                    <td class="px-4 py-2 border">Recharge</td>
                                    <td class="px-4 py-2 border">2 GB/day</td>
                                    <td class="px-4 py-2 border">56 Days</td>
                                    <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                    <td class="px-4 py-2 border"> <button
                                            class="bg-black text-white p-1 px-4 rounded-lg">₹ 895</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-600 mt-10 bg-gray-100 p-6 rounded-lg">
                        <strong>Disclaimer : </strong> While we support most recharges, we request you to verify with
                        your operator once before proceeding.
                    </p>
                </div>

            </div>
            <!-- recharge end -->


            <div id="electricity" class="tab-content hidden">
                <div class="max-w-sm w-full h-auto p-6 bg-white rounded-lg shadow-md mx-auto sm:max-w-md md:max-w-lg">
                    <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">Electricity Bill</h2>
                    <form id="electricityForm">
                        <div class="flex gap-4 mb-4">
                            <label class="flex items-center">
                                <input type="radio" name="recharge" value="electricityBoard" class="mr-2">
                                Electricity Boards
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="recharge" value="apartments" class="mr-2">
                                Apartments
                            </label>
                        </div>

                        <!-- Dynamic Input Fields -->
                        <div id="dynamicFields"></div>

                        <button type="submit"
                            class="w-full p-3 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black hover:focus:border-black transition-colors">
                            Proceed
                        </button>
                    </form>
                </div>
            </div>

            <div id="loan" class="tab-content hidden">
                <div class="max-w-sm w-full h-auto p-6 bg-white rounded-lg shadow-md mx-auto sm:max-w-md md:max-w-lg">
                    <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">Pay Loan EMI</h2>
                    <form id="loanForm">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Lender</label>
                            <select name="lender" class="w-full p-2 border rounded">
                                <option value="" disabled selected>Select Loan Lender</option>
                                <option value="hdfc">HDFC Bank</option>
                                <option value="sbi">State Bank of India (SBI)</option>
                                <option value="icici">ICICI Bank</option>
                                <option value="axis">Axis Bank</option>
                                <option value="kotak">Kotak Mahindra Bank</option>
                                <option value="bajaj">Bajaj Finserv</option>
                                <option value="idfc">IDFC First Bank</option>
                                <option value="yesBank">Yes Bank</option>
                                <option value="indusInd">IndusInd Bank</option>
                                <option value="bankOfBaroda">Bank of Baroda</option>
                                <option value="canara">Canara Bank</option>
                                <option value="punjabNational">Punjab National Bank</option>
                                <option value="lic">LIC Housing Finance</option>
                                <option value="tataCapital">Tata Capital</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Loan Number</label>
                            <input type="text" name="loanNumber" class="w-full p-2 border rounded"
                                placeholder="Enter Loan Number">
                        </div>
                        <button type="submit"
                            class="w-full p-3 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black hover:focus:border-black transition-colors">
                            Get Payable Amount
                        </button>
                    </form>
                </div>
            </div>





            <div id="gas" class="tab-content hidden">
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





            <div id="landline" class="tab-content hidden">
                <div class="max-w-sm w-full h-auto p-6 bg-white rounded-lg shadow-md mx-auto sm:max-w-md md:max-w-lg">
                    <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">Pay Broadband / Landline Bill
                    </h2>
                    <form id="landlineForm">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Broadband / Landline Operator</label>
                            <select id="landlineOperator" name="landlineOperator"
                                class="w-full p-2 border rounded">
                                <option value="" disabled selected>Select Operator</option>
                                <option value="bsnl">BSNL</option>
                                <option value="airtel">Airtel</option>
                                <option value="jio">Jio</option>
                                <option value="hathway">Hathway</option>
                                <option value="act">ACT Broadband</option>
                                <option value="excitel">Excitel Broadband</option>
                                <option value="tataPlay">Tata Play Fiber</option>
                                <option value="railWire">RailWire</option>
                                <option value="netplus">Netplus Broadband</option>
                                <option value="youBroadband">YOU Broadband</option>
                            </select>
                        </div>
                        <div id="stdCodeField" class="mb-4 hidden">
                            <label class="block text-gray-700 font-medium mb-2">Number with STD Code</label>
                            <input type="text" name="landlineStd" class="w-full p-2 border rounded"
                                placeholder="Enter number with STD code">
                        </div>
                        <button type="submit"
                            class="w-full p-3 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black hover:focus:border-black transition-colors">
                            Get Bill
                        </button>
                    </form>
                </div>
            </div>




            <!-- Recharge DTH -->
            <!-- Recharge DTH -->
            <div id="dth" class="tab-content hidden">
                <div class="main flex flex-wrap mt-0">
                    <!-- Box for DTH Recharge -->
                    <div
                        class="box bg-white p-6 rounded-lg shadow-md w-full sm:w-96 md:w-[350px] lg:w-[400px] xl:w-[500px] h-96 ml-4 mb-6">
                        <h2 class="text-center text-lg sm:text-xl font-medium mb-5">Recharge DTH or TV</h2>
                        <div class="dropdown-container relative mb-5">
                            <div
                                class="dropdown-btn flex justify-between items-center px-4 py-2 text-lg border rounded-md border-gray-300 bg-gray-50 cursor-pointer">
                                <span id="selectedOption">DTH Operator</span>
                                <span>▼</span>
                            </div>
                            <div
                                class="dropdown-content absolute w-full bg-white shadow-lg rounded-md mt-1 z-10 max-w-full overflow-y-auto hidden">
                                <div class="option px-4 py-2 cursor-pointer flex items-center">DTH Operator</div>
                                <div class="option px-4 py-2 cursor-pointer flex items-center"
                                    data-value="tataPlay">
                                    <img src="{{ asset('assets/Tata.png') }}" alt="Tata Play" class="w-5 mr-2">
                                    Tata Play (Formerly Tata Sky)
                                </div>
                                <div class="option px-4 py-2 cursor-pointer flex items-center" data-value="airtel">
                                    <img src="{{ asset('assets/airtel1.webp') }}" alt="Airtel Digital TV"
                                        class="w-5 mr-2"> Airtel Digital TV
                                </div>
                                <div class="option px-4 py-2 cursor-pointer flex items-center"
                                    data-value="sunDirect">
                                    <img src="{{ asset('assets/sun.png') }}" alt="Sun Direct" class="w-5 mr-2">
                                    Sun Direct
                                </div>
                                <div class="option px-4 py-2 cursor-pointer flex items-center" data-value="dishTV">
                                    <img src="{{ asset('assets/dish.webp') }}" alt="Dish TV" class="w-5 mr-2">
                                    Dish TV
                                </div>
                                <div class="option px-4 py-2 cursor-pointer flex items-center" data-value="d2h">
                                    <img src="{{ asset('assets/d2h.webp') }}" alt="d2h" class="w-5 mr-2">
                                    d2h
                                </div>
                            </div>
                            <button id="clearSelection"
                                class="clear-btn absolute top-1/2 right-2 transform -translate-y-1/2 text-xl text-gray-400 hover:text-gray-700 bg-transparent border-none cursor-pointer hidden">×</button>
                        </div>

                        <!-- Mobile input field for Tata Play -->
                        <div id="mobileInputContainer" class="mobile-input hidden mt-4 w-full">
                            <input type="text" id="mobileNumber" placeholder="Mobile No/Subscriber ID"
                                class="w-full h-8 p-2 rounded-md border border-gray-300 mb-2">
                        </div>

                        <!-- Customer Id and Amount input fields for Airtel -->
                        <div id="subscriberAmountContainer" class="subscriber-amount hidden mt-4 w-full">
                            <input type="text" id="subscriberNumber" placeholder="Customer Id"
                                class="w-full h-8 p-2 rounded-md border border-gray-300 mb-2">
                            <input type="text" id="amount" placeholder="Amount"
                                class="w-full h-8 p-2 rounded-md border border-gray-300 mb-2">
                        </div>

                        <!-- Subscriber number and Amount input fields for Sun Direct -->
                        <div id="subscriberNameAmountContainer" class="subscriber-name-amount hidden mt-4 w-full">
                            <input type="text" id="subscriberName" placeholder="Subscriber Number"
                                class="w-full h-8 p-2 rounded-md border border-gray-300 mb-2">
                            <input type="text" id="sunAmount" placeholder="Amount"
                                class="w-full h-8 p-2 rounded-md border border-gray-300 mb-2">
                        </div>

                        <!-- Registered Mobile input field for Dish TV and d2h -->
                        <div id="registeredMobileContainer" class="registered-mobile hidden mt-4 w-full">
                            <input type="text" id="registeredMobile"
                                placeholder="Registered Mobile No/Viewing Card No"
                                class="w-full h-8 p-2 rounded-md border border-gray-300 mb-2">
                        </div>

                        <button class="rechargebtn bg-black text-white mt-4 rounded-md text-lg w-full h-12">Proceed to
                            Recharge</button>
                    </div>

                    <!-- Airtel Browse Plan Section -->
                    <div id="airtelbrowsePlanContainer"
                        class="container mx-auto p-6 bg-white rounded-lg shadow-lg lg:w-[700px] xl:w-[1000px] mb-6">
                        <h2 class="text-center text-xl font-semibold text-gray-700">Browse Plan</h2>
                        <h3 class="text-center text-lg text-gray-600">Browse Plans of Airtel Digital TV</h3>
                        <div
                            class="tabs flex flex-col sm:flex-row justify-around mt-6 flex-wrap space-y-4 sm:space-y-0">
                            <button onclick="updateAirtelTable('Hindi')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Hindi</button>
                            <button onclick="updateAirtelTable('Telugu')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Telugu</button>
                            <button onclick="updateAirtelTable('Tamil')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Tamil</button>
                            <button onclick="updateAirtelTable('Kannada')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Kannada</button>
                            <button onclick="updateAirtelTable('Malayalam')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Malayalam</button>
                            <button onclick="updateAirtelTable('AllSouth')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">All in one South</button>
                            <button onclick="updateAirtelTable('Marathi')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Marathi</button>
                            <button onclick="updateAirtelTable('Gujarati')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Gujarati</button>
                            <button onclick="updateAirtelTable('Odia')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">ODIA</button>
                            <button onclick="updateAirtelTable('Bengali')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Bengali</button>
                        </div>
                        <div class="overflow-x-auto mt-6">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-100 text-gray-700 text-left">
                                    <tr>
                                        <th class="p-3 text-sm">Circle</th>
                                        <th class="p-3 text-sm">Plan Type</th>
                                        <!-- <th class="p-3 text-sm">Data</th> -->
                                        <th class="p-3 text-sm">Validity</th>
                                        <th class="p-3 text-sm">Description</th>
                                        <th class="p-3 text-sm">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="planTableBody" class="text-sm text-gray-700">
                                    <!-- Content will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                        <div class="disclaimer bg-gray-100 p-3 mt-6 rounded-md text-xs text-gray-600">
                            <p><strong>Disclaimer: </strong> Verify with the operator before proceeding with recharge.
                            </p>
                        </div>
                        <button
                            class="next-button mt-6 w-full py-2 bg-black text-white rounded-md text-lg hover:bg-black">
                            Next
                        </button>
                    </div>


                    <!-- Sun Direct Browse Plan -->
                    <div id="sunbrowsePlanContainer"
                        class="container mx-auto bg-white p-6 rounded-lg shadow-lg w-full sm:w-[500px] md:w-[600px] lg:w-[700px] xl:w-[1000px] mb-6">
                        <h2 class="text-center text-xl font-semibold">Browse Plan</h2>
                        <h3 class="text-center text-lg text-gray-600">Browse Plans of Sun Direct</h3>
                        <div
                            class="tabs flex flex-col sm:flex-row justify-around mt-6 flex-wrap space-y-4 sm:space-y-0">
                            <button onclick="updateSunTable('Monthly')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Monthly</button>
                            <button onclick="updateSunTable('TopUp')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">TopUp</button>
                            <button onclick="updateSunTable('ThreeMonths')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">ThreeMonths</button>
                            <button onclick="updateSunTable('SixMonths')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">SixMonths</button>
                            <button onclick="updateSunTable('Yearly')"
                                class="tab-button bg-black text-white px-4 py-2 rounded">Yearly</button>
                        </div>

                        <!-- Added Overflow-x Auto for Responsiveness -->
                        <div class="overflow-x-auto mt-6">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-100 text-gray-700 text-left">
                                    <tr>
                                        <th class="p-3 text-sm">Circle</th>
                                        <th class="p-3 text-sm">Plan Type</th>
                                        <!-- <th class="p-3 text-sm">Data</th> -->
                                        <th class="p-3 text-sm">Validity</th>
                                        <th class="p-3 text-sm">Description</th>
                                        <th class="p-3 text-sm">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="sunplanTableBody" class="text-sm text-gray-700">
                                    <!-- Content will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>

                        <div class="disclaimer bg-gray-100 p-3 mt-6 rounded-md text-xs text-gray-600">
                            <p><strong>Disclaimer: </strong> Verify with the operator before proceeding with recharge.
                            </p>
                        </div>
                        <button
                            class="next-button mt-6 w-full py-2 bg-black text-white rounded-md text-lg hover:bg-black">
                            Next
                        </button>
                    </div>

                    <!-- DTH Operator -->
                    <div
                        class="operator cursor-pointer m-2 inline-block bg-white rounded-lg shadow-lg p-5 w-11/12 mt-5 ml-3">
                        <div class="title text-xl font-bold mb-5">DTH Operator</div>
                        <div class="operator-list flex justify-around items-center flex-wrap">
                            <div class="operator-item text-center w-36 m-2">
                                <img src="assets/Tata.png" alt="Tata Play" data-operator="tataPlay"
                                    class="operator-image w-20 h-20 rounded-full mb-2 border-2 border-gray-300">
                                <p class="text-sm text-gray-800">Tata Play (Formerly Tata Sky)</p>
                            </div>
                            <div class="operator-item text-center w-36 m-2">
                                <img src="assets/airtel1.webp" alt="Airtel Digital TV" data-operator="airtel"
                                    class="operator-image w-20 h-20 rounded-full mb-2 border-2 border-gray-300">
                                <p class="text-sm text-gray-800">Airtel Digital TV Recharge</p>
                            </div>
                            <div class="operator-item text-center w-36 m-2">
                                <img src="assets/sun.png" alt="Sun Direct" data-operator="sunDirect"
                                    class="operator-image w-20 h-20 rounded-full mb-2 border-2 border-gray-300">
                                <p class="text-sm text-gray-800">Sun Direct Recharge</p>
                            </div>
                            <div class="operator-item text-center w-36 m-2">
                                <img src="assets/dish.webp" alt="Dish TV" data-operator="dishTV"
                                    class="operator-image w-20 h-20 rounded-full mb-2 border-2 border-gray-300">
                                <p class="text-sm text-gray-800">Dish TV Recharge</p>
                            </div>
                            <div class="operator-item text-center w-36 m-2">
                                <img src="assets/d2h.webp" alt="d2h" data-operator="d2h"
                                    class="operator-image w-20 h-20 rounded-full mb-2 border-2 border-gray-300">
                                <p class="text-sm text-gray-800">d2h Recharge</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            {{-- all bookings --}}
            <div class="tab-content hidden block p-4 w-full max-w-full mx-auto" id="mybookings">
                <!-- Header -->
                <div class="bg-black text-white py-3 px-4">
                    <span class="font-semibold text-lg">My Bookings</span>
                </div>
                <!-- Table Container -->
                <div class="w-full overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300 text-left">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">User ID</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Seat Numbers</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Bus Name</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Fare</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Source</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Destination</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Arrival Time</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Departure Time</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Bus Type</th>
                                <th class="py-2 px-3 border font-medium text-xs sm:text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userbookings" class="text-gray-600">

                        </tbody>
                    </table>
                </div>
            </div>




                <!-- Bus Booking -->
                <!-- Bus Booking -->
                <div id="busbooking" class="tab-content hidden block p-4 w-full max-w-none mx-0">
                    <div class="bg-gray-100 min-h-screen flex justify-center">
                        <div class="w-full bg-white shadow-lg rounded-lg">
                            <!-- Tabs -->
                            <div class="flex flex-wrap justify-around border-b border-gray-300">
                                <button id="homeTab"
                                    class="w-full sm:w-1/2 py-2 text-gray-600 hover:text-blue-500 border-b-2 border-transparent transition sm:text-lg md:text-xl"
                                    onclick="showTab('home')">
                                    Home
                                </button>
                                <button id="profileTab"
                                    class="w-full sm:w-1/2 py-2 text-gray-600 hover:text-blue-500 border-b-2 border-transparent transition sm:text-lg md:text-xl"
                                    onclick="showTab('profile')">
                                    Profile
                                </button>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <!-- Home Content -->
                                <div id="homeContent">
                                    <header
                                        class="flex flex-col lg:flex-row justify-between items-center px-4 sm:px-12 py-4 bg-gray-100 border-b border-gray-300">
                                        <div class="logo mb-4 lg:mb-0">
                                            <img src="{{ asset('assets/buslogo.png') }}" alt="Bus Logo"
                                                class="h-16 sm:h-20 lg:h-24 w-auto">
                                        </div>
                                        <nav class="nav mb-4 lg:mb-0">
                                            <a href="#"
                                                class="text-base sm:text-lg lg:text-xl text-black mr-4">Bus
                                                Tickets</a>
                                        </nav>
                                        <div
                                            class="account flex flex-col sm:flex-row items-center justify-center sm:justify-end">
                                            <a href="#"
                                                class="text-base sm:text-lg lg:text-xl text-black mb-2 sm:mb-0 sm:mr-4">Help</a>
                                            <select id="language-select" name="language"
                                                class="text-base sm:text-lg p-2 border rounded-lg mb-2 sm:mb-0 sm:mr-4">
                                                <option value="en">English</option>
                                                <option value="hi">Hindi</option>
                                                <option value="ta">Tamil</option>
                                            </select>
                                            <a href="#"
                                                class="text-base sm:text-lg lg:text-xl text-black">Account</a>
                                        </div>
                                    </header>

                                    <section class="hero bg-black text-white text-center py-8 lg:py-12">
                                        <h1 class="text-2xl sm:text-3xl lg:text-4xl mb-4 sm:mb-8">
                                            India's No. 1 Online Bus Ticket Booking Site
                                        </h1>
                                        <div
                                            class="search-box flex flex-col sm:flex-row justify-center gap-4 mb-6 sm:mb-12">
                                            <input id="fromInput" type="text" placeholder="From"
                                                class="p-2 sm:p-3 border text-black border-gray-300 rounded-lg w-full sm:w-60 md:w-72 text-sm sm:text-base">
                                            <input id="toInput" type="text" placeholder="To"
                                                class="p-2 sm:p-3 border text-black border-gray-300 rounded-lg w-full sm:w-60 md:w-72 text-sm sm:text-base">
                                            <input id="dateInput" type="date"
                                                class="p-2 sm:p-3 border border-gray-300 text-black rounded-lg w-full sm:w-60 md:w-72 text-sm sm:text-base">
                                            <button id="searchButton"
                                                class="p-2 sm:p-3 px-4 sm:px-6 bg-white text-black rounded-lg text-sm sm:text-base">
                                                Search Buses
                                            </button>
                                        </div>
                                        <p class="text-base sm:text-lg lg:text-xl mb-4 sm:mb-8">
                                            Apno ko, Sapno ko Kareeb Laaye.
                                        </p>
                                    </section>

                                    <section class="offers py-6 sm:py-8 bg-gray-100 shadow-lg w-full">
                                        <h2 class="text-lg sm:text-xl lg:text-2xl text-center mb-6">Trending Offers
                                        </h2>
                                        <div
                                            class="offer-cards grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-12">
                                            <div
                                                class="card bg-white border border-gray-300 p-4 sm:p-6 rounded-lg shadow-md text-center">
                                                <h3 class="text-base sm:text-lg mb-2">Save up to ₹250 on bus tickets
                                                </h3>
                                                <p class="text-xs sm:text-sm mb-4">Valid till 30 Nov</p>
                                                <button
                                                    class="p-2 px-4 bg-black text-white rounded-md text-xs sm:text-sm">Use
                                                    Code: FIRST</button>
                                            </div>
                                            <div
                                                class="card bg-white border border-gray-300 p-4 sm:p-6 rounded-lg shadow-md text-center">
                                                <h3 class="text-base sm:text-lg mb-2">Save up to ₹300 on Karnataka,
                                                    Tamil
                                                </h3>
                                                <p class="text-xs sm:text-sm mb-4">Valid till 30 Nov</p>
                                                <button
                                                    class="p-2 px-4 bg-black text-white rounded-md text-xs sm:text-sm">Use
                                                    Code: CASH300</button>
                                            </div>
                                            <div
                                                class="card bg-white border border-gray-300 p-4 sm:p-6 rounded-lg shadow-md text-center">
                                                <h3 class="text-base sm:text-lg mb-2">Save up to ₹300 on AP, TS routes
                                                </h3>
                                                <p class="text-xs sm:text-sm mb-4">Valid till 30 Nov</p>
                                                <button
                                                    class="p-2 px-4 bg-black text-white rounded-md text-xs sm:text-sm">Use
                                                    Code: SUPERHIT</button>
                                            </div>
                                            <div
                                                class="card bg-white border border-gray-300 p-4 sm:p-6 rounded-lg shadow-md text-center">
                                                <h3 class="text-base sm:text-lg mb-2">Save up to ₹500 with ICICI Bank
                                                </h3>
                                                <p class="text-xs sm:text-sm mb-4">Valid till 30 Nov</p>
                                                <button
                                                    class="p-2 px-4 bg-black text-white rounded-md text-xs sm:text-sm">Use
                                                    Code: ICICI500</button>
                                            </div>
                                        </div>
                                    </section>
                                </div>


                                <!-- profile content -->
                                <div id="profileContent" class="hidden">
                                    <!-- profile content -->
                                    <header
                                        class="flex flex-col sm:flex-row justify-between items-center px-4 sm:px-24 py-4 bg-gray-100 border-b border-gray-300">
                                        <div class="logo mb-4 sm:mb-0">
                                            <img src="{{ asset('assets/buslogo.png') }}" alt="Bus Logo"
                                                class="h-32 w-48">
                                        </div>
                                        <nav class="nav flex flex-row sm:flex-col sm:items-start mb-4 sm:mb-0">
                                            <a href="#" class="text-xl text-black mx-4">Bus Tickets</a>
                                        </nav>
                                        <div class="account flex sm:flex-row sm:items-center">
                                            <a href="#" class="text-xl text-black mx-4">Help</a>
                                            <select id="language-select" name="language"
                                                class="text-lg p-2 border border-gray-300 rounded-md mx-4 mb-4 sm:mb-0">
                                                <option value="en">English</option>
                                                <option value="es">Hindi</option>
                                                <option value="fr">Tamil</option>
                                            </select>
                                            <a href="#" class="text-xl text-black">Account</a>
                                        </div>

                                    </header>



                                    <div class="bg-white p-5 sm:p-6 md:p-8 lg:p-10 border-b border-gray-300">
                                        <p class="text-xs sm:text-sm md:text-base lg:text-lg text-gray-500">Bus Ticket
                                            >
                                            Chennai to Bangalore Bus</p>
                                        <h1 class="mt-1 text-sm sm:text-lg md:text-xl lg:text-2xl text-gray-800">
                                            Chennai
                                            to Bangalore Bus</h1>
                                        <button
                                            class="inline-block py-2 px-4 border border-gray-300 rounded text-xs sm:text-sm md:text-base lg:text-lg bg-white cursor-pointer mt-3 sm:mt-4 md:mt-5 lg:mt-6">Modify</button>
                                    </div>


                                    <div class="flex flex-wrap mt-5">

                                        <!-- Filters Section -->
                                        <div
                                            class="bg-white rounded-lg p-5 shadow-md w-full md:w-1/2 lg:w-1/4 sm:max-h-[60vh] overflow-y-auto p-4">
                                            <h2 class="text-base mb-4">Filters</h2>
                                            <ul class="list-none">
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Live
                                                    Tracking</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Primo
                                                    Bus</li>
                                            </ul>

                                            <h2 class="text-base mb-4">Departure Time</h2>
                                            <ul class="list-none">
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Before
                                                    6 am</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2"> 6
                                                    am
                                                    to 12 pm</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2"> 12
                                                    pm
                                                    to 6 pm</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    After
                                                    6 pm</li>
                                            </ul>

                                            <h2 class="text-base mb-4">Bus Type</h2>
                                            <ul class="list-none">
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Seater
                                                </li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Sleeper</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2"> AC
                                                </li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Non AC
                                                </li>
                                            </ul>

                                            <h2 class="text-base mb-4">Arrival Time</h2>
                                            <ul class="list-none">
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    Before
                                                    6 am</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2"> 6
                                                    am
                                                    to 12 pm</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2"> 12
                                                    pm
                                                    to 6 pm</li>
                                                <li class="mb-2 text-sm"><input type="checkbox" class="mr-2">
                                                    After
                                                    6 pm</li>
                                            </ul>
                                        </div>


                                        <!-- bus found -->
                                        <div
                                            class="w-full sm-w-full bg-white rounded-lg shadow-md p-5 flex flex-col md:w-3/4 p-4">
                                            <h2 class="text-lg mb-2">164 Buses Found</h2>
                                            <div
                                                class="border-b py-5 flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0">
                                                <div class="w-full sm:w-auto flex flex-col sm:flex-1">
                                                    <h3 class="text-lg mb-4 text-blue-500">KMRL Kalaimakal</h3>
                                                    <p class="text-sm text-gray-600">A/C Seater / Sleeper (2+1)</p>
                                                </div>
                                                <div
                                                    class="w-full sm:w-auto flex flex-col sm:flex-1 items-center sm:text-center">
                                                    <p class="text-xl font-bold text-gray-800 mb-1">22:45</p>
                                                    <div class="text-gray-500">
                                                        <p>06h 45m</p>
                                                    </div>
                                                    <p class="text-xl font-bold text-gray-800 mb-1">05:30</p>
                                                </div>
                                                <div class="flex-1 text-center w-full sm:w-auto">
                                                    <p class="text-lg font-bold text-gray-800">Starts from INR 740</p>
                                                </div>
                                                <div class="flex-1 text-right w-full sm:w-auto sm:mr-10">
                                                    <p class="text-sm text-gray-600">22 Seats available</p>
                                                    <p class="text-sm text-gray-600">10 Single</p>
                                                </div>
                                                <button id="view-seats-btn"
                                                    class="mt-4 sm:mt-0 sm:ml-4 px-4 py-2 bg-black text-white rounded-md w-full sm:w-auto">
                                                    View Seats
                                                </button>
                                            </div>




                                            <!-- Seat Selection Wrapper -->


                                        </div><!-- 7 -->
                                    </div> <!-- 6 -->
                                </div><!-- 5 -->
                            </div><!-- 4 -->
                        </div><!-- 3 -->
                    </div><!-- 2 -->
                </div><!-- 1 -->
                <!-- bus booking -->
                <!-- bus booking -->









                <!-- Seat Selection Popup (Initially Hidden) -->
                <div id="seatLayout"
                    class="seatWrapper hidden fixed top-0 left-0 w-full h-full bg-gray-700 bg-opacity-50 flex justify-center items-center z-50">
                    <div class="bg-white p-4 rounded-lg w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">
                        <div class="font-bold text-center mt-4 mb-2 text-xl">Bus Seat Selection</div>

                        <!-- Seat container for dynamic seats -->
                        <div id="seatContainer"
                            class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-1 justify-center">
                            <!-- Seats will be dynamically inserted here -->
                        </div>

                        <div class="text-center mt-4">
                            <!-- Close Button -->
                            <button id="close-seat-modal"
                                class="px-4 py-2 bg-gray-500 text-white rounded-md">Close</button>

                            <!-- Book Seat Button -->
                            <button id="book-seat-btn"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md ml-4 hidden">
                                Book Seat
                            </button>
                        </div>
                    </div>
                </div>












            </div>


            
        </div>


        <script>
            // Get the dropdown and the input field container
            const landlineOperator = document.getElementById('landlineOperator');
            const stdCodeField = document.getElementById('stdCodeField');

            // Add event listener for changes in the dropdown
            landlineOperator.addEventListener('change', function() {
                if (this.value) {
                    // Show the STD Code field if an operator is selected
                    stdCodeField.classList.remove('hidden');
                } else {
                    // Hide the STD Code field if no operator is selected
                    stdCodeField.classList.add('hidden');
                }
            });
        </script>

        <!-- JavaScript to handle tab switching -->
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



        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const dynamicFields = document.getElementById('dynamicFields');
                const form = document.getElementById('electricityForm');

                form.addEventListener('change', (event) => {
                    if (event.target.name === 'recharge') {
                        dynamicFields.innerHTML = ''; // Clear existing fields

                        if (event.target.value === 'electricityBoard') {
                            // Add fields for Electricity Boards
                            dynamicFields.innerHTML = `
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">State</label>
                                <input type="text" name="state" class="w-full p-2 border rounded" placeholder="Enter your state">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Electricity Board</label>
                                <input type="text" name="electricityBoard" class="w-full p-2 border rounded" placeholder="Enter electricity board">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Consumer Number</label>
                                <input type="text" name="consumerNumber" class="w-full p-2 border rounded" placeholder="Enter consumer number">
                            </div>
                        `;
                        } else if (event.target.value === 'apartments') {
                            // Add fields for Apartments
                            dynamicFields.innerHTML = `
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">City</label>
                                <input type="text" name="city" class="w-full p-2 border rounded" placeholder="Enter your city">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Apartment</label>
                                <input type="text" name="apartment" class="w-full p-2 border rounded" placeholder="Enter apartment name">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Utility Type</label>
                                <select name="utilityType" class="w-full p-2 border rounded">
                                    <option value="electricity">Electricity</option>
                                    <option value="water">Water</option>
                                </select>
                            </div>
                        `;
                        }
                    }
                });
            });
        </script>

        <script>
            function showContent(tabName) {
                // Hide all tab contents
                const contents = document.querySelectorAll('.tab-content');
                contents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show the clicked tab content
                const activeContent = document.getElementById(tabName);
                activeContent.classList.remove('hidden');
            }
        </script>


        <script>
            var sideBar = document.getElementById("mobile-nav");
            var openSidebar = document.getElementById("openSideBar");
            var closeSidebar = document.getElementById("closeSideBar");
            sideBar.style.transform = "translateX(-260px)";

            function sidebarHandler(flag) {
                if (flag) {
                    sideBar.style.transform = "translateX(0px)";
                    openSidebar.classList.add("hidden");
                    closeSidebar.classList.remove("hidden");
                } else {
                    sideBar.style.transform = "translateX(-260px)";
                    closeSidebar.classList.add("hidden");
                    openSidebar.classList.remove("hidden");
                }
            }


            function toggleDropdownMenu(event) {
                const dropdownMenu = this.querySelector('.dropdown-menu');

                // Close other open menus
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) menu.style.display = 'none';
                });

                // Toggle current menu
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';

                event.stopPropagation();
            }

            function selectDropdownItem(event) {
                const selectedOperator = this.querySelector('span').textContent.trim();
                const operatorInput = document.getElementById('operator');
                const selectedDiv = document.querySelector('.selected-operator');

                // Update the selected operator and hidden input value
                if (selectedDiv) selectedDiv.textContent = selectedOperator;
                if (operatorInput) operatorInput.value = this.dataset.value;

                // Hide dropdown menu
                const dropdownMenu = this.closest('.dropdown-menu');
                if (dropdownMenu) dropdownMenu.style.display = 'none';

                event.stopPropagation();
            }


            function addMoneyToWallet() {
                const amountInput = document.getElementById('amount');
                const amount = amountInput.value;
                const messageElement = document.getElementById('wallet-message');

                // Clear previous messages
                messageElement.textContent = '';

                // Validate the input
                if (!amount || isNaN(amount) || amount <= 0) {
                    messageElement.textContent = 'Please enter a valid amount.';
                    messageElement.style.color = 'red';
                    return;
                }

                // Send the request to the backend
                axios.post('/dashboard', {
                        amount: amount,
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        }
                    })
                    .then(response => {
                        // Display the success message and the updated wallet balance
                        messageElement.innerHTML = `
            <p style="color: green;">${response.data.message}</p>
            <p>Your current wallet balance is: ₹ ${response.data.wallet}</p>
        `;
                        amountInput.value = ''; // Reset the input field
                    })
                    .catch(error => {
                        console.error(error); // Log the error
                        messageElement.textContent = 'Failed to add money. Please try again.';
                        messageElement.style.color = 'red';
                    });
            }


            document.addEventListener('DOMContentLoaded', function() {
                // Toggle dropdown menu on click
                const dropdownWrappers = document.querySelectorAll('.custom-dropdown');
                dropdownWrappers.forEach(wrapper => {
                    wrapper.addEventListener('click', toggleDropdownMenu);
                });

                // Handle dropdown item selection
                const dropdownItems = document.querySelectorAll('.dropdown-item');
                dropdownItems.forEach(item => {
                    item.addEventListener('click', selectDropdownItem);
                });

                // Close dropdown if clicked outside
                document.addEventListener('click', function() {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });
                });
            });
        </script>

        <script>
            // Function to show only the specified table
            function showTable(tableId) {
                // Hide all tables
                const tables = document.querySelectorAll('.table-container');
                tables.forEach(table => table.style.display = 'none');

                // Show the selected table
                document.getElementById(tableId).style.display = 'block';

                // Save the currently displayed table in localStorage
                localStorage.setItem('activeTable', tableId);
            }

            // Function to initialize the view on page load
            document.addEventListener('DOMContentLoaded', () => {
                // Get the last active table from localStorage
                const activeTable = localStorage.getItem('activeTable') ||
                    'recommended-table'; // Default to 'recommended-table'

                // Show only the active table
                showTable(activeTable);
            });
        </script>


        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                sidebar.classList.toggle('hidden'); // Toggle sidebar visibility
                mainContent.classList.toggle('lg:ml-64'); // Adjust main content position
            }
        </script>

        <script>
            var sideBar = document.getElementById("mobile-nav");
            var openSidebar = document.getElementById("openSideBar");
            var closeSidebar = document.getElementById("closeSideBar");
            sideBar.style.transform = "translateX(-260px)";

            function sidebarHandler(flag) {
                if (flag) {
                    sideBar.style.transform = "translateX(0px)";
                    openSidebar.classList.add("hidden");
                    closeSidebar.classList.remove("hidden");
                } else {
                    sideBar.style.transform = "translateX(-260px)";
                    closeSidebar.classList.add("hidden");
                    openSidebar.classList.remove("hidden");
                }
            }
        </script>


        <script>
            const plans = {
                Hindi: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Hindi Entertainment - SD Pack',
                        price: 'Rs. 289'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Hindi Entertainment - HD Pack',
                        price: 'Rs. 362'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Hindi Ultimate - SD Pack',
                        price: 'Rs. 364'
                    }
                ],
                Tamil: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Tamil Lite - SD Pack',
                        price: 'Rs. 199'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Month',
                        description: 'Tamil Full - HD Pack',
                        price: 'Rs. 299'
                    }
                ],
                Telugu: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Month',
                        description: 'Telugu Entertainment - SD Pack',
                        price: 'Rs. 499'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Telugu Premium - HD Pack',
                        price: 'Rs. 355'
                    }
                ],
                Kannada: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '2 Month',
                        description: 'Kannada Entertainment - SD Pack',
                        price: 'Rs. 750'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '5 Month',
                        description: 'Kannada Premium - HD Pack',
                        price: 'Rs. 650'
                    }
                ],
                Malayalam: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '4 Month',
                        description: 'Malayalam Entertainment - SD Pack',
                        price: 'Rs. 250'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Month',
                        description: 'Malayalam Premium - HD Pack',
                        price: 'Rs. 599'
                    }
                ],
                AllSouth: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '2 Month',
                        description: 'AllSouth Entertainment - SD Pack',
                        price: 'Rs. 480'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '4 Month',
                        description: 'AllSouth Premium - HD Pack',
                        price: 'Rs. 699'
                    }
                ],
                Marathi: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Month',
                        description: 'Marathi Entertainment - SD Pack',
                        price: 'Rs. 550'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Marathi Premium - HD Pack',
                        price: 'Rs. 300'
                    }
                ],
                Gujarati: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '3 Month',
                        description: 'Gujarati Entertainment - SD Pack',
                        price: 'Rs. 350'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Gujarati Premium - HD Pack',
                        price: 'Rs. 550'
                    }
                ],
                Odia: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Odia Entertainment - SD Pack',
                        price: 'Rs. 499'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Month',
                        description: 'Odia Premium - HD Pack',
                        price: 'Rs. 350'
                    }
                ],
                Bengali: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '4 Month',
                        description: 'Bengali Entertainment - SD Pack',
                        price: 'Rs. 650'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '3 Month',
                        description: 'Bengali Premium - HD Pack',
                        price: 'Rs. 399'
                    }
                ]

            };

            function updateAirtelTable(language) {
                const tbody = document.getElementById('planTableBody');
                tbody.innerHTML = ''; // Clear existing rows

                //   const tabs = document.querySelectorAll('.tabs button');
                //   tabs.forEach(tab => tab.classList.remove('bg-gray-200', 'text-white'));
                //   const selectedTab = Array.from(tabs).find(tab => tab.innerText.toLowerCase() === language.toLowerCase());
                //   if (selectedTab) {
                //       selectedTab.classList.add('bg-gray-200', 'text-white'); <td class="p-3">${plan.data}</td>
                //   }

                if (plans[language]) {
                    plans[language].forEach(plan => {
                        const row = `<tr class="hover:bg-gray-100">
                        <td class="p-3">${plan.circle}</td>
                        <td class="p-3">${plan.type}</td>
                        
                        <td class="p-3">${plan.validity}</td>
                        <td class="p-3">${plan.description}</td>
                        <td class="p-3">
                            <button class="price-button py-1 px-3 bg-gray-200 text-blue-500 border border-blue-500 rounded-md text-sm hover:bg-gray-300">
                                ${plan.price}
                            </button>
                        </td>
                    </tr>`;
                        tbody.innerHTML += row;
                    });
                } else {
                    tbody.innerHTML =
                        '<tr><td colspan="6" class="p-3 text-center">No plans available for the selected language.</td></tr>';
                }
            }

            const dropdownBtn = document.querySelector('.dropdown-btn');
            const dropdownContent = document.querySelector('.dropdown-content');
            const selectedOption = document.getElementById('selectedOption');
            const clearSelectionBtn = document.getElementById('clearSelection');
            const operatorItems = document.querySelectorAll('.operator-item');

            const mobileInputContainer = document.getElementById('mobileInputContainer');
            const subscriberAmountContainer = document.getElementById('subscriberAmountContainer');
            const subscriberNameAmountContainer = document.getElementById('subscriberNameAmountContainer');
            const registeredMobileContainer = document.getElementById('registeredMobileContainer');
            const airtelBrowsePlanContainer = document.getElementById('airtelbrowsePlanContainer');
            const sunBrowsePlanContainer = document.getElementById('sunbrowsePlanContainer');
            const rechargeBtn = document.querySelector('.rechargebtn');



            window.onload = function() {
                document.getElementById('airtelbrowsePlanContainer').style.display = 'none';
                document.getElementById('sunbrowsePlanContainer').style.display = 'none';
                document.getElementById('mobileInputContainer').style.display = 'none';
                document.getElementById('subscriberAmountContainer').style.display = 'none';
                document.getElementById('subscriberNameAmountContainer').style.display = 'none';
                document.getElementById('registeredMobileContainer').style.display = 'none';
                clearSelectionBtn.style.display = 'none';
            };


            dropdownBtn.addEventListener('click', function() {
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });

            clearSelectionBtn.addEventListener('click', function() {
                selectedOption.textContent = 'DTH Operator';
                dropdownContent.style.display = 'none';
                mobileInputContainer.style.display = 'none';
                subscriberAmountContainer.style.display = 'none';
                subscriberNameAmountContainer.style.display = 'none';
                registeredMobileContainer.style.display = 'none';
                airtelBrowsePlanContainer.style.display = 'none';
                sunBrowsePlanContainer.style.display = 'none';
                clearSelectionBtn.style.display = 'none';
            });

            const options = document.querySelectorAll('.dropdown-content .option');
            options.forEach(function(option) {
                option.addEventListener('click', function() {
                    selectedOption.textContent = option.textContent;
                    dropdownContent.style.display = 'none';
                    clearSelectionBtn.style.display = 'block';

                    const operator = option.dataset.value;

                    // Hide all inputs initially
                    mobileInputContainer.style.display = 'none';
                    subscriberAmountContainer.style.display = 'none';
                    subscriberNameAmountContainer.style.display = 'none';
                    registeredMobileContainer.style.display = 'none';
                    airtelBrowsePlanContainer.style.display = 'none';
                    sunBrowsePlanContainer.style.display = 'none';

                    // Show specific input based on selected operator
                    if (operator === 'tataPlay') {
                        mobileInputContainer.style.display = 'block';
                    } else if (operator === 'airtel') {
                        subscriberAmountContainer.style.display = 'block';
                        airtelBrowsePlanContainer.style.display = 'block';
                    } else if (operator === 'sunDirect') {
                        subscriberNameAmountContainer.style.display = 'block';
                        sunBrowsePlanContainer.style.display = 'block';
                    } else if (operator === 'dishTV' || operator === 'd2h') {
                        registeredMobileContainer.style.display = 'block';
                    }
                });
            });


            //for dth images
            document.addEventListener('DOMContentLoaded', function() {
                const operatorImages = document.querySelectorAll('.operator-image');
                const selectedOption = document.getElementById('selectedOption');
                const clearSelectionBtn = document.getElementById('clearSelection');
                const mobileInputContainer = document.getElementById('mobileInputContainer');
                const subscriberAmountContainer = document.getElementById('subscriberAmountContainer');
                const subscriberNameAmountContainer = document.getElementById('subscriberNameAmountContainer');
                const registeredMobileContainer = document.getElementById('registeredMobileContainer');
                const airtelBrowsePlanContainer = document.getElementById('airtelbrowsePlanContainer');
                const sunBrowsePlanContainer = document.getElementById('sunbrowsePlanContainer');

                // Initial state
                clearContainers();

                operatorImages.forEach(image => {
                    image.addEventListener('click', () => {
                        handleOperatorSelection(image.dataset.operator, image);
                    });
                });

                clearSelectionBtn.addEventListener('click', () => {
                    clearContainers();
                    selectedOption.textContent = 'Select an Operator';
                    clearSelectionBtn.style.display = 'none';

                    operatorImages.forEach(image => {
                        image.classList.remove('selected');
                    });
                });

                function handleOperatorSelection(operator, selectedImage) {
                    clearContainers();
                    selectedOption.textContent = operator.charAt(0).toUpperCase() + operator.slice(1);
                    clearSelectionBtn.style.display = 'block';

                    operatorImages.forEach(image => {
                        image.classList.remove('selected');
                    });
                    selectedImage.classList.add('selected');

                    if (operator === 'tataPlay') {
                        mobileInputContainer.style.display = 'block';
                    } else if (operator === 'airtel') {
                        subscriberAmountContainer.style.display = 'block';
                        airtelBrowsePlanContainer.style.display = 'block';
                    } else if (operator === 'sunDirect') {
                        subscriberNameAmountContainer.style.display = 'block';
                        sunBrowsePlanContainer.style.display = 'block';
                    } else if (operator === 'dishTV' || operator === 'd2h') {
                        registeredMobileContainer.style.display = 'block';
                    }
                }

                function clearContainers() {
                    mobileInputContainer.style.display = 'none';
                    subscriberAmountContainer.style.display = 'none';
                    subscriberNameAmountContainer.style.display = 'none';
                    registeredMobileContainer.style.display = 'none';
                    airtelBrowsePlanContainer.style.display = 'none';
                    sunBrowsePlanContainer.style.display = 'none';
                }
            });



            // Handle recharge button click
            rechargeBtn.addEventListener('click', function() {
                alert('Proceeding with recharge...');


            });

            // Plan data
            const sunplans = {
                Monthly: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Monthly SD Pack',
                        price: 'Rs. 150'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '1 Month',
                        description: 'Monthly HD Pack',
                        price: 'Rs. 200'
                    }
                ],
                TopUp: [{
                        circle: 'All',
                        type: 'Top Up',
                        data: 'NA',
                        validity: 'NA',
                        description: 'Top Up Pack A',
                        price: 'Rs. 100'
                    },
                    {
                        circle: 'All',
                        type: 'Top Up',
                        data: 'NA',
                        validity: 'NA',
                        description: 'Top Up Pack B',
                        price: 'Rs. 200'
                    }
                ],
                ThreeMonths: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '3 Months',
                        description: '3-Month SD Pack',
                        price: 'Rs. 400'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '3 Months',
                        description: '3-Month HD Pack',
                        price: 'Rs. 600'
                    }
                ],
                SixMonths: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Months',
                        description: '6-Month ROI Joy SD Pack',
                        price: 'Rs. 745'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '6 Months',
                        description: '6-Month Bengali Joy SD Pack',
                        price: 'Rs. 945'
                    }
                ],
                Yearly: [{
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '12 Months',
                        description: 'Yearly SD Pack',
                        price: 'Rs. 1200'
                    },
                    {
                        circle: 'All',
                        type: 'Recharge',
                        data: 'NA',
                        validity: '12 Months',
                        description: 'Yearly HD Pack',
                        price: 'Rs. 2000'
                    }
                ]
            };

            // Function to update the table
            function updateSunTable(packType) {
                const tbody = document.getElementById('sunplanTableBody');
                tbody.innerHTML = ''; // Clear existing table content <td class="p-3">${plan.data}</td>

                if (sunplans[packType]) {
                    sunplans[packType].forEach(plan => {
                        const row = `
                          <tr>
                              <td class="p-3">${plan.circle}</td>
                              <td class="p-3">${plan.type}</td>
                              
                              <td class="p-3">${plan.validity}</td>
                              <td class="p-3">${plan.description}</td>
                              <td class="p-3"><button class="price-button">${plan.price}</button></td>
                          </tr>
                      `;
                        tbody.innerHTML += row; // Add new rows
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="6">No data available</td></tr>';
                }
            }




            document.querySelectorAll('.operator-item').forEach(operator => {
                operator.addEventListener('click', () => {
                    const selectedOperator = operator.getAttribute('data-value');
                    handleOperatorSelection(selectedOperator);
                });
            });

            function handleOperatorSelection(operator) {
                document.getElementById("selectedOption").innerText = operator.charAt(0).toUpperCase() + operator.slice(1);
                document.querySelectorAll('.mobile-input, .subscriber-amount, .subscriber-name-amount, .registered-mobile')
                    .forEach(container => {
                        container.classList.add('hidden');
                    });

                if (operator === 'tataPlay') {
                    document.getElementById('mobileInputContainer').classList.remove('hidden');
                } else if (operator === 'airtel') {
                    document.getElementById('subscriberAmountContainer').classList.remove('hidden');
                } else if (operator === 'sunDirect') {
                    document.getElementById('subscriberNameAmountContainer').classList.remove('hidden');
                } else if (operator === 'dishTV' || operator === 'd2h') {
                    document.getElementById('registeredMobileContainer').classList.remove('hidden');
                }
            }
        </script>


        <script>
            function showTab(tab) {
                const homeContent = document.getElementById('homeContent');
                const profileContent = document.getElementById('profileContent');
                const homeTab = document.getElementById('homeTab');
                const profileTab = document.getElementById('profileTab');

                if (tab === 'home') {
                    homeContent.classList.remove('hidden');
                    profileContent.classList.add('hidden');
                    homeTab.classList.add('text-blue-500', 'border-blue-500');
                    profileTab.classList.remove('text-blue-500', 'border-blue-500');
                } else if (tab === 'profile') {
                    profileContent.classList.remove('hidden');
                    homeContent.classList.add('hidden');
                    profileTab.classList.add('text-blue-500', 'border-blue-500');
                    homeTab.classList.remove('text-blue-500', 'border-blue-500');
                }
            }

            // Default to the Home tab after the page is loaded
            document.addEventListener('DOMContentLoaded', () => {
                showTab('home');
            });
        </script>



        <script>
            const selectedSeats = new Set(); // To store selected seat IDs
            const bookSeatBtn = document.getElementById('book-seat-btn');
            let fare;

            function viewSeats(routeId) {
                window.currentRouteId = routeId;
                const seatModal = document.getElementById('seatLayout');
                const seatContainer = document.getElementById('seatContainer');
                

                // Show the modal
                seatModal.classList.remove('hidden');

                // Fetching seats using routeId
                fetch(`/seats/${routeId}`)
                    .then(response => response.json())
                    .then(data => {
                        const {
                            seats,
                            routeFare
                        } = data; // Assuming the API returns { seats, routeFare }

                        // Set the fare dynamically
                        fare = routeFare;
                        console.log('Route Fare:', fare); // Log the fare for debugging

                        seatContainer.innerHTML = ''; // Clear any existing seats

                        // Create seat rows dynamically (same as your original logic)
                        let rows = [];
                        let row = [];
                        seats.forEach((seat, index) => {
                            const seatId = seat.seat_number;
                            const seatStatus = seat.status;

                            const seatDiv = document.createElement("div");
                            seatDiv.classList.add("seat", "w-10", "h-10", "rounded-lg", "cursor-pointer", "flex",
                                "items-center", "justify-center", "relative", "border");

                            if (seatStatus === 'booked') {
                                seatDiv.classList.add("bg-red-500", "text-white");
                                seatDiv.textContent = "B";
                            } else if (seatStatus === 'available') {
                                seatDiv.classList.add("bg-green-300", "text-black");
                                seatDiv.textContent = seatId;
                            } else {
                                seatDiv.classList.add("bg-gray-200", "text-black");
                                seatDiv.textContent = "N/A";
                            }

                            seatDiv.dataset.seatNo = seatId;

                            seatDiv.addEventListener('click', () => {
                                if (seatStatus === 'available') {
                                    if (selectedSeats.has(seatId)) {
                                        selectedSeats.delete(seatId);
                                        seatDiv.classList.remove("bg-blue-500", "text-white");
                                        seatDiv.classList.add("bg-green-300", "text-black");
                                    } else {
                                        selectedSeats.add(seatId);
                                        seatDiv.classList.add("bg-blue-500", "text-white");
                                        seatDiv.classList.remove("bg-green-300", "text-black");
                                    }

                                    bookSeatBtn.classList.toggle('hidden', selectedSeats.size === 0);
                                } else if (seatStatus === 'booked') {
                                    alert(`Seat ${seatId} is already booked.`);
                                } else {
                                    alert(`Seat ${seatId} is unavailable.`);
                                }
                            });

                            row.push(seatDiv);

                            if (row.length === 10) {
                                rows.push(row);
                                row = [];
                            }
                        });

                        rows.forEach(row => {
                            row.forEach(seat => {
                                seatContainer.appendChild(seat);
                            });
                        });
                    })
                    .catch(error => {
                        console.error("Error fetching seats:", error);
                    });
            }


            // Close the seat modal
            document.getElementById('close-seat-modal').addEventListener('click', () => {
                const seatModal = document.getElementById('seatLayout');
                seatModal.classList.add('hidden');
            });



            // Usage Example
            document.getElementById('book-seat-btn').addEventListener('click', () => {
                // Pass the dynamically updated selectedSeats set
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const currentRouteId = window.currentRouteId || 'some-route-id'; // Use the currently selected route
                const bookSeatUrl = '/seats/book'; // Replace with your actual endpoint
                const userBookingURL = '/user-booking';

                if (selectedSeats.size === 0) {
                    alert('No seats selected!');
                    return;
                }

                userBooking(selectedSeats, currentRouteId, csrfToken, userBookingURL, fare);
                bookSeat(selectedSeats, currentRouteId, csrfToken, bookSeatUrl);
            });



            function bookSeat(selectedSeats, routeId, csrfToken, bookSeatUrl) {
                // Convert selectedSeats to an array
                const seatIds = Array.from(selectedSeats);

                // Prepare the payload including the routeId
                const payload = JSON.stringify({
                    seat_ids: seatIds,
                    route_id: routeId // Include route ID
                });

                // Log for debugging
                console.log('Route ID:', routeId);
                console.log('Payload:', payload);

                // Make the POST request
                fetch(bookSeatUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                        },
                        body: payload, // Send seat numbers and route ID as a JSON object
                    })
                    .then((response) => {
                        console.log('Response status:', response.status); // Debugging
                        if (response.ok) {
                            return response.json();
                        } else {
                            return response.json().then((data) => {
                                throw new Error(data.message || 'Failed to book seats.');
                            });
                        }
                    })
                    .then((data) => {
                        alert(data.message);
                        selectedSeats.clear(); // Clear seat selection
                        document.getElementById('book-seat-btn').classList.add('hidden'); // Hide the button
                    })
                    .catch((error) => {
                        console.error('Error booking seats:', error);
                        alert(error.message || 'An unexpected error occurred.');
                    });
            }

            function userBooking(selectedSeats, routeId, csrfToken, userBookingURL, fare) {
                const seatNumbers = Array.from(selectedSeats).join(','); // Convert seat IDs to comma-separated string

                const payload = JSON.stringify({
                    seat_numbers: seatNumbers, // Send as string
                    route_id: routeId,
                    fare, // Include fare
                });

                fetch(userBookingURL, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: payload,
                    })
                    .then((response) => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw new Error(data.error || 'Failed to create booking');
                            });
                        }
                        return response.json();
                    })
                    .then((data) => {
                        alert(data.message || 'Booking successful!');
                    })
                    .catch((error) => {
                        console.error('Error creating user booking:', error);
                        alert(error.message || 'An error occurred during user booking.');
                    });
            }





            // Function to fetch and display all buses
            function fetchAllBuses() {
                fetch('/all-routes', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then((response) => response.json())
                    .then((responseData) => {
                        console.log("All Buses Response:", responseData); // Log the response for debugging

                        // Ensure data is in the expected format
                        const data = responseData.data;

                        const container = document.querySelector(".w-full.sm-w-full");
                        container.innerHTML = ""; // Clear any existing content

                        if (!Array.isArray(data)) {
                            container.innerHTML = `<h2 class="text-lg mb-2">No buses found or invalid response</h2>`;
                            console.error("Unexpected data format:", responseData);
                            return;
                        }

                        if (data.length === 0) {
                            container.innerHTML = `<h2 class="text-lg mb-2">No buses found</h2>`;
                            return;
                        }

                        container.innerHTML = `<h2 class="text-lg mb-2">${data.length} Buses Found</h2>`;

                        data.forEach((route) => {
                            const routeHTML = `
                    <div class="border-b py-5 flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0">
                        <div class="w-full sm:w-auto flex flex-col sm:flex-1">
                            <h3 class="text-lg mb-4 text-blue-500">${route.bus.operator_name || 'Unknown'}</h3>
                            <p class="text-sm text-gray-600">${route.bus.bus_type}</p>
                        </div>
                        <div class="w-full sm:w-auto flex flex-col sm:flex-1 items-center sm:text-center">
                            <p class="text-xl font-bold text-gray-800 mb-1">${route.departure_time}</p>
                            <div class="text-gray-500">
                                <p>${route.duration || 'Unknown'}</p>
                            </div>
                            <p class="text-xl font-bold text-gray-800 mb-1">${route.arrival_time}</p>
                        </div>
                        <div class="flex-1 text-center w-full sm:w-auto">
                            <p class="text-lg font-bold text-gray-800">INR ${route.fare}</p>
                        </div>
                        <div class="flex-1 text-right w-full sm:w-auto sm:mr-10">
                            <p class="text-sm text-gray-600">${route.bus.total_seats || 'N/A'} Seats available</p>
                        </div>
                        <button id="view-seats-btn" class="mt-4 sm:mt-0 sm:ml-4 px-4 py-2 bg-black text-white rounded-md w-full sm:w-auto" onclick="viewSeats(${route.id})">
                            View Seats
                        </button>
                    </div>
                `;
                            container.insertAdjacentHTML("beforeend", routeHTML);
                        });
                    })
                    .catch((error) => console.error("Error fetching all routes:", error));
            }


            // Function to handle search
            document.getElementById("searchButton").addEventListener("click", function() {
                const source = document.getElementById("fromInput").value;
                const destination = document.getElementById("toInput").value;
                const departure_date = document.getElementById("dateInput").value;

                if (!source || !destination || !departure_date) {
                    alert("Please fill in all fields!");
                    return;
                }

                fetch('/search-routes', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                        },
                        body: JSON.stringify({
                            source,
                            destination,
                            departure_date
                        }),
                    })
                    .then((response) => response.json())
                    .then((responseData) => {
                        console.log("Search Response:", responseData); // Log the response
                        const data = responseData.data;
                        const container = document.querySelector(".w-full.sm-w-full");
                        container.innerHTML = ""; // Clear previous results

                        if (!Array.isArray(data)) {
                            container.innerHTML =
                                `<h2 class="text-lg mb-2">No buses found or invalid response</h2>`;
                            console.error("Unexpected data format:", data);
                            return;
                        }

                        if (data.length === 0) {
                            container.innerHTML = `<h2 class="text-lg mb-2">No buses found</h2>`;
                            return;
                        }

                        container.innerHTML = `<h2 class="text-lg mb-2">${data.length} Buses Found</h2>`;

                        data.forEach((route) => {
                            const routeHTML = `
                            <div class="border-b py-5 flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0">
                                <div class="w-full sm:w-auto flex flex-col sm:flex-1">
                                    <h3 class="text-lg mb-4 text-blue-500"> ${route.bus.operator_name || 'Unknown'}</h3>
                                    <p class="text-sm text-gray-600">${route.bus.bus_type} </p>
                                </div>
                                <div class="w-full sm:w-auto flex flex-col sm:flex-1 items-center sm:text-center">
                                    <p class="text-xl font-bold text-gray-800 mb-1">${route.departure_time}</p>
                                    <div class="text-gray-500">
                                        <p> ${(route.duration || 'Unknown')}</p>
                                    </div>
                                    <p class="text-xl font-bold text-gray-800 mb-1">${route.arrival_time}</p>
                                </div>
                                <div class="flex-1 text-center w-full sm:w-auto">
                                    <p class="text-lg font-bold text-gray-800"> INR ${route.fare}</p>
                                </div>
                                <div class="flex-1 text-right w-full sm:w-auto sm:mr-10">
                                    <p class="text-sm text-gray-600">${route.bus.total_seats || 'N/A'} Seats available</p>
                                </div>
                                <button id="view-seats-btn" class="mt-4 sm:mt-0 sm:ml-4 px-4 py-2 bg-black text-white rounded-md w-full sm:w-auto" onclick="viewSeats(${route.id})">
                                    View Seats
                                </button>
                            </div>
                        `;
                            container.insertAdjacentHTML("beforeend", routeHTML);
                        });
                    })
                    .catch((error) => console.error("Error fetching routes:", error));
            });

            // Fetch all buses on page load
            document.addEventListener("DOMContentLoaded", fetchAllBuses);




            function getMyBookings() {
                fetch('/get-one-bookings')
                    .then((response) => {

                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then((data) => {
                        console.log('Booking Data:', data);
                        const tbody = document.getElementById('userbookings');
                        tbody.innerHTML = '';

                        data.forEach((item) => {
                            const booking = item.booking; // Extract booking data
                            const route = item.route; // Extract route data
                            const bus = item.bus;
                            console.log(booking.seat_numbers);

                            const row = document.createElement('tr');
                            row.innerHTML = `
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${booking.user_id}</td>

            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${booking.seat_numbers}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${bus.operator_name || '-'}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${booking.total_fare}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${route.source || '-'}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${route.destination || '-'}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${route.arrival_time || '-'}</td>

            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${route.departure_time || '-'}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">${bus.bus_type || '-'}</td>
            <td class="py-2 px-3 sm:py-3 sm:px-4 border">
                <button class="py-2 px-5 bg-red-300 text-black rounded-md sm:py-3 sm:px-4 border" onclick="deleteBooking(${booking.id}, '${booking.seat_numbers}',${booking.route_id})">
                   
                                    Cancel Booking
                                </button>
    
</td>

        `;
                            tbody.appendChild(row);
                        });
                    })
                    .catch((error) => {
                        console.error('Error fetching bookings:', error);
                    });
            }

            // Call the function to populate the table
            getMyBookings();

            function deleteBooking(id, seatNumbers, routeId) {
                // Convert the comma-separated seat numbers string into an array
                const seatArray = seatNumbers.split(',');

                // Prepare the data to be sent in the request
                const data = {
                    seat_numbers: seatArray, // Seat numbers as an array
                    route_id: routeId // Route ID
                };

                console.log('Sending data to the server:', data); // Log the data to verify it's correct

                // Send the DELETE request with seat numbers and route ID
                fetch(`/delete-booking/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content') // CSRF token
                        },
                        body: JSON.stringify(data) // Send both seat numbers and route ID in the body
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            alert('Booking Cancelled Successfully');
                            location.reload();
                        } else {
                            alert(data.error || 'Error deleting booking');
                        }
                    })
                    .catch(error => {
                        alert('An error occurred: ' + error.message);
                    });
            }
        </script>



</x-app-layout>
