<link rel="stylesheet" href="css/style.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mobile Recharge Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4 bg-gray-100 min-h-screen">
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
                                    {{-- <li
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
                                                onclick="showContent('deposit')">Deposit-Withdraw</span>
                                        </a>
                                    </li> --}}
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
                                                class="icon icon-tabler icon-tabler-puzzle" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                                </path>
                                            </svg>
                                            <span class="text-sm ml-2" onclick="showContent('recharge')">Mobile
                                                Recharge</span>
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
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none  ">
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
                                            <span class="text-sm ml-2" onclick="showContent('wallet')">Wallet</span>
                                        </a>
                                    </li>
                                    {{-- <li
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
                                            <span class="text-sm ml-2" onclick="showContent('deposit')">Deposit
                                                Withdraw</span>
                                        </a>
                                    </li> --}}
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
                                                <line x1="14" y1="4" x2="10" y2="20">
                                                </line>
                                            </svg>
                                            <span class="text-sm ml-2"
                                                onclick="showContent('transfer')">Transactions</span>
                                        </a>
                                    </li>
                                    <li
                                        class="flex w-full justify-between text-white hover:text-gray-300 cursor-pointer items-center mb-6">
                                        <a href="javascript:void(0)"
                                            class="flex items-center focus:outline-none ">
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
                                            <span class="text-sm ml-2" onclick="showContent('recharge')">Mobile
                                                Recharge</span>
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
        <div class="flex-1 p-6">
            <!-- Home Content -->
            <div id="home" class="tab-content">
                <div class="flex flex-wrap justify-center lg:justify-start lg:ml-36 md:ml-36">


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
                            <div class="text-3xl font-bold mb-6">$ 8,453.00</div>
                            <div class="flex justify-between">
                                <div class="flex items-center space-x-2 text-green-500">
                                    <img src="{{ asset('build/assets/uparrow.svg') }}" class="h-5 w-5">
                                    <span>+$ 2,431.00</span>
                                </div>
                                <div class="flex items-center space-x-2 text-red-500">
                                    <img src="{{ asset('build/assets/downarrow.svg') }}" class="h-5 w-5">
                                    <span>-$ 526.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 w-full sm:w-96 p-5 bg-white rounded-2xl shadow-md" style="height: 210px;">
                            <div class="flex justify-between items-center mb-5">
                                <h3 class="text-lg font-bold">Information</h3>

                            </div>

                            <div class="flex items-center space-x-2">
                                <img src="{{ asset('build/assets/location.svg') }}">
                                <p class="ml-2">Location: India</p>
                            </div><br>

                            <div class="flex items-center space-x-2">
                                <img src="{{ asset('build/assets/address.svg') }}">
                                <p class="ml-2">Address: Mumbai</p>
                            </div><br>

                            <div class="flex items-center space-x-2">
                                <img src="{{ asset('build/assets/wallet.svg') }}">
                                <p class="ml-2">Wallet ID: 6HE46URR677wSR446Ic</p>
                            </div>
                        </div>

                        <div class="mt-5 w-full sm:w-96 p-5 bg-white rounded-xl shadow-md" style="height: 200px;">
                            <div class="flex justify-between items-center mb-5">
                                <h3 class="text-lg font-semibold">Security</h3>
                                <img src="{{ asset('build/assets/dots.svg') }}" class="h-5 w-5">
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="relative w-10 h-10">
                                        <img src="{{ asset('build/assets/p2.svg') }}"
                                            class="absolute top-0 left-0 w-full h-full">
                                        <img src="{{ asset('build/assets/p1.svg') }}"
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
                                        <img src="{{ asset('build/assets/p3.svg') }}"
                                            class="absolute top-0 left-0 w-full h-full">
                                        <img src="{{ asset('build/assets/p4.svg') }}"
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
                        class="w-full sm:max-w-4xl md:max-w-2xl lg:max-w-4xl h-[500px] bg-white rounded-lg shadow-lg flex flex-col items-center overflow-hidden mr-8 mb-8">
                        <!-- Using inline style to ensure the image size is forced to 100px x 100px -->
                        <img src="{{ asset('build/assets/3487900.jpg') }}" alt="Large Image"
                            class="object-contain mt-4" style="width: 400px; height: 390px;">
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
                        <img src="{{ asset('build/assets/i2.png') }}" class="w-46 h-50 rounded-2xl" style="height: 200px;">
                        <img src="{{ asset('build/assets/i3.png') }}" class="w-46 h-50 rounded-2xl" style="height: 200px;">
                        <img src="{{ asset('build/assets/i1.png') }}" class="w-46 h-50 rounded-2xl" style="height: 200px;">
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
            <div id="transfer" class="tab-content hidden container lg:ml-64 md:ml-64">
                <h3 class="mb-8 font-extrabold">
                    All Transactions
                </h3>

                <table class="text-left w-full">
                    <thead class="bg-black flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Wallet ID</th>
                            <th class="p-4 w-1/4">Type</th>
                            <th class="p-4 w-1/4">Amount</th>
                            <th class="p-4 w-1/4">Reason</th>
                            <th class="p-4 w-1/4">Transaction ID</th>

                        </tr>
                    </thead>
                    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                    <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full"
                        style="height: 50vh;">
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>

                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>

                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">W12346</td>
                            <td class="p-4 w-1/4">Credit</td>
                            <td class="p-4 w-1/4">$100</td>
                            <td class="p-4 w-1/4">Refund</td>
                            <td class="p-4 w-1/4">T987654321</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Recharge Content -->
            <div id="recharge" class="tab-content hidden px-4">
                <div class="flex flex-wrap gap-4 ">
                    {{-- first table --}}
                    <div
                        class="max-w-sm w-full h-96 p-6 bg-white rounded-lg shadow-md mx-auto sm:max-w-md md:max-w-lg">
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
                                        <img src="build/assets/airtel.png" alt="Airtel Logo" class="w-6 h-6">
                                        <span>Airtel</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="jio">
                                        <img src="build/assets/jio.png" alt="Jio Logo" class="w-6 h-6">
                                        <span>Jio</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="vodafone">
                                        <img src="build/assets/vadofone.jpg" alt="Vodafone Logo" class="w-6 h-6">
                                        <span>Vodafone</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="bsnl">
                                        <img src="build/assets/bsnl.png" alt="BSNL Logo" class="w-6 h-6">
                                        <span>BSNL</span>
                                    </div>
                                    <div class="dropdown-item flex items-center space-x-2" data-value="mtnl">
                                        <img src="build/assets/mtnl.png" alt="MTNL Logo" class="w-6 h-6">
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

                <div class="max-w-screen-lg mx-auto my-6 bg-white p-5 rounded-lg shadow-md">
                    <h1 class="text-2xl font-bold mb-4 text-gray-800 text-center lg:text-left">Browse Plans</h1>
                    <hr>

                    <div class="flex flex-wrap justify-center lg:justify-start gap-4 mb-6">
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
        </div>
    </div>
    </div>
    </div>

    <!-- JavaScript to handle tab switching -->
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
        function showTable(tableId) {
            // Hide all tables
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.style.display = 'none');

            // Show the selected table
            document.getElementById(tableId).style.display = 'block';
        }
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
</x-app-layout>
