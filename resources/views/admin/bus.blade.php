<script src="https://cdn.tailwindcss.com"></script>


<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> -->


    <div class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('assets/bg3.jpg') }}');">

        <!-- Admin Panel for Managing Buses -->
        <div class="container px-4">
            <h1 class="text-center pt-3 mb-5 text-3xl font-semibold text-gray-600 h-14 w-full font-bold">Admin Panel -
                <span
                    class="font-bold text-center pt-3 mb-5 text-3xl font-semibold text-blue-600 h-14 w-full bg-grey-200">Manage
                    Buses</span>
            </h1>

            <div class="py-4 flex">

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
                                            <svg aria-label="Ripples. Logo" role="img"
                                                xmlns="http://www.w3.org/2000/svg" width="144" height="30"
                                                viewBox="0 0 144 30">
                                                <path fill="#5F7DF2"
                                                    d="M80.544 9.48c1.177 0 2.194.306 3.053.92.86.614 1.513 1.45 1.962 2.507.448 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.699 3.51-.465 1.037-1.136 1.851-2.012 2.444-.876.592-1.885.888-3.028.888-1.405 0-2.704-.554-3.897-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78H70.45V9.657h6.145v1.663l.209-.21c1.123-1.087 2.369-1.63 3.74-1.63zm17.675 0c1.176 0 2.194.306 3.053.92.859.614 1.513 1.45 1.961 2.507.449 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.698 3.51-.466 1.037-1.136 1.851-2.012 2.444-.876.592-1.886.888-3.028.888-1.405 0-2.704-.554-3.898-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78h-1.904V9.657h6.144v1.663l.21-.21c1.122-1.087 2.368-1.63 3.739-1.63zM24.973 1c1.13 0 2.123.433 2.842 1.133 0 .004 0 .008.034.012 1.54 1.515 1.54 3.962-.034 5.472-.035.029-.069.058-.069.089-.719.65-1.712 1.05-2.773 1.05-.719 0-1.37.061-1.985.184-2.363.474-3.8 1.86-4.28 4.13-.114.489-.18 1.02-.2 1.59l-.003.176.001-.034.002.034c.022.505-.058 1.014-.239 1.495l-.076.182.064-.157c.106-.28.18-.575.217-.881l.008-.084-.026.195c-.286 1.797-1.858 3.188-3.754 3.282l-.204.005h-.103l-.103.002h-.034c-.65.012-1.232.072-1.78.181-2.328.473-3.765 1.863-4.279 4.139-.082.417-.142.863-.163 1.339l-.008.362v.23c0 2.02-1.603 3.681-3.661 3.861L4.16 29l-.48-.01c-.958-.073-1.849-.485-2.499-1.113-1.522-1.464-1.573-3.808-.152-5.33l.152-.154.103-.12c.719-.636 1.677-1.026 2.704-1.026.754 0 1.404-.062 2.02-.184 2.362-.475 3.8-1.86 4.28-4.126.136-.587.17-1.235.17-1.942 0-.991.411-1.896 1.027-2.583.069-.047.137-.097.172-.15.068-.051.102-.104.17-.159.633-.564 1.498-.925 2.408-.978l.229-.007h.034c.068 0 .171.003.274.009.616-.014 1.198-.074 1.746-.18 2.328-.474 3.766-1.863 4.279-4.135.082-.44.142-.912.163-1.418l.008-.385v-.132c0-2.138 1.78-3.872 4.005-3.877zm-.886 10c1.065 0 1.998.408 2.697 1.073.022.011.03.024.042.036l.025.017v.015c1.532 1.524 1.532 3.996 0 5.52-.034.03-.067.06-.067.09-.7.655-1.665 1.056-2.697 1.056-.7 0-1.332.062-1.932.186-2.298.477-3.696 1.873-4.163 4.157-.133.591-.2 1.242-.2 1.95 0 1.036-.399 1.975-1.032 2.674l-.1.084c-.676.679-1.551 1.055-2.441 1.13l-.223.012-.366-.006c-.633-.043-1.3-.254-1.865-.632-.156-.096-.296-.201-.432-.315l-.2-.177v-.012c-.734-.735-1.133-1.72-1.133-2.757 0-2.078 1.656-3.793 3.698-3.899l.198-.005h.133c.666-.007 1.266-.069 1.832-.185 2.265-.476 3.663-1.874 4.163-4.161.08-.442.139-.916.159-1.424l.008-.387v-.136c0-2.153 1.731-3.899 3.896-3.904zm3.882 11.025c1.375 1.367 1.375 3.583 0 4.95s-3.586 1.367-4.96 0c-1.345-1.367-1.345-3.583 0-4.95 1.374-1.367 3.585-1.367 4.96 0zm94.655-12.672c1.405 0 2.628.323 3.669.97 1.041.648 1.843 1.566 2.406 2.756.563 1.189.852 2.57.87 4.145h-9.954l.03.251c.132.906.476 1.633 1.03 2.18.605.596 1.386.895 2.343.895 1.058 0 2.09-.525 3.097-1.574l3.301 1.066-.203.291c-.69.947-1.524 1.67-2.501 2.166-1.075.545-2.349.818-3.821.818-1.473 0-2.774-.277-3.904-.831-1.13-.555-2.006-1.34-2.628-2.355-.622-1.016-.933-2.21-.933-3.58 0-1.354.324-2.582.971-3.682s1.523-1.961 2.628-2.583c1.104-.622 2.304-.933 3.599-.933zm13.955.126c1.202 0 2.314.216 3.339.648v-.47h3.034v3.91h-3.034l-.045-.137c-.317-.848-1.275-1.272-2.875-1.272-1.21 0-1.816.339-1.816 1.016 0 .296.161.516.483.66.321.144.791.262 1.409.355 1.735.22 3.102.536 4.1.946 1 .41 1.697.919 2.095 1.524.398.605.597 1.339.597 2.202 0 1.405-.48 2.5-1.441 3.282-.96.783-2.266 1.174-3.917 1.174-1.608 0-2.7-.321-3.275-.964V23h-3.098v-4.596h3.098l.032.187c.116.547.412.984.888 1.311.53.364 1.183.546 1.962.546.762 0 1.324-.087 1.688-.26.364-.174.546-.476.546-.908 0-.296-.076-.527-.228-.692-.153-.165-.447-.31-.883-.438-.435-.127-1.102-.27-2-.431-1.997-.313-3.433-.82-4.31-1.517-.875-.699-1.313-1.64-1.313-2.825 0-1.21.455-2.162 1.365-2.856.91-.695 2.11-1.042 3.599-1.042zm-69.164.178v10.27h1.98V23h-8.24v-3.072h2.032V12.78h-2.031V9.657h6.259zm-16.85-5.789l.37.005c1.94.05 3.473.494 4.6 1.335 1.198.892 1.797 2.185 1.797 3.878 0 1.168-.273 2.15-.819 2.945-.546.796-1.373 1.443-2.482 1.943l3.085 5.776h2.476V23h-5.827l-4.317-8.366h-2.183v5.116h2.4V23H39.646v-3.25h2.628V7.118h-2.628v-3.25h10.918zm61.329 0v16.06h1.892V23h-8.24v-3.072h2.082v-13h-2.082v-3.06h6.348zm-32.683 9.04c-.812 0-1.462.317-1.949.951-.486.635-.73 1.49-.73 2.565 0 1.007.252 1.847.756 2.52.503.673 1.161 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.448-.622.672-1.504.672-2.647 0-1.092-.228-1.942-.685-2.552-.457-.61-1.113-.914-1.968-.914zm17.675 0c-.813 0-1.463.317-1.95.951-.486.635-.73 1.49-.73 2.565 0 1.007.253 1.847.756 2.52.504.673 1.162 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.449-.622.673-1.504.673-2.647 0-1.092-.229-1.942-.686-2.552-.457-.61-1.113-.914-1.967-.914zM14.1 0C16.267 0 18 1.743 18 3.894v.01c0 2.155-1.733 3.903-3.9 3.903-4.166 0-6.3 2.133-6.3 6.293 0 2.103-1.667 3.817-3.734 3.9l-.5-.009c-.933-.075-1.8-.49-2.433-1.121C.4 16.134 0 15.143 0 14.1c0-2.144 1.733-3.903 3.9-3.903 4.166 0 6.3-2.133 6.3-6.294C10.2 1.751 11.934.005 14.1 0zm108.32 12.184c-.76 0-1.372.22-1.834.66-.46.44-.75 1.113-.87 2.018h5.561c-.118-.795-.442-1.44-.97-1.936-.53-.495-1.158-.742-1.886-.742zM49.525 7.118h-2.26v4.444h1.829c2.023 0 3.034-.754 3.034-2.26 0-.728-.233-1.274-.698-1.638-.466-.364-1.1-.546-1.905-.546zm15.821-3.593c.635 0 1.183.231 1.644.692.462.462.692 1.01.692 1.644 0 .677-.23 1.238-.692 1.682-.46.445-1.009.667-1.644.667-.643 0-1.195-.23-1.656-.692-.462-.461-.692-1.013-.692-1.657 0-.634.23-1.182.692-1.644.46-.461 1.013-.692 1.656-.692zM5.991 1.171c1.345 1.563 1.345 4.095 0 5.658-1.374 1.561-3.585 1.561-4.96 0-1.375-1.563-1.375-4.095 0-5.658 1.375-1.561 3.586-1.561 4.96 0z" />
                                            </svg>
                                        </div>
                                        <ul class="mt-12">
                                            <li
                                                class="flex w-full justify-between text-black cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
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
                                                        <rect x="14" y="14" width="6" height="6"
                                                            rx="1"></rect>
                                                    </svg>
                                                    <span class="text-sm ml-2" onclick="showContent('addnewbus')">Add
                                                        New Bus</span>
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
                                                    <span class="text-sm ml-2" onclick="showContent('buslist')">Bus
                                                        List</span>
                                                </a>
                                            </li>

                                            <li
                                                class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-code" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                                        <polyline points="7 8 3 12 7 16"></polyline>
                                                        <polyline points="17 8 21 12 17 16"></polyline>
                                                        <line x1="14" y1="4" x2="10"
                                                            y2="20">
                                                        </line>
                                                    </svg>
                                                    <span class="text-sm ml-2"
                                                        onclick="showContent('routeslist')">Routes List</span>
                                                </a>
                                            </li>
                                            <li
                                                class="flex w-full justify-between text-black hover:text-gray-300 cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-compass" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                                        <polyline points="7 8 3 12 7 16"></polyline>
                                                        <polyline points="17 8 21 12 17 16"></polyline>
                                                        <line x1="14" y1="4" x2="10"
                                                            y2="20">
                                                        </line>
                                                    </svg>
                                                    <span class="text-sm ml-2"
                                                        onclick="showContent('allbookings')">All Bookings</span>
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
                                            class="icon icon-tabler icon-tabler-adjustments" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                            <svg aria-label="Ripples. Logo"role="img"
                                                xmlns="http://www.w3.org/2000/svg" width="144" height="30"
                                                viewBox="0 0 144 30">
                                                <path fill="#5F7DF2"
                                                    d="M80.544 9.48c1.177 0 2.194.306 3.053.92.86.614 1.513 1.45 1.962 2.507.448 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.699 3.51-.465 1.037-1.136 1.851-2.012 2.444-.876.592-1.885.888-3.028.888-1.405 0-2.704-.554-3.897-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78H70.45V9.657h6.145v1.663l.209-.21c1.123-1.087 2.369-1.63 3.74-1.63zm17.675 0c1.176 0 2.194.306 3.053.92.859.614 1.513 1.45 1.961 2.507.449 1.058.673 2.247.673 3.568 0 1.303-.233 2.473-.698 3.51-.466 1.037-1.136 1.851-2.012 2.444-.876.592-1.886.888-3.028.888-1.405 0-2.704-.554-3.898-1.663v4.279h2.64v3.072h-9.14v-3.072h2.26V12.78h-1.904V9.657h6.144v1.663l.21-.21c1.122-1.087 2.368-1.63 3.739-1.63zM24.973 1c1.13 0 2.123.433 2.842 1.133 0 .004 0 .008.034.012 1.54 1.515 1.54 3.962-.034 5.472-.035.029-.069.058-.069.089-.719.65-1.712 1.05-2.773 1.05-.719 0-1.37.061-1.985.184-2.363.474-3.8 1.86-4.28 4.13-.114.489-.18 1.02-.2 1.59l-.003.176.001-.034.002.034c.022.505-.058 1.014-.239 1.495l-.076.182.064-.157c.106-.28.18-.575.217-.881l.008-.084-.026.195c-.286 1.797-1.858 3.188-3.754 3.282l-.204.005h-.103l-.103.002h-.034c-.65.012-1.232.072-1.78.181-2.328.473-3.765 1.863-4.279 4.139-.082.417-.142.863-.163 1.339l-.008.362v.23c0 2.02-1.603 3.681-3.661 3.861L4.16 29l-.48-.01c-.958-.073-1.849-.485-2.499-1.113-1.522-1.464-1.573-3.808-.152-5.33l.152-.154.103-.12c.719-.636 1.677-1.026 2.704-1.026.754 0 1.404-.062 2.02-.184 2.362-.475 3.8-1.86 4.28-4.126.136-.587.17-1.235.17-1.942 0-.991.411-1.896 1.027-2.583.069-.047.137-.097.172-.15.068-.051.102-.104.17-.159.633-.564 1.498-.925 2.408-.978l.229-.007h.034c.068 0 .171.003.274.009.616-.014 1.198-.074 1.746-.18 2.328-.474 3.766-1.863 4.279-4.135.082-.44.142-.912.163-1.418l.008-.385v-.132c0-2.138 1.78-3.872 4.005-3.877zm-.886 10c1.065 0 1.998.408 2.697 1.073.022.011.03.024.042.036l.025.017v.015c1.532 1.524 1.532 3.996 0 5.52-.034.03-.067.06-.067.09-.7.655-1.665 1.056-2.697 1.056-.7 0-1.332.062-1.932.186-2.298.477-3.696 1.873-4.163 4.157-.133.591-.2 1.242-.2 1.95 0 1.036-.399 1.975-1.032 2.674l-.1.084c-.676.679-1.551 1.055-2.441 1.13l-.223.012-.366-.006c-.633-.043-1.3-.254-1.865-.632-.156-.096-.296-.201-.432-.315l-.2-.177v-.012c-.734-.735-1.133-1.72-1.133-2.757 0-2.078 1.656-3.793 3.698-3.899l.198-.005h.133c.666-.007 1.266-.069 1.832-.185 2.265-.476 3.663-1.874 4.163-4.161.08-.442.139-.916.159-1.424l.008-.387v-.136c0-2.153 1.731-3.899 3.896-3.904zm3.882 11.025c1.375 1.367 1.375 3.583 0 4.95s-3.586 1.367-4.96 0c-1.345-1.367-1.345-3.583 0-4.95 1.374-1.367 3.585-1.367 4.96 0zm94.655-12.672c1.405 0 2.628.323 3.669.97 1.041.648 1.843 1.566 2.406 2.756.563 1.189.852 2.57.87 4.145h-9.954l.03.251c.132.906.476 1.633 1.03 2.18.605.596 1.386.895 2.343.895 1.058 0 2.09-.525 3.097-1.574l3.301 1.066-.203.291c-.69.947-1.524 1.67-2.501 2.166-1.075.545-2.349.818-3.821.818-1.473 0-2.774-.277-3.904-.831-1.13-.555-2.006-1.34-2.628-2.355-.622-1.016-.933-2.21-.933-3.58 0-1.354.324-2.582.971-3.682s1.523-1.961 2.628-2.583c1.104-.622 2.304-.933 3.599-.933zm13.955.126c1.202 0 2.314.216 3.339.648v-.47h3.034v3.91h-3.034l-.045-.137c-.317-.848-1.275-1.272-2.875-1.272-1.21 0-1.816.339-1.816 1.016 0 .296.161.516.483.66.321.144.791.262 1.409.355 1.735.22 3.102.536 4.1.946 1 .41 1.697.919 2.095 1.524.398.605.597 1.339.597 2.202 0 1.405-.48 2.5-1.441 3.282-.96.783-2.266 1.174-3.917 1.174-1.608 0-2.7-.321-3.275-.964V23h-3.098v-4.596h3.098l.032.187c.116.547.412.984.888 1.311.53.364 1.183.546 1.962.546.762 0 1.324-.087 1.688-.26.364-.174.546-.476.546-.908 0-.296-.076-.527-.228-.692-.153-.165-.447-.31-.883-.438-.435-.127-1.102-.27-2-.431-1.997-.313-3.433-.82-4.31-1.517-.875-.699-1.313-1.64-1.313-2.825 0-1.21.455-2.162 1.365-2.856.91-.695 2.11-1.042 3.599-1.042zm-69.164.178v10.27h1.98V23h-8.24v-3.072h2.032V12.78h-2.031V9.657h6.259zm-16.85-5.789l.37.005c1.94.05 3.473.494 4.6 1.335 1.198.892 1.797 2.185 1.797 3.878 0 1.168-.273 2.15-.819 2.945-.546.796-1.373 1.443-2.482 1.943l3.085 5.776h2.476V23h-5.827l-4.317-8.366h-2.183v5.116h2.4V23H39.646v-3.25h2.628V7.118h-2.628v-3.25h10.918zm61.329 0v16.06h1.892V23h-8.24v-3.072h2.082v-13h-2.082v-3.06h6.348zm-32.683 9.04c-.812 0-1.462.317-1.949.951-.486.635-.73 1.49-.73 2.565 0 1.007.252 1.847.756 2.52.503.673 1.161 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.448-.622.672-1.504.672-2.647 0-1.092-.228-1.942-.685-2.552-.457-.61-1.113-.914-1.968-.914zm17.675 0c-.813 0-1.463.317-1.95.951-.486.635-.73 1.49-.73 2.565 0 1.007.253 1.847.756 2.52.504.673 1.162 1.01 1.974 1.01.838 0 1.481-.312 1.93-.934.449-.622.673-1.504.673-2.647 0-1.092-.229-1.942-.686-2.552-.457-.61-1.113-.914-1.967-.914zM14.1 0C16.267 0 18 1.743 18 3.894v.01c0 2.155-1.733 3.903-3.9 3.903-4.166 0-6.3 2.133-6.3 6.293 0 2.103-1.667 3.817-3.734 3.9l-.5-.009c-.933-.075-1.8-.49-2.433-1.121C.4 16.134 0 15.143 0 14.1c0-2.144 1.733-3.903 3.9-3.903 4.166 0 6.3-2.133 6.3-6.294C10.2 1.751 11.934.005 14.1 0zm108.32 12.184c-.76 0-1.372.22-1.834.66-.46.44-.75 1.113-.87 2.018h5.561c-.118-.795-.442-1.44-.97-1.936-.53-.495-1.158-.742-1.886-.742zM49.525 7.118h-2.26v4.444h1.829c2.023 0 3.034-.754 3.034-2.26 0-.728-.233-1.274-.698-1.638-.466-.364-1.1-.546-1.905-.546zm15.821-3.593c.635 0 1.183.231 1.644.692.462.462.692 1.01.692 1.644 0 .677-.23 1.238-.692 1.682-.46.445-1.009.667-1.644.667-.643 0-1.195-.23-1.656-.692-.462-.461-.692-1.013-.692-1.657 0-.634.23-1.182.692-1.644.46-.461 1.013-.692 1.656-.692zM5.991 1.171c1.345 1.563 1.345 4.095 0 5.658-1.374 1.561-3.585 1.561-4.96 0-1.375-1.563-1.375-4.095 0-5.658 1.375-1.561 3.586-1.561 4.96 0z" />
                                            </svg>
                                        </div>
                                        <ul class="mt-12">
                                            <li
                                                class="flex w-full justify-between text-white hover:text-gray-500 cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none  ">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-grid" width="18"
                                                        height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                                        <rect x="4" y="4" width="6" height="6"
                                                            rx="1">
                                                        </rect>
                                                        <rect x="14" y="4" width="6" height="6"
                                                            rx="1">
                                                        </rect>
                                                        <rect x="4" y="14" width="6" height="6"
                                                            rx="1">
                                                        </rect>
                                                        <rect x="14" y="14" width="6" height="6"
                                                            rx="1">
                                                        </rect>
                                                    </svg>
                                                    <span class="text-sm ml-2" onclick="showContent('addnewbus')">Add
                                                        New Bus</span>
                                                </a>
                                            </li>
                                            <li
                                                class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none  ">
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
                                                    <span class="text-sm ml-2" onclick="showContent('buslist')">Bus
                                                        List</span>
                                                </a>
                                            </li>

                                            <li
                                                class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none  ">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-code" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                                        <polyline points="7 8 3 12 7 16"></polyline>
                                                        <polyline points="17 8 21 12 17 16"></polyline>
                                                        <line x1="14" y1="4" x2="10"
                                                            y2="20">
                                                        </line>
                                                    </svg>
                                                    <span class="text-sm ml-2"
                                                        onclick="showContent('routeslist')">Routes List</span>
                                                </a>
                                            </li>
                                            <li
                                                class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                                <a href="javascript:void(0)"
                                                    class="flex items-center focus:outline-none  ">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-compass" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                                        <polyline points="7 8 3 12 7 16"></polyline>
                                                        <polyline points="17 8 21 12 17 16"></polyline>
                                                        <line x1="14" y1="4" x2="10"
                                                            y2="20">
                                                        </line>
                                                    </svg>
                                                    <span class="text-sm ml-2"
                                                        onclick="showContent('allbookings')">All Bookings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </dh-component>
                    </div>
                </div>


                <div class="container mx-auto px-4">
                    <!-- Create Bus Form -->
                    <div class="tab-content card shadow-lg mb-6 bg-transparent rounded-lg overflow-hidden w-full"
                        id="addnewbus">
                        <div class="card-header bg-blue-400 text-white py-3 px-4">
                            <span class="font-semibold text-lg">Add New Bus</span>
                        </div>
                        <div class="card-body p-6">
                            <form id="busForm" onsubmit="storeBusDetail(event)" method="POST"
                                action="{{ route('bus.store') }}">
                                @csrf
                                <div class="mb-5">
                                    <label for="operatorName" class="form-label text-sm font-medium text-gray-700">Bus
                                        Name</label>
                                    <input type="text" id="operatorName"
                                        class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        required>
                                </div>
                                <div class="mb-5">
                                    <label for="busType" class="form-label text-sm font-medium text-gray-700">Bus
                                        Type</label>
                                    <select id="busType"
                                        class="form-select w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        required>
                                        <option value="">Select Bus Type</option>
                                        <option value="AC">AC</option>
                                        <option value="Non-AC">Non-AC</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="totalSeats" class="form-label text-sm font-medium text-gray-700">Total
                                        Seats</label>
                                    <input type="number" id="totalSeats"
                                        class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                        min="1" required>
                                </div>
                                <div class="flex justify-end space-x-4">
                                    <button type="submit"
                                        class="btn btn-primary px-6 py-2 text-white bg-blue-400 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
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


                    <!-- Bus List -->
                    <div class="tab-content card shadow-lg mb-6 bg-transparent rounded-lg overflow-hidden"
                        id="buslist">
                        <div class="card-header bg-blue-400 text-white py-3 px-4">
                            <span class="font-semibold text-lg sm:text-xl md:text-2xl">Bus List</span>
                        </div>
                        <div class="card-body p-4 sm:p-6 lg:p-8 overflow-x-auto">
                            <table class="table w-full table-auto text-left border border-gray-300">
                                <thead class="bg-gray-100 text-gray-700">
                                    <tr>
                                        <th
                                            class="py-2 px-3 md:py-3 md:px-4 border-b font-medium text-sm sm:text-base">
                                            ID</th>
                                        <th
                                            class="py-2 px-3 md:py-3 md:px-4 border-b font-medium text-sm sm:text-base">
                                            Bus Name</th>
                                        <th
                                            class="py-2 px-3 md:py-3 md:px-4 border-b font-medium text-sm sm:text-base">
                                            Bus Type</th>
                                        <th
                                            class="py-2 px-3 md:py-3 md:px-4 border-b font-medium text-sm sm:text-base">
                                            Total Seats</th>
                                        <th
                                            class="py-2 px-3 md:py-3 md:px-4 border-b font-medium text-sm sm:text-base">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="busList" class="text-gray-600">
                                    <!-- Routes will be dynamically populated here -->
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6">
                                <form id="routeForm" class="space-y-4">
                                    <div>
                                        <label for="source"
                                            class="block text-sm font-medium text-gray-700">Source</label>
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
                                        <label for="departure_time"
                                            class="block text-sm font-medium text-gray-700">Departure
                                            Time</label>
                                        <input type="datetime-local" id="departure_time"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" />
                                    </div>
                                    <div>
                                        <label for="arrival_time"
                                            class="block text-sm font-medium text-gray-700">Arrival
                                            Time</label>
                                        <input type="datetime-local" id="arrival_time"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" />
                                    </div>
                                    <div>
                                        <label for="departure_date"
                                            class="block text-sm font-medium text-gray-700">Departure
                                            Date</label>
                                        <input type="date" id="departure_date"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5" />
                                    </div>
                                    <div>
                                        <label for="fare"
                                            class="block text-sm font-medium text-gray-700">Fare</label>
                                        <input type="number" id="fare"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5"
                                            placeholder="Enter fare" />
                                    </div>
                                    <button type="button"
                                        class="w-full text-white bg-blue-400 font-medium rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        onclick="saveRoute()">
                                        Save Route
                                    </button>
                                    <button type="button"
                                        class="w-full text-white bg-blue-400 font-medium rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
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


                    <!-- route list -->
                    <div class="tab-content card shadow-lg mb-6 bg-transparent rounded-lg overflow-hidden"
                        id="routeslist">
                        <div class="card-header bg-blue-400 text-white py-3 px-4">
                            <span class="font-semibold text-lg">Routes List</span>
                        </div>
                        <div class="card-body p-4 sm:p-6 lg:p-8 overflow-x-auto">
                            <table class="w-full table-auto text-left border-collapse border border-gray-300">
                                <thead class="bg-gray-100 text-gray-700">
                                    <tr>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Route ID</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Bus ID</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Source</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Destination</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Departure Time</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Departure Date</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Arrival Time</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Fare</th>
                                        <th class="py-2 px-3 md:py-3 md:px-4 border font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="routesList" class="text-gray-600">
                                    <!-- Routes will be dynamically populated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- All bookings -->
                    <div class="tab-content card shadow-lg mb-6 bg-transparent rounded-lg overflow-hidden"
                        id="allbookings">
                        <div class="card-header bg-blue-400 text-white py-3 px-4">
                            <span class="font-semibold text-lg">All Bookings</span>
                        </div>
                        <div class="card-body p-4 sm:p-6 lg:p-8 overflow-x-auto">
                            <table class="w-full table-auto text-left border-collapse border border-gray-300">
                                <thead class="bg-gray-100 text-gray-700">
                                    <tr>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">User ID</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Route ID</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Bus Name</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Seat Number</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Fare</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Source</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Destination</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Arrival Time</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Departure Time</th>
                                        <th class="py-2 px-4 md:py-3 md:px-5 border font-medium">Bus Type</th>
                                        <th class="py-2 px-6 md:py-3 md:px-5 border font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="allBookingsInfo" class="text-gray-600">
                                    <!-- Routes will be dynamically populated here -->

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Edit Bus Form -->
                    <div class="tab-content card shadow-lg mb-6 bg-transparent rounded-lg overflow-hidden"
                        id="editBusCard" style="display: none;">

                        <div class="card-header bg-gray-400 text-white py-3 px-4">
                            <span class="font-semibold text-lg">Edit Bus</span>
                        </div>
                        <div class="card-body p-6">
                            <form id="editBusForm" onsubmit="updateBusDetail(event)" method="POST">
                                @csrf
                                @method('PUT') <!-- Used for PUT request in Laravel -->

                                <input type="hidden" id="busId">

                                <div class="mb-5">
                                    <label for="editOperatorName"
                                        class="form-label text-sm font-medium text-gray-700">Operator Name</label>
                                    <input type="text" id="editOperatorName"
                                        class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                        required>
                                </div>
                                <div class="mb-5">
                                    <label for="editBusType" class="form-label text-sm font-medium text-gray-700">Bus
                                        Type</label>
                                    <select id="editBusType"
                                        class="form-select w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                        required>
                                        <option value="">Select Bus Type</option>
                                        <option value="AC">AC</option>
                                        <option value="Non-AC">Non-AC</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="editTotalSeats"
                                        class="form-label text-sm font-medium text-gray-700">Total Seats</label>
                                    <input type="number" id="editTotalSeats"
                                        class="form-control w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                        min="1" required>
                                </div>
                                <div class="flex justify-end space-x-4">
                                    <button type="submit"
                                        class="btn btn-primary px-6 py-2 bg-gray-400 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600">
                                        Update Bus
                                    </button>
                                    <button type="button"
                                        class="btn btn-secondary px-6 py-2 bg-gray-400 text-white rounded-md focus:outline-none"
                                        onclick="resetEditForm()">Cancel</button>
                                </div>
                                <div id="edit-bus-message" class="text-center mt-3 mb-3"></div>
                            </form>
                        </div>
                    </div>

                </div>




                <!-- Popup Modal -->
                <div
                    id="seatModal"class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50">
                    <div
                        class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-2xl">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg sm:text-xl md:text-2xl font-bold">Seat Layout</h2>
                            <button onclick="closeModal()"
                                class="text-gray-500 hover:text-gray-800 text-xl">&times;</button>
                        </div>
                        <div id="seatTableContainer" class="mt-4 overflow-x-auto">
                            <!-- Content for seat layout dynamically populated -->
                        </div>
                        <div class="flex justify-end mt-4">
                            <button onclick="closeModal()"
                                class="bg-blue-400 text-white px-4 py-2 rounded-lg transition">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>
            function closeModal() {
                const seatModal = document.getElementById('seatModal');
                seatModal.classList.add('hidden');
            }


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
                                <td class="py-3 px-4 flex">
                                    <img src="{{ asset('assets/edit.png') }}" alt="Edit" class="cursor-pointer w-6 h-6 mr-5 mt-1" onclick="editBus(${bus.id})" />
                                    <img src="{{ asset('assets/delete.png') }}" alt="Delete" class="cursor-pointer ml-2 w-6 h-6 mr-5 mt-1.5" onclick="deleteBus(${bus.id})" />
                                    <button class="bg-blue-400 text-white px-4 py-2 rounded-lg mr-9" onclick="manageRoutes(${bus.id})">Manage Routes</button>
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
            function editBus(id) {
                document.getElementById('editBusCard').style.display = 'block';
                document.getElementById('busForm').style.display = 'none';


                const editForm = document.getElementById('editBusCard');
                editForm.style.display = 'block';

                // Scroll the page to the form
                editForm.scrollIntoView({
                    behavior: 'smooth'
                });

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
                <td class="py-3 px-4 flex">
                    <img src="{{ asset('assets/edit.png') }}" alt="Edit" class="cursor-pointer w-6 h-6 mr-5" onclick="editRoute(${route.id})" />
                    <img src="{{ asset('assets/delete.png') }}" alt="Delete" class="cursor-pointer ml-2 w-6 h-6 mr-5 mt-0.5" onclick="deleteRoute(${route.id})" />
                    <button class="text-white bg-blue-400 px-4 py-1 rounded-lg ml-2 mr-7" onclick="viewSeats(${route.id})">View Seats</button>
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
                background-color: skyblue;
            }
            .seat.unavailable {
                background-color: gray;
            }
                 #seatTableContainer {
                display: flex;
                flex-direction: column; /* Default row layout */
            }

            /* Change row layout for mobile view */
            @media (max-width: 768px) {
                #seatTableContainer {
                    flex-direction: row; /* Switch to column layout */
                    flex-wrap: wrap; /* Allow wrapping if necessary */
                    gap: 10px; /* Add spacing between rows */
                }

            #seatTableContainer > div {
                flex: 1 1 auto; /* Allow rows to take available space */
                display: flex;
                flex-direction: column; /* Keep seats in vertical order */
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
                                                        }
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
                                                                'Failed to book seat. Please try again.'
                                                            );
                                                        }
                                                    })
                                                    .catch(error => console.error("Error booking seat:",
                                                        error));
                                            }
                                        } else {
                                            alert('This seat is already booked.');
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


            function getAllBookingsOfUser() {
                fetch('/admin/get-all-bookings')
                    .then((response) => {

                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then((data) => {
                        console.log('Booking Data:', data);
                        const tbody = document.getElementById('allBookingsInfo');
                        tbody.innerHTML = '';

                        data.forEach((item) => {
                            const booking = item.booking; // Extract booking data
                            const route = item.route; // Extract route data
                            const bus = item.bus;

                            const row = document.createElement('tr');
                            row.innerHTML = `
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${booking.user_id}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${booking.route_id}</td>

            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${bus.operator_name || '-'}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${booking.seat_numbers}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${booking.total_fare}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${route.source || '-'}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${route.destination || '-'}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${route.arrival_time || '-'}</td>

            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${route.departure_time || '-'}</td>
            <td class="py-2 px-3 md:py-3 md:px-4 border font-medium">${bus.bus_type || '-'}</td>
            <td class="py-2 px-6 md:py-3 md:px-4 border font-medium flex items-center">
    <img src="{{ asset('assets/edit.png') }}" alt="Edit" class="cursor-pointer w-6 h-6 mr-2" />
    <img src="{{ asset('/assets/delete.png') }}" alt="Delete" class="cursor-pointer w-6 h-6" />
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
            getAllBookingsOfUser();



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


            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                sidebar.classList.toggle('hidden'); // Toggle sidebar visibility
                mainContent.classList.toggle('lg:ml-64'); // Adjust main content position
            }

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
</x-app-layout>
