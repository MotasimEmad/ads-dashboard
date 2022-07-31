<template>
    <aside class="w-full md:w-64 bg-gray-800 md:min-h-screen font-semibold">
        <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
            <a href="/dashboard" class="flex items-center">
                <svg class="w-6" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.6883 0.335913C32.3407 -0.0248702 31.7929 -0.104067 31.3596 0.142322L19.2249 6.96861L20.3117 1.53926C20.4063 1.06188 20.1797 0.582302 19.7529 0.353512C19.3261 0.126923 18.7981 0.199519 18.455 0.544904L2.96986 16.03C2.94127 16.052 2.91487 16.0762 2.89067 16.1026C1.02735 17.9945 0 20.4804 0 23.1005C0 28.5584 4.4416 33 9.89955 33C12.5218 33 15.0077 31.9727 16.8974 30.1115C16.926 30.0829 16.9502 30.0543 16.9766 30.0235L30.1232 16.8792C30.4532 16.5492 30.539 16.0454 30.3366 15.6252C30.1364 15.205 29.6876 14.9674 29.2235 15.0092L24.4409 15.5394L32.8379 1.67125C33.0975 1.24227 33.0381 0.694497 32.6883 0.335913ZM9.89955 29.7002C6.25431 29.7002 3.29985 26.7457 3.29985 23.1005C3.29985 19.4552 6.25431 16.5008 9.89955 16.5008C13.5448 16.5008 16.4992 19.4552 16.4992 23.1005C16.4992 26.7457 13.5448 29.7002 9.89955 29.7002Z" fill="#667EEA"/>
                </svg>

                <span class="text-gray-300 text-xl font-semibold mx-2">Dashboard</span>
            </a>
            <div class="flex md:hidden">
                <button type="button" click="isOpen = !isOpen"
                        class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                    <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="px-2 py-6 md:block" :class="isOpen? 'block': 'hidden'">
            <ul>
                <li class="px-2 py-3 hover:bg-gray-900 rounded">
                    <a href="/dashboard" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        <span class="mx-2 text-gray-300">Dashboard</span>
                    </a>
                </li>
                <li class="px-2 py-3 rounded mt-2">
                    <div>
                        <div x-data="{ open: false }" x-on:click.outside="open = false">
                            <div class="flex items-center hover:bg-gray-900">
                                <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <button x-on:click="open = !open">
                                    <span class="mx-2 text-gray-300 font-semibold">General Information</span>
                                    <!-- <span :class="{'rotated': open}">&raquo;</span> -->
                                </button>`
                            </div>
                            <ul class="mt-4 mx-8" x-show="open" x-transition.opacity>
                                <li class="my-2"><a href="/general" class="text-gray-300">Website Info</a></li>
                                <li class="my-2"><a href="/contact" class="text-gray-300">Contact</a></li>
                                <li class="my-2"><a href="#" class="text-gray-300">Social Links</a></li>        
                                <li class="my-2"><a href="#" class="text-gray-300">Images</a></li>        
                            </ul>
                        </div>
                    </div>
                    <!-- <a href="/general" class="flex items-center">
                        <span class="mx-2 text-gray-300"></span>
                    </a> -->
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="/titles" class="flex items-center">
                       <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span class="mx-2 text-gray-300">Titles</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="/inboxes" class="flex items-center">
                       <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                        <span class="mx-2 text-gray-300">Inbox</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="/inputs" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                        <span class="mx-2 text-gray-300">Form Inputs</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "SaleSidebar",
        data() {
            return {
                isOpen: false
            }
        },
        methods: {
            logout() {
                axios.post('logout')
                    .then(() => location.reload());
            }
        }
    }
</script>
